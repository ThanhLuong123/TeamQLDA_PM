<?php include("../inc/top.php"); ?>
<div>
<div style="margin: 20px 0px 0px 20px;">
	<h3 style="margin-bottom: 20px;">Danh sách danh mục</h3>
	<div class="table-responsive">
	<table class="table table-hover">
		<tr>
			<th style="width: 10%;">Mã Danh mục</th>
			<th style="width: 10%;">Tên danh mục</th>
			<th>mô tả</th>
			<th colspan="2" style="text-align: center;">Hành động</th>
		</tr>
		<?php
		foreach ($danhmuc as $d) :
			if($d["id"] == $idsua){ // hiển thị form
		?>
		<tr>
			<form method="POST">
				<input type="hidden" name="action" value="capnhat">
				<input type="hidden" name="id" value="<?php echo $d["id"]; ?>">
				<td><?php echo $d["id"]; ?></td>
				<td><input class="form-control" name="txtten" type="text" value="<?php echo $d["tendanhmuc"]; ?>"></td>
				<td><textarea class="form-control" name="txtmota" type="text"><?php echo $d["mota"]; ?></textarea></td>		
				<td><input class="btn btn-success" type="submit" value="Lưu"></td>
			</form>
				<td align="center"><a href="index.php?action=xoa&id=<?php echo $d["id"]; ?>"><img src="../inc/images/delete.png"></a></td>
		</tr>
		<?php
		} // end if
		else {
		?>
		<tr>
			<td><?php echo $d["id"]; ?></td>
			<td><?php echo $d["tendanhmuc"]; ?></td>
			<td><?php echo $d["mota"]; ?></td>
			<td align="center"><a href="index.php?action=sua&id=<?php echo $d["id"]; ?>"><img src="../inc/images/edit.png"></a></td>
			<td align="center"><a href="index.php?action=xoa&id=<?php echo $d["id"]; ?>"><img src="../inc/images/delete.png"></a></td>
		</tr>
		<?php
			} // end else
		endforeach;
		?>
	</table>
	</div>
</div>
<h4 class="text-info" style="margin: 10px 0px;">Thêm mới</h4>
<form method="post"  style="margin:0px 20px;"> 
		<input type="hidden" name="action" value="them">
		<div class="row" style="margin-bottom: 10px;">
			<input type="text" class="form-control" name="txtten" placeholder="Nhập tên danh mục">
		</div>
		<div class="row" style="margin-bottom: 10px;">
			<textarea type="text" class="form-control" name="txtmota" placeholder="Nhập mô tả"></textarea>
		</div>
		<div class="col">
			<input type="submit" class="btn btn-info" value="Lưu">
		</div>
		<div class="col"></div>
</form>
<?php include("../inc/bottom.php"); ?>