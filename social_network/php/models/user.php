<?php

class User extends Active_Record_Base {

	public $table = 'users';

	public $id;
	public $firstname;
	public $lastname;
	public $email;
	public $pass;
	public $friend_list;

	public function get_username() {
		return $this->firstname . " " . $this->lastname;
	}

	public function login($data) {

		$user_logged_in = false;

		$sql = sql_select($this->table, ['email' => $data['email']]);

		if ($sql) {

			try {
				$db = new db;
				$connection = $db->init();

				$STH = $connection->query($sql);
				$STH->setFetchMode(PDO::FETCH_ASSOC);
			}
			catch (PDOException $e) {
				echo $e->getMessage();
			}

			foreach ($STH as $user) {
				if ($user['pass'] == $data['pass']) {
					$this->set_session($user);
					$user_logged_in = true;
				}
			}

		}

		return $user_logged_in;
	}

	public function logout() {

		$_SESSION = [];
		session_destroy();
	}

	public function add_friend($friend_id) {

		$result = false;

		$friend_list = $this->friend_list;

		if (strpos($friend_list, $friend_id) === false) {
			$friend_list .= "$friend_id;";
			$this->friend_list = $friend_list;

			$sql = sql_update($this->table, $this->id, ['friend_list' => $friend_id]);

			try {
				$db = new db;
				$connection = $db->init();

				$STH = $connection->prepare($sql);
				$result = $STH->execute([$this->friend_list]);
			}
			catch (PDOException $e) {
				echo $e->getMessage();
			}
		} else {
			$result = false;
		}

		return ($result);
	}

	public function remove_friend($friend_id) {

		$friend_list = $this->friend_list;

		$friend_list = explode(';', $friend_list);
		$friend_id = strval($friend_id);
		$index = array_search($friend_id, $friend_list);
		unset($friend_list[$index]);
		$friend_list = implode(';', $friend_list);
		
		$this->friend_list = $friend_list;

	}

	public function set_session($user) {
		foreach ($user as $column => $value) {
			$key = 'user_' . $column;
			$_SESSION[$key] = $value;
		}
	}

	public function unread_messages() {
		$message = new Message();

		$messages = $message->get(['send_to_id' => $this->id]);

		$count = 0;

		foreach ($messages as $message) {
			if ($message['unread'] == 0)
				$count++;
		}

		return $count;
	}
}

?>
