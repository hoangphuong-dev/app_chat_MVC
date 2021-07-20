<?php 
class UserModel {
	use DB;

	public function searchUser($key)	{
		$query = "select * from users where user_name like '%$key%' or user_phone like '%$key%'";
		$result = $this->runQuery($query);
		return $result;
	}

	
}