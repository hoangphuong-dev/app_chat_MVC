<?php 
class HomeModel {
	use DB;

	public function getPhone($phone)	{
		$query = "select user_phone from users where user_phone = '$phone'";
		$result = $this->runQuery($query);
		return $result;
	}

	public function processSignup($name, $phone, $pass, $date_create) {
		$query = "insert into users (user_name, user_phone, pass, date_create)
		values('$name', '$phone', '$pass', '$date_create')";
		$this->runQuery($query);
	}

	public function login($phone, $password) {
		$query = "select * from users where user_phone = '$phone' and pass = '$password'";
		$result = $this->runQuery($query);
		return $result;
	}




	
}