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
	<input type="hidden" name="txtid" value="<?php echo $k["id"]; ?>">
    <div class="col-md-6">
        <label for="inputID" class="form-label">Email</label>
        <input type="text" name="txtemail" class="form-control" id="inputID" value="<?php echo $k["email"]; ?>" required>
    </div>
    <div class="col-md-4">
        <label for="inputProduct" class="form-label">Số điện thoại</label>
        <input type="text" name="txtsdt" class="form-control" id="inputProduct" value="<?php echo $k["sodienthoai"]; ?>" />
    </div>
    <div class="col-md-4">
        <label for="inputEvaluate" class="form-label">Họ tên</label>
        <input type="text" name="txthoten" class="form-control" id="inputEvaluate" value="<?php echo $k["hoten"]; ?>">
    </div>
    <div class="col-md-12">
        <label for="inputDescription" class="form-label">Hình ảnh</label>
        <input type="hidden" name="txthinhcu" value="<?php echo $k["hinhanh"]; ?>">
        <img src="../../<?php echo $k["hinhanh"]; ?>" width="50" class="img-thumbnail">    
        <a data-bs-toggle="collapse" data-bs-target="#demo">Đổi hình ảnh</a>
        <div id="demo" class="collapse m-3">
          <input type="file" class="form-control" name="filehinhanh">
        </div>
    </div>  
    <div class="col-12">
        <button type="submit" name="luu" class="btn btn-danger">Lưu</button>
        <button type="reset" name="huy" class="btn btn-danger">Hủy</button>
    </div>
</form>
</div>

<?php include("../inc/bottom.php"); ?>