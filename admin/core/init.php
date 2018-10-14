<?php  
//dùng dẻ kết nối database va cac thu vien trong index va website  
 

// require thư viện php
 	require_once 'classes/DB.php';
 	require_once 'classes/Session.php';
 	require_once 'classes/Function.php';
 	
 	// kết nối dâtbase
 	$db = new DB();
 	$db->connnect();
 	$db->set_char('utf-8');

 	// thông tin chung
 	$_DOMAIN = 'http://localhost:8080/php_newspager/admin/'; // chứa đường dẫn tuyệt đối của forder

 	date_default_timezone_set('Asia/Ho_Chi_Minh'); // thiết lập thời gian để truyền vào databas 
 	$date_current = ''; // ngày hiện tại
 	$date_current = date("Y-m-d:i:sa");
 	
 	// khởi tạo sesstion
 	$session = new Session();
 	$session->start();

 	// kiểm tra lấy session
 	if($session->get() != ''){
 		$user = $session->get(); //  đã đăng nhập
 	}
 	else{
 		$user = ''; //  chưa login
 	}


 	// nếu đã đăng nhập
 	if($user)
 	{
 		// lấy dữ liệu tài khoản
 		$sql_get_data_user = "SELECT * FROM accounts WHERE username = '$user'";
 		if($db->num_rows($sql_get_data_user))
 		{
 			$data_user = $db->fetch_assoc($sql_get_data_user,1);
 		}
 	}
?>