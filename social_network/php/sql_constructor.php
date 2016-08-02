<?php

	function sql_select($table, $data = null) {

		$sql = "SELECT * FROM " . $table;

		if (isset($data)) {
			foreach ($data as $key => $value) {
				$sql .= " WHERE $key = " . "'$value'";
			}
		}
		
		return $sql;
	}

	function sql_insert($data) {

		$table = $data['table'];
		unset($data['table']);

		$sql = "INSERT INTO " . $table . " (";
		
		foreach ($data as $key => $value) {
			$sql .= "$key, ";
		}

		$sql = rtrim($sql, ', ');

		$sql .= ") VALUES (";

		foreach ($data as $key => $value) {
			$sql .= "?, ";
		}

		$sql = rtrim($sql, ', ');

		$sql .= ")";
	
		return $sql;

	}

	function sql_update($table, $id, $data) {

		$sql = "UPDATE $table SET ";

		foreach ($data as $key => $value) {
			$sql .= "$key=?, ";
		}

		$sql = rtrim($sql, ', ');

		$sql .= " WHERE id = $id";

		return($sql);
	}

?>