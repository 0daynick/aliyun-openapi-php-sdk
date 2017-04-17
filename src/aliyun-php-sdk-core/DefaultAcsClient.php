<?php
/*
 * Licensed to the Apache Software Foundation (ASF) under one
 * or more contributor license agreements.  See the NOTICE file
 * distributed with this work for additional information
 * regarding copyright ownership.  The ASF licenses this file
 * to you under the Apache License, Version 2.0 (the
 * "License"); you may not use this file except in compliance
 * with the License.  You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing,
 * software distributed under the License is distributed on an
 * "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY
 * KIND, either express or implied.  See the License for the
 * specific language governing permissions and limitations
 * under the License.
 */
namespace Aliyun\Core;

use Aliyun\Core\Exception\ClientException;
use Aliyun\Core\Exception\ServerException;
use Aliyun\Core\Http\HttpHelper;
use Aliyun\Core\Regions\Endpoint;
use Aliyun\Core\Regions\EndpointProvider;
use Aliyun\Core\Regions\ProductDomain;

class DefaultAcsClient implements IAcsClient
{    
    public $iClientProfile;
    public $__urlTestFlag__;
    
    function  __construct($iClientProfile)
    {
        $this->iClientProfile = $iClientProfile;
        $this->__urlTestFlag__ = false;

        //config http proxy
        define('ENABLE_HTTP_PROXY', FALSE);
        define('HTTP_PROXY_IP', '127.0.0.1');
        define('HTTP_PROXY_PORT', '8888');

        $endpoint_filename = dirname(__FILE__) . DIRECTORY_SEPARATOR . "Regions/endpoints.xml";
        $xml = simplexml_load_string(file_get_contents($endpoint_filename));
        $json = json_encode($xml);
        $json_array = json_decode($json, TRUE);

        $endpoints = array();

        foreach ($json_array["Endpoint"] as $json_endpoint) {
            # pre-process RegionId & Product
            if (!array_key_exists("RegionId", $json_endpoint["RegionIds"])) {
                $region_ids = array();
            } else {
                $json_region_ids = $json_endpoint['RegionIds']['RegionId'];
                if (!is_array($json_region_ids)) {
                    $region_ids = array($json_region_ids);
                } else {
                    $region_ids = $json_region_ids;
                }
            }

            if (!array_key_exists("Product", $json_endpoint["Products"])) {
                $products = array();

            } else {
                $json_products = $json_endpoint["Products"]["Product"];

                if (array() === $json_products or !is_array($json_products)) {
                    $products = array();
                } else if (array_keys($json_products) !== range(0, count($json_products) - 1)) {
                    # array is not sequential
                    $products = array($json_products);
                } else {
                    $products = $json_products;
                }
            }

            $product_domains = array();
            foreach ($products as $product) {
                $product_domain = new ProductDomain($product['ProductName'], $product['DomainName']);
                array_push($product_domains, $product_domain);
            }

            $endpoint = new Endpoint($region_ids[0], $region_ids, $product_domains);
            array_push($endpoints, $endpoint);
        }

        EndpointProvider::setEndpoints($endpoints);
    }
    
    public function getAcsResponse($request, $iSigner = null, $credential = null, $autoRetry = true, $maxRetryNumber = 3)
    {
        $httpResponse = $this->doActionImpl($request, $iSigner, $credential, $autoRetry, $maxRetryNumber);
        $respObject = $this->parseAcsResponse($httpResponse->getBody(), $request->getAcceptFormat());
        if(false == $httpResponse->isSuccess())
        {
            $this->buildApiException($respObject, $httpResponse->getStatus());
        }
        return $respObject;
    }

    private function doActionImpl($request, $iSigner = null, $credential = null, $autoRetry = true, $maxRetryNumber = 3)
    {    
        if(null == $this->iClientProfile && (null == $iSigner || null == $credential 
            || null == $request->getRegionId() || null == $request->getAcceptFormat()))
        {
            throw new ClientException("No active profile found.", "SDK.InvalidProfile");
        }
        if(null == $iSigner)
        {
            $iSigner = $this->iClientProfile->getSigner();
        }
        if(null == $credential)
        {
            $credential = $this->iClientProfile->getCredential();
        }
        $request = $this->prepareRequest($request);
        $domain = EndpointProvider::findProductDomain($request->getRegionId(), $request->getProduct());
        if(null == $domain)
        {
            throw new ClientException("Can not find endpoint to access.", "SDK.InvalidRegionId");
        }
        $requestUrl = $request->composeUrl($iSigner, $credential, $domain);

        if ($this->__urlTestFlag__) {
            throw new ClientException($requestUrl, "URLTestFlagIsSet");
        }

        if(count($request->getDomainParameter())>0){
            $httpResponse = HttpHelper::curl($requestUrl, $request->getMethod(), $request->getDomainParameter(), $request->getHeaders());
        } else {
            $httpResponse = HttpHelper::curl($requestUrl, $request->getMethod(),$request->getContent(), $request->getHeaders());
        }
        
        $retryTimes = 1;
        while (500 <= $httpResponse->getStatus() && $autoRetry && $retryTimes < $maxRetryNumber) {
            $requestUrl = $request->composeUrl($iSigner, $credential,$domain);
            
            if(count($request->getDomainParameter())>0){
                $httpResponse = HttpHelper::curl($requestUrl, $request->getDomainParameter(), $request->getHeaders());
            } else {
                $httpResponse = HttpHelper::curl($requestUrl, $request->getMethod(), $request->getContent(), $request->getHeaders());
            }
            $retryTimes ++;
        }
        return $httpResponse;
    }
    
    public function doAction($request, $iSigner = null, $credential = null, $autoRetry = true, $maxRetryNumber = 3)
    {    
        trigger_error("doAction() is deprecated. Please use getAcsResponse() instead.", E_USER_NOTICE);
        return $this->doActionImpl($request, $iSigner, $credential, $autoRetry, $maxRetryNumber);
    }
    
    private function prepareRequest($request)
    {
        if(null == $request->getRegionId())
        {
            $request->setRegionId($this->iClientProfile->getRegionId());
        }
        if(null == $request->getAcceptFormat())
        {
            $request->setAcceptFormat($this->iClientProfile->getFormat());
        }
        if(null == $request->getMethod())
        {
            $request->setMethod("GET");
        }
        return $request;
    }
    
    
    private function buildApiException($respObject, $httpStatus)
    {
        throw new ServerException($respObject->Message, $respObject->Code, $httpStatus, $respObject->RequestId);
    }
    
    private function parseAcsResponse($body, $format)
    {
        if ("JSON" == $format)
        {    
            $respObject = json_decode($body);
        }
        else if("XML" == $format)
        {
            $respObject = @simplexml_load_string($body);
        }
        else if("RAW" == $format)
        {
            $respObject = $body;
        }
        return $respObject;
    }
}
