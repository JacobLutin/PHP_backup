<?php	

class Message extends Active_Record_Base {

	public $table = 'messages';

	private $id;
	public $text;
	public $user_id;
	public $send_to_id;
	public $unread;
	public $date;

}

?>