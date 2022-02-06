<?php 
    include_once('../config/connect.php');
    if(isset($_POST['them'])){ 
    //Kiểm tra nhập đủ thông tin chưa
        $tennguoinhan = $_POST['ten_nguoi_nhan'];
        $diachi = $_POST['dia_chi'];
        $sodienthoai = $_POST['sdt'];
        $mota = $_POST['mo_ta'];       
        $anh = $_FILES['anh']['name'];
        move_uploaded_file($_FILES['anh']['tmp_name'], "../images/".$anh);
   
        if ($tennguoinhan == ''|| $diachi == '' || $sodienthoai == ''){
            echo "<div class='alert alert-danger' role='alert'>
     Vui lòng nhập đủ thông tin!
     </div>";
        }else{
            //Thêm dữ liệu
            $sql="INSERT INTO `tbl_nguoi_nhan`(`ten_nguoi_nhan`,  `dia_chi`, `sdt` , `mo_ta`, `anh`) VALUES ('$tennguoinhan', '$diachi','$sodienthoai' ,'$mota', '$anh')";
            if ($con->query($sql)) {           
               echo "<div class='alert alert-success' role='alert'>Thêm thành công!</div>";
            }else{
                echo "<div class='alert alert-danger' role='alert'>Thêm thất bại!</div>";
            }
            }
        } 
 ?>
<div>
	<h5 style="text-transform: uppercase;text-align: center;">Thêm mới người nhận</h5>
	<div class="container-fluid mt--7">
		<div class="col-xl-12 order-xl-1">
			<div class="card-body">
				<form method="POST" enctype="multipart/form-data">
					<div class="pl-lg-4">
							<div class="form-group focused">
								<label class="form-control-label">Họ và tên</label>
								<input type="text" name="ten_nguoi_nhan" class="form-control form-control-alternative" placeholder="Họ tên">
							</div>
							<div class="form-group focused">
								<label class="form-control-label">Địa chỉ</label>
								<input type="text" name="dia_chi" class="form-control form-control-alternative" placeholder="Địa chỉ">
							</div>
							<div class="form-group focused">
								<label class="form-control-label">Số điện thoại</label>
								<input type="text" name="sdt" class="form-control form-control-alternative" placeholder="Số điện thoại">
							</div>
							 <div class="form-group focused">
                                    <label class="form-control-label" for="input-username">Mô tả</label>
                                    <textarea style="width:930px; height:100px;" name="mo_ta" id="" cols="30" rows="10">                                  
                                </textarea>
                                </div>
							
							<div class="form-group focused">
                                    <label class="form-control-label" for="input-username">Ảnh</label>
                                    <input name="anh" type='file' id="imgInp" /><br>
                                    <img style="height: 200px;" id="blah" src=""/>
                                </div>
                              
						<input type="reset" value="Nhập lại" class="btn btn-outline-danger">
						<input type="submit" name="them" value="Thêm mới"  class="btn btn-outline-success">
						<a href="?ql=nguoinhan/ds" class="btn btn-outline-secondary">Danh sách người nhận</a>
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