<?php
	include_once('../config/connect.php');
    $id = $_GET['id'];
    if(isset($_POST['capnhat'])){
    //Kiểm tra nhập đủ thông tin chưa
        $tenbaiviet = $_POST['tentruong'];
        $mota = htmlentities($_POST['mota']);
        $diemchuan = $_POST['diemchuan'];
        $noidung = htmlentities($_POST['gioithieu']);
        $diachi = $_POST['diachi'];
        $chuyennganhdaotao= $_POST['chuyennganhdaotao'];      
        $anh = $_FILES['anh']['name'];
        $manguoidung = $_SESSION['tk']['id'];
        date_default_timezone_set("ASIA/HO_CHI_MINH");
        // $ngayviet = date("Y/m/d H:i:sa");
        $ngaycapnhat = date("Y/m/d H:i:sa");
        // Kiểm tra tên ảnh
        if ($anh == "") {
            $sql_anh = "SELECT anh FROM tbl_truongdaihoc WHERE id_truong = $id";
            $query_anh = $con->query($sql_anh);
            $row_anh = $query_anh->fetch_assoc();
            $anh = $row_anh['anh'];
        }else{
            move_uploaded_file($_FILES['anh']['tmp_name'], "img/".$anh);
        }
        //Cập nhật bài viết
        if ($tenbaiviet == ''){
            echo "<div class='alert alert-danger' role='alert'>
     Vui lòng nhập đủ thông tin!
     </div>";
        }else{ 
            //Thêm dữ liệu
            $sql = "UPDATE `tbl_truongdaihoc` SET `tentruong`='$tenbaiviet',`mota`='$mota',`gioithieu`='$noidung',`diachi`='$diachi',`chuyennganhdaotao`='$chuyennganhdaotao',`diemchuan`='$diemchuan',`anh`='$anh',`manguoidung`='$manguoidung',`ngaycapnhat`='$ngaycapnhat' WHERE   id_truong  = $id";
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
    $sql = "SELECT * FROM `tbl_truongdaihoc` WHERE id_truong = $id";
    $query = $con->query($sql);
    $row = $query->fetch_assoc();
?>
<div>
    <script src="//cdn.ckeditor.com/4.4.5.1/full-all/ckeditor.js"></script>
    <h1 style="text-align: center; padding-top: 20px;">CẬP NHẬT TRƯỜNG</h1>
    <div class="container-fluid mt--7">
        <div class="col-xl-12 order-xl-1">
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-12">
                                 <div class="form-group focused">
                                    <label class="form-control-label" for="input-username">Tên trường</label>
                                    <input name="tentruong" type="text" id="input-username" class="form-control form-control-alternative" placeholder="Tên trường" value="<?php echo $row['tentruong'] ?>">
                                </div>
                                <div class="form-group focused">
                                    <label class="form-control-label" for="input-username">Mô tả</label>
                                    <input name="mota" type="text" id="input-username" class="form-control form-control-alternative" placeholder="Mô tả" value="<?php echo $row['mota'] ?>">
                                </div>
                                <div class="form-group focused">
                                    <label class="form-control-label" for="input-username">Giới thiệu</label>
                                    <textarea name="gioithieu"><?php echo $row['gioithieu'] ?></textarea>
                                    <script>
                                            CKEDITOR.replace( 'gioithieu' );
                                    </script>
                                </div>
                                <div class="form-group focused">
                                  <label class="form-control-label" for="input-username"<Địa chỉ</label>
                                 <textarea style="width:930px; height:100px;" name="diachi" id="" cols="30" rows="10">
                                    <?php echo $row['diachi'] ?>
                                </textarea>
                                </div>
                              
                                <div class="form-group focused">
                                    <label class="form-control-label" for="input-username">Chuyên ngành đào tạo</label>
                                    <textarea name="chuyennganhdaotao"><?php echo $row['chuyennganhdaotao']; ?></textarea>
                                    <script>
                                            CKEDITOR.replace( 'chuyennganhdaotao' );
                                    </script>
                                </div>                              
                                <div class="form-group focused">
                                    <label class="form-control-label" for="input-username">Điểm chuẩn</label>
                                    <input name="diemchuan" type="text" id="input-username" class="form-control form-control-alternative" placeholder="Điểm chuẩn" value="<?php echo $row['diemchuan'] ?>">
                                </div>
                                <div class="form-group focused">
                                    <label class="form-control-label" for="input-username">Ảnh</label>
                                    <input name="anh" type='file' id="imgInp" value="<?php echo $row['anh'] ?>" /><br>
                                    <img style="height: 200px;" id="blah" src="../images/<?php echo $row['anh'] ?>"/>
                                </div>
                                <div>
                                    <input type="reset" value="Nhập lại" class="btn btn-outline-danger">
                                    <input name="capnhat" type="submit" value="Cập nhật" class="btn btn-outline-success">
                                    <a href="?ql=truonghoc/ds" class="btn btn-outline-secondary">Danh sách bài viết</a>
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