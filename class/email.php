<?php
class email {
	function __CONSTRUCT(){
		return $this;
	}
	function getAddress(){
		if(!isset($this->address)){
			return false;
		}
		return $this->address;
	}
	function getDomain(){
		if(!isset($this->domain)){
			return false;
		}
		return $this->domain->getName();
	}
	function setAddress($input){
		if (!filter_var($input, FILTER_VALIDATE_EMAIL)) {
			return false;
		}
		$parts = explode("@",$input);
		$this->address = $parts[0];
		$this->setDomain($parts[1]);
		return true;
	}
	function setDomain($input){
		if(!isset($this->domain)){
			$this->domain = new domain();
		}
		$this->domain->setName($input);
		return true;
	}
}
?>