<?php
session_start(); 
require("../../model/database.php");
require("../../model/nguoidung.php");

// Biến $isLogin cho biết người dùng đăng nhập chưa
$isLogin = isset($_SESSION["nguoidung"]);


// Xét xem có thao tác nào được chọn
if(isset($_REQUEST["action"])){
    $action = $_REQUEST["action"];
}
elseif($isLogin == FALSE){  // chưa đăng nhập
    $action="dangnhap";
}
else{   // mặc định
    $action="macdinh";
}

$nd = new NGUOIDUNG();


switch($action){
    case "macdinh":               
        include("main.php");
        break;
    case "dangnhap":
        include("login.php");
        break;
    case "xldangnhap":
        $email = $_REQUEST["txtemail"];
        $matkhau = $_REQUEST["txtmatkhau"];
        if($nd->kiemtranguoidunghople($email,$matkhau)==TRUE){
            $_SESSION["nguoidung"] = $nd->laythongtinnguoidung($email); // đặt biến session
            include("main.php");
        }
        else{
            include("login.php");
        }
        break;
    case "dangxuat":
        unset($_SESSION["nguoidung"]);  // hủy biến session
        include("login.php");         // hiển thị trang login
        header("location:../../index.php");     // hoặc chuyển hướng ra bên ngoài (trang dành cho khách)
        break;  
    case "hoso":               
        include("profile.php");
        break; 
    case "xlhoso":
        $ndmoi = new NGUOIDUNG();
        $ndmoi->setid($_POST["txtid"]);
        $ndmoi->setemail($_POST["txtemail"]);        
        $ndmoi->setsodienthoai($_POST["txtdienthoai"]);
        $ndmoi->sethoten($_POST["txthoten"]);
        $ndmoi->sethinhanh($_POST["txthinhanh"]);

        if($_FILES["fhinh"]["name"] != null){
            $hinhanh = "" . basename($_FILES["fhinh"]["name"]);// đường dẫn lưu csdl
            $ndmoi->sethinhanh($hinhanh);
            $duongdan = "../../image/users/" . $hinhanh;
            move_uploaded_file($_FILES["fhinh"]["tmp_name"], $duongdan);
        }
        
        $nd->capnhatnguoidung($ndmoi);
        $email = $_POST["txtemail"];        
        $_SESSION["nguoidung"] = $nd->laythongtinnguoidung($email);
        include("main.php");        
        break;
    case "matkhau":               
        include("changepass.php");
        break; 
    case "doimatkhau":
         if (isset($_POST["txtemail"]) && isset($_POST["txtmatkhaumoi"]) )
            $nd->doimatkhau($_POST["txtemail"],$_POST["txtmatkhaumoi"]);
        include("main.php");
        break; 
    default:
        break;
}
?>
