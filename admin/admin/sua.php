<?php 
    $id = $_GET['id'];
    if(isset($_POST['sua'])){
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
            $sql = "UPDATE `tbl_nguoidung` SET `username`='$username',`password`='$password',`tenhienthi`='$tenhienthi',`mathanhvien`='$mathanhvien' WHERE id = $id";
            if ($con->query($sql)) {
               echo "<div class='alert alert-success' role='alert'>Cập nhật thành công!</div>";
            }else{
                echo "<div class='alert alert-danger' role='alert'>Cập nhật thất bại!</div>";
            }
        }
    }
    $sql = "SELECT * FROM tbl_nguoidung as t1 JOIN tbl_thanhvien as t2 ON t1.mathanhvien = t2.id_thanhvien WHERE t1.id = $id";
    $query = $con->query($sql);
    $row = $query->fetch_assoc();
?>
<div>
    <h1 style="text-align: center;padding-top: 20px;">CẬP NHẬT ADMIN</h1>
    <div class="container-fluid mt--7">
        <div class="col-xl-12 order-xl-1">
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <div class="pl-lg-4">
                        <div class="form-group focused">
                            <label class="form-control-label">Tên hiển thị</label>
                            <input type="text" name="tenhienthi" class="form-control form-control-alternative" placeholder="Tên hiển thị" value="<?php echo $row['tenhienthi'] ?>">
                        </div>
                        <div class="form-group focused">
                            <label class="form-control-label">Username</label>
                            <input type="text" name="username" class="form-control form-control-alternative" placeholder="Username" value="<?php echo $row['username'] ?>">
                        </div>
                        <div class="form-group focused">
                            <label class="form-control-label">Password</label>
                            <input type="text" name="password" class="form-control form-control-alternative" placeholder="Password" value="<?php echo $row['password'] ?>">
                        </div>
                        <div class="form-group focused">
                            <label class="form-control-label">Tên thành viên</label>
                                    <select name="mathanhvien" id="">
                                        <option value="<?php echo $row['id_thanhvien'] ?>"><?php echo $row['hoten'] ?></option>
                                        <?php 
                                            $sql_cm = "SELECT * FROM tbl_thanhvien WHERE id_thanhvien != {$row['id_thanhvien']}";
                                            $query_cm = $con->query($sql_cm);
                                            while ($row_cm = $query_cm->fetch_assoc()) {
                                        ?>
                                        <option value="<?php echo $row_cm['id_thanhvien'] ?>"><?php echo $row_cm['hoten'] ?></option>
                                    <?php } ?>
                                    </select>
                        </div>
                        <input type="reset" value="Nhập lại" class="btn btn-outline-danger">
                        <input type="submit" name="sua" value="Cập nhật"  class="btn btn-outline-success">
                        <a href="?ql=admin/ds" class="btn btn-outline-secondary">Danh sách thành viên</a>
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
    