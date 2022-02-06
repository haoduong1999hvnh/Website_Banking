<?php 
	include_once('../config/connect.php');
	
	if (isset($_GET['id'])) {
		$id_loaitintuc = $_GET['id'];
		$sql = "DELETE FROM `tbl_loaitintuc` WHERE id_loaitintuc = $id_loaitintuc";
		if ($con->query($sql)) {
			echo "<div class='alert alert-success'>Xóa thành công</div>";
		}else{
			echo "<div class='alert alert-success'>Xóa thất bại</div>";
		}
	}

	$sql = "SELECT * FROM tbl_loaitintuc";
	$query = $con->query($sql);
 ?>
<div>
	<h5 style="text-align: center;">DANH SÁCH LOẠI TIN TỨC</h5>
	<a href="?ql=loaitintuc/them" class="btn btn-success">Thêm mới</a>
	<div class="table-responsive">
		<table class="table align-items-center table-dark table-flush">
		  <thead class="thead-dark">
		    <tr style="text-align: center;">
		      <th width="200px;" scope="col">STT</th>
		      <th scope="col">Tên loại tin tức</th>
		      <th scope="col">Tác vụ</th>
		    </tr>
		  </thead>
		  <tbody>
		      <?php 
		      $stt = 1;
		      while ($row = $query->fetch_assoc()) { ?>
		      <tr style="text-align: center;">
		      	<td scope="row"><?php echo $stt++; ?></td>
		      	<td><?php echo $row['ten_loai_tin_tuc']; ?></td>
		      	<td>
		      		<a class="btn btn-primary" href="?ql=loaitintuc/sua&id=<?php echo $row['id_loaitintuc']; ?>" class="btn btn-outline-warning">Sửa</a>
		      		<a class="btn btn-danger" href="?ql=loaitintuc/ds&id=<?php echo $row['id_loaitintuc'] ?>">Xóa</a>
		      	</td>
		    </tr>
		<?php } ?>
		  </tbody>
		</table>
	</div>
</div>