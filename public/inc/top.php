<!DOCTYPE html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="x-ua-compatible" content="ie=edge" />
        <title>Nền tảng mua bán đồ cũ</title>
        <meta name="description"/>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.svg" />
        <!-- Place favicon.ico in the root directory -->
        <!-- Web Font -->
        <link
            href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
            rel="stylesheet">
            <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
            <!-- ========================= CSS here ========================= -->
            <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
            <link rel="stylesheet" href="../assets/css/LineIcons.2.0.css" />
            <link rel="stylesheet" href="../assets/css/animate.css" />
            <link rel="stylesheet" href="../assets/css/tiny-slider.css" />
            <link rel="stylesheet" href="../assets/css/glightbox.min.css" />
            <link rel="stylesheet" href="../assets/css/main.css" />
            <style type="text/css">
            header {
            position: fixed; /* Nếu cần cố định header */
            top: 0;
            width: 100%;
            z-index: 1000; /* Đảm bảo header luôn ở trên */
            }
            body {
            padding-top: 100px;  Điều chỉnh theo chiều cao của header
            }
            .search-container {
            display: flex;
            align-items: center;
            background-color: #fff;
            border: 2px solid #ddd;
            border-radius: 25px;
            padding: 5px 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            }
            .search-input {
            border: none;
            outline: none;
            padding: 10px;
            font-size: 16px;
            flex: 1;
            border-radius: 25px 0 0 25px;
            }
            .search-button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 15px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 0 25px 25px 0;
            }
            
            .search-button:hover {
            background-color: #0056b3;
            }
            .product-info .price {
            font-size: 20px;
            color: #e53935;
            margin: 10px 0;
            }
            .product-info .description {
            margin: 10px 0;
            color: #666;
            }
            .quantity-selector {
            display: flex;
            align-items: center;
            margin: 10px 0;
            }
            .quantity-selector input {
            width: 50px;
            text-align: center;
            margin: 0 10px;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            }
            .actions button {
            padding: 10px 20px;
            margin: 10px 5px;
            border: none;
            color: white;
            border-radius: 4px;
            cursor: pointer;
            }
            .actions .add-to-cart {
            background-color: #ff9800;
            }
            .actions .buy-now {
            background-color: #e53935;
            }
            .actions .add-to-cart:hover {
            background-color: green;
            }
            .actions .buy-now:hover {
            background-color: green;
            }
            </style>
        </head>
        <body>
            <!-- Start Header Area -->
            <header class="header navbar-area">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-12">
                            <div class="nav-inner">
                                <nav class="navbar navbar-expand-lg">
                                    <a class="navbar-brand" href="index.php">
                                        <img style="width: 100px; height: 100px;" src="../assets/images/logo/logo.png" alt="Logo">
                                    </a>
                                    <button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                    aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="toggler-icon"></span>
                                    <span class="toggler-icon"></span>
                                    <span class="toggler-icon"></span>
                                    </button>
                                    <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                        <ul id="nav" class="navbar-nav ms-auto">
                                            <li class="nav-item">
                                                <a class="dd-menu collapsed" href="index.php"
                                                >Trang chủ</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="javascript:void(0)" aria-label="Toggle navigation">Sản phẩm</a>
                                                <ul class="sub-menu collapse" id="submenu-1-3">
                                                    <?php foreach ($danhmuc as $d): ?>
                                                    <li class="nav-item">
                                                        <a href="?action=group&id=<?php echo $d["id"]; ?>"><?php echo $d["tendanhmuc"]; ?></a>
                                                    </li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            </li>
                                            
                                            
                                        </ul>
                                        </div> <!-- navbar collapse -->
                                        <div class="search-container">
                                            <input type="text" placeholder="Tìm kiếm..." class="search-input">
                                            <button class="search-button">🔍</button>
                                        </div>
                                        <div class="login-button">
                                            <?php if(isset($_SESSION["khachhang"])){ ?>
                                            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                                                <li class="nav-item"><a class="nav-link text-warning" href="index.php?action=thongtin" >Chào <?php echo $_SESSION["khachhang"]["hoten"]; ?></a></li>
                                                <li class="nav-item"><a class="nav-link" href="index.php?action=dangxuat">Đăng xuất</a></li>
                                            </ul>
                                            <?php } else{ ?>
                                            <ul>
                                                <li>
                                                    <a href="index.php?action=dangnhap"><i class="lni lni-enter"></i> Đăng nhập</a>
                                                </li>
                                            </ul>
                                            <?php } ?>
                                        </div>
                                        
                                        <div class="button header-button">
                                            <a class="btn" href="index.php?action=giohang">🛒 Giỏ hàng <span class="cart-count"></span></a>
                                        </div>
                                        </nav> <!-- navbar -->
                                    </div>
                                </div>
                                </div> <!-- row -->
                                </div> <!-- container -->
                            </header>