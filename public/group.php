<?php
include("inc/top.php");
?>

<h3 style="margin: 50px 0px 0px 20px;">
    <?php echo $tendm ?>
</h3>
<section class="items-grid section" style="margin-top: 10px;">
    <div class="container">
        <div class="single-head">
            <div class="row">
<?php 
if($mathang != null){
    foreach($mathang as $m):
?>
                <div class="col-lg-4 col-md-6 col-12">
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
                                <!-- <h3 class="title">
                                <a href="?action=group&id=<?php echo $d["id"]; ?>">
                                        <?php echo $d["tendanhmuc"]; ?></a>
                                </h3> -->
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
    endforeach; 
    }
    else{
        echo "<p>Danh mục này hiện chưa có mặt hàng. Vui lòng xem danh mục khác...</p>";
    }
?>
            </div>
        </div>
    </div>
</section>  

<?php
include("inc/bottom.php");
?> 