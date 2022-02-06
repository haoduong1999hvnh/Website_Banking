<?php 
	include_once('../config/connect.php');

	if (isset($_POST['them'])) {
		$hoten = $_POST['ten_nguoi_gui'];
		$email = $_POST['email'];
		$noidung = $_POST['noi_dung'];
		$sodienthoai = $_POST['sodienthoai'];
		$sotien = $_POST['so_tien'];
		
		if ($hoten == '' || $email == '' || $sodienthoai == ''||$sotien == '') {
			echo "<div class='alert alert-success'>Vui lòng nhập đủ thông tin !</div>";
		}else{
			$sql = "INSERT INTO tbl_ungho (ten_nguoi_gui, email ,noi_dung ,sodienthoai, so_tien ) VALUES ('$hoten', '$email','$noidung' ,'$sodienthoai','$sotien' )";
			if ($con->query($sql)) {
				echo "<div class='alert alert-success'>Thêm thành công</div>";
			}else{
				echo "<div class='alert alert-success'>Thêm thất bại</div>";
			}
		}
	}
 ?>
<div>
	<h5 style="text-transform: uppercase;text-align: center;">Thêm mới người gửi</h5>
	<div class="container-fluid mt--7">
		<div class="col-xl-12 order-xl-1">
			<div class="card-body">
				<form method="POST" enctype="multipart/form-data">
					<div class="pl-lg-4">
							<div class="form-group focused">
								<label class="form-control-label">Họ và tên</label>
								<input type="text" name="ten_nguoi_gui" class="form-control form-control-alternative" placeholder="Họ tên">
							</div>
							
							<div class="form-group focused">
								<label class="form-control-label">Email</label>
								<input type="email" name="email" class="form-control form-control-alternative" placeholder="Email">
							</div>

							<div class="form-group focused">
								<label class="form-control-label">Nội dung</label>
								<input type="noi_dung" name="noi_dung" class="form-control form-control-alternative" placeholder="Nội dung">
							</div>
							<div class="form-group focused">
								<label class="form-control-label">Số điện thoại</label>
								<input type="text" name="sodienthoai" class="form-control form-control-alternative" placeholder="Số điện thoại">
							</div>
							<div class="form-group focused">
								<label class="form-control-label">Số tiền</label>
								<input type="text" name="so_tien" class="form-control form-control-alternative" placeholder="Số tiền">
							</div>
							
                              
						<input type="reset" value="Nhập lại" class="btn btn-outline-danger">
						<input type="submit" name="them" value="Thêm mới"  class="btn btn-outline-success">
						<a href="?ql=nguoiungho/ds" class="btn btn-outline-secondary">Danh sách người gửi</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>
        function readURL(input) {
          if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function(e) {
              $('#blah').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
          }
        }

        $("#imgInp").change(function() {
          readURL(this);
        });
    </script>
</div>