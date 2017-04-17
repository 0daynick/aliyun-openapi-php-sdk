# 基于阿里云sdk的psr-4版本

## Requirements

- PHP 5.4+

## Build

- to run unit tests, you will have to configure aliyun-sdk.properties files in your user directory, and make sure your project has corresponding service enabled, eg. openmr.

## Example

```php

use Aliyun\Core\Profile\DefaultProfile;
use Aliyun\Core\DefaultAcsClient;
use Aliyun\Ecs\DescribeRegionsRequest; 
 
$iClientProfile = DefaultProfile::getProfile("cn-hangzhou", "<your accessKey>", "<your accessSecret>");
$client = new DefaultAcsClient($iClientProfile);

$request = new DescribeRegionsRequest();
$request->setMethod("GET");
$response = $client->getAcsResponse($request);
print_r($response);
```