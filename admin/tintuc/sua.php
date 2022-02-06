<?php
    $id = $_GET['id'];
    if(isset($_POST['capnhat'])){
    //Kiểm tra nhập đủ thông tin chưa 
        $tieude = $_POST['tieude'];
        $maloaitintuc = $_POST['loaitintuc'];
        $mota = $_POST['mota'];
        $noidung = htmlentities($_POST['noidung']);
      
        $manguoidung = $_SESSION['tk']['id'];
        $anh = $_FILES['anh']['name'];
        if ($anh == "") {
            $sql_anh = "SELECT anh FROM tbl_tintuc WHERE id_tintuc = $id";
            $query_anh = $con->query($sql_anh);
            $row_anh = $query_anh->fetch_assoc();
            $anh = $row_anh['anh'];
        }else{
            move_uploaded_file($_FILES['anh']['tmp_name'], "../images/".$anh);
        }
        //Cập nhật bài viết
        if ($tieude == ''){
            echo "<div class='alert alert-danger' role='alert'>
     Vui lòng nhập đủ thông tin!
     </div>";
        }else{
            //Thêm dữ liệu
            $sql = "UPDATE `tbl_tintuc` SET `manguoidung`='$manguoidung',`tieude`='$tieude',`maloaitintuc`='$maloaitintuc',`mota`='$mota',`noidung`='$noidung',`anh`='$anh' WHERE id_tintuc=$id";
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
    $sql1 = "SELECT ten_loai_tin_tuc FROM tbl_loaitintuc";
    $query1 = $con->query($sql1);
    $row1 = $query1->fetch_assoc();

    $sql = "SELECT * FROM tbl_tintuc WHERE id_tintuc  = $id";
    $query = $con->query($sql);
    $row = $query->fetch_assoc();
?>
<div>
     <script src="//cdn.ckeditor.com/4.4.5.1/full-all/ckeditor.js"></script>
    <h1 style="text-align: center; padding-top: 20px;">CẬP NHẬT TIN TỨC</h1>
    <div class="container-fluid mt--7">
        <div class="col-xl-12 order-xl-1">
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="input-username">Tiêu đề</label>
                                    <input name="tieude" type="text" id="input-username" class="form-control form-control-alternative" placeholder="Tiêu đề" value="<?php echo $row['tieude'] ?>">
                                </div>
                                <div class="form-group focused">
                                    <label class="form-control-label" for="input-username">Loại tin tức</label>
                                    <select name="loaitintuc" id="">
                                        <option value="<?php echo $row['maloaitintuc'] ?>"><?php echo $row1['ten_loai_tin_tuc'] ?></option>
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
                                    <input name="mota" type="text" id="input-username" class="form-control form-control-alternative" placeholder="Mô tả" value="<?php echo $row['mota'] ?>">
                                </div>
                                <div class="form-group focused">
                                    <label class="form-control-label" for="input-username">Nội dung</label>
                                    <textarea name="noidung"><?php echo $row['noidung']; ?></textarea>
                                    <script>
                                            CKEDITOR.replace( 'noidung' );
                                    </script>
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