<?php
Session::init();
if(isset($data['user'])) {
	$row_user = $data['user']->fetch_array();
}
$id_self = Session::get('user_id');
?>
<div>Bạn đang chat với <?php if(isset($row_user)) echo $row_user['user_name'] ?></div>
<?php foreach ($data['old_mess'] as $row) {
	$date_send = $row['date_send'];
	$day_sent = substr($date_send, 8, 2); // Ngày gửi
	$month_sent = substr($date_send, 5, 2); // Thánh gửi
	$year_sent = substr($date_send, 0, 4); // Năm gửi
	$hour_sent = substr($date_send, 11, 2); // Giờ gửi
	$min_sent = substr($date_send, 14, 2); // Phút gửi

	?>
	<div class="main-chat">
		<?php if($row['user_from'] == $id_self ) { ?>
			<div class="msg-user">
				<p><?= $row['mes_body'] ?></p>
				<div class="info-msg-user">
					<?php echo 'Bạn - ' . $day_sent . '/' . $month_sent . '/' . $year_sent . ' lúc ' . $hour_sent . ':' . $min_sent . ' '?>
				</div>
			</div>
		<?php } else { ?>
			<div class="msg">
				<p><?= $row['mes_body'] ?></p>
				<div class="info-msg">
					<?php echo $row_user['user_name'].' - ' . $day_sent . '/' . $month_sent . '/' . $year_sent . ' lúc ' . $hour_sent . ':' . $min_sent . '' ?>
				</div>
			</div>
		<?php } ?>
	<?php } ?>
</div>

<div class="box-chat">
	<form method="POST" id="formSendMsg" onsubmit="return false;">
		<input type="hidden" value="<?= $row_user['user_id'] ?>">
		<input type="text" placeholder="Nhập nội dung tin nhắn ...">
	</form>
</div>
<script>
	//$.ajaxSetup({cache:false});
// Thiết lập thời gian thực vòng lặp 1 giây
//setInterval(function() {$('.main-chat').load('mvc/views/pages/chat.php');}, 10);
</script>