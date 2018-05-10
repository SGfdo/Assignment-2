$(function (){
	var $csrf_token = $('#csrf-token');
	var csrf_cookie = document.cookie.split(";")[1].split("=")[1];

	$csrf_token.val(csrf_cookie);
});