<?php 
	include_once('../config/connect.php');
	//Xóa bài viết 
if(isset($_GET['id'])){
	$id = $_GET['id'];
	$sql = "DELETE FROM tbl_thanhvien WHERE id_thanhvien = $id";
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
	$sql = "SELECT * FROM tbl_thanhvien";
	$query = $con->query($sql);
?>
<style>
    .tacvu{
        width: 0;
    }
</style>
    <div>
        <h5 style="text-align: center;">DANH SÁCH THÀNH VIÊN</h5>
        <a href="?ql=thanhvien/them" class="btn btn-success">Thêm mới</a>
        <div class="table-responsive">
            <table class="table align-items-center table-dark table-flush" style="vertical-align: middle;">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Tên thành viên</th>
                        <th scope="col">Ngày sinh</th>
                        <th scope="col">Email</th>
                        <th scope="col">Số điện thoại</th>
                        <th style="text-align: center;" scope="col">Ảnh</th>   
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
                            <td><?php echo $row['hoten']; ?></td>
                            <td><?php echo date('d-m-Y',strtotime($row['ngaysinh'])); ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['sodienthoai']; ?></td>
                            <td><img style="height: 100px; width: 100px; border-radius: 50%;" src="../images/<?php echo $row['anh'] ?>" alt=""></td>
                            <td class="tacvu">
                                <a class="btn btn-primary" href="?ql=thanhvien/sua&id=<?php echo $row['id_thanhvien']; ?>">Sửa</a>
                                <a class="btn btn-danger" href="?ql=thanhvien/ds&id=<?php echo $row['id_thanhvien']; ?>">Xóa</a>
                            </td>
                        </tr>
                        <?php }; ?>
                </tbody>
            </table>
        </div>
    </div>