<?php
class Messenger {
	use Controller;
	use Format;

	
	public function chat($id) {
		$chat = $this->model("MessengerModel");
		$result_id = $chat->getUserById($id);
		$result_load = $chat->loadMess($id);


		$count_result = mysqli_num_rows($result_id);
		if($count_result == 1) {
			$this->view("master_layout", [
				"Page"=>"chat",
				"user"=>$result_id,
				"old_mess"=>$result_load,
			]);
		} else echo "Khong tim thay nguoi nay";
	}

	public function process_chat(){
		$body_msg = $_POST['body_msg'];
		$id_friend = $_POST['id_friend'];


		if ($body_msg != '') {
			$messages = $this->model('MessengerModel');
			$messages->sendMes($body_msg, $id_friend);
		}
	}

	
	
}