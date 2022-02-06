<?php 
    include_once('../config/connect.php');
    if(isset($_POST['them'])){ 
    //Kiểm tra nhập đủ thông tin chưa
        $tenbaiviet = $_POST['tentruong'];
        $mota = $_POST['mota'];
        $diemchuan = $_POST['diemchuan'];
        $noidung = htmlentities($_POST['gioithieu']);
        $diachi = $_POST['diachi'];
        $chuyennganhdaotao= $_POST['chuyennganhdaotao'];        
        $anh = $_FILES['anh']['name'];
        move_uploaded_file($_FILES['anh']['tmp_name'], "img/".$anh);
        $manguoidung = $_SESSION['tk']['id'];
        date_default_timezone_set("ASIA/HO_CHI_MINH");
        $ngayviet = date("Y/m/d H:i:s");
        if ($tenbaiviet == ''){
            echo "<div class='alert alert-danger' role='alert'>
     Vui lòng nhập đủ thông tin!
     </div>";
        }else{
            //Thêm dữ liệu
            $sql="INSERT INTO `tbl_truongdaihoc`(`tentruong`, `mota`, `gioithieu`, `diachi`, `chuyennganhdaotao`, `diemchuan`, `anh`, `manguoidung`, `ngayviet`) VALUES ('$tenbaiviet', '$mota', '$noidung','$diachi', '$chuyennganhdaotao', '$diemchuan', '$anh', '$manguoidung', '$ngayviet')";
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
                                    <label class="form-control-label" for="input-username">Tên hoạt động</label>
                                    <input name="tentruong" type="text" id="input-username" class="form-control form-control-alternative" placeholder="" value="">
                                </div>
                                <div class="form-group focused">
                                    <label class="form-control-label" for="input-username">Mô tả</label>
                                    <input name="mota" type="text" id="input-username" class="form-control form-control-alternative" placeholder="Mô tả" value="">
                                </div>
                                <div class="form-group focused">
                                    <label class="form-control-label" for="input-username">Giới thiệu</label>
                                    <textarea name="gioithieu"></textarea>
                                    <script>
                                            CKEDITOR.replace( 'gioithieu' );
                                    </script>
                                </div>
                                 <div class="form-group focused">
                                    <label class="form-control-label" for="input-username">Địa chỉ</label>
                                    <textarea style="width:930px; height:100px;" name="diachi" id="" cols="30" rows="10">                                  
                                </textarea>
                                </div>
                                <div class="form-group focused">
                                    <label class="form-control-label" for="input-username">Nội dung</label>
                                    <textarea name="chuyennganhdaotao"></textarea>
                                    <script>
                                            CKEDITOR.replace( 'chuyennganhdaotao' );
                                    </script>
                                </div>                              
                                <div class="form-group focused">
                                    <label class="form-control-label" for="input-username">Số tiền cần gây quỹ</label>
                                    <input name="diemchuan" type="text" id="input-username" class="form-control form-control-alternative" placeholder="" value="">
                                </div>
                                <div class="form-group focused">
                                    <label class="form-control-label" for="input-username">Ảnh</label>
                                    <input name="anh" type='file' id="imgInp" /><br>
                                    <img style="height: 200px;" id="blah" src=""/>
                                </div>
                                <div>
                                    <input type="reset" value="Nhập lại" class="btn btn-outline-danger">
                                    <input name="them" type="submit" value="Thêm mới" class="btn btn-outline-success">
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