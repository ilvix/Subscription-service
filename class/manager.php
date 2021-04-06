<?php
class manager {
	function __CONSTRUCT(&$db_object){
		$this->db = $db_object;
	}

	function getDomainID(){
		return $this->domainID;
	}
	function setDomainID($input){
		$this->domainID = $input;
	}
	function saveDomain($name){
		$this->domain = $name;
		$sql = "SELECT ID FROM `Domain` WHERE Name='".$name."' LIMIT 1;";
		$result = $this->db->fetch($sql);
		if(!isset($result[0]['ID'])){
			$sql = "INSERT INTO `Domain`(`ID`, `Name`) VALUES (NULL,'".$name."');";
			$this->db->command($sql);
			$sql = "SELECT ID FROM `Domain` WHERE Name='".$name."' LIMIT 1;";
			$result = $this->db->fetch($sql);
		}
		$this->setDomainID($result[0]['ID']);
	}

	function saveEmail($address){
		$this->email = $address;
		$sql = "SELECT ID FROM `Mail` WHERE Address='".$address."' AND DomainID=".$this->getDomainID()." LIMIT 1;";
		$result = $this->db->fetch($sql);
		if(!isset($result[0]['ID'])){
			$sql = "INSERT INTO `Mail`(`ID`, `Address`, `DomainID`, `Timestamp`) VALUES (NULL,'".$address."',".$this->getDomainID().",".time().");";
			$this->db->command($sql);
		}
	}

	function validateOperation(){
		$sql = "SELECT ID FROM `Mail` WHERE Address='".$this->email."' LIMIT 1;";
		$result = $this->db->fetch($sql);
		if(!isset($result[0]['ID'])){
			return false;
		}
		return true;
	}
}
?>
