<!DOCTYPE html>
<html lang="en">
  <head>
    <title>GiveHope &mdash; Website từ thiện Banking Academy</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Overpass:300,400,500|Dosis:400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/ionicons.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/fancybox.min.css">

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">

  </head>
  <body>
    
  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="index.php">GiveHope</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a href="index.php" class="nav-link">Trang chủ</a></li>
          <li class="nav-item"><a href="how-it-works.html" class="nav-link">Cách thức hoạt động</a></li>
          <li class="nav-item"><a href="donate.html" class="nav-link">Ủng Hộ</a></li>
          <li class="nav-item"><a href="gallery.html" class="nav-link">Bộ Sưu Tập</a></li>
          <li class="nav-item active"><a href="blog.html" class="nav-link">Tin tức</a></li>
          <li class="nav-item"><a href="about.html" class="nav-link">Thông tin về Tổ Chức</a></li>
          <li class="nav-item"><a href="contact.html" class="nav-link">Liên Hệ</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- END nav -->
  
  <div class="block-31" style="position: relative;">
    <div class="owl-carousel loop-block-31 ">
      <div class="block-30 block-30-sm item" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-7">
              <h2 class="heading mb-5">Tin tức của chúng tôi</h2>
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </div>
  
  
  <div class="site-section bg-light">
    <div class="container">
      

      <div class="row">
      <?php
                    //1. connect sql
                    include("./config/connect.php");
                    $tongsodong = mysqli_num_rows($con->query("SELECT * FROM tbl_tintuc"));
    $sobaiviet1trang = 6;
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
              <?php
      $stt = $sobaiviet1trang*($tranghientai-1) + 1;
      while ($row = $query->fetch_assoc()) {
      ?>              
        <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0">
          <div class="post-entry">
            <a href="blog_details.php?id=<?php echo $row["id_tintuc"];?>" class="mb-3 img-wrap">
              <img src="./images/<?php echo $row["anh"] ;?>" alt="Image placeholder" class="img-fluid">
            </a>
            <h3><a href="blog_details.php?id=<?php echo $row["id_tintuc"];?>"><?php echo $row["tieude"]  ;?></a></h3>
            <span class="date mb-4 d-block text-muted"><?php echo $row["ngayviet"]  ;?></span>
            <p><?php echo $row["mota"]  ;?></p>
            <p><a href="blog_details.php?id=<?php echo $row["id_tintuc"];?>" class="link-underline">Thông tin thêm</a></p>
          </div>
        </div>
        <?php
          }
        ;?> 
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

                  
        <!-- <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0">
          <div class="post-entry">
            <a href="blog-single.html" class="mb-3 img-wrap">
              <img src="images/img_5.jpg" alt="Image placeholder" class="img-fluid">
            </a>
            <h3><a href="#">Tập thể đến từ thiện Lào Cai</a></h3>
            <span class="date mb-4 d-block text-muted">July 26, 2018</span>
            <p>Những hoạt động ý nghĩa luôn được sẻ chia tại đây</p>
            <p><a href="#" class="link-underline">Thông tin thêm</a></p>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0">
          <div class="post-entry">
            <a href="blog-single.html" class="mb-3 img-wrap">
              <img src="images/img_6.jpg" alt="Image placeholder" class="img-fluid">
            </a>
            <h3><a href="#">Tập thể đến từ thiện Điện Biên</a></h3>
            <span class="date mb-4 d-block text-muted">July 26, 2018</span>
            <p>Những hoạt động ý nghĩa luôn được sẻ chia tại đây</p>
            <p><a href="#" class="link-underline">Thông tin thêm</a></p>
          </div>
        </div>

        <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0">
          <div class="post-entry">
            <a href="blog-single.html" class="mb-3 img-wrap">
              <img src="images/img_4.jpg" alt="Image placeholder" class="img-fluid">
            </a>
            <h3><a href="#">Tập thể đến từ thiện Hà Giang</a></h3>
            <span class="date mb-4 d-block text-muted">July 26, 2018</span>
            <p>Những hoạt động ý nghĩa luôn được sẻ chia tại đây</p>
            <p><a href="#" class="link-underline">Thông tin thêm</a></p>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0">
          <div class="post-entry">
            <a href="blog-single.html" class="mb-3 img-wrap">
              <img src="images/img_5.jpg" alt="Image placeholder" class="img-fluid">
            </a>
            <h3><a href="#">Tập thể đến từ thiện vùng núi Việt Bắc</a></h3>
            <span class="date mb-4 d-block text-muted">July 26, 2018</span>
            <p>Những hoạt động ý nghĩa luôn được sẻ chia tại đây</p>
            <p><a href="#" class="link-underline">Thông tin thêm</a></p>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0">
          <div class="post-entry">
            <a href="blog-single.html" class="mb-3 img-wrap">
              <img src="images/img_6.jpg" alt="Image placeholder" class="img-fluid">
            </a>
            <h3><a href="#">Tập thể đến từ thiện vùng núi Việt Bắc</a></h3>
            <span class="date mb-4 d-block text-muted">July 26, 2018</span>
            <p>Những hoạt động ý nghĩa luôn được sẻ chia tại đây</p>
            <p><a href="#" class="link-underline">Thông tin thêm</a></p>
          </div>
        </div>

        <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0">
          <div class="post-entry">
            <a href="blog-single.html" class="mb-3 img-wrap">
              <img src="images/img_4.jpg" alt="Image placeholder" class="img-fluid">
            </a>
            <h3><a href="#">Tập thể đến từ thiện vùng núi Việt Bắc</a></h3>
            <span class="date mb-4 d-block text-muted">July 26, 2018</span>
            <p>Những hoạt động ý nghĩa luôn được sẻ chia tại đây</p>
            <p><a href="#" class="link-underline">Thông tin thêm</a></p>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0">
          <div class="post-entry">
            <a href="blog-single.html" class="mb-3 img-wrap">
              <img src="images/img_5.jpg" alt="Image placeholder" class="img-fluid">
            </a>
            <h3><a href="#">Tập thể đến từ thiện vùng núi Việt Bắc</a></h3>
            <span class="date mb-4 d-block text-muted">July 26, 2018</span>
            <p>Những hoạt động ý nghĩa luôn được sẻ chia tại đây</p>
            <p><a href="#" class="link-underline">Thông tin thêm</a></p>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0">
          <div class="post-entry">
            <a href="blog-single.html" class="mb-3 img-wrap">
              <img src="images/img_6.jpg" alt="Image placeholder" class="img-fluid">
            </a>
            <h3><a href="#">Tập thể đến từ thiện vùng núi Việt Bắc</a></h3>
            <span class="date mb-4 d-block text-muted">July 26, 2018</span>
            <p>Những hoạt động ý nghĩa luôn được sẻ chia tại đây</p>
            <p><a href="#" class="link-underline">Thông tin thêm</a></p>
          </div>
        </div>
      </div> -->
    </div>
  </div> <!-- .section -->

  <footer class="footer">
    <div class="container">
      <div class="row mb-5">
        <div class="col-md-6 col-lg-4">
          <h3 class="heading-section">Về chúng tôi</h3>
          <p class="lead">Nhóm sinh viên từ thiện Banking Academy </p>
          <p class="mb-5">Nhóm sinh viên từ thiện</p>
          <p><a href="#" class="link-underline">Thông tin thêm</a></p>
        </div>
        <div class="col-md-6 col-lg-4">
          <h3 class="heading-section">Blog gần đây</h3>
          <div class="block-21 d-flex mb-4">
            <figure class="mr-3">
              <img src="images/img_1.jpg" alt="" class="img-fluid">
            </figure>
            <div class="text">
              <h3 class="heading"><a href="#">Lễ trao quà xuân Canh Tý</a></h3>
              <div class="meta">
                <div><a href="#"><span class="icon-calendar"></span> July 29, 2018</a></div>
                <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                <div><a href="#"><span class="icon-chat"></span> 19</a></div>
              </div>
            </div>
          </div>

          <div class="block-21 d-flex mb-4">
            <figure class="mr-3">
              <img src="images/img_2.jpg" alt="" class="img-fluid">
            </figure>
            <div class="text">
              <h3 class="heading"><a href="#">Lê trao quà xuân Canh Tý</a></h3>
              <div class="meta">
                <div><a href="#"><span class="icon-calendar"></span> July 29, 2018</a></div>
                <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                <div><a href="#"><span class="icon-chat"></span> 19</a></div>
              </div>
            </div>
          </div>

          <div class="block-21 d-flex mb-4">
            <figure class="mr-3">
              <img src="images/img_4.jpg" alt="" class="img-fluid">
            </figure>
            <div class="text">
              <h3 class="heading"><a href="#">Hoạt động từ thiện vùng núi hoàn cảnh khó khăn</a></h3>
              <div class="meta">
                <div><a href="#"><span class="icon-calendar"></span> July 29, 2018</a></div>
                <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                <div><a href="#"><span class="icon-chat"></span> 19</a></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="block-23">
            <h3 class="heading-section">Thông tin liên hệ</h3>
              <ul>
                <li><span class="icon icon-map-marker"></span><span class="text">12 Chùa Bộc, Đống Đa, Hà nội</span></li>
                <li><a href="#"><span class="icon icon-phone"></span><span class="text">03287664545</span></a></li>
                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
              </ul>
            </div>
        </div>
        
        
      </div>
      <div class="row pt-5">
        <div class="col-md-12 text-center">
          <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="ion-ios-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
        </div>
      </div>
    </div>
  </footer>

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>

  <script src="js/jquery.fancybox.min.js"></script>
  
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>