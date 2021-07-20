
$.ajaxSetup({cache:false});
// Thiết lập thời gian thực vòng lặp 1 giây
setInterval(function() {$('.main-chat').load('mvc/views/pages/chat.php');}, 1000);