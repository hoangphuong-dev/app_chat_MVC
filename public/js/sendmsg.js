	function sendMsg() {
		$body_msg = $('#formSendMsg input[type="text"]').val();
		$id_friend = $('#formSendMsg input[type="hidden"]').val();
		// console.log($body_msg);
		$.ajax({
			url: '../../Messenger/process_chat',
			type: 'POST',
			data: {
				body_msg: $body_msg,
				id_friend: $id_friend
			}, success: function () {
				$('#formSendMsg input[type="text"]').val('');
			}
		});
	}
	 
// Bắt sự kiện gõ phím enter trong thanh trò chuyện
$('#formSendMsg input[type="text"]').keypress(function () {
	var keycode = (event.keyCode ? event.keyCode : event.which);
	if (keycode == '13') {
// Chạy hàm gửi tin nhắn
sendMsg();
}
});
 
// Bắt sự kiện click vào thanh trò chuyện
$('#formSendMsg input[type="text"]').click(function (e) {
// Kéo hết thanh cuộn trình duyệt đến cuối
window.scrollBy(0, $(document).height());
});