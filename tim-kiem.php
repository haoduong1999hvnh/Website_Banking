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
    <link rel="stylesheet" href="https://unpkg.com/ionicons@4.0.0-19/dist/css/ionicons-core.min.css">
    <link rel="stylesheet" href="https://unpkg.com/ionicons@4.0.0-19/dist/css/ionicons.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/fancybox.min.css">

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
<div id="ftco-loader" class="show fullscreen">
    <svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/>
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
                stroke="#F96D00"/>
    </svg>
</div>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="index.php">GiveHope</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto d-flex align-items-center">
                <li class="nav-item active"><a href="index.php" class="nav-link">Trang chủ</a></li>
                <li class="nav-item"><a href="about.php" class="nav-link">Thông tin về Tổ Chức</a></li>
                <li class="nav-item"><a href="how-it-works.php" class="nav-link">Cách thức ủng hộ</a></li>
                <li class="nav-item"><a href="donate.php" class="nav-link">Ủng Hộ</a></li>
                <li class="nav-item"><a href="gallery.php" class="nav-link">Bộ Sưu Tập</a></li>
                <li class="nav-item"><a href="blog.php" class="nav-link">Tin tức</a></li>
                <li class="nav-item"><a href="contact.php" class="nav-link">Liên Hệ</a></li>
                <li class="nav-item">
                    <form action="tim-kiem.php" class="form-timkiem">
                        <div class="d-flex">
                            <input type="text" name="tu-khoa" placeholder="Nhập từ khoá..." class="form-control" value="<?php echo $_GET['tu-khoa']; ?>">
                            <button type="submit" class="btn btn-success">
                                <ion-icon name="search"></ion-icon>
                            </button>
                        </div>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- END nav -->
<div class="block-31 mb-5" style="position: relative;">
    <div class="owl-carousel loop-block-31 ">
        <div class="block-30 block-30-sm item" style="background-image: url('images/bg_1.jpg');"
             data-stellar-background-ratio="0.5">
            <div class="container">
                <div class="row align-items-center justify-content-center text-center">
                    <div class="col-md-7">
                        <h2 class="heading mb-5">Tìm kiếm với từ khoá <?php echo $_GET['tu-khoa']; ?></h2>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<div class="container">
    <div class="row">

        <?php
        include("./config/connect.php");
        $keyWord = $_GET['tu-khoa'];
        $tongsodong = mysqli_num_rows($con->query("SELECT * FROM tbl_tintuc WHERE `tieude` LIKE '%$keyWord%' OR `mota` LIKE '%$keyWord%'  OR `noidung` LIKE '%$keyWord%' "));
        echo '<pre>';
        print_r($tongsodong);
        echo '</pre>';
        $sobaiviet1trang = 6;
        $sotrang = ceil($tongsodong / $sobaiviet1trang);

        if (isset($_GET['page'])) {
            $tranghientai = $_GET['page'];
        } else {
            $tranghientai = 1;
        }
        $trangtruoc = $tranghientai - 1;
        $trangsau = $tranghientai + 1;
        $dongbatdau = $sobaiviet1trang * ($tranghientai - 1);

        $sql = "SELECT * FROM `tbl_tintuc`as tintuc JOIN tbl_loaitintuc as cate
                WHERE tintuc.maloaitintuc=cate.id_loaitintuc
                AND (tintuc.`tieude` LIKE '%$keyWord%' OR tintuc.`mota` LIKE '%$keyWord%'  OR tintuc.`noidung` LIKE '%$keyWord%')
                ORDER BY tintuc.id_tintuc DESC LIMIT $dongbatdau, $sobaiviet1trang";
        $query = $con->query($sql);
        ?>
        <?php
        $stt = $sobaiviet1trang * ($tranghientai - 1) + 1;
        while ($row = $query->fetch_assoc()) :
            ?>
            <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0">
                <div class="post-entry">
                    <a href="blog_details.php?id=<?php echo $row["id_tintuc"]; ?>" class="mb-3 img-wrap">
                        <img src="./images/<?php echo $row["anh"]; ?>" alt="Image placeholder" class="img-fluid">
                    </a>
                    <h3><a href="blog_details.php?id=<?php echo $row["id_tintuc"]; ?>"><?php echo $row["tieude"]; ?></a>
                    </h3>
                    <span class="date mb-4 d-block text-muted"><?php echo $row["ngayviet"]; ?></span>
                    <p><?php echo $row["mota"]; ?></p>
                    <p><a href="blog_details.php?id=<?php echo $row["id_tintuc"]; ?>" class="link-underline">Thông tin
                            thêm</a>
                    </p>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
            <ul class="pagination">
                <li class="paginate_button page-item previous <?php if ($tranghientai == 1) echo "disabled" ?>"
                    id="dataTable_previous"><a href="?ql=tintuc/ds&page=<?php echo $trangtruoc ?>"
                                               aria-controls="dataTable" data-dt-idx="0" tabindex="0" class="page-link">Trước</a>
                </li>
                <?php
                for ($i = 1; $i <= $sotrang; $i++) {
                    ?>
                    <li class="paginate_button page-item <?php if ($i == $tranghientai) echo "active" ?>">
                        <a href="?ql=tintuc/ds&page=<?php echo $i ?>" aria-controls="dataTable" data-dt-idx="1"
                           tabindex="0" class="page-link"><?php echo $i ?></a>
                    </li>
                <?php } ?>
                <li class="paginate_button page-item next <?php if ($tranghientai == $sotrang) echo "disabled" ?>"
                    id="dataTable_next"><a href="?ql=tintuc/ds&page=<?php echo $trangsau ?>" aria-controls="dataTable"
                                           data-dt-idx="7" tabindex="0" class="page-link">Sau</a></li>
            </ul>
        </div>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-6 col-lg-4">
                <h3 class="heading-section">Về chúng tôi</h3>
                <p class="lead">Nhóm sinh viên từ thiện Banking Academy </p>
                <p class="mb-5">Nhóm sinh viên từ thiện</p>
                <p><a href="#" class="link-underline">Tìm hiểu thêm</a></p>
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
                        <li><span class="icon icon-map-marker"></span><span
                                    class="text">12 Chùa Bộc, Đống Đa, Hà nội</span></li>
                        <li><a href="#"><span class="icon icon-phone"></span><span class="text">03287664545</span></a>
                        </li>
                        <li><a href="#"><span class="icon icon-envelope"></span><span
                                        class="text">info@yourdomain.com</span></a></li>
                    </ul>
                </div>
            </div>


        </div>
        <div class="row pt-5">
            <div class="col-md-12 text-center">

                <p>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                    All rights reserved | This template is made with <i class="ion-ios-heart text-danger"
                                                                        aria-hidden="true"></i> by <a
                            href="https://colorlib.com" target="_blank">Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>

            </div>
        </div>
    </div>
</footer>

<!-- loader -->
<div class="hotlinefix">
<span class="phone">        
<p><a href="tel:0989998682"> 0869.646.562</a></p>       
<p><a href="tel:0981789164">0981.789.164</a></p>        
        
</span>
    <div class="circle-hotline">
        <span><img src="https://longhungpc.vn/wp-content/uploads/2021/02/13.png"></span>
    </div>
</div>
<style>
    .hotline-chat {
        position: fixed;
        bottom: -12px;
        right: -9px;
        z-index: 99;
    }

    .circle-hotline-chat {
        height: 50px;
        width: 50px;
        border-radius: 50%;
        background-color: #0080FF;
        -webkit-transition: height .25s ease, width .25s ease;
        transition: height .25s ease, width .25s ease;
        -webkit-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        box-shadow: 1px 1px 8px rgba(0, 0, 0, 0.3);
        margin-top: 3px;
        margin-left: -3px;
    }

    .circle-hotline-chat span {
        margin: 12px;
        display: inline-block;
    }

    .circle-hotline-chat:before,
    .circle-hotline-chat:after {
        content: '';
        display: block;
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        border-radius: 50%;
        border: 1px solid #0080FF;
    }

    .circle-hotline-chat:before {
        -webkit-animation: ripple 2s linear infinite;
        animation: ripple 2s linear infinite;
    }

    .circle-hotline-chat:after {
        -webkit-animation: ripple 2s linear 1s infinite;
        animation: ripple 2s linear 1s infinite;
    }

    .circle-hotline-chat:hover:before,
    .circle-hotline-chat:hover:after {
        -webkit-animation: none;
        animation: none;
    }

    @-webkit-keyframes ripple {
        0% {
            -webkit-transform: scale(1);
        }
        75% {
            -webkit-transform: scale(1.75);
            opacity: 1;
        }
        100% {
            -webkit-transform: scale(2);
            opacity: 0;
        }
    }

    @keyframes ripple {
        0% {
            transform: scale(1);
        }
        75% {
            transform: scale(1.75);
            opacity: 1;
        }
        100% {
            transform: scale(2);
            opacity: 0;
        }
    }

    .circle-hotline-chat img {
        width: 50px;
        max-width: 100%;
        height: auto;
    }

    .hotline-chat .phone {
        font-size: 16px;
        font-weight: bold;
        background: #F00;
        color: white;
        padding: 1px 30px 1px 75px;
        border-radius: 39px;
        left: -25px;
        top: -25px;
        position: absolute;
        box-shadow: 1px 1px 8px rgba(0, 0, 0, 0.4);
    }

    #home-chat .hotline-chat .phone p {
        line-height: 15px;
        margin-top: 8px;
        margin-bottom: 8px;
    }

    #home-chat .hotline-chat .phone p a {
        font-style: inherit;
        color: white;
        text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.2);
        font-size: 14px;
        font-weight: bold;
        text-decoration: none;
    }

    .hotlinefix {
        position: fixed;
        bottom: -12px;
        left: 40px;
        z-index: 99;
    }

    .circle-hotline {
        height: 50px;
        width: 50px;
        border-radius: 50%;
        background-color: #F00;
        -webkit-transition: height .25s ease, width .25s ease;
        transition: height .25s ease, width .25s ease;
        -webkit-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        box-shadow: 1px 1px 8px rgba(0, 0, 0, 0.3);
        margin-top: 3px;
        margin-left: -3px;
    }

    .circle-hotline span {
        margin: 12px;
        display: inline-block;
    }

    .circle-hotline:before,
    .circle-hotline:after {
        content: '';
        display: block;
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        border-radius: 50%;
        border: 1px solid #F00;
    }

    .circle-hotline:before {
        -webkit-animation: ripple 2s linear infinite;
        animation: ripple 2s linear infinite;
    }

    .circle-hotline:after {
        -webkit-animation: ripple 2s linear 1s infinite;
        animation: ripple 2s linear 1s infinite;
    }

    .circle-hotline:hover:before,
    .circle-hotline:hover:after {
        -webkit-animation: none;
        animation: none;
    }

    @-webkit-keyframes ripple {
        0% {
            -webkit-transform: scale(1);
        }
        75% {
            -webkit-transform: scale(1.75);
            opacity: 1;
        }
        100% {
            -webkit-transform: scale(2);
            opacity: 0;
        }
    }

    @keyframes ripple {
        0% {
            transform: scale(1);
        }
        75% {
            transform: scale(1.75);
            opacity: 1;
        }
        100% {
            transform: scale(2);
            opacity: 0;
        }
    }

    .circle-hotline img {
        width: 50px;
        max-width: 100%;
        height: auto;
    }

    .hotlinefix .phone {
        font-size: 14px;
        font-weight: bold;
        background: #FFF;
        color: #F00;
        padding: 1px 30px 1px 75px;
        border-radius: 39px;
        left: -25px;
        top: -25px;
        position: absolute;
        box-shadow: 1px 1px 8px rgba(0, 0, 0, 0.4);
    }

    .hotlinefix .phone p {
        line-height: 15px;
        margin-top: 8px;
        margin-bottom: 8px;
    }

    .hotlinefix .phone p a {
        font-style: inherit;
        color: #F00;
        text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.2);
        font-size: 14px;
        font-weight: bold;
        text-decoration: none;
    }
</style>


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
<script src="https://unpkg.com/ionicons@4.0.0-19/dist/ionicons.js"></script>

<script src="js/aos.js"></script>
<script src="js/jquery.animateNumber.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="js/google-map.js"></script>
<script src="js/main.js"></script>

</body>
</html>