<?php 
require_once 'mvc/core/Process_link.php';
Session::init();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="<?= $link?>public/css/fontawesome.min.css">
	<link rel="stylesheet" href="<?= $link?>public/css/style.css">
	<link rel="shortcut icon" href="<?= $link?>public/images/iconapp.ico">
</head>
<body>
	<?php // print_r($_SESSION) ?>
	<div class="main-menu">
		<h1><i class="fa fa-commenting"></i><a href="<?= $link?>Home/">Messenger</a></h1>
		<a href="<?= $link?>Home/logout"><i class="fa fa-sign-out">Đăng xuất</i></a> 
	</div>
	<div class="clearfix">
		


	</div>
	<div class="content">
		<?php require_once "mvc/views/pages/".$data['Page'].".php"?>
	</div>

	<script src="<?= $link?>public/js/jquery.js"></script>
	<script src="<?= $link?>public/js/sendmsg.js"></script>x


</body>
</html>