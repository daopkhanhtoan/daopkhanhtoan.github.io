<?php  

class Session{
	// hàm khởi động sesssion
	public function start(){
		session_start();
	}

	// hàm lưu session
	public function sen($user){
		$_SESSION['user'] = $user;
	}

	// hàm lấy dữ liệu session
	public function get(){
		if(isset($_SESSION['user'])){
			$user = $_SESSION['user'];
		}
		else{
			$user = '';
		}
		return $user;
	}

	// hàm xóa dữ liệu
	public function detroy(){
		session_destroy();
	}
}
?>