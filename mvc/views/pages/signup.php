<title>Tạo tài khoản</title>
<div class="box-join">
	
	<h2>Tạo tài khoản</h2>

	<p style="color: <?php if(isset($data['color'])) echo $data['color'] ?>" >
		<?php if(isset($data['alert'])) echo $data['alert'] ?>
	</p>

	<form id="formJoin" action="<?= $link?>Home/process_signup" method="POST">
		<input class="data-input" type="text" placeholder="Nhập họ tên" name="name">
		<input class="data-input" type="text" placeholder="Nhập số điện thoại" name="phone">
		<input class="data-input" type="password" placeholder="Nhập mật khẩu" name="pass">
		<button class="btn-submit">Đăng ký</button>
		<div class="alert danger"></div>
	</form>

</div>