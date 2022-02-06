<?php 
	include_once('../config/connect.php');
	//Xóa bài viết 
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "DELETE FROM `tbl_truongdaihoc` WHERE id_truong=$id";
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
    $tongsodong = mysqli_num_rows($con->query("SELECT * FROM tbl_truongdaihoc"));
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
    
	$sql = "SELECT * FROM `tbl_truongdaihoc` as a1 JOIN tbl_nguoidung as a2 WHERE a1.manguoidung= a2.id ORDER BY a1.id_truong DESC LIMIT $dongbatdau, $sobaiviet1trang";
	$query = $con->query($sql);
?>
    <div> 
        <h5 style="text-align: center;">DANH SÁCH BÀI VIẾT</h5>
        <a href="?ql=truonghoc/them" class="btn btn-success">Thêm mới</a>
        <div class="table-responsive">
            <table class="table align-items-center table-dark table-flush">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Tiêu đề</th>
                        <th scope="col">Mô Tả</th>
                        <th style="text-align: center;" scope="col">Ảnh</th>
                        <th scope="col">Người Viết</th>
                        <th scope="col">Ngày Viết</th>
                        <th scope="col">Cập nhật lần cuối</th>
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
                            <td><?php echo $row['tentruong']; ?></td>
                            <td><?php echo substr($row['mota'], 0,100).'...'; ?></td>
                            <td><img style="height: 100px; width: 100px; border-radius: 50%;" src="../images/<?php echo $row['anh'] ?>" alt=""></td>
                            <td><?php echo $row['tenhienthi']; ?></td>
                            <td><?php echo date('d-m-Y H:i:s',strtotime($row['ngayviet'])); ?></td>
                            <td><?php echo date('d-m-Y H:i:s',strtotime($row['ngaycapnhat'])); ?></td>
                            <td>
                                <a class="btn btn-primary" href="?ql=truonghoc/sua&id=<?php echo $row['id_truong']; ?>">Sửa</a>
                                <a class="btn btn-danger" href="?ql=truonghoc/ds&id=<?php echo $row['id_truong']; ?>">Xóa</a>
                            </td>
                        </tr>
                        <?php 
                    }
                        ; ?>
                </tbody>
            </table>
            <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                <ul class="pagination">
                    <li class="paginate_button page-item previous <?php if($tranghientai == 1) echo "disabled" ?>" id="dataTable_previous"><a href="?ql=truonghoc/ds&page=<?php echo $trangtruoc ?>" aria-controls="dataTable" data-dt-idx="0" tabindex="0" class="page-link">Trước</a></li>
                    <?php 
                        for ($i=1; $i <= $sotrang; $i++) { 
                     ?>
                    <li class="paginate_button page-item <?php if($i == $tranghientai) echo "active" ?>">
                        <a href="?ql=truonghoc/ds&page=<?php echo $i ?>" aria-controls="dataTable" data-dt-idx="1" tabindex="0" class="page-link"><?php echo $i ?></a>
                    </li>
                <?php } ?>
                    <li class="paginate_button page-item next <?php if($tranghientai == $sotrang) echo "disabled" ?>" id="dataTable_next"><a href="?ql=truonghoc/ds&page=<?php echo $trangsau ?>" aria-controls="dataTable" data-dt-idx="7" tabindex="0" class="page-link">Sau</a></li>
                </ul>
            </div>
        </div>
    </div>