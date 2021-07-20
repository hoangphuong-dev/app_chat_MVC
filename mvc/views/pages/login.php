<title>Đăng nhập</title>
<div class="box-join">
	<h2>Đăng nhập</h2>

	<p style="color: <?php if(isset($data['color'])) echo $data['color'] ?>" >
		<?php if(isset($data['alert'])) echo $data['alert'] ?>
	</p>

	<form method="POST" id="formJoin" action="<?= $link?>Home/login">
		<input type="text" placeholder="Số điện thoại" class="data-input" name="phone">
		<input type="password" placeholder="Mật khẩu" class="data-input" name="password">
		<br><input type="checkbox"  name="remeber_login"> Ghi nhớ đăng nhập <br>
		<button class="btn-submit">Đăng nhập</button>
	</form>
	<br> <br>
	<p>Nếu chưa có tài khoản . Đăng ký <a href="<?= $link?>Home/signup">Tại đây</a></p>
</div>