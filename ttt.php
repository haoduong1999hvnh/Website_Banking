<?php 
$ket_noi = mysqli_connect("localhost", "root", "", "banking");
	$hoten = $_POST['hoten'];
    date_default_timezone_set("ASIA/HO_CHI_MINH");
    $ngaygui = date("Y/m/d h:i:s");
    $email = $_POST['email'];
    $noidung = $_POST['noidung'];
    
      $sql = "INSERT INTO `tbl_lienhe`(`hoten`, `email`, `noidung`, `ngaygui`) VALUES ('$hoten','$email','$noidung','$ngaygui')";
	  mysqli_query($ket_noi, $sql);

	// 5. Thông báo việc thêm mới tin tức thành công & quay trở lại trang quản lý tin tức
		// Thông báo cho người dùng biết bài viết đã được thêm mới thành công
		echo 
		"
			<script type='text/javascript'>
				window.alert('Bạn đã gửi liên hệ  thành công.');
			</script>
		";

		// Chuyển người dùng vào trang quản trị tin tức
		echo 
		"
			<script type='text/javascript'>
				window.location.href = './index.php'
			</script>
		";
?>