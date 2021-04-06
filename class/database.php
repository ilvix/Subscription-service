<?php
class database {
	private $host = "X", $username = "X", $password = "X", $database = "X";

	function __CONSTRUCT(){
		return $this;
	}
	function connection(){
		if(!isset($this->connection)){
			$this->connection = new mysqli($this->host,$this->username,$this->password,$this->database);
			$this->connection->set_charset("utf8mb4");
		}
		return $this;
	}
	function command($sql){
		$this->connection->query($sql);
	}
	function fetch($sql){
		if($query_response = $this->connection->query($sql)){
			while ($r = $query_response->fetch_assoc()){
	            $row_data[] = $r;
	        }
	        if(!isset($row_data)){
	        	return false;
	        }
			return $row_data;
		}
		return false;
	}
	function destroy(){
		$this->connection->close();
	}

}
?>
