<?php
	include_once('../config/connect.php');
    $id = $_GET['id'];
    if(isset($_POST['capnhat'])){
    //Kiểm tra nhập đủ thông tin chưa
        $tennguoinhan = $_POST['ten_nguoi_nhan'];
        $diachi = $_POST['dia_chi'];
        $sodienthoai = $_POST['sdt'];
        $mota = $_POST['mo_ta'];        
        $anh = $_FILES['anh']['name'];


        // Kiểm tra tên ảnh
        if ($anh == "") {
            $sql_anh = "SELECT anh FROM tbl_nguoi_nhan WHERE id_nguoi_nhan = $id";
            $query_anh = $con->query($sql_anh);
            $row_anh = $query_anh->fetch_assoc();
            $anh = $row_anh['anh'];
        }else{
             move_uploaded_file($_FILES['anh']['tmp_name'], "../images/".$anh);
        }
        //Cập nhật 
        if ($tennguoinhan == ''|| $diachi == '' || $sodienthoai == ''){
            echo "<div class='alert alert-danger' role='alert'>
     Vui lòng nhập đủ thông tin!
     </div>";
        }else{ 
            //Thêm dữ liệu
            $sql = "UPDATE `tbl_nguoi_nhan` SET `ten_nguoi_nhan`='$tennguoinhan',`dia_chi`='$diachi' ,`sdt`='$sodienthoai',`mo_ta` ='$mota',`anh` = '$anh'    WHERE id_nguoi_nhan = $id";
            if ($con->query($sql)){
                echo "<div class='alert alert-success' role='alert'>
     Cập nhật thành công!
     </div>";
            }else{
                echo "<div class='alert alert-danger' role='alert'>
     Cập nhật thất bại!
     </div>";
            }
        }
    }
    $sql = "SELECT * FROM `tbl_nguoi_nhan` WHERE id_nguoi_nhan = $id";
    $query = $con->query($sql);
    $row = $query->fetch_assoc();
?>
<div>
    <script src="//cdn.ckeditor.com/4.4.5.1/full-all/ckeditor.js"></script>
    <h1 style="text-align: center; padding-top: 20px;">CẬP NHẬT THÔNG TIN</h1>
    <div class="container-fluid mt--7">
        <div class="col-xl-12 order-xl-1">
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group focused">
                                <label class="form-control-label">Họ và tên</label>
                                <input type="text" name="ten_nguoi_nhan" class="form-control form-control-alternative" placeholder="Họ tên" value=" <?php echo $row['ten_nguoi_nhan'] ?>">
                            </div>
                            <div class="form-group focused">
                                <label class="form-control-label">Địa chỉ</label>
                                <input type="text" name="dia_chi" class="form-control form-control-alternative" placeholder="Địa chỉ"  value="  <?php echo $row['dia_chi'] ?>">
                            </div>
                            <div class="form-group focused">
                                <label class="form-control-label">Số điện thoại</label>
                                <input type="text" name="sdt" class="form-control form-control-alternative" placeholder="Số điện thoại" value="<?php echo $row['sdt'] ?>">
                            </div>
                             <div class="form-group focused">
                                    <label class="form-control-label" for="input-username">Mô tả</label>
                                    <textarea style="width:930px; height:100px;" name="mo_ta" id="" cols="30" rows="10"  value="<?php echo $row['mo_ta'] ?>">                                  
                                </textarea>
                                </div>
                            
                            <div class="form-group focused">
                                    <label class="form-control-label" for="input-username">Ảnh</label>
                                    <input name="anh" type='file' id="imgInp" /><br>
                                    <img style="height: 200px;" id="blah" src="../images/<?php echo $row['anh'] ?>"/>
                                </div>
                                <div>
                                    <input type="reset" value="Nhập lại" class="btn btn-outline-danger">
                                    <input name="capnhat" type="submit" value="Cập nhật" class="btn btn-outline-success">
                                    <a href="?ql=nguoinhan/ds" class="btn btn-outline-secondary">Danh sách người nhận</a>
                                </div>
                            </div>
                        </div>
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