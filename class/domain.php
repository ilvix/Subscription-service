<?php
class domain {
	function getName(){
		if(!isset($this->name)){
			return false;
		}
		return $this->name;
	}
	function setName($input){
		if(!(preg_match("/^([a-z\d](-*[a-z\d])*)(\.([a-z\d](-*[a-z\d])*))*$/i", $input) //valid chars check
            && preg_match("/^.{1,253}$/", $input) //overall length check
            && preg_match("/^[^\.]{1,63}(\.[^\.]{1,63})*$/", $input)   )){
            	return false;
            }
		$this->name = $input;
		return true;
	}
}
?>
