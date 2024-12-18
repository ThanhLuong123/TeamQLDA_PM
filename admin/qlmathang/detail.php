<?php include("../inc/top.php"); ?>

<a href="index.php">Trở về danh sách</a>	
<div class="row" style="margin: 20px;">
  <div class="col-sm-6">
    <div><img src="../../<?php echo $m["hinhanh"]; ?>" alt="<?php echo $m["tenmathang"]; ?>"></div>
  </div>

  <div class="col-sm-6">
      <h2 class="text-danger"><?php echo $m["tenmathang"]; ?></h2>
    

    <div class="product-info">
      <h3 class="text-info">Giá gốc: 
        <span class="price"><?php echo number_format($m["giagoc"]); ?>đ</span>  
      </h3>		
      <h3 class="text-info">Giá bán: 
        <span class="price"><?php echo number_format($m["giaban"]); ?>đ</span>  
      </h3>
      <h3 class="text-info">Lượt xem: 
        <span class="price"><?php echo $m["luotxem"]; ?></span>  
      </h3><h3 class="text-info">Lượt mua: 
        <span class="price"><?php echo $m["luotmua"]; ?></span>  
      </h3>
      <div>
        <h3 style="color: green;">Mô tả sản phẩm:
          <p class="description"><?php echo $m["mota"];  ?></p>  
        </h3>        
      </div>

      <label for="quantity"><strong>Số lượng tồn:</strong><?php echo $m["soluongton"]; ?></label>

      <div class="actions">
          <p><a class="btn btn-warning" href="index.php?action=sua&id=<?php echo $m["id"]; ?>"><i class="align-middle" data-feather="edit"></i> Sửa</a> 
		  <a class="btn btn-danger" href="index.php?action=xoa&id=<?php echo $m["id"]; ?>"><i class="align-middle" data-feather="trash-2"></i> Xóa</a></p>
      </div>
      
    </div>

  </div>
</div>
<?php include("../inc/bottom.php"); ?>
