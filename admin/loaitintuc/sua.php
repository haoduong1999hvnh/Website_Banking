<?php
	include_once('../config/connect.php');
	$id = $_GET['id']; 
	if (isset($_POST['sua'])) {
		$ten_loai_tin_tuc = $_POST['ten_loai_tin_tuc'];
		if ($ten_loai_tin_tuc == '') {
			echo "<div class='alert alert-success'>Vui lòng nhập đủ thông tin !</div>";
		}else{
			$sql = "UPDATE `tbl_loaitintuc` SET `ten_loai_tin_tuc`='$ten_loai_tin_tuc' WHERE  id_loaitintuc = $id";
			if ($con->query($sql)) {
				echo "<div class='alert alert-success'>Cập nhật thành công</div>";
			}else{
				echo "<div class='alert alert-success'>Cập nhật thất bại</div>";
			}
		}
	}
	$sql = "SELECT * FROM tbl_loaitintuc";
	$query = $con->query($sql);
	$row = $query->fetch_assoc();
 ?>
<div>
	<h5>Cập nhật loại tin tức</h5>
	<div class="container-fluid mt--7">
		<div class="col-xl-12 order-xl-1">
			<div class="card-body">
				<form method="POST">
					<div class="pl-lg-4">
							<div class="form-group focused">
								<label class="form-control-label">Tên loại tin tức</label>
								<input type="text" name="ten_loai_tin_tuc" class="form-control form-control-alternative" placeholder="Tên chuyên mục" value="<?php echo $row['ten_loai_tin_tuc'] ?>">
							</div>							
						<input type="reset" value="Nhập lại" class="btn btn-outline-danger">
						<input type="submit" name="sua" value="Cập nhật"  class="btn btn-outline-success">
						<a href="?ql=loaitintuc/ds" class="btn btn-outline-secondary">Danh sách loại tin tức</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>