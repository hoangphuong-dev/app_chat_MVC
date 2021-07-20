<?php
date_default_timezone_set('Asia/Ho_Chi_minh');
Session::init();
class Home {
	use Controller;
	use Format;

	public function Hello() { // gọi hàm login
		if(!empty($_SESSION['user_name'])) {
			$this->view("master_layout", [
				"Page"=>"home",
			]);
		} else {
			$this->view("master_layout", [
				"Page"=>"login",
			]);
		}
	}
	public function signup() {
		$this->view("master_layout", [
			"Page"=>"signup",
		]);
	}
	public function process_signup() {
		$name = $this->validation($_POST['name']);
		$phone = $this->validation($_POST['phone']);
		$pass = md5($this->validation($_POST['pass']));
		$date_create = date("Y-m-d H:i:s");
		if($name == '' || $phone == '' || $pass == '') {
			$this->view("master_layout", [
				"Page"=>"signup",
				"alert"=>"Bạn phải điền hết thông tin bên dưới !",
				"color"=>"red",
			]);
		} else {
			$signup = $this->model('HomeModel');
			$result_phone = $signup->getPhone($phone);
			if(mysqli_num_rows($result_phone) >= 1) {
				$this->view("master_layout", [
					"Page"=>"signup",
					"alert"=>"Số điện thoại đã tồn tại !",
					"color"=>"red",
				]);
			} else {
				$signup->processSignup($name, $phone, $pass, $date_create);
				$this->view("master_layout", [
					"Page"=>"login",
					"alert"=>"Đăng ký thành công . Vui lòng đăng nhập !",
					"color"=>"green",
				]);
			}
		}
	}
	public function login() {
		$phone = $this->validation($_POST['phone']);
		$password = md5($this->validation($_POST['password']));

		if($phone == '' || $password == '') {
			$this->view("master_layout", [
				"Page"=>"login",
				"alert"=>"Bạn phải điền hết thông tin bên dưới !",
				"color"=>"red",
			]);
		} else {
			$login = $this->model("HomeModel");
			$result = $login->login($phone, $password);
			$count_result = mysqli_num_rows($result);
			if($count_result == 1) {
				$row = $result->fetch_array();
				if(isset($_POST['remeber_login'])) {
					setcookie("user_name",$row['user_name'], (time() + 60*60*24*60));
					setcookie("user_id",$row['user_id'], (time() + 60*60*24*60));
				}
				Session::set("user_name", $row['user_name']);
				Session::set("user_id", $row['user_id']);
				header("Location:Home/");		
			} else {
				$this->view("master_layout", [
					"Page"=>"login",
					"alert"=>"Số điện thoại hoặc mật khẩu không chính xác !",
					"color"=>"red",
				]);
			}
		}
	}
	public function logout() {
		unset ($_SESSION['user_name']);
		unset ($_SESSION['user_id']);
		// khi đăng xuất => vô hiệu hoá cookie
		setcookie("user_name", "", -1);
		setcookie("user_id", "", -1);

		unset($_COOKIE['user_name']);
		unset($_COOKIE['user_id']);

		header("Location:../");
	}


}