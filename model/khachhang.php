<?php
class KHACHHANG{
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
	
	public function themkhachhang($khachhang){
		$db = DATABASE::connect();
		try{
			$sql = "INSERT INTO nguoidung(email,matkhau,sodienthoai,hoten,vaitro,trangthai) VALUES(:email,:matkhau,:sodt,:hoten,3,1)";
			$cmd = $db->prepare($sql);
			$cmd->bindValue(':email',$khachhang->email);
			$cmd->bindValue(':matkhau',md5($khachhang->matkhau));
			$cmd->bindValue(':sodt',$khachhang->sodienthoai);
			$cmd->bindValue(':hoten',$khachhang->hoten);			
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

	public function themkhachhang1($email,$sodt,$hoten){
		$db = DATABASE::connect();
		try{
			$sql = "INSERT INTO nguoidung(email,matkhau,sodienthoai,hoten,vaitro,trangthai) VALUES(:email,:matkhau,:sodt,:hoten,3,1)";
			$cmd = $db->prepare($sql);
			$cmd->bindValue(':email',$email);
			$cmd->bindValue(':matkhau',md5($sodt));
			$cmd->bindValue(':sodt',$sodt);
			$cmd->bindValue(':hoten',$hoten);			
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

	public function capnhatkhachhang($khachhang){
		$db = DATABASE::connect();
		try{
			$sql = "UPDATE nguoidung set hoten=:hoten, email=:email, sodienthoai=:sodt, hinhanh=:hinhanh where id=:id";
			$cmd = $db->prepare($sql);
			$cmd->bindValue(':id',$khachhang->id);
			$cmd->bindValue(':email',$khachhang->email);
			$cmd->bindValue(':sodt',$khachhang->sodienthoai);
			$cmd->bindValue(':hoten',$khachhang->hoten);
			$cmd->bindValue(':hinhanh',$khachhang->hinhanh);
			$ketqua = $cmd->execute();            
            return $ketqua;
		}
		catch(PDOException $e){
			$error_message=$e->getMessage();
			echo "<p>Lỗi truy vấn: $error_message</p>";
			exit();
		}
	}

	public function kiemtrakhachhanghople($email,$matkhau){
		$db = DATABASE::connect();
		try{
			$sql = "SELECT * FROM nguoidung WHERE email=:email AND matkhau=:matkhau AND trangthai=1 AND vaitro=3";
			$cmd = $db->prepare($sql);
			$cmd->bindValue(":email", $email);
			$cmd->bindValue(":matkhau", md5($matkhau));
			$cmd->execute();
			$valid = ($cmd->rowCount () == 1);
			$cmd->closeCursor();
			return $valid;			
		}
		catch(PDOException $e){
			$error_message=$e->getMessage();
			echo "<p>Lỗi truy vấn: $error_message</p>";
			exit();
		}
	}
	
	// lấy thông tin người dùng có $email
	public function laythongtinkhachhang($email){
		$db = DATABASE::connect();
		try{
			$sql = "SELECT * FROM nguoidung WHERE email=:email AND vaitro=3";
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

	// lấy thông tin người dùng có $email
	public function laydanhsachkhachhang(){
		$db = DATABASE::connect();
		try{
			$sql = "SELECT * FROM nguoidung WHERE vaitro=3";
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

	public function xoakhachhang($khachhang){
        $dbcon = DATABASE::connect();
        try{
            $sql = "DELETE FROM nguoidung WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $khachhang->id);
            $result = $cmd->execute();            
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    public function laykhachhangtheoid($id){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM nguoidung WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $id);
            $cmd->execute();
            $result = $cmd->fetch();             
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    public function laykhachhang(){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM nguoidung ORDER BY id DESC";
            $cmd = $dbcon->prepare($sql);
            $cmd->execute();
            $result = $cmd->fetchAll();
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

}
?>
