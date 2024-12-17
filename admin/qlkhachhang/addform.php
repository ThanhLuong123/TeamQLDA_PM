<?php include("../inc/top.php"); ?>

<h3 class="text-info" style="margin-top: 20px;">Thêm khách hàng</h3>
<div class="border-bottom" style="margin: 20px;">
<form class="row g-3 mt-3 mb-lg-5" method="post">
    <div class="col-md-6">
        <label for="inputID" class="form-label">Email</label>
        <input class="form-control" type="email" name="txtemail" placeholder="Email" required>
    </div>
    <div class="col-md-6">
        <label for="inputProduct" class="form-label">Mật khẩu</label>
        <input class="form-control"  type="text" name="txtmatkhau" placeholder="Mật khẩu" required>
    </div>
    <div class="col-md-4">
        <label for="inputEvaluate" class="form-label">Số điện thoại</label>
        <input class="form-control" type="number" name="txtdienthoai" placeholder="Số điện thoại" required>
    </div>
    <div class="col-md-4">
        <label for="inputDescription" class="form-label">Họ tên</label>
        <input class="form-control"  type="text" name="txthoten" placeholder="Họ tên" required></div>
    </div>
    <div class="col-md-6">
    <input type="hidden" name="action" value="xulythem">
    <input class="btn btn-primary"  type="submit" value="Thêm">
    <input class="btn btn-warning"  type="reset" value="Hủy"></div>    
</form>
</div> 

<?php include("../inc/bottom.php"); ?>