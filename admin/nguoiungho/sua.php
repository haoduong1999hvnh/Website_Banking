<?php
	include_once('../config/connect.php');

	$id = $_GET['id']; 
	if (isset($_POST['sua'])) {
		$hoten = $_POST['ten_nguoi_gui'];
		$email = $_POST['email'];
		$noidung = $_POST['noi_dung'];
		$sodienthoai = $_POST['sodienthoai'];
		$sotien = $_POST['so_tien'];
   		if ($hoten == '' || $email == '' || $noidung =='' || $sodienthoai == '' || $sotien == '' ) {
			echo "<div class='alert alert-success'>Vui lòng nhập đủ thông tin !</div>";
		}
		else{
			$sql = "UPDATE `tbl_ungho` SET `ten_nguoi_gui`='$hoten',`email`='$email',`noi_dung` ='$noidung' ,`sodienthoai`='$sodienthoai',`so_tien` ='$sotien'    WHERE id= $id";
			if ($con-> query($sql)) {
				echo "<div class='alert alert-success'>Cập nhật thành công</div>";
				
			}else{
				echo "<div class='alert alert-success'>Cập nhật thất bại</div>";
			}
		}
	}
	$sql = "SELECT * FROM tbl_ungho WHERE id=$id";
	$query = $con->query($sql);
	$row = $query->fetch_assoc();
 ?>
<div>
	<h1 style="text-align: center; padding-top: 20px;">CẬP NHẬT NGƯỜI GỬI</h1>
	<div class="container-fluid mt--7">
		<div class="col-xl-12 order-xl-1">
			<div class="card-body">
				<form method="POST" enctype="multipart/form-data">
					<div class="pl-lg-4">
							<div class="form-group focused"> 
								<label class="form-control-label">Họ tên</label>
								<input type="text" name="ten_nguoi_gui" class="form-control form-control-alternative" placeholder="Họ tên" value="<?php echo $row['ten_nguoi_gui'] ?>">
							</div>
							
							<div class="form-group focused">
								<label class="form-control-label">Email</label>
								<input type="text" name="email" class="form-control form-control-alternative" placeholder="Email" value="<?php echo $row['email'] ?>">
							</div>
							<div class="form-group focused">
								<label class="form-control-label">Nội dung</label>
								<input type="text" name="noi_dung" class="form-control form-control-alternative" placeholder="Nội dung" value="<?php echo $row['noi_dung'] ?>">
							</div>
							<div class="form-group focused">
								<label class="form-control-label">Số điện thoại</label>
								<input type="text" name="sodienthoai" class="form-control form-control-alternative" placeholder="Số điện thoại" value="<?php echo $row['sodienthoai'] ?>">
							</div>
							<div class="form-group focused">
								<label class="form-control-label">Số tiền</label>
								<input type="text" name="so_tien" class="form-control form-control-alternative" placeholder="Số tiền" value="<?php echo $row['so_tien'] ?>">
							</div>				
							
						<input type="reset" value="Nhập lại" class="btn btn-outline-danger">
						<input type="submit" name="sua" value="Cập nhật"  class="btn btn-outline-success">
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