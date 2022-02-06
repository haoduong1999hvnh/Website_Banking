<?php 
include_once('../config/connect.php');
	//Xóa bài viết 
if(isset($_GET['id'])){
	$id = $_GET['id'];
	$sql = "DELETE FROM tbl_lienhe WHERE id = $id";
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
	
	$sql = "SELECT * FROM tbl_lienhe";
	$query = $con->query($sql);
?>
    <div>
        <h5 style="text-align: center;">DANH SÁCH LIÊN HỆ</h5>
        <div class="table-responsive">
            <table class="table align-items-center table-dark table-flush">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Họ và tên</th>
                        <th scope="col">Email</th>
                        <th scope="col">Ngày gửi</th>
                        <th scope="col">Nội dung</th>
                        <th scope="col">Tác Vụ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
    	$stt = 1;
    	while ($row = $query->fetch_assoc()) {
    	?>
                        <tr>
                            <td style="width: 50px;"><?php echo $stt++; ?></td>
                            <td><?php echo $row['hoten']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo date('d-m-Y H:i:s',strtotime($row['ngaygui'])); ?></td>
                            <td><?php echo $row['noidung']; ?></td>
                            <td>
                                <a class="btn btn-danger" href="?ql=lienhe/ds&id=<?php echo $row['id']; ?>">Xóa</a>
                            </td>
                        </tr>
                        <?php }; ?>
                </tbody>
            </table>
        </div>
    </div>