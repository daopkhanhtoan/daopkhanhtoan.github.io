<?php  

// Kết nối database và thông tin chung
require_once 'core/init.php';

// nếu có tồn tại phương thức POST

if(isset($_POST['user_signin']) && isset($_POST['pass_signin'])){
	//xữ lý các giá trị
	$user_signin = trim(htmlspecialchars(addslashes($_POST['user_signin']))); // chuyển chuổi thành html
	$pass_signin = trim(htmlspecialchars(addslashes($_POST['pass_signin'])));

	// các biến xữ lý thông báo
	$show_alert = '<script>$("#formSingin .alert").removeClass("hidden");</script>';
	$hide_alert = '<script>$("#formSignin .alert").addClass("hidden");</script>';// thêm giá trị cho thuộc tính class
	$success = '<script>$("formSignin .alert").attr("class","alert alert-success");</script>'; // gán giá trị của thuộc tính class

	//nếu giá trị rổng
	if($user_signin == '' && $pass_signin == '')
	{
		echo $show_alert.'vui lòng điền thêm thông tin.';
	}
	else
	{
		$sql_check_user_exist = "SELECT username FROM accounts WHERE username = '$user_signin'";
		
		// nếu tồn tại username
		if($db->num_rows($sql_check_user_exist))
		{
			$pass_signin = md5($pass_signin);
			$sql_check_signin = "SELECT username, passwork FROM accounts WHERE username = '$user_signin' AND passwork = '$pass_signin'";

			// nếu pass dúng
			if($db->num_rows($sql_check_signin))
			{
				// kiểm tra tài khoản đã bị khóa chưa
				$sql_check_stt = "SELECT username, passwork, status FROM accounts WHERE username = '$user_signin' AND passwork = '$pass_signin' AND status = '0'";
				
				if($db->num_rows($sql_check_stt)){
					// chưa
					$session->sen($user_signin); // lưu session
					$db->close();// giải phóng

					echo $show_alert.$success.'Đăng nhập thành công.';
					new redirect($_DOMAIN);
				}
				else
				{
					echo $show_alert.'tài khoản của bạn đã bị khóa. vui lòng liên hệ admin';
				}
			}
			else
			{
				echo $show_alert.'Mật khẫu đăng nhập không đúng. vui lòng kiểm tra lại';
			}
		}
		else
		{
			echo $show_alert.'tài khoản không tồn tại. mời bạn đăng kí để đăng nhập'
		}
	}
	else
	{
		new redirect($_DOMAIN); // về trang index
	}
}
?>