<?php

class Database {

	public function init() {

		try {
			$connection = new PDO("mysql:host=$this->host;dbname=$this->db_name", $this->user, $this->pass);
			$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch (PDOException $e) {
			echo $e->getMessage();
		}
		
		return $connection;	
	}
}

?>