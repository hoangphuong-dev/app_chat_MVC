  
<?php
class Session{
 public static function init(){
  if (version_compare(phpversion(), '5.4.0', '<')) {
    if (session_id() == '') {
      session_start();
    }
  } else {
    if (session_status() == PHP_SESSION_NONE) {
      session_start();
    }
  }
}

public static function set($key, $val){
  self::init();
  $_SESSION[$key] = $val;
}

public static function get($key){
  self::init();
  if (isset($_SESSION[$key])) {
   return $_SESSION[$key];
 } else {
   return false;
 }
}

// public static function checkSession(){
 //  self::init();
 //  if (self::get("adminLogin")== false) {
 //   self::destroy();
 //   header("Location:../admin");
 // }
// }  

public static function checkLogin(){
  self::init();
  if(!empty($_COOKIE['user_name']) && !empty($_COOKIE['user_id'])) {
    $user_name = $_COOKIE['user_name'];
    $user_id = $_COOKIE['user_id'];

      // mỗi lần đăng nhập tăng thời gian lên 2 tháng (trong vòng 2 tháng không vào => tự đăng xuất)
    // setcookie('user_name', $user_name, time() + 60*60*24*60);
    // setcookie('customer_name', $customer_name, time() + 60*60*24*60);
    
      // gán giá trị của cookie vào session 
    Session::set('user_name', $user_name);
    Session::set('user_id', $user_id);
  }
}

}
?>