<?php 
    if(isset($_POST['them'])){
    //Kiểm tra nhập đủ thông tin chưa
        $tieude = $_POST['tieude'];
        $maloaitintuc = $_POST['loaitintuc'];
        $mota = htmlentities($_POST['mota']);
        $noidung = htmlentities($_POST['noidung']);
       
         $manguoidung = $_SESSION['tk']['id'];
        date_default_timezone_set("ASIA/HO_CHI_MINH");
        $ngayviet = date("Y/m/d H:i:s");
        $anh = $_FILES['anh']['name'];
        move_uploaded_file($_FILES['anh']['tmp_name'], "../images/".$anh);
        if ($tieude == ''){
            echo "<div class='alert alert-danger' role='alert'>
     Vui lòng nhập đủ thông tin!
     </div>";
        }else{
            //Thêm dữ liệu
            $sql = "INSERT INTO `tbl_tintuc`(`manguoidung`, `tieude`, `maloaitintuc`, `mota`, `noidung`, `anh`, `ghichu`, `ngayviet`) VALUES ('$manguoidung','$tieude','$maloaitintuc','$mota','$noidung','$anh',NULL,'$ngayviet')";
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
    <h1 style="text-align: center; padding-top: 20px;">THÊM TIN TỨC</h1>
    <div class="container-fluid mt--7">
        <div class="col-xl-12 order-xl-1">
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="input-username">Tiêu đề</label>
                                    <input name="tieude" type="text" id="input-username" class="form-control form-control-alternative" placeholder="Tiêu đề" value="">
                                </div>
                                <div class="form-group focused">
                                    <label class="form-control-label" for="input-username">Loại tin tức</label>
                                    <select name="loaitintuc" id="">
                                        <option value="">---Chọn loại tin tức---</option>
                                        <?php 
                                            $sql_cm = "SELECT * FROM tbl_loaitintuc";
                                            $query_cm = $con->query($sql_cm);
                                            while ($row_cm = $query_cm->fetch_assoc()) {
                                        ?>
                                        <option value="<?php echo $row_cm['id_loaitintuc'] ?>"><?php echo $row_cm['ten_loai_tin_tuc'] ?></option>
                                    <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group focused">
                                    <label class="form-control-label" for="input-username">Mô tả</label>
                                    <input name="mota" type="text" id="input-username" class="form-control form-control-alternative" placeholder="Mô tả" value="">
                                </div>
                                <div class="form-group focused">
                                    <label class="form-control-label" for="input-username">Nội dung</label>
                                    <textarea name="noidung"></textarea>
                                    <script>
                                            CKEDITOR.replace( 'noidung' );
                                    </script>
                                </div>
                                
                                <div class="form-group focused">
                                    <label class="form-control-label" for="input-username">Ảnh</label>
                                    <input name="anh" type='file' id="imgInp" /><br>
                                    <img style="height: 200px;" id="blah" src=""/>
                                </div>   
                                                           
                                <div>
                                    <input type="reset" value="Nhập lại" class="btn btn-outline-danger">
                                    <input name="them" type="submit" value="Thêm mới" class="btn btn-outline-success">
                                    <a href="?ql=tintuc/ds"  class="btn btn-outline-secondary" >Danh sách tin tức</a>
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