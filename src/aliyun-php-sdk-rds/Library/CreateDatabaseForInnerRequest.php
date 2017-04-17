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
namespace Aliyun\Rds;

use Aliyun\Core\RpcAcsRequest;

class CreateDatabaseForInnerRequest extends RpcAcsRequest
{
	function  __construct()
	{
		parent::__construct("Rds", "2014-08-15", "CreateDatabaseForInner");
	}

	private  $ownerId;

	private  $resourceOwnerAccount;

	private  $resourceOwnerId;

	private  $dBInstanceId;

	private  $dBName;

	private  $characterSetName;

	private  $dBDescription;

	private  $accountName;

	private  $accountPrivilege;

	private  $accountPassword;

	private  $ownerAccount;

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

	public function getDBInstanceId() {
		return $this->dBInstanceId;
	}

	public function setDBInstanceId($dBInstanceId) {
		$this->dBInstanceId = $dBInstanceId;
		$this->queryParameters["DBInstanceId"]=$dBInstanceId;
	}

	public function getDBName() {
		return $this->dBName;
	}

	public function setDBName($dBName) {
		$this->dBName = $dBName;
		$this->queryParameters["DBName"]=$dBName;
	}

	public function getCharacterSetName() {
		return $this->characterSetName;
	}

	public function setCharacterSetName($characterSetName) {
		$this->characterSetName = $characterSetName;
		$this->queryParameters["CharacterSetName"]=$characterSetName;
	}

	public function getDBDescription() {
		return $this->dBDescription;
	}

	public function setDBDescription($dBDescription) {
		$this->dBDescription = $dBDescription;
		$this->queryParameters["DBDescription"]=$dBDescription;
	}

	public function getAccountName() {
		return $this->accountName;
	}

	public function setAccountName($accountName) {
		$this->accountName = $accountName;
		$this->queryParameters["AccountName"]=$accountName;
	}

	public function getAccountPrivilege() {
		return $this->accountPrivilege;
	}

	public function setAccountPrivilege($accountPrivilege) {
		$this->accountPrivilege = $accountPrivilege;
		$this->queryParameters["AccountPrivilege"]=$accountPrivilege;
	}

	public function getAccountPassword() {
		return $this->accountPassword;
	}

	public function setAccountPassword($accountPassword) {
		$this->accountPassword = $accountPassword;
		$this->queryParameters["AccountPassword"]=$accountPassword;
	}

	public function getOwnerAccount() {
		return $this->ownerAccount;
	}

	public function setOwnerAccount($ownerAccount) {
		$this->ownerAccount = $ownerAccount;
		$this->queryParameters["OwnerAccount"]=$ownerAccount;
	}
	
}