<?php include("../inc/top.php"); ?>
<div>
	<div style="margin: 20px 0px 0px 20px;">
		<h3 style="margin-bottom: 20px;">Danh sách khách hàng</h3>
		<a href="index.php?action=them" class="btn btn-info">
			<i class="align-middle" data-feather="plus-circle"></i>
			Thêm khách hàng
		</a>
		<div class="table-responsive">
			<table class="table table-hover">
				<tr>
					<th>Email</th>
					<th>Số điện thoại</th>
					<th>Họ tên</th>
					<th colspan="2" style="text-align: center;">Hành động</th>
				</tr>
				<?php
				foreach($khachhang as $kh):
				?>
				<tr>
					<td>
						<a href="index.php?action=chitiet&id=<?php echo $kh["id"]; ?>"><?php echo $kh["email"]; ?></a>
					</td>
					<td><?php echo $kh["sodienthoai"]; ?></td>
					<td><?php echo $kh["hoten"]; ?></td>
					<td align="center"><a href="index.php?action=sua&id=<?php echo $kh["id"]; ?>"><img src="../inc/images/edit.png"></a></td>
					<td align="center"><a href="index.php?action=xoa&id=<?php echo $kh["id"]; ?>"><img src="../inc/images/delete.png"></a></td>
				</tr>
				<?php
				endforeach;
				?>		
			</table>
		</div>
	</div>
	<?php include("../inc/bottom.php"); ?>