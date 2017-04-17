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
namespace vod\Request\V20170321;

class CreateUploadVideoRequest extends \RpcAcsRequest
{
	function  __construct()
	{
		parent::__construct("vod", "2017-03-21", "CreateUploadVideo");
	}

	private  $ownerId;

	private  $resourceOwnerAccount;

	private  $resourceOwnerId;

	private  $coverURL;

	private  $description;

	private  $fileName;

	private  $fileSize;

	private  $iP;

	private  $privilege;

	private  $title;

	public function getOwnerId() {
		return $this->ownerId;
	}

	public function setOwnerId($ownerId) {
		$this->ownerId = $ownerId;
		$this->queryParameters["OwnerId"]=$ownerId;
	}

	public function getResourceOwnerAccount() {
		return $this->resourceOwnerAccount;
	}

	public function setResourceOwnerAccount($resourceOwnerAccount) {
		$this->resourceOwnerAccount = $resourceOwnerAccount;
		$this->queryParameters["ResourceOwnerAccount"]=$resourceOwnerAccount;
	}

	public function getResourceOwnerId() {
		return $this->resourceOwnerId;
	}

	public function setResourceOwnerId($resourceOwnerId) {
		$this->resourceOwnerId = $resourceOwnerId;
		$this->queryParameters["ResourceOwnerId"]=$resourceOwnerId;
	}

	public function getCoverURL() {
		return $this->coverURL;
	}

	public function setCoverURL($coverURL) {
		$this->coverURL = $coverURL;
		$this->queryParameters["CoverURL"]=$coverURL;
	}

	public function getDescription() {
		return $this->description;
	}

	public function setDescription($description) {
		$this->description = $description;
		$this->queryParameters["Description"]=$description;
	}

	public function getFileName() {
		return $this->fileName;
	}

	public function setFileName($fileName) {
		$this->fileName = $fileName;
		$this->queryParameters["FileName"]=$fileName;
	}

	public function getFileSize() {
		return $this->fileSize;
	}

	public function setFileSize($fileSize) {
		$this->fileSize = $fileSize;
		$this->queryParameters["FileSize"]=$fileSize;
	}

	public function getIP() {
		return $this->iP;
	}

	public function setIP($iP) {
		$this->iP = $iP;
		$this->queryParameters["IP"]=$iP;
	}

	public function getPrivilege() {
		return $this->privilege;
	}

	public function setPrivilege($privilege) {
		$this->privilege = $privilege;
		$this->queryParameters["Privilege"]=$privilege;
	}

	public function getTitle() {
		return $this->title;
	}

	public function setTitle($title) {
		$this->title = $title;
		$this->queryParameters["Title"]=$title;
	}
	
}