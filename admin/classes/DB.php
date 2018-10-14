<?php  
// thư vienj database 

// lớp database 
class DB{
	private $hostname = 'localhost',
			$username = 'root',
			$password = '',
			$dbname = 'newspaper';

	// biến lưu trử kết nối 		
	public $cn = null;

	//hàm kết nối
	public function connnect(){		
			$this->cn = mysqli_connect($this->hostname,$this->username,$this->password,$this->dbname);
	}
	

	// hàm ngát kết nối
	public function close(){
		if($this->cn){
			mysqli_close($this->cn);
		}
	}

	// hàm câu truy vấn
	public function query($sql = null){
		if($this->cn){
			mysqli_query($this->cn,$sql);
		}
	}

	// hàm đếm số hàng
	public function num_rows($sql = null){
		if($this->cn){ // kiểm tra có kết nối không
			$query = mysqli_query($this->cn,$sql); // thực hiện câu truy vấn
			if($query){ // kiểm tra xem có tồn tại không
				$row = mysqli_num_rows($query);// hiển thị ra số hàm
				return $row;
			}
		}
	}

	// Hàm lấy dữ liệu nhiều(while biến là mảng) lấy ít(không)
	public function fetch_assoc($sql = null, $type){
		if($this->cn){
			$query = mysqli_query($this->cn,$sql); // thuc hien 
			if($query){// nếu chạy
				if($type == 0){
					// Lấy nhiều dữ liệu gán vào mảng
					while ($rows = mysqli_fetch_assoc($query)) {
						$data[] = $rows;
					}
					return $data;
				}
				elseif ($type == 1) {
					$data = mysqli_fetch_assoc($query);
					return $data;
				}
			} 
		}
	}


	// hàm lấy ID cao nhất khi insert
	public function insert_id(){
		if($this->cn){
			$count = mysqli_insert_id($this->cn); // lấy ID vừa insert in ra 
			if($count == '0'){
				$count = '1';
			}
			else{
				$count = $count;
			}
			return $count;
		}
	}

	// hàm charset cho database
	public function set_char($uni){
		if($this->cn){
			mysqli_set_charset($this->cn,$uni); // thiết lập kiểu chữ gửi đến database
		}
	}



}

	
	

?>