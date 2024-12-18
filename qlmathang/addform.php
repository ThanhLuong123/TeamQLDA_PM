<?php include("../inc/top.php"); ?>

<h3 class="text-info" style="margin-top: 20px;">Thêm mặt hàng</h3>
<div class="border-bottom" style="margin: 20px;">
<form class="row g-3 mt-3 mb-lg-5" method="post" enctype="multipart/form-data" action="index.php">
	<input type="hidden" name="action" value="xulythem">
    <div class="col-md-6">
        <label for="inputIdCategory" class="form-label">Tên Danh Mục</label><br>
        <select class="form-select" name="optdanhmuc">
			<?php
			foreach($danhmuc as $d):
			?>
				<option value="<?php echo $d["id"]; ?>"><?php echo $d["tendanhmuc"]; ?></option>
			<?php
			endforeach;
			?>
		</select>
    </div>
    <div class="col-md-6">
        <label for="inputID" class="form-label">Tên mặt hàng</label>
        <input type="text" name="txttenmathang" class="form-control" id="inputID" placeholder="Nhập tên mặt hàng" required>
    </div>
    <div class="col-md-4">
        <label for="inputProduct" class="form-label">Giá nhập</label>
        <input type="text" name="txtgianhap" class="form-control" id="inputProduct" value="0" />
    </div>
    <div class="col-md-4">
        <label for="inputEvaluate" class="form-label">Giá bán</label>
        <input type="text" name="txtgiaban" class="form-control" id="inputEvaluate" value="0"/>
    </div>
    <div class="col-md-4">
        <label for="inputDescription" class="form-label">Số lượng</label>
        <input type="text" name="txtsoluong" class="form-control" id="inputEvaluate" value="0"/>
    </div>    
    <div class="col-12">
        <label for="inputImage" class="form-label">Hình ảnh</label>
        <input type="file" name="filehinhanh">
    </div>
    <div class="col-12">
        <label for="inputInfoDetail" class="form-label">Mô tả</label>
        <textarea class="form-control" name="txtmota" id="inputInfoDetail"></textarea>
    </div>   
    <div class="col-12">
        <button type="submit" name="themsanpham" class="btn btn-danger">Thêm mặt hàng</button>
        <button type="reset" name="huy" class="btn btn-danger">Hủy</button>
    </div>
</form>
</div> 

<?php include("../inc/bottom.php"); ?>