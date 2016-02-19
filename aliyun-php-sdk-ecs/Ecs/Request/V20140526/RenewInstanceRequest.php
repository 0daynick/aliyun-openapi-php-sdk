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
namespace Ecs\Request\V20140526;

class RenewInstanceRequest extends \RpcAcsRequest
{
	function  __construct()
	{
		parent::__construct("Ecs", "2014-05-26", "RenewInstance");
	}

	private  $ownerId;

	private  $resourceOwnerAccount;

	private  $resourceOwnerId;

	private  $ownerAccount;

	private  $instanceId;

	private  $instanceType;

	private  $internetMaxBandwidthOut;

	private  $internetChargeType;

	private  $period;

	private  $rebootTime;

	private  $covertDiskPortable1DiskId;

	private  $covertDiskPortable2DiskId;

	private  $covertDiskPortable3DiskId;

	private  $covertDiskPortable4DiskId;

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

	public function getOwnerAccount() {
		return $this->ownerAccount;
	}

	public function setOwnerAccount($ownerAccount) {
		$this->ownerAccount = $ownerAccount;
		$this->queryParameters["OwnerAccount"]=$ownerAccount;
	}

	public function getInstanceId() {
		return $this->instanceId;
	}

	public function setInstanceId($instanceId) {
		$this->instanceId = $instanceId;
		$this->queryParameters["InstanceId"]=$instanceId;
	}

	public function getInstanceType() {
		return $this->instanceType;
	}

	public function setInstanceType($instanceType) {
		$this->instanceType = $instanceType;
		$this->queryParameters["InstanceType"]=$instanceType;
	}

	public function getInternetMaxBandwidthOut() {
		return $this->internetMaxBandwidthOut;
	}

	public function setInternetMaxBandwidthOut($internetMaxBandwidthOut) {
		$this->internetMaxBandwidthOut = $internetMaxBandwidthOut;
		$this->queryParameters["InternetMaxBandwidthOut"]=$internetMaxBandwidthOut;
	}

	public function getInternetChargeType() {
		return $this->internetChargeType;
	}

	public function setInternetChargeType($internetChargeType) {
		$this->internetChargeType = $internetChargeType;
		$this->queryParameters["InternetChargeType"]=$internetChargeType;
	}

	public function getPeriod() {
		return $this->period;
	}

	public function setPeriod($period) {
		$this->period = $period;
		$this->queryParameters["Period"]=$period;
	}

	public function getRebootTime() {
		return $this->rebootTime;
	}

	public function setRebootTime($rebootTime) {
		$this->rebootTime = $rebootTime;
		$this->queryParameters["RebootTime"]=$rebootTime;
	}

	public function getCovertDiskPortable1DiskId() {
		return $this->covertDiskPortable1DiskId;
	}

	public function setCovertDiskPortable1DiskId($covertDiskPortable1DiskId) {
		$this->covertDiskPortable1DiskId = $covertDiskPortable1DiskId;
		$this->queryParameters["CovertDiskPortable1DiskId"]=$covertDiskPortable1DiskId;
	}

	public function getCovertDiskPortable2DiskId() {
		return $this->covertDiskPortable2DiskId;
	}

	public function setCovertDiskPortable2DiskId($covertDiskPortable2DiskId) {
		$this->covertDiskPortable2DiskId = $covertDiskPortable2DiskId;
		$this->queryParameters["CovertDiskPortable2DiskId"]=$covertDiskPortable2DiskId;
	}

	public function getCovertDiskPortable3DiskId() {
		return $this->covertDiskPortable3DiskId;
	}

	public function setCovertDiskPortable3DiskId($covertDiskPortable3DiskId) {
		$this->covertDiskPortable3DiskId = $covertDiskPortable3DiskId;
		$this->queryParameters["CovertDiskPortable3DiskId"]=$covertDiskPortable3DiskId;
	}

	public function getCovertDiskPortable4DiskId() {
		return $this->covertDiskPortable4DiskId;
	}

	public function setCovertDiskPortable4DiskId($covertDiskPortable4DiskId) {
		$this->covertDiskPortable4DiskId = $covertDiskPortable4DiskId;
		$this->queryParameters["CovertDiskPortable4DiskId"]=$covertDiskPortable4DiskId;
	}
	
}