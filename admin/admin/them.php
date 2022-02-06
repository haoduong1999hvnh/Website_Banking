<?php 
    if(isset($_POST['them'])){
    //Kiểm tra nhập đủ thông tin chưa
        $tenhienthi = $_POST['tenhienthi']; 
        $username = $_POST['username'];
        $password = $_POST['password'];
        $mathanhvien = $_POST['mathanhvien'];
        if ($tenhienthi == ''){
            echo "<div class='alert alert-danger' role='alert'>
     Vui lòng nhập đủ thông tin!
     </div>";
        }else{
            //Thêm dữ liệu
            $sql = "INSERT INTO `tbl_nguoidung`(`username`, `password`, `tenhienthi`, `mathanhvien`) VALUES ('$username','$password','$tenhienthi','$mathanhvien')";
            if ($con->query($sql)) {
               echo "<div class='alert alert-success' role='alert'>Thêm thành công!</div>";
            }else{
                echo "<div class='alert alert-danger' role='alert'>Thêm thất bại!</div>";
            }
        }
    }
?>
<div>
    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <h1 style="text-align: center; padding-top: 20px;">THÊM TÀI KHOẢN</h1>
    <div class="container-fluid mt--7">
        <div class="col-xl-12 order-xl-1">
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="input-username">Tên hiển thị</label>
                                    <input name="tenhienthi" type="text" id="input-username" class="form-control form-control-alternative" placeholder="Nhập tên hiển thị" value="">
                                </div>

                                <div class="form-group focused">
                                    <label class="form-control-label" for="input-username">Username</label>
                                    <input name="username" type="text" id="input-username" class="form-control form-control-alternative" placeholder="Username" value="">
                                </div>
                                <div class="form-group focused">
                                    <label class="form-control-label" for="input-username">Password</label>
                                    <input name="password" type="password" id="input-username" class="form-control form-control-alternative" placeholder="Password" value="">
                                </div>
                                <div class="form-group focused">
                                    <label class="form-control-label" for="input-username">Tên thành viên</label>
                                    <select name="mathanhvien" id="">
                                        <option value="">---Chọn thành viên---</option>
                                        <?php 
                                            $sql_cm = "SELECT * FROM tbl_thanhvien";
                                            $query_cm = $con->query($sql_cm);
                                            while ($row_cm = $query_cm->fetch_assoc()) {
                                        ?>
                                        <option value="<?php echo $row_cm['id_thanhvien'] ?>"><?php echo $row_cm['hoten'] ?></option>
                                    <?php } ?>
                                    </select>
                                </div>                               
                                <div>
                                    <input type="reset" value="Nhập lại" class="btn btn-outline-danger">
                                    <input name="them" type="submit" value="Thêm mới" class="btn btn-outline-success">
                                    <a href="?ql=admin/ds" class="btn btn-outline-secondary">Danh sách tài khoản</a>
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