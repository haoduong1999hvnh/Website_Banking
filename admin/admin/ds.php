<?php 
	include_once('../config/connect.php');
    //Xóa bài viết 
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "DELETE FROM tbl_nguoidung WHERE id = $id";
    if($con->query($sql)){
        echo "<div class='alert alert-success' role='alert'>
     Xóa thành công!
     </div>";
    }else{
        echo "<div class='alert alert-danger' role='alert'>
     Xóa thất bại!
     </div>";
    }
}
    //Hiển thị danh sách chuyên mục
    $sql = "SELECT * FROM tbl_nguoidung";
    $query = $con->query($sql);
?>
    <div>
        <h5 style="text-align: center;">DANH SÁCH ADMIN</h5>
        <a href="?ql=admin/them" class="btn btn-success">Thêm mới</a>
        <div class="table-responsive">
            <table class="table align-items-center table-dark table-flush" >
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Username</th>
                        <th scope="col">Password</th>
                        <th scope="col">Tên hiển thị</th>                        
                    </tr>
                </thead>
                <tbody>
                    <?php
        $stt = 1;
        while ($row = $query->fetch_assoc()) {
        ?>
                        <tr>
                            <td style="width: 50px;"><?php echo $stt++; ?></td>
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo md5($row['password']); ?></td>
                            <td><?php echo $row['tenhienthi']; ?></td>
                            <td>
                                <a class="btn btn-primary" href="?ql=admin/sua&id=<?php echo $row['id']; ?>">Sửa</a>
                                <a class="btn btn-danger" href="?ql=admin/ds&id=<?php echo $row['id']; ?>">Xóa</a>
                            </td>
                        </tr>
                        <?php 
                    }; 
                    ?>
                </tbody>
            </table>
        </div>
    </div>