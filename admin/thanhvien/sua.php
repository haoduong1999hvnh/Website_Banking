<?php
	include_once('../config/connect.php');

	$id = $_GET['id']; 
	if (isset($_POST['sua'])) {
	$hoten = $_POST['hoten'];
		$ngaysinh =strtotime($_POST['ngaysinh']);
		$_ngaysinh = date('Y-m-d',$ngaysinh);
		$email = $_POST['email'];
		$sodienthoai = $_POST['sodienthoai'];
		$anh = $_FILES['anh']['name'];
		if ($anh == "") {
            $sql_anh = "SELECT anh FROM tbl_thanhvien WHERE id_thanhvien = $id";
            $query_anh = $con->query($sql_anh);
            $row_anh = $query_anh->fetch_assoc();
            $anh = $row_anh['anh'];
        }else{
            move_uploaded_file($_FILES['anh']['tmp_name'], "../images/".$anh);
        }   
        $facebook = $_POST['facebook'];    
		if ($hoten == '' || $ngaysinh == '' || $email == '' || $sodienthoai == ''||$anh==''|| $facebook=='') {
			echo "<div class='alert alert-success'>Vui lòng nhập đủ thông tin !</div>";
		}
		else{
			$sql = "UPDATE `tbl_thanhvien` SET `hoten`='$hoten',`ngaysinh`='$_ngaysinh',`email`='$email',`sodienthoai`='$sodienthoai', anh = '$anh', facebook ='$facebook' WHERE id_thanhvien= $id";
			if ($con-> query($sql)) {
				echo "<div class='alert alert-success'>Cập nhật thành công</div>";
			}else{
				echo "<div class='alert alert-success'>Cập nhật thất bại</div>";
			}
		}
	}
	$sql = "SELECT * FROM tbl_thanhvien WHERE id_thanhvien=$id";
	$query = $con->query($sql);
	$row = $query->fetch_assoc();
 ?>
<div>
	<h1 style="text-align: center; padding-top: 20px;">CẬP NHẬT THÀNH VIÊN</h1>
	<div class="container-fluid mt--7">
		<div class="col-xl-12 order-xl-1">
			<div class="card-body">
				<form method="POST" enctype="multipart/form-data">
					<div class="pl-lg-4">
							<div class="form-group focused"> 
								<label class="form-control-label">Họ tên</label>
								<input type="text" name="hoten" class="form-control form-control-alternative" placeholder="Họ tên" value="<?php echo $row['hoten'] ?>">
							</div>
							<div class="form-group focused">
								<label class="form-control-label">Ngày sinh</label>
								<input type="text" name="ngaysinh" class="form-control form-control-alternative" placeholder="Ngày sinh" value="<?php echo date('d-m-Y',strtotime($row['ngaysinh'])) ?>">
							</div>
							<div class="form-group focused">
								<label class="form-control-label">Email</label>
								<input type="text" name="email" class="form-control form-control-alternative" placeholder="Email" value="<?php echo $row['email'] ?>">
							</div>
							<div class="form-group focused">
								<label class="form-control-label">Số điện thoại</label>
								<input type="text" name="sodienthoai" class="form-control form-control-alternative" placeholder="Số điện thoại" value="<?php echo $row['sodienthoai'] ?>">
							</div>
							<div class="form-group focused">
								<label class="form-control-label">Facebook</label>
								<input type="text" name="facebook" class="form-control form-control-alternative" placeholder="Facebook" value="<?php echo $row['facebook'] ?>">
							</div>							
							 <div class="form-group focused">
                                    <label class="form-control-label" for="input-username">Ảnh</label>
                                    <input name="anh" type='file' id="imgInp" /><br>
                                    <img style="height: 200px;" id="blah" src="../images/<?php echo $row['anh'] ?>"/>
                                </div>
						<input type="reset" value="Nhập lại" class="btn btn-outline-danger">
						<input type="submit" name="sua" value="Cập nhật"  class="btn btn-outline-success">
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