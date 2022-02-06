<?php 
    include_once('../config/connect.php');
    //Xóa bài viết 

    //Hiển thị danh sách chuyên mục
    $sql = "SELECT * FROM tbl_nguoi_nhan";
    $query = $con->query($sql);
    $result = mysqli_query($con,'SELECT SUM(so_tien) AS value_sum FROM tbl_hoatdong WHERE ma_nguoi_nhan = 5'); 
$row = mysqli_fetch_assoc($result); 
$sum= $row['value_sum'];


?>
<style>
    .tacvu{
        width: 0;
    }
</style>
    <div>
        <h5 style="text-align: center;">DANH SÁCH NGƯỜI NHẬN    </h5>
        <div class="table-responsive">
            <table class="table align-items-center table-dark table-flush" style="vertical-align: middle;">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Tên người nhận</th>
                        <th scope="col">Số tiền quyên góp được</th>

                        <th style="text-align: center;" scope="col">Ảnh</th>
                               
                    </tr>
                </thead>
                <tbody>
                    <?php
        $stt = 1;
        while ($row = $query->fetch_assoc()) {
        ?>
                        <tr>
                            <td style="width: 50px;"><?php echo $stt++; ?></td>
                            <td><?php echo $row['ten_nguoi_nhan']; ?></td>   
                            <td><?php echo $sum; ?></td>
                            
                            <td><img style="height: 100px; width: 100px; border-radius: 50%;" src="../images/<?php echo $row['anh'] ?>" alt=""></td>
                            
                        </tr>
                        <?php }; ?>
                </tbody>
            </table>
        </div>
    </div>