<?php 
	include_once('../config/connect.php');
  
  
 ?>

<?php 
 if (!isset($_SESSION['tk'])){
    echo 
            "<script type='text/javascript'>
            window.alert('Bạn không có quyền truy cập.');
            </script>";
      // Chuyển người dùng vào trang quản trị tin tức
    echo 
            "<script type='text/javascript'>
            window.location.href = './dangnhap.php'
            </script>"; 
  }

    $hoatdong = mysqli_num_rows($con->query("SELECT * FROM tbl_hoatdong"));
    $lienhe = mysqli_num_rows($con->query("SELECT * FROM tbl_lienhe"));
    $nguoidung = mysqli_num_rows($con->query("SELECT * FROM tbl_nguoidung"));
    $tintuc= mysqli_num_rows($con-> query("SELECT * FROM tbl_tintuc"));
    $nguoinhan= mysqli_num_rows($con-> query("SELECT * FROM tbl_nguoi_nhan"));
    $result = mysqli_query($con,'SELECT SUM(so_tien) AS value_sum FROM tbl_hoatdong'); 
$row = mysqli_fetch_assoc($result); 
$sum = $row['value_sum'];
    
 ?>
          <!-- Page Heading -->
          <style>
            .card-body a{
              color: #333;
            }
            .card-body a:hover{
              text-decoration: none;
              color: blue;
              transition: 0.5s;
            }
            .image-item a img{
              display: block;
              width: 100%;
            }
            .image-item{
              text-align: center;
              padding-bottom: 10px;
            }

            .text-primary{
              width: 100%;
            }
            .new{
              text-align: right;
              animation: example 2s infinite;
            }

            @keyframes example {
              0%   {color: red;}
              25%  {color: yellow;}
              50%  {color: blue;}
              100% {color: green;}
            }
          </style>
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-red-800" style="text-transform: uppercase; text-align: center;">Thống kê thông tin</h1>
          </div>
          <!-- Content Row -->
          <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        <a href="?ql=hoatdong/ds" style="color: red;" >Thống kê hoạt động</a>
                      </div>
                      <div class="h5 mb-0 font-weight-bold text-red-800"><?php echo $hoatdong ?> lượt ủng hộ</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-red-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        <a href="?ql=lienhe/ds" style="color: green;" >Thống kê liên hệ</a>
                      </div>
                      <div class="h5 mb-0 font-weight-bold text-red-800"><?php echo $lienhe ?> thông tin</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa fa-2x text-red-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                        <a href="?ql=admin/ds" style="color: blue;" >Thống kê người dùng</a>
                      </div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-red-800"><?php echo $nguoidung ?> tài khoản</div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-red-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
              
            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1"><a href="?ql=tintuc/ds" style="color: orange;" >Thống kê tin tức</a></div>
                      <div class="h5 mb-0 font-weight-bold text-red-800"><?php echo $tintuc; ?> tin tức</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-red-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1"><a href="?ql=nguoinhan/ds" style="color: orange;" >Thống kê người nhận</a></div>
                      <div class="h5 mb-0 font-weight-bold text-red-800"><?php echo $nguoinhan; ?> người nhận</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-child fa-2x text-red-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-bottom-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1"><a href=# style="color: orange;" >Thống kê tổng tiền nhận được</a></div>
                      <div class="h5 mb-0 font-weight-bold text-red-800"><?php echo $sum; ?> VND</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-red-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- <div class="col-xl-6 col-md-6 mb-4">
              <div class="card border-bottom-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1"><a href=# style="color: orange;" >Tổng truy cập</a></div>
                      <div class="h5 mb-0 font-weight-bold text-red-800"><?php echo $fr1 ;?> Lượt truy cập</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-eye fa-2x text-red-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>    -->

          </div>
          <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-6 col-lg-6">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Bài viết mới nhất <span class="new">NEW ***</span></h6>
                </div>
                <!-- Card Body -->
                <?php 
                  $sql = "SELECT * FROM tbl_tintuc
                          WHERE id_tintuc = (SELECT MAX(id_tintuc) FROM tbl_tintuc)";
                  $query = $con->query($sql);
                  $row = $query->fetch_assoc();
                 ?>
                <div class="card-body">
                  <div class="chart-area" style="height: 100%;">
                    <div class="post-item">
                      <div class="image-item col-md-12">
                        <a href="?ql=tintuc/sua&id=<?php echo $row['id_tintuc'] ?>"><img style="height: 300px" src="../images/<?php echo $row['anh'] ?>" alt=""></a>
                      </div>
                      <div class="col-md-12 content-item">
                        <h5><a href="?ql=tintuc/sua&id=<?php echo $row['id_tintuc'] ?>"><?php echo $row['tieude'] ?></a></h5>
                        <span><p><?php echo $row['mota'] ?></p></span>
                        <p>Ngày viết : <?php echo date("d-m-Y H:i:s", strtotime($row['ngayviet'])) ?></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-6 col-lg-6">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Danh sách bài viết</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <?php 
                $sql1 = "SELECT * FROM tbl_tintuc ORDER BY id_tintuc DESC LIMIT 6";
                $query1 = $con->query($sql1);
                while ($row1 = $query1->fetch_assoc()) {
                 ?>
                  <div class="danhsachbaiviet">
                    <div class="col-xl-12"><h5><a href="?ql=tintuc/sua&id=<?php echo $row1['id_tintuc'] ?>"><?php echo $row1['tieude'] ?></a></h5></div>
                    <div class="col-xl-12"><p>Ngày viết : <?php echo date("d-m-Y H:i:s", strtotime($row1['ngayviet'])) ?></p></div>
                  </div>
                  <?php } ?>
                  <div class="tintuc" style="text-align: end;"><a href="?ql=tintuc/ds">Xem thêm...</a></div>
                </div>
              </div>
            </div>
          </div>