<?php 


// hàm diều hướng magic// thường dùng dể thong báo lỗi
class redirect{
	public function base_url($url){
		return 'http://localhost:8080/admin/'.$url.'.php';
	}
	public function __construct($url = null){
		if($url){
			echo '<script>location.href="'.$url.'";</script>';
		}
	}
}
?>