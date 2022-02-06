<?php 
    if(isset($_POST['them'])){
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
        if ($ten_nguoi_ung_ho == ''){
            echo "<div class='alert alert-danger' role='alert'>
     Vui lòng nhập đủ thông tin!
     </div>";
        }else{
            //Thêm dữ liệu
            $sql = "INSERT INTO `tbl_hoatdong`( `ten_nguoi_ung_ho`, `ma_nguoi_nhan`, `noi_dung`, `anh`, `ghi_chu`, `so_tai_khoan`,`so_tien`, `ngayungho`) VALUES ('$ten_nguoi_ung_ho','$ma_nguoi_nhan','$noi_dung','$anh','$ghi_chu','$so_tai_khoan','$so_tien','$ngayungho')";
            if ($con->query($sql)) {
               echo "<div class='alert alert-success' role='alert'>Thêm thành công!</div>";
            }else{
                echo "<div class='alert alert-danger' role='alert'>Thêm thất bại!</div>";
            }
        }
    }
    
?>
<div>
     <script src="//cdn.ckeditor.com/4.4.5.1/full-all/ckeditor.js"></script>
    <h1 style="text-align: center; padding-top: 20px;">THÊM HOẠT ĐỘNG</h1>
    <div class="container-fluid mt--7">
        <div class="col-xl-12 order-xl-1">
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="input-username">Tên người ủng hộ</label>
                                    <input name="ten_nguoi_ung_ho" type="text" id="input-username" class="form-control form-control-alternative" placeholder="" value="">
                                </div>
                                <div class="form-group focused">
                                    <label class="form-control-label" for="input-username">Người nhận</label>
                                    <select name="nguoi_nhan" id="">
                                        <option value="">---Chọn người cần ủng hộ---</option>
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
                                    <label class="form-control-label" for="input-username">Ghi chú</label>
                                    <input name="ghi_chu" type="text" id="input-username" class="form-control form-control-alternative" placeholder="" value="">
                                </div>
                                <div class="form-group focused">
                                    <label class="form-control-label" for="input-username">Nội dung</label>
                                    <textarea name="noi_dung" class="form-control form-control-alternative" placeholder="" value=""></textarea>
                                    <script>
                                            CKEDITOR.replace( 'noi_dung' );
                                    </script>
                                </div>
                                 <div class="form-group focused">
                                    <label class="form-control-label" for="input-username">Số tài khoản</label>
                                    <input name="so_tai_khoan" type="text" id="input-username" class="form-control form-control-alternative" placeholder="" value="">
                                </div>
                                 <div class="form-group focused">
                                    <label class="form-control-label" for="input-username">Số tiền</label>
                                    <input name="so_tien" type="text" id="input-username" class="form-control form-control-alternative" placeholder="" value="">
                                </div>
                                <div class="form-group focused">
                                    <label class="form-control-label" for="input-username">Ảnh</label>
                                    <input name="anh" type='file' id="imgInp"  /><br>
                                    <img style="height: 200px;" id="blah" src=""/>
                                </div>   
                                                           
                                <div>
                                    <input type="reset" value="Nhập lại" class="btn btn-outline-danger">
                                    <input name="them" type="submit" value="Thêm mới" class="btn btn-outline-success">
                                    <a href="?ql=hoatdong/ds"  class="btn btn-outline-secondary" >Danh sách hoạt động</a>
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