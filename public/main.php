<?php
include("inc/top.php");
?>
<style type="text/css">
.slideshow-container {
position: relative;
margin: auto;
overflow: hidden;
}
.slides {
display: none;
width: 100%;
}
.prev, .next {
position: absolute;
top: 50%;
transform: translateY(-50%);
background-color: rgba(0, 0, 0, 0.5);
color: white;
border: none;
padding: 10px;
cursor: pointer;
}
.prev {
left: 0;
}
.next {
right: 0;
}
.dots {
text-align: center;
margin-top: 10px;
}
.dot {
display: inline-block;
width: 10px;
height: 10px;
background-color: gray;
border-radius: 50%;
margin: 5px;
cursor: pointer;
}
.active {
background-color: black;
}
</style>
<div>
    <div class="slideshow-container">
        <img width="100%" height="600px" src="../image/carousel/h1.jpg" class="slides" >
        <img width="100%" height="600px" src="../image/carousel/h2.jpg" class="slides">
        <img width="100%" height="600px" src="../image/carousel/h3.jpg" class="slides">
        <button class="prev" onclick="changeSlide(-1)">&#10094;</button>
        <button class="next" onclick="changeSlide(1)">&#10095;</button>
    </div>
    <div class="dots">
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
    </div>
</div>
<script src="../assets/js/script.js"></script>
<?php
foreach($danhmuc as $d){
$i = 0;
?>
<h3 style="margin-left: 100px;">
<a class="text-decoration-none text-info" href="index.php?action=group&id=<?php echo $d["id"]; ?>">
<?php echo $d["tendanhmuc"]; ?></a>
</h3>
<section class="items-grid section" style="margin-top: 10px;">
    <div class="container">
        <div class="single-head">
            <div class="row">
                <?php
                foreach($mathang as $m){
                if($m["danhmuc_id"] == $d["id"] && $i < 3){
                $i++;
                ?>
                <div class="col-lg-4 col-md-6 col-12" style="border-color: red;">
                    <!-- Start Single Grid -->
                    <div class="single-grid wow fadeInUp" data-wow-delay=".2s">
                        <div class="image">
                            <a href="?action=detail&id=<?php echo $m["id"]; ?>" class="thumbnail">
                                <img src="../<?php echo $m["hinhanh"]; ?>" alt="<?php echo $m["tenmathang"]; ?>">
                            </a>
                            <!-- <?php if ($m["giaban"] != $m["giagoc"]){ ?> -->
                            <p class="badge bg-danger text-white">Đang giảm giá</p>
                            <!-- <?php }  ?> -->
                        </div>
                        <div class="content">
                            <div class="top-content">
                                <a href="?action=detail&id=<?php echo $m["id"]; ?>" class="tag"><?php echo $m["tenmathang"]; ?></a>
                                <h3 class="title">
                                <a href="?action=group&id=<?php echo $d["id"]; ?>">
                                <?php echo $d["tendanhmuc"]; ?></a>
                                </h3>
                                <ul class="rating">
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><a href="javascript:void(0)">(35)</a></li>
                                </ul>
                                <ul>
                                    <li><a href="index.php?action=chovaogio&id=<?php echo $m["id"]; ?>" class="btn btn-success">Mua ngay</a></li>
                                </ul>
                            </div>
                            <div class="bottom-content">
                                <?php if ($m["giaban"] != $m["giagoc"]){ ?>
                                <p class="price">Giá bán:
                                    <span class="text-decoration-line-through"><?php echo number_format($m["giagoc"]); ?>đ</span><?php } // end if ?>
                                    <span style="color: red"><?php echo number_format($m["giaban"]); ?>đ</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <?php
                    }
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
    <?php
    if($i == 0)
    echo "<p>Danh mục hiện chưa có sản phẩm.</p>";
    else
    ?>
    <div class="text-end mb-2"><a class="text-warning text-decoration-none fw-bolder" href="index.php?action=group&id=<?php echo $d["id"]; ?>">Xem thêm <?php echo $d["tendanhmuc"]; ?></a></div>
    <?php
    }
    ?>
    
<?php
include("inc/bottom.php");
?>