<?php include("../inc/top.php"); ?>
<script>
    ClassicEditor
        .create( document.querySelector( '#txtmota' ) )
        .catch( error => {
            console.error( error );
        } );
</script>

<h3 class="text-info" style="margin-top: 20px;">Thêm mặt hàng</h3>
<div class="border-bottom" style="margin: 20px;">
<form class="row g-3 mt-3 mb-lg-5" method="post" enctype="multipart/form-data" action="index.php">
	<input type="hidden" name="action" value="xulysua">
	<input type="hidden" name="txtid" value="<?php echo $m["id"]; ?>">
    <div class="col-md-6">
        <label for="inputIdCategory" class="form-label">Tên Danh Mục</label><br>
        <select class="form-select" name="optdanhmuc">
			<?php
			foreach($danhmuc as $dm){
			?>
				<option value="<?php echo $dm["id"]; ?>" <?php if($dm["id"] == $m["danhmuc_id"]) echo "selected"; ?>><?php echo $dm["tendanhmuc"]; ?></option>
			<?php
			}
			?>
		</select>
    </div>
    <div class="col-md-6">
        <label for="inputID" class="form-label">Tên mặt hàng</label>
        <input type="text" name="txttenmathang" class="form-control" id="inputID" value="<?php echo $m["tenmathang"]; ?>" required>
    </div>
    <div class="col-md-4">
        <label for="inputProduct" class="form-label">Giá nhập</label>
        <input type="text" name="txtgiagoc" class="form-control" id="inputProduct" value="<?php echo $m["giagoc"]; ?>" />
    </div>
    <div class="col-md-4">
        <label for="inputEvaluate" class="form-label">Giá bán</label>
        <input type="text" name="txtgiaban" class="form-control" id="inputEvaluate" value="<?php echo $m["giaban"]; ?>">
    </div>
    <div class="col-md-4">
        <label for="inputDescription" class="form-label">Số lượng</label>
        <input type="text" name="txtsoluongton" class="form-control" id="inputEvaluate" value="<?php echo $m["soluongton"]; ?>">
    </div>
    <div class="col-md-4">
        <label for="inputDescription" class="form-label">Lượt mua</label>
        <input type="text" name="txtluotmua" class="form-control" id="inputEvaluate" value="<?php echo $m["luotmua"]; ?>">
    </div><div class="col-md-4">
        <label for="inputDescription" class="form-label">Lượt xem</label>
        <input type="text" name="txtluotxem" class="form-control" id="inputEvaluate" value="<?php echo $m["luotxem"]; ?>">
    </div>    
    <div class="col-12">
        <label for="inputImage" class="form-label">Hình ảnh</label>
       	<input type="hidden" name="txthinhcu" value="<?php echo $m["hinhanh"]; ?>">
		<img src="../../<?php echo $m["hinhanh"]; ?>" width="50" class="img-thumbnail">	
		<a data-bs-toggle="collapse" data-bs-target="#demo">Đổi hình ảnh</a>
		<div id="demo" class="collapse m-3">
		  <input type="file" class="form-control" name="filehinhanh">
		</div>
    </div>
    <div class="col-12">
        <label for="inputInfoDetail" class="form-label">Mô tả</label>
        <textarea class="form-control" name="txtmota" id="inputInfoDetail"><?php echo $m["mota"] ?></textarea>
    </div>   
    <div class="col-12">
        <button type="submit" name="luu" class="btn btn-danger">Lưu</button>
        <button type="reset" name="huy" class="btn btn-danger">Hủy</button>
    </div>
</form>
</div>

<?php include("../inc/bottom.php"); ?>