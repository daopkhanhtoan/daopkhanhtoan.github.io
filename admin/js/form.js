//  chứa các hàm gửi dữ liệu form thông qua ajax đến các file xữ lý PHP
$_DOMAIN = 'http://localhost:8080/php_newspager/admin/';

// đăng nhập
$('#formSignin button').on('click',function(){
	$this = $('#formSignin button'); // $_DOMAIN = sự kiện
	$this.html('đang tải....'); // thực hiện

	// gán các giá trị trong các biến
	$user_signin = $(#formSignin #user_signin).val(); // lấy giá trị val() và gán cho biến
	$pass_signin = $(#formSignin #pass_signin).val();

	// Nếu giá trị rổng
	if($user_signin == '' $pass_signin == ''){
		$('#formSignin .alert').removeClass('hidden');
		$('#formSignin .alert').html('vui lòng điền đầy đủ thông tin.');
		$this.html('Đăng nhập');
	}
	else
	{
		$.ajax({
			url : $_DOMAIN + 'signin.php',
			type : 'POST',
			data : {
				user_signin : $user_signin,
				pass_signin : $pass_signin,
			}, success : function(data){
				$('#formSignin .alert').removeClass('hidden');// loại bỏ hết tất cả thuộc tính có trong class
				$('#formSignin .alert').html('data');
				$this.html('Đăng nhập');
			}, error : function(){
				$('#formSignin .alert').removeClass('hidden');
				$('#formSignin .alert').html('không thể đăng nhập vào lúc này, thử lại nhé');
				$this.html('Đăng nhập');
			}
		});
	}
});