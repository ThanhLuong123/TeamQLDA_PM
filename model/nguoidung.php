<?php
class NGUOIDUNG{
	private $id;
    private $email;
    private $sodienthoai;
    private $matkhau;
    private $hoten;
    private $trangthai;
    private $vaitro;
    private $hinhanh;    

    public function getid(){ return $this->id; }
    public function setid($value){ $this->id = $value; }
    public function getemail(){ return $this->email; }
    public function setemail($value){ $this->email = $value; }
    public function getsodienthoai(){ return $this->sodienthoai; }
    public function setsodienthoai($value){ $this->sodienthoai = $value; }
    public function getmatkhau(){ return $this->matkhau; }
    public function setmatkhau($value){ $this->matkhau = $value; }
    public function gethoten(){ return $this->hoten; }
    public function sethoten($value){ $this->hoten = $value; }
    public function gettrangthai(){ return $this->trangthai; }
    public function settrangthai($value){ $this->trangthai = $value; }
    public function getvaitro(){ return $this->vaitro; }
    public function setvaitro($value){ $this->vaitro = $value; }
    public function gethinhanh(){ return $this->hinhanh; }
    public function sethinhanh($value){ $this->hinhanh = $value; }
    
	
	public function kiemtranguoidunghople($email,$matkhau){
		$db = DATABASE::connect();
		try{
			$sql = "SELECT * FROM nguoidung WHERE email=:email AND matkhau=:matkhau AND trangthai=1";
			$cmd = $db->prepare($sql);
			$cmd->bindValue(":email", $email);
			$cmd->bindValue(":matkhau", md5($matkhau));
			$cmd->execute();
			$valid = ($cmd->rowCount () == 1);
			$cmd->closeCursor ();
			return $valid;			
		}
		catch(PDOException $e){
			$error_message=$e->getMessage();
			echo "<p>Lỗi truy vấn: $error_message</p>";
			exit();
		}
	}
	
	// lấy thông tin người dùng có $email
	public function laythongtinnguoidung($email){
		$db = DATABASE::connect();
		try{
			$sql = "SELECT * FROM nguoidung WHERE email=:email";
			$cmd = $db->prepare($sql);
			$cmd->bindValue(":email", $email);
			$cmd->execute();
			$ketqua = $cmd->fetch();
			$cmd->closeCursor();
			return $ketqua;
		}
		catch(PDOException $e){
			$error_message=$e->getMessage();
			echo "<p>Lỗi truy vấn: $error_message</p>";
			exit();
		}
	}

	
	// lấy tất cả ng dùng
	public function laydanhsachnguoidung(){
		$db = DATABASE::connect();
		try{
			$sql = "SELECT * FROM nguoidung";
			$cmd = $db->prepare($sql);			
			$cmd->execute();
			$ketqua = $cmd->fetchAll();			
			return $ketqua;
		}
		catch(PDOException $e){
			$error_message=$e->getMessage();
			echo "<p>Lỗi truy vấn: $error_message</p>";
			exit();
		}
	}

	// Thêm nd mới, trả về khóa của dòng mới thêm
	public function themnguoidung($nguoidung){
		$db = DATABASE::connect();
		try{
			$sql = "INSERT INTO nguoidung(email,matkhau,sodienthoai,hoten,vaitro) VALUES(:email,:matkhau,:sodt,:hoten,:vaitro)";
			$cmd = $db->prepare($sql);
			$cmd->bindValue(':email',$nguoidung->email);
			$cmd->bindValue(':matkhau',md5($nguoidung->matkhau));
			$cmd->bindValue(':sodt',$nguoidung->sodienthoai);
			$cmd->bindValue(':hoten',$nguoidung->hoten);
			$cmd->bindValue(':vaitro',$nguoidung->vaitro);
			$cmd->execute();
			$id = $db->lastInsertId();
			return $id;
		}
		catch(PDOException $e){
			$error_message=$e->getMessage();
			echo "<p>Lỗi truy vấn: $error_message</p>";
			exit();
		}
	}

	// Cập nhật thông tin ng dùng (tham số: id, họ tên, số đt, email, ảnh đại diện )
	public function capnhatnguoidung($nguoidung){
		$db = DATABASE::connect();
		try{
			$sql = "UPDATE nguoidung set hoten=:hoten, email=:email, sodienthoai=:sodt, hinhanh=:hinhanh where id=:id";
			$cmd = $db->prepare($sql);
			$cmd->bindValue(':id',$nguoidung->id);
			$cmd->bindValue(':email',$nguoidung->email);
			$cmd->bindValue(':sodt',$nguoidung->sodienthoai);
			$cmd->bindValue(':hoten',$nguoidung->hoten);
			$cmd->bindValue(':hinhanh',$nguoidung->hinhanh);
			$ketqua = $cmd->execute();            
            return $ketqua;
		}
		catch(PDOException $e){
			$error_message=$e->getMessage();
			echo "<p>Lỗi truy vấn: $error_message</p>";
			exit();
		}
	}

	// Đổi mật khẩu (tham số: email, mật khẩu)
	public function doimatkhau($email,$matkhau){
		$db = DATABASE::connect();
		try{
			$sql = "UPDATE nguoidung set matkhau=:matkhau where email=:email";
			$cmd = $db->prepare($sql);
			$cmd->bindValue(':email',$email);
			$cmd->bindValue(':matkhau',md5($matkhau));
			$ketqua = $cmd->execute();            
            return $ketqua;
		}
		catch(PDOException $e){
			$error_message=$e->getMessage();
			echo "<p>Lỗi truy vấn: $error_message</p>";
			exit();
		}
	}

	// Đổi quyền (tham số: email, vai trò người dùng)
	// vai trò người dùng: 1 - quản trị, 2 - nhân viên. Không cần nâng cấp quyền đối với vai trò người dùng 3 - khách hàng
	// public function doivaitro($id,$vaitro){
	// 	$db = DATABASE::connect();
	// 	try{
	// 		$sql = "UPDATE nguoidung set vaitro=:vaitro where id=:id";
	// 		$cmd = $db->prepare($sql);
	// 		$cmd->bindValue(':id',$id);
	// 		$cmd->bindValue(':vaitro',$vaitro);
	// 		$ketqua = $cmd->execute();            
 //            return $ketqua;
	// 	}
	// 	catch(PDOException $e){
	// 		$error_message=$e->getMessage();
	// 		echo "<p>Lỗi truy vấn: $error_message</p>";
	// 		exit();
	// 	}
	// }

	public function doivaitro($email,$vaitro){
		$db = DATABASE::connect();
		try{
			$sql = "UPDATE nguoidung set vaitro=:vaitro where email=:email";
			$cmd = $db->prepare($sql);
			$cmd->bindValue(':email',$email);
			$cmd->bindValue(':vaitro',$vaitro);
			$ketqua = $cmd->execute();            
            return $ketqua;
		}
		catch(PDOException $e){
			$error_message=$e->getMessage();
			echo "<p>Lỗi truy vấn: $error_message</p>";
			exit();
		}
	}

	// Đổi trạng thái (tham số: id, trạng thái)
	// trạng thái: 0 khóa, 1 kích hoạt)
	public function doitrangthai($id,$trangthai){
		$db = DATABASE::connect();
		try{
			$sql = "UPDATE nguoidung set trangthai=:trangthai where id=:id";
			$cmd = $db->prepare($sql);
			$cmd->bindValue(':id',$id);
			$cmd->bindValue(':trangthai',$trangthai);
			$ketqua = $cmd->execute();            
            return $ketqua;
		}
		catch(PDOException $e){
			$error_message=$e->getMessage();
			echo "<p>Lỗi truy vấn: $error_message</p>";
			exit();
		}
	}
}
?>
