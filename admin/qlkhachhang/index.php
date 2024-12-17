<?php 
session_start();
if(!isset($_SESSION["nguoidung"]))
    header("location:../index.php");

require("../../model/database.php");
require("../../model/khachhang.php");

if(isset($_REQUEST["action"])){
    $action = $_REQUEST["action"];
}
else{
    $action="macdinh"; 
}

$khachhang = new KHACHHANG();

switch($action){
    case "macdinh":   
        $khachhang = $khachhang->laydanhsachkhachhang();   
        // sắp xếp
        if(isset($_GET["sort"])){
            $sort = $_GET["sort"];
            switch($sort){
                case 'email':
                    usort($khachhang, function($a, $b){ return strcmp($a["email"], $b["email"]); });
                    break;
                case 'sodienthoai':
                    usort($khachhang, function($a, $b){ return strcmp($b["sodienthoai"], $a["sodienthoai"]); });
                    break;
                case 'hoten':
                    usort($khachhang, function($a, $b){ return strcmp($b["hoten"], $a["hoten"]); });
                    break;
                default:
                    ksort($khachhang);
                    break;
            }
        }
        include("main.php");
        break;    
    case "them":        
        include("addform.php");        
        break;
    case "xulythem":
        $khthem = new KHACHHANG();
        $khthem->setemail($_POST["txtemail"]);
        $khthem->setmatkhau($_POST["txtmatkhau"]);
        $khthem->setsodienthoai($_POST["txtdienthoai"]);
        $khthem->sethoten($_POST["txthoten"]);
        $email = $_POST["txtemail"];
        if($khachhang->laythongtinkhachhang($email)){   // có thể kiểm tra thêm số đt không trùng
            $tb = "Email này đã được cấp tài khoản!";
        }
        else{
            if(!$khachhang->themkhachhang($khthem)){
                $tb = "Không thêm được!";
            }
        }
        $khachhang = $khachhang->laydanhsachkhachhang();
        include("main.php");        
        break;
    case "xoa":
        if(isset($_GET["id"])){
            $khachhanghh = new KHACHHANG();        
            $khachhanghh->setid($_GET["id"]);
            $khachhang->xoakhachhang($khachhanghh);
        }
        $khachhang = $khachhang->laydanhsachkhachhang();
        include("main.php");
        break;
    case "sua":
        if(isset($_GET["id"])){ 
            $k = $khachhang->laykhachhangtheoid($_GET["id"]);
            include("updateform.php");
        }
        else{
            $kh = $khachhang->laykhachang();        
            include("main.php");            
        }
        break;
    case "xulysua":
        $khachhanghh = new KHACHHANG();
        $khachhanghh->setid($_POST["txtid"]);
        $khachhanghh->setemail($_POST["txtemail"]);
        $khachhanghh->setsodienthoai($_POST["txtsdt"]);
        $khachhanghh->sethoten($_POST["txthoten"]);
        $khachhanghh->sethinhanh($_POST["txthinhcu"]);

        // upload file mới (nếu có)
        if($_FILES["filehinhanh"]["name"]!=""){
            // xử lý file upload -- Cần bổ dung kiểm tra: dung lượng, kiểu file, ...       
            $hinhanh = "" . basename($_FILES["filehinhanh"]["name"]);// đường dẫn lưu csdl
            $khachhanghh->sethinhanh($hinhanh);
            $duongdan = "../../" . $hinhanh; // đường dẫn lưu upload file        
            move_uploaded_file($_FILES["filehinhanh"]["tmp_name"], $duongdan);
        }
        
        // sửa mặt hàng
        $khachhang->capnhatkhachhang($khachhanghh);         
    
        // hiển thị ds mặt hàng
        $khachhang = $khachhang->laydanhsachkhachhang();    
        include("main.php");
        break;    
    default:
        break;
}
?>
