<?php include("../inc/top.php"); ?>

<div>
  <div style="margin: 20px 0px 0px 20px;">
    <h3 style="margin-bottom: 20px;">Danh sách mặt hàng</h3>
      <?php
        if(isset($tb)){
      ?>
      <div class="alert alert-danger alert-dismissible fade in">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>Lỗi!</strong> <?php echo $tb; ?>
    </div>
  <?php
  }
  ?>
    <a href="index.php?action=them" class="btn btn-info">
      <i class="align-middle" data-feather="plus-circle"></i>
      Thêm người dùng
    </a>
    <div class="table-responsive">
      <table class="table table-hover">
        <tr>
          <th><a href="index.php?sort=email">Email</a></th>
          <th><a href="index.php?sort=sodienthoai">Số điện thoại</a></th>
          <th><a href="index.php?sort=hoten">Họ tên</a></th>
          <th colspan="2" style="text-align: center;"><a href="index.php?sort=vaitro">Loại quyền</a></th>
          <th>Trạng thái</th>
          <th>Khóa</th></tr>
        </tr>
        <?php foreach ($nguoidung as $nd): ?>
        <tr>
          <td><?php echo $nd["email"]; ?></td>
          <td><?php echo $nd["sodienthoai"]; ?></td>
          <td><?php echo $nd["hoten"]; ?></td>
          <td><?php if($nd["vaitro"]==1) echo "Quản trị";elseif($nd["vaitro"]==2) echo "Nhân viên"; else echo "Khách hàng" ; ?></td>
          <td>
          <?php if($nd["vaitro"] == 1): ?>
            <a href="?action=kichhoat&vaitro=2&email=<?php echo $nd["email"]; ?>">Hạ quyền</a>
          <?php elseif($nd["vaitro"] == 2):?>
            <a href="?action=kichhoat&vaitro=1&email=<?php echo $nd["email"]; ?>">Nâng quyền</a>
          <?php endif; ?>  
          </td>
          <td><?php if($nd["vaitro"]!=1) {if($nd["trangthai"]==1) echo "Kích hoạt"; else echo "Khóa" ; }?></td> 
          <td>
          <?php 
          if($nd["vaitro"]!=1) {
            if($nd["trangthai"]==1){ ?>
              <a href="?action=khoa&trangthai=0&mand=<?php echo $nd["id"]; ?>">Khóa</a>
            </td>
          </tr>
            <?php 
            }
            else { ?>
              <a href="?action=khoa&trangthai=1&mand=<?php echo $nd["id"]; ?>">Kích hoạt</a></td></tr>
          <?php 
            }
          }
      endforeach; ?>
      </table>
    </div>
  </div>
<?php include("../inc/bottom.php"); ?>
