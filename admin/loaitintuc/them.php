<?php 
include_once('../config/connect.php');
	if (isset($_POST['them'])) {
		$ten_loai_tin_tuc= $_POST['ten_loai_tin_tuc'];
		// $ghichu = $_POST['ghichu'];
		if ($ten_loai_tin_tuc == '' ) {
			echo "<div class='alert alert-success'>Vui lòng nhập đủ thông tin !</div>";
		}else{
			$sql = "INSERT INTO tbl_loaitintuc (ten_loai_tin_tuc) VALUES ('$ten_loai_tin_tuc')";
			if ($con->query($sql)) {
				echo "<div class='alert alert-success'>Thêm thành công</div>";
			}else{
				echo "<div class='alert alert-success'>Thêm thất bại</div>";
			}
		}
	}
 ?>
<div>
	<h5>Thêm mới loại tin tức</h5>
	<div class="container-fluid mt--7">
		<div class="col-xl-12 order-xl-1">
			<div class="card-body">
				<form method="POST">
					<div class="pl-lg-4">
							<div class="form-group focused">
								<label class="form-control-label">Tên loại tin tức</label>
								<input type="text" name="ten_loai_tin_tuc" class="form-control form-control-alternative" placeholder="Tên loại tin tức">
							</div>
							
						<input type="reset" value="Nhập lại" class="btn btn-outline-danger">
						<input type="submit" name="them" value="Thêm mới"  class="btn btn-outline-success">
						<a href="?ql=loaitintuc/ds" class="btn btn-outline-secondary">Danh sách chuyên mục</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>