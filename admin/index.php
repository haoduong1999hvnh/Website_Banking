<?php 
  if (!session_start()){
    session_start();
  }
  if(!isset($_SESSION['tk'])){
    header("location:dangnhap.php");
  }
  include_once('../config/connect.php');
  $sql = "SELECT * FROM tbl_nguoidung as t1 JOIN tbl_thanhvien as t2 ON t1.mathanhvien = t2.id_thanhvien";
  $query = $con->query($sql);
  $row = $query->fetch_assoc();
   //print_r($_SESSION['tk']); //biến toàn cục
   ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Trang quản trị web tin tức</title>

  <!-- Custom fonts for this template-->
  <link REL="SHORTCUT ICON" href="../images/logott.ico">
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../index.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-home"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Trang chủ</div>
      </a>

      <!-- Divider --> 
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item <?php if($_GET['ql'] == 'thongke') echo "active" ?>">
        <a class="nav-link" href="?ql=thongke">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Trang quản trị</span></a>
      </li>
      <li class="nav-item <?php if($_GET['ql'] == 'hoatdong/ds' || $_GET['ql'] == '/sua' || $_GET['ql'] == 'hoatdong/them') echo "active" ?>">
        <a class="nav-link" href="?ql=hoatdong/ds">
          <i class="fas fa-fw fa-book-open"></i>
          <span>Hoạt động</span></a>
      </li>
       <li class="nav-item <?php if($_GET['ql'] == 'lienhe/ds' || $_GET['ql'] == 'lienhe/sua' || $_GET['ql'] == 'lienhe/them') echo "active" ?>">
        <a class="nav-link" href="?ql=lienhe/ds">
          <i class="fas fa-fw fa-id-card-alt"></i>
          <span>Liên hệ</span></a>
      </li>
      <li class="nav-item <?php if($_GET['ql'] == 'thanhvien/ds' || $_GET['ql'] == 'thanhvien/sua' || $_GET['ql'] == 'thanhvien/them') echo "active" ?>">
        <a class="nav-link" href="?ql=thanhvien/ds">
          <i class="fas fa-fw fa-users"></i>
          <span>Thành viên</span></a>
      </li>
      <li class="nav-item <?php if($_GET['ql'] == 'admin/them' || $_GET['ql'] == 'admin/ds' || $_GET['ql'] == 'admin/sua') echo "active" ?>">
        <a class="nav-link" href="?ql=admin/ds">
          <i class="fas fa-fw fa-chalkboard-teacher"></i>
          <span>Admin</span></a>
      </li>
      <li class="nav-item <?php if($_GET['ql'] == 'loaitintuc/them' || $_GET['ql'] == 'loaitintuc/ds' || $_GET['ql'] == 'loaitintuc/sua') echo "active" ?>">
        <a class="nav-link" href="?ql=loaitintuc/ds">
          <i class="fas fa-fw fa-book"></i>
          <span>Loại tin tức</span></a>
      </li>
       <li class="nav-item <?php if($_GET['ql'] == 'tintuc/them' || $_GET['ql'] == 'tintuc/ds' || $_GET['ql'] == 'tintuc/sua') echo "active" ?>">
        <a class="nav-link" href="?ql=tintuc/ds">
          <i class="fas fa-fw fa-book-open"></i>
          <span>Tin tức</span></a>
      </li>
      <li class="nav-item <?php if($_GET['ql'] == 'nguoinhan/ds' || $_GET['ql'] == 'nguoinhan/sua' || $_GET['ql'] == 'nguoinhan/them') echo "active" ?>">
        <a class="nav-link" href="?ql=nguoinhan/ds">
          <i class="fas fa-address-card"></i>
          <span>Người nhận</span></a>
      </li>
     <!--  <li class="nav-item <?php if($_GET['ql'] == 'nguoiungho/ds' || $_GET['ql'] == 'nguoiungho/sua' || $_GET['ql'] == 'nguoiungho/them') echo "active" ?>">
        <a class="nav-link" href="?ql=nguoiungho/ds">
          <i class="fas fa-address-card"></i>
          <span>Người ủng hộ</span></a>
      </li> -->
      <li class="nav-item <?php if($_GET['ql'] == 'nguoiungho/ds' || $_GET['ql'] == 'nguoiungho/sua' || $_GET['ql'] == 'nguoiungho/them') echo "active" ?>">
        <a class="nav-link" href="?ql=sotien/ds">
          <i class="fas fa-address-card"></i>
          <span>Quản trị số tiền</span></a>
      </li>
      <li class="nav-item <?php if($_GET['ql'] == 'nguoiungho/ds' || $_GET['ql'] == 'nguoiungho/sua' || $_GET['ql'] == 'nguoiungho/them') echo "active" ?>">
        <a class="nav-link" href="?ql=sotienungho/ds">
          <i class="fas fa-address-card"></i>
          <span>Thống kê số tiền từ các nhà hảo tâm</span></a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <marquee>CHÀO MỪNG BẠN ĐÃ ĐẾN VỚI TRANG QUẢN TRỊ HUY RICHKID
          </marquee>
          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - Messages -->

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['tk']['tenhienthi']; ?></span>
                <img class="img-profile rounded-circle" src="../images/<?php echo $_SESSION['tk']['anh']?>">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="?ql=thanhvien/sua&id=<?php echo $_SESSION['tk']['id_thanhvien']; ?>">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Thông tin
                </a>
                <a class="dropdown-item" href="?ql=admin/sua&id=<?php echo $_SESSION['tk']['id']; ?>">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                    Đổi mật khẩu
                </a>
                <a class="dropdown-item" href="?ql=admin/ds">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Danh sách tài khoản
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Đăng xuất
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->
        <div class="container-fluid">
          <?php 
            if(isset($_GET['ql'])){
              include_once($_GET['ql'].".php");
            }
           ?>
          
        </div>
        <!-- Begin Page Content -->
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="#" target="_blank">HUY QUANG </a></span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Bạn có muốn đăng xuất không?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Click chọn Đăng xuất để thoát !</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy</button>
          <a class="btn btn-primary" href="dangxuat.php">Đăng xuất</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>
</body>

</html>
