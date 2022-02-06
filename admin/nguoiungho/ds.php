<?php 
    include_once('../config/connect.php');
    //Xóa bài viết 
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "DELETE FROM tbl_ungho WHERE id = $id";
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
    $sql = "SELECT * FROM tbl_ungho";
    $query = $con->query($sql);
?>
<style>
    .tacvu{
        width: 0;
    }
</style>
    <div>
        <h5 style="text-align: center;">DANH SÁCH NGƯỜI GỬI</h5>
        <a href="?ql=nguoiungho/them" class="btn btn-success">Thêm mới</a>
        <div class="table-responsive">
            <table class="table align-items-center table-dark table-flush" style="vertical-align: middle;">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Tên người gửi</th>
                        <th scope="col">Email</th>
                        <th scope="col">Nội dung</th>
                        <th scope="col">Số điện thoại</th>
                        <th scope="col">Số tiền gửi</th>
                        
                        <th scope="col" class="tacvu">Tác Vụ</th>                    
                    </tr>
                </thead>
                <tbody>
                    <?php
        $stt = 1;
        while ($row = $query->fetch_assoc()) {
        ?>
                        <tr>
                            <td><?php echo $stt++; ?></td>
                            <td><?php echo $row['ten_nguoi_gui']; ?></td>   
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['noi_dung']; ?></td>
                            <td><?php echo $row['sodienthoai']; ?></td>
                            <td><?php echo $row['so_tien']; ?></td>
                        
                            <td class="tacvu">
                                <a class="btn btn-primary" href="?ql=nguoiungho/sua&id=<?php echo $row['id']; ?>">Sửa</a>
                                <a class="btn btn-danger" href="?ql=nguoiungho/ds&id=<?php echo $row['id']; ?>">Xóa</a>
                            </td>
                        </tr>
                        <?php }; ?>
                </tbody>
            </table>
        </div>
    </div>