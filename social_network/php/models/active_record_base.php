<?php

class Active_Record_Base {

	function __construct($data=null){
		if (isset($data)) {
			foreach ($data as $key => $value) {
				$this->$key = $value;
			}
			// $this->date =();
			print_r($this);
		}
	}

	public function save() {

		$result = false;

		$params = $this->get_params();

		$sql = sql_insert($params);

		try {
			$db = new db;
			$connection = $db->init();

			unset($params['table']);

			$data = [];

			foreach ($params as $key => $value) {
				array_push($data, $value);
			}

			$STH = $connection->prepare($sql);
			$result = $STH->execute($data);
		}
		catch (PDOException $e) {
			echo $e->getMessage();
		}

		$connection = null;

		return $result;
	}

	public function get($params = null) {

		if (isset($params)) {
			$sql = sql_select($this->table, $params);
		} else {
			$sql = sql_select($this->table);
		}

		$result = [];

		try {
			$db = new db;
			$connection = $db->init();

			$STH = $connection->query($sql);
			$STH->setFetchMode(PDO::FETCH_ASSOC);
		}
		catch (PDOException $e) {
			echo $e->getMessage();
		}

		$connection = null;

		foreach ($STH as $object) {
			array_push($result, $object);
		}

		return $result;
	}

	public function get_by_id($id) {

		$this->id = $id;

		$sql = sql_select($this->table, ['id' => $id]);

		try {
			$db = new db;
			$connection = $db->init();

			$STH = $connection->query($sql);
			$STH->setFetchMode(PDO::FETCH_ASSOC);
		}
		catch (PDOException $e) {
			echo $e->getMessage();
		}

		$result = [];

		foreach ($STH as $object) {
			foreach ($object as $key => $value) {
				$this->$key = $value;
			}
			array_push($result, $object);
		}

		foreach ($result[0] as $key => $value) {
			$this->$key = $value;
		}

		$connection = null;

		return $result;
	}


	private function get_params() {
		$params = [];
		foreach ($this as $key => $value) {
			$params[$key] = $value;
		}

		return $params;
	}
}

?>
