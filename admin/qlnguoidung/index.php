<?php 
session_start();
if(!isset($_SESSION["nguoidung"]))
    header("location:../index.php");

require("../../model/database.php");
require("../../model/nguoidung.php");

if(isset($_REQUEST["action"])){
    $action = $_REQUEST["action"];
}
else{
    $action="macdinh"; 
}

$nguoidung = new NGUOIDUNG();

switch($action){
    case "macdinh":   
        $nguoidung = $nguoidung->laydanhsachnguoidung();   
		// sắp xếp
		if(isset($_GET["sort"])){
			$sort = $_GET["sort"];
			switch($sort){
				case 'email':
					usort($nguoidung, function($a, $b){ return strcmp($a["email"], $b["email"]); });
					break;
				case 'sodienthoai':
					usort($nguoidung, function($a, $b){ return strcmp($b["sodienthoai"], $a["sodienthoai"]); });
					break;
				case 'hoten':
					usort($nguoidung, function($a, $b){ return strcmp($b["hoten"], $a["hoten"]); });
					break;
				case 'vaitro':
					usort($nguoidung, function($a, $b){ return $a["vaitro"] - $b["vaitro"]; });
					break;
				default:
					ksort($nguoidung);
					break;
			}
		}
        include("main.php");
        break;
    case "khoa":   
        $mand = $_GET["mand"];
        $trangthai = $_GET["trangthai"];
        if(!$nguoidung->doitrangthai($mand, $trangthai)){
            $tb = "Đã đổi trạng thái!";
        }
        $nguoidung = $nguoidung->laydanhsachnguoidung();     
        include("main.php");
        break;
    case "kichhoat":   
        $email = $_GET["email"];
        $vaitro = $_GET["vaitro"];
        if(!$nguoidung->doivaitro($email, $vaitro)){
            $tb = "Đã đổi vai trò!";
        }
        $nguoidung = $nguoidung->laydanhsachnguoidung();     
        include("main.php");
        break;    
    case "them":        
        include("addform.php");        
        break;
    case "xlthem":
        $ndthem = new NGUOIDUNG();
        $ndthem->setemail($_POST["txtemail"]);
        $ndthem->setmatkhau($_POST["txtmatkhau"]);
        $ndthem->setsodienthoai($_POST["txtdienthoai"]);
        $ndthem->sethoten($_POST["txthoten"]);
        $ndthem->setvaitro($_POST["optloaind"]);
        $email = $_POST["txtemail"];
        if($nguoidung->laythongtinnguoidung($email)){   // có thể kiểm tra thêm số đt không trùng
            $tb = "Email này đã được cấp tài khoản!";
        }
        else{
            if(!$nguoidung->themnguoidung($ndthem)){
                $tb = "Không thêm được!";
            }
        }
        $nguoidung = $nguoidung->laydanhsachnguoidung();
        include("main.php");        
        break;
    
    default:
        break;
}
?>
