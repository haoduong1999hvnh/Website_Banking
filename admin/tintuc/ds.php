<?php 
	include_once('../config/connect.php');
	//Xóa bài viết 
if(isset($_GET['id'])){
	$id = $_GET['id'];
	$sql = "DELETE FROM `tbl_tintuc` WHERE id_tintuc=$id";
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
    $tongsodong = mysqli_num_rows($con->query("SELECT * FROM tbl_tintuc"));
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
    
	$sql = "SELECT * FROM `tbl_tintuc`as t1 JOIN tbl_loaitintuc as t2 WHERE t1.maloaitintuc=t2.id_loaitintuc  ORDER BY t1.id_tintuc DESC LIMIT $dongbatdau, $sobaiviet1trang";
	$query = $con->query($sql);
?>
    <div>
        <h5 style="text-align: center;">DANH SÁCH TIN TỨC</h5>
        <a href="?ql=tintuc/them" class="btn btn-success">Thêm</a>
        <div class="table-responsive">
            <table class="table align-items-center table-dark table-flush">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Tiêu đề</th>
                        <th scope="col">Loại tin tức</th>
                      
                        <th scope="col">Mô tả</th>
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
                            <td><?php echo $row['tieude']; ?></td>
                            <td><?php echo $row['ten_loai_tin_tuc']; ?></td>
                            
                            <td><?php echo $row['mota']; ?></td>
                            <td><img style="width:150px; height: 100px;" src="../images/<?php echo $row['anh'] ?>" alt=""></td>
                        <td>
                                <a class="btn btn-primary" href="?ql=tintuc/sua&id=<?php echo $row['id_tintuc']; ?>">Sửa</a>
                                <a class="btn btn-danger" href="?ql=tintuc/ds&id=<?php echo $row['id_tintuc']; ?>">Xóa</a>
                            </td>
                        </tr>
                        <?php 
                    };
                     ?>
                </tbody>
            </table>
            <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                <ul class="pagination">
                    <li class="paginate_button page-item previous <?php if($tranghientai == 1) echo "disabled" ?>" id="dataTable_previous"><a href="?ql=tintuc/ds&page=<?php echo $trangtruoc ?>" aria-controls="dataTable" data-dt-idx="0" tabindex="0" class="page-link">Trước</a></li>
                    <?php 
                        for ($i=1; $i <= $sotrang; $i++) { 
                     ?>
                    <li class="paginate_button page-item <?php if($i == $tranghientai) echo "active" ?>">
                        <a href="?ql=tintuc/ds&page=<?php echo $i ?>" aria-controls="dataTable" data-dt-idx="1" tabindex="0" class="page-link"><?php echo $i ?></a>
                    </li>
                <?php } ?>
                    <li class="paginate_button page-item next <?php if($tranghientai == $sotrang) echo "disabled" ?>" id="dataTable_next"><a href="?ql=tintuc/ds&page=<?php echo $trangsau ?>" aria-controls="dataTable" data-dt-idx="7" tabindex="0" class="page-link">Sau</a></li>
                </ul>
            </div>
        </div>
    </div>