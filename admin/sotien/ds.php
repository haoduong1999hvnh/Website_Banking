
<?php 

$con = mysqli_connect("localhost", "root", "", "banking");

			// 2. Viết câu lệnh SQL để lấy ra dữ liệu mong muốn
			$sql = "
				SELECT *
				FROM tbl_hoatdong
				ORDER BY id_hoatdong DESC
			";

// $result = mysqli_query($con,'SELECT SUM(so_tien) AS value_sum FROM tbl_hoatdong'); 
// $row = mysqli_fetch_assoc($result); 
// $sum = $row['value_sum'];
// echo $sum


$result = mysqli_query($con,'SELECT SUM(so_tien) AS value_sum FROM tbl_hoatdong WHERE ma_nguoi_nhan = 5'); 
$row = mysqli_fetch_assoc($result); 
$sum= $row['value_sum'];
echo $sum

?>
<?php 

$con = mysqli_connect("localhost", "root", "", "banking");

			// 2. Viết câu lệnh SQL để lấy ra dữ liệu mong muốn
			$sql = "
				SELECT *
				FROM tbl_hoatdong
				ORDER BY id_hoatdong DESC
			";

$result = mysqli_query($con,'SELECT SUM(so_tien) AS value_sum FROM tbl_hoatdong'); 
$row = mysqli_fetch_assoc($result); 
$sum = $row['value_sum'];
echo $sum




?>
<?php 

$con = mysqli_connect("localhost", "root", "", "banking");

			// 2. Viết câu lệnh SQL để lấy ra dữ liệu mong muốn
			$sql = "
				SELECT *
				FROM tbl_hoatdong
				ORDER BY id_hoatdong DESC
			";

$result = mysqli_query($con,'SELECT SUM(so_tien) AS value_sum FROM tbl_hoatdong WHERE ma_nguoi_nhan = 6'); 
$row = mysqli_fetch_assoc($result); 
$sum = $row['value_sum'];
echo $sum




?>