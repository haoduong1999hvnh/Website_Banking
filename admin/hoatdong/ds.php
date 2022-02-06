<?php 
	include_once('../config/connect.php');
	//Xóa bài viết 
if(isset($_GET['id'])){
	$id = $_GET['id'];
	$sql = "DELETE FROM `tbl_hoatdong` WHERE id_hoatdong=$id";
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
//Hiển thị danh sách bài viết
    $tongsodong = mysqli_num_rows($con->query("SELECT * FROM tbl_hoatdong"));
    $sobaiviet1trang = 5;
    $sotrang = ceil($tongsodong/$sobaiviet1trang);

    if (isset($_GET['page'])) {
        $tranghientai = $_GET['page'];
    }
    else{
        $tranghientai = 1;
    }
    $trangtruoc = $tranghientai - 1;
    $trangsau = $tranghientai + 1;
    $dongbatdau = $sobaiviet1trang*($tranghientai-1);
    
	$sql = "SELECT * FROM `tbl_hoatdong`as t1 JOIN tbl_nguoi_nhan as t2 WHERE t1.ma_nguoi_nhan=t2.id_nguoi_nhan  ORDER BY t1.id_hoatdong DESC LIMIT $dongbatdau, $sobaiviet1trang";
	$query = $con->query($sql);
?>
    <div>
        <h5 style="text-align: center;">DANH SÁCH HOẠT ĐỘNG ỦNG HỘ</h5>
        <a href="?ql=hoatdong/them" class="btn btn-success">Thêm</a>
        <div class="table-responsive">
            <table class="table align-items-center table-dark table-flush">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Người ủng hộ</th>
                        <th scope="col">Người nhận</th>
                        <th scope="col">Số tiền</th>
                        <th scope="col">Thời gian</th>
                        <th scope="col">Số tài khoản</th>
                        <th scope="col">Ảnh</th>
                        <th scope="col">Tác Vụ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
    	$stt = $sobaiviet1trang*($tranghientai-1) + 1;
    	while ($row = $query->fetch_assoc()) {
    	?>
                        <tr>
                            <td style="width: 50px;"><?php echo $stt++; ?></td>
                            <td><?php echo $row['ten_nguoi_ung_ho']; ?></td>
                            <td><?php echo $row['ten_nguoi_nhan']; ?></td>
                            <td><?php echo $row['so_tien']; ?></td>
                            <td><?php echo $row['ngayungho']; ?></td>
                            <td><?php echo $row['so_tai_khoan']; ?></td>
                            <td><img style="width:150px; height: 100px;" src="../images/<?php echo $row['anh'] ?>" alt=""></td>
                        <td>
                                <a class="btn btn-primary" href="?ql=hoatdong/sua&id=<?php echo $row['id_hoatdong']; ?>">Sửa</a>
                                <a class="btn btn-danger" href="?ql=hoatdong/ds&id=<?php echo $row['id_hoatdong']; ?>">Xóa</a>
                            </td>
                        </tr>
                        <?php 
                    };
                     ?>
                </tbody>
            </table>
            <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                <ul class="pagination">
                    <li class="paginate_button page-item previous <?php if($tranghientai == 1) echo "disabled" ?>" id="dataTable_previous"><a href="?ql=hoatdong/ds&page=<?php echo $trangtruoc ?>" aria-controls="dataTable" data-dt-idx="0" tabindex="0" class="page-link">Trước</a></li>
                    <?php 
                        for ($i=1; $i <= $sotrang; $i++) { 
                     ?>
                    <li class="paginate_button page-item <?php if($i == $tranghientai) echo "active" ?>">
                        <a href="?ql=hoatdong/ds&page=<?php echo $i ?>" aria-controls="dataTable" data-dt-idx="1" tabindex="0" class="page-link"><?php echo $i ?></a>
                    </li>
                <?php } ?>
                    <li class="paginate_button page-item next <?php if($tranghientai == $sotrang) echo "disabled" ?>" id="dataTable_next"><a href="?ql=hoatdong/ds&page=<?php echo $trangsau ?>" aria-controls="dataTable" data-dt-idx="7" tabindex="0" class="page-link">Sau</a></li>
                </ul>
            </div>
        </div>
    </div>