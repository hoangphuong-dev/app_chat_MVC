<?php 
require_once 'mvc/controllers/Home.php';
class User extends Home {
	use DB;
	use Format;

	public function Hello() {
		echo "chua co gi ";
	}

	public function search_friends() {
		$key = $this->validation($_POST['search_user']);
		$friends = $this->model("UserModel");
		$result_search = $friends->searchUser($key);
		$this->view("master_layout", [
			"Page"=>"home",
			"result_search"=>$result_search,
			

		]);




	}



}