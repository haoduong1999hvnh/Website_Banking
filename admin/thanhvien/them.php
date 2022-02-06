<?php 
	include_once('../config/connect.php');

	if (isset($_POST['them'])) {
		$hoten = $_POST['hoten'];
		$ngaysinh =strtotime($_POST['ngaysinh']);
		$_ngaysinh = date('Y-m-d',$ngaysinh);
		$email = $_POST['email'];
		$sodienthoai = $_POST['sodienthoai'];
		$facebook = $_POST['facebook'];
		$anh = $_FILES['anh']['name'];
        move_uploaded_file($_FILES['anh']['tmp_name'], "../images/".$anh);
		if ($hoten == '' || $_ngaysinh == '' || $email == '' || $sodienthoai == ''||$facebook == '') {
			echo "<div class='alert alert-success'>Vui lòng nhập đủ thông tin !</div>";
		}else{
			$sql = "INSERT INTO tbl_thanhvien (hoten, ngaysinh, email, sodienthoai,facebook, anh) VALUES ('$hoten','$_ngaysinh', '$email','$sodienthoai','$facebook', '$anh')";
			if ($con->query($sql)) {
				echo "<div class='alert alert-success'>Thêm thành công</div>";
			}else{
				echo "<div class='alert alert-success'>Thêm thất bại</div>";
			}
		}
	}
 ?>
<div>
	<h5 style="text-transform: uppercase;text-align: center;">Thêm mới thành viên</h5>
	<div class="container-fluid mt--7">
		<div class="col-xl-12 order-xl-1">
			<div class="card-body">
				<form method="POST" enctype="multipart/form-data">
					<div class="pl-lg-4">
							<div class="form-group focused">
								<label class="form-control-label">Họ và tên</label>
								<input type="text" name="hoten" class="form-control form-control-alternative" placeholder="Họ tên">
							</div>
							<div class="form-group focused">
								<label class="form-control-label">Ngày sinh</label>
								<input type="text" name="ngaysinh" class="form-control form-control-alternative" placeholder="Ngày sinh">
							</div>
							<div class="form-group focused">
								<label class="form-control-label">Email</label>
								<input type="email" name="email" class="form-control form-control-alternative" placeholder="Email">
							</div>
							<div class="form-group focused">
								<label class="form-control-label">Số điện thoại</label>
								<input type="text" name="sodienthoai" class="form-control form-control-alternative" placeholder="Số điện thoại">
							</div>
							<div class="form-group focused">
								<label class="form-control-label">Facebook</label>
								<input type="text" name="facebook" class="form-control form-control-alternative" placeholder="Facebook">
							</div>
							 <div class="form-group focused">
                                    <label class="form-control-label" for="input-username">Ảnh</label>
                                    <input name="anh" type='file' id="imgInp" /><br>
                                    <img style="height: 200px;" id="blah" src=""/>
                                </div>
						<input type="reset" value="Nhập lại" class="btn btn-outline-danger">
						<input type="submit" name="them" value="Thêm mới"  class="btn btn-outline-success">
						<a href="?ql=thanhvien/ds" class="btn btn-outline-secondary">Danh sách thành viên</a>
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