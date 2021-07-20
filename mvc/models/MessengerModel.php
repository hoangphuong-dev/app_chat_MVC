<?php
date_default_timezone_set('Asia/Ho_Chi_minh');
class MessengerModel {
	use DB;

	public function getUserById($id) {
		$query = "select * from users where user_id = '$id'";
		$result = $this->runQuery($query);
		return $result;
	}

	public function sendMes($body_msg, $id_friend) {
		$user_id = Session::get('user_id');
		$date_send = date("Y-m-d H:i:s");
		$query = "insert into messenger(mes_body, user_from, user_receiver, date_send)
		values('$body_msg', '$user_id', '$id_friend', '$date_send')";
		$this->runQuery($query);
	}

	public function loadMess($id_friend) {
		$id_self = Session::get('user_id');
		$query = "select * from messenger where user_from in ('$id_friend', '$id_self')
		and user_receiver in ('$id_friend', '$id_self') order by mes_id ASC";
		$result = $this->runQuery($query);
		return $result;
	}




}
?>