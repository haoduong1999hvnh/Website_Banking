<?php
    $id = $_GET['id'];
    if(isset($_POST['capnhat'])){
    //Kiểm tra nhập đủ thông tin chưa 
       $ten_nguoi_ung_ho = $_POST['ten_nguoi_ung_ho'];
        $ma_nguoi_nhan = $_POST['nguoi_nhan'];
        
        $noi_dung = htmlentities($_POST['noi_dung']);
        $so_tai_khoan= $_POST['so_tai_khoan'];
         $ghi_chu= $_POST['ghi_chu'];
         $so_tien= $_POST['so_tien'];
         $manguoidung = $_SESSION['tk']['id'];
        date_default_timezone_set("ASIA/HO_CHI_MINH");
        $ngayungho = date("Y/m/d H:i:s");
        $anh = $_FILES['anh']['name'];
        move_uploaded_file($_FILES['anh']['tmp_name'], "../images/".$anh);
        //Cập nhật bài viết
        if ($tieude == ''){
            echo "<div class='alert alert-danger' role='alert'>
     Vui lòng nhập đủ thông tin!
     </div>";
        }else{
            //Thêm dữ liệu
            $sql = "UPDATE `tbl_hoatdong` SET `manguoidung`='$manguoidung',`tieude`='$tieude',`maloaitintuc`='$maloaitintuc',`mota`='$mota',`noidung`='$noidung',`anh`='$anh',`nguon`='$nguon' WHERE id_tintuc=$id";
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
    //Load dữ liệu cũ
    $sql1 = "SELECT ten_nguoi_nhan FROM tbl_nguoi_nhan";
    $query1 = $con->query($sql1);
    $row1 = $query1->fetch_assoc();

    $sql = "SELECT * FROM tbl_hoatdong WHERE id_hoatdong  = $id";
    $query = $con->query($sql);
    $row = $query->fetch_assoc();
?>
<div>
     <script src="//cdn.ckeditor.com/4.4.5.1/full-all/ckeditor.js"></script>
    <h1 style="text-align: center; padding-top: 20px;">CẬP NHẬT HOẠT ĐỘNG</h1>
    <div class="container-fluid mt--7">
        <div class="col-xl-12 order-xl-1">
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="input-username">Tên người ủng hộ</label>
                                    <input name="tieude" type="text" value=" <?php echo $row['ten_nguoi_ung_ho'] ?>"class="form-control form-control-alternative" placeholder="Tiêu đề" value="<?php echo $row['tieude'] ?>">
                                </div>
                                <div class="form-group focused">
                                    <label class="form-control-label" for="input-username">Người nhận</label>
                                    <select name="nguoi_nhan" id="">
                                        <option value="<?php echo $row['ma_nguoi_nhan'] ?>"><?php echo $row1['ten_nguoi_nhan'] ?></option>
                                        <?php 
                                            $sql_cm = "SELECT * FROM tbl_nguoi_nhan";
                                            $query_cm = $con->query($sql_cm);
                                            while ($row_cm = $query_cm->fetch_assoc()) {
                                        ?>
                                        <option value="<?php echo $row_cm['id_nguoi_nhan'] ?>"><?php echo $row_cm['ten_nguoi_nhan'] ?></option>
                                    <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group focused">
                                    <label class="form-control-label" for="input-username">ghi chú</label>
                                    <input name="ghi_chu" type="text" value=" <?php echo $row['ghi_chu'] ?>" class="form-control form-control-alternative" placeholder="Mô tả" value="<?php echo $row['mota'] ?>">
                                </div>
                                <div class="form-group focused">
                                    <label class="form-control-label" for="input-username">Nội dung</label>
                                    <textarea name="noi_dung"  value=" <?php echo $row['noi_dung'] ?>"></textarea>
                                    <script>
                                            CKEDITOR.replace( 'noidung' );
                                    </script>
                                </div>
                                <div class="form-group focused">
                                    <label class="form-control-label" for="input-username">Só tài khoản</label>
                                    <input name="số tài khoản" type="text"  value=" <?php echo $row['so_tai_khoan'] ?>" class="form-control form-control-alternative" >
                                </div>
                                <div class="form-group focused">
                                    <label class="form-control-label" for="input-username">Ảnh</label>
                                    <input name="anh" type='file' id="imgInp" value="<?php echo $row['anh'] ?>" /><br>
                                    <img style="height: 200px;" id="blah" src="../images/<?php echo $row['anh'] ?>"/>
                                </div>                                
                                <div>
                                    <input type="reset" value="Nhập lại" class="btn btn-outline-danger">
                                    <input name="capnhat" type="submit" value="Cập nhật" class="btn btn-outline-success">
                                    <a href="?ql=tintuc/ds" class="btn btn-outline-secondary">Danh sách tin tức</a>
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