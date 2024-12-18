<?php include("inc/top.php"); ?>
<div class="row" style="margin: 20px;">
  <div class="col-sm-6">
    <div><img src="../<?php echo $mhct["hinhanh"]; ?>" alt="<?php echo $m["tenmathang"]; ?>" style="width: 500px;"></div>
  </div>

  <div class="col-sm-6">
      <h2 class="text-danger"><?php echo $mhct["tenmathang"]; ?></h2>
    

    <div class="product-info">
      <h3 class="text-info">Giá bán: 
        <span class="price"><?php echo number_format($mhct["giaban"]); ?>đ</span>  
      </h3>
      
      <div>
        <h3 style="color: green;">Mô tả sản phẩm:
          <p class="description"><?php echo $mhct["mota"];  ?></p>  
        </h3>        
      </div>

      <form method="post">
        <input type="hidden" name="action" value="chovaogio">
        <input type="hidden" name="id" value="<?php echo $mhct["id"]; ?>">
        <div class="quantity-selector">
        <label for="quantity">Số lượng:</label>
        <input type="number" name="soluong" value="1" min="1">
        </div>
        <div class="actions">
          <input class="add-to-cart btn" type="submit" value="Thêm vào giỏ hàng">
          <input class="buy-now btn" type="submit" value="Mua ngay">
        </div>
      </form>
      
    </div>

  </div>
</div>
<?php include("inc/bottom.php"); ?>