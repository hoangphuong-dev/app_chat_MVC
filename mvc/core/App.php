<?php 
class App {
	protected $controller="Home"; 
	protected $action="Hello";
	protected $param=[];

	function __construct(){
		$arr = $this->UrlProcess();
		// Xử lý controller 
		if(file_exists("./mvc/controllers/".$arr[0].".php")){
			// kiểm tra trong thư mục controller xem có file đó trong controller không 
			$this->controller = $arr[0];
			unset($arr[0]);
		}
		require_once "./mvc/controllers/".$this->controller.".php"; 
		$this->controller = new $this->controller;
			// xử lí action 
		if(isset($arr[1])) {
			if(method_exists($this->controller, $arr[1])) {
				$this->action = $arr[1];
			}
			unset($arr[1]);
		}
		$this->param = $arr?array_values($arr):[];
		call_user_func_array([$this->controller, $this->action], $this->param);
	}

	function UrlProcess() {
		if(isset($_GET["url"])) {
			return explode("/", filter_var(trim($_GET["url"], "")));
		}
	}
}