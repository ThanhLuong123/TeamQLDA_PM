<?php include("../inc/top.php"); ?>
<div>
	<div style="margin: 20px 0px 0px 20px;">
		<h3 style="margin-bottom: 20px;">Danh sách mặt hàng</h3>
		<a href="index.php?action=them" class="btn btn-info">
			<i class="align-middle" data-feather="plus-circle"></i>
			Thêm mặt hàng
		</a>
		<div class="table-responsive">
			<table class="table table-hover">
				<tr>
					<th>Tên mặt hàng</th>
					<th>Giá bán</th>
					<th>Số lượng</th>
					<th>Hình ảnh</th>
					<th colspan="2" style="text-align: center;">Hành động</th>
				</tr>
				<?php
				foreach ($mathang as $m):
				?>
				<tr>
					<td>
						<a href="index.php?action=chitiet&id=<?php echo $m["id"]; ?>"><?php echo $m["tenmathang"]; ?></a>
					</td>
					<td><?php echo $m["giaban"]; ?></td>
					<td><?php echo $m["soluongton"]; ?></td>
					<td>
						<a href="index.php?action=chitiet&id=<?php echo $m["id"]; ?>">
							<img src="../../<?php echo $m["hinhanh"]; ?>" width="80" class="img-thumbnail">
						</a>
					</td>
					<td align="center"><a href="index.php?action=sua&id=<?php echo $m["id"]; ?>"><img src="../inc/images/edit.png"></a></td>
					<td align="center"><a href="index.php?action=xoa&id=<?php echo $m["id"]; ?>"><img src="../inc/images/delete.png"></a></td>
				</tr>
				<?php
				endforeach;
				?>
			</table>
		</div>
	</div>
	<?php include("../inc/bottom.php"); ?>