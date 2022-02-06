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
          <li class="nav-item "><a href="how-it-works.php" class="nav-link">Cách thức hoạt động</a></li>
          <li class="nav-item"><a href="donate.php" class="nav-link">Ủng Hộ</a></li>
          <li class="nav-item"><a href="gallery.php" class="nav-link">Bộ Sưu Tập</a></li>
          <li class="nav-item active"><a href="blog.php" class="nav-link">Tin tức</a></li>
          <li class="nav-item"><a href="about.php" class="nav-link">Thông tin về Tổ Chức</a></li>
          <li class="nav-item"><a href="contact.php" class="nav-link">Liên Hệ</a></li>
          <li class="nav-item">
              <form action="tim-kiem.php">
                  <div class="d-flex">
                      <input type="text">
                      <button type="submit" class="btn btn-success"><ion-icon name="search-circle-outline"></ion-icon></button>
                  </div>
              </form>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- END nav -->
   <?php


// 0. Lấy dữ liệu mã ID tin tức để thực hiện câu lệnh truy vấn
$id_nguoi_nhan = $_GET["id"];

// 1. Chuỗi kết nối đến CSDL
$ket_noi = mysqli_connect("localhost", "root", "", "banking");
mysqli_set_charset($ket_noi, 'UTF8');
if (mysqli_connect_errno()) 
{
echo 'Failed to connect to Mysql : '.$mysqli_connect_errno();
}

// 2. Viết câu lệnh SQL để lấy ra dữ liệu mong muốn
$sql = "
    SELECT *
    FROM tbl_nguoi_nhan
    WHERE id_nguoi_nhan='".$id_nguoi_nhan."'
";
// Hướng dẫn check câu lệnh truy vấn viết đúng hay sai
// var_dump($sql); exit();

// 3. Thực hiện truy vấn để lấy ra các dữ liệu mong muốn
$mo_ta = mysqli_query($ket_noi, $sql);

// 4. Hiển thị dữ liệu mong muốn
while ($row = mysqli_fetch_array($mo_ta)) {
;?>
  
  <div class="block-31" style="position: relative;">
    <div class="owl-carousel loop-block-31 ">
      <div class="block-30 block-30-sm item" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-12">
              
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </div>
  
  
  <div id="blog" class="site-section">
    <div class="container">
           
            <div class="row">

              <div class="col-md-8">

                <p class="mb-4"><img src="./images/<?php echo $row["anh"] ;?>" alt="" class="img-fluid"></p>
                        <?php echo $row["mo_ta"]  ;?>
                <div class="tag-widget post-tag-container mb-5 mt-5">
                  <?php
          } 
        ;?> 
                  <div class="tagcloud">
                    <a href="#" class="tag-cloud-link">Charities</a>
                    <a href="#" class="tag-cloud-link">Donation</a>
                    <a href="#" class="tag-cloud-link">Child</a>
                    <a href="#" class="tag-cloud-link">School</a>
                  </div>
                </div>


                <div class="pt-5 mt-5">
                 <!--  <h3 class="mb-5">6 Comments</h3>
                  <ul class="comment-list"> -->
                   <!--  <li class="comment">
                      <div class="vcard bio">
                        <img src="images/person_1.jpg" alt="Image placeholder">
                      </div>
                      <div class="comment-body">
                        <h3>Jean Doe</h3>
                        <div class="meta">January 9, 2018 at 2:21pm</div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                        <p><a href="#" class="reply">Reply</a></p>
                      </div>
                    </li> -->

                  <!--   <li class="comment">
                      <div class="vcard bio">
                        <img src="images/person_1.jpg" alt="Image placeholder">
                      </div>
                      <div class="comment-body">
                        <h3>Jean Doe</h3>
                        <div class="meta">January 9, 2018 at 2:21pm</div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                        <p><a href="#" class="reply">Reply</a></p>
                      </div>

                      <ul class="children">
                        <li class="comment">
                          <div class="vcard bio">
                            <img src="images/person_1.jpg" alt="Image placeholder">
                          </div>
                          <div class="comment-body">
                            <h3>Jean Doe</h3>
                            <div class="meta">January 9, 2018 at 2:21pm</div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                            <p><a href="#" class="reply">Reply</a></p>
                          </div>
 -->

                         <!--  <ul class="children">
                            <li class="comment">
                              <div class="vcard bio">
                                <img src="images/person_1.jpg" alt="Image placeholder">
                              </div>
                              <div class="comment-body">
                                <h3>Jean Doe</h3>
                                <div class="meta">January 9, 2018 at 2:21pm</div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                                <p><a href="#" class="reply">Reply</a></p>
                              </div> -->

                                <!-- <ul class="children">
                                  <li class="comment">
                                    <div class="vcard bio">
                                      <img src="images/person_1.jpg" alt="Image placeholder">
                                    </div>
                                    <div class="comment-body">
                                      <h3>Jean Doe</h3>
                                      <div class="meta">January 9, 2018 at 2:21pm</div>
                                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                                      <p><a href="#" class="reply">Reply</a></p>
                                    </div>
                                  </li>
                                </ul> -->
                            </li>
                          </ul>
                        </li>
                      </ul>
                    </li>

                   <!--  <li class="comment">
                      <div class="vcard bio">
                        <img src="images/person_1.jpg" alt="Image placeholder">
                      </div>
                      <div class="comment-body">
                        <h3>Jean Doe</h3>
                        <div class="meta">January 9, 2018 at 2:21pm</div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                        <p><a href="#" class="reply">Reply</a></p>
                      </div>
                    </li> -->
                  </ul>
                  <!-- END comment-list -->
                  
                  <div class="comment-form-wrap pt-5">
                    <h3 class="mb-5">Leave a Comment</h3>
                    <form action="ttt.php" class="" method="Post">
                      <div class="form-group">
                        <label for="name">Name *</label>
                        <input type="text" class="form-control" name="hoten">
                      </div>
                      <div class="form-group">
                        <label for="email">Email *</label>
                        <input type="email" class="form-control" name="email">
                      </div>
                      <!-- <div class="form-group">
                        <label for="website">Website</label>
                        <input type="url" class="form-control" id="website">
                      </div> -->

                      <div class="form-group">
                        <label for="message">Message</label>
                        <textarea name="noidung" id="message" cols="30" rows="10" class="form-control"></textarea>
                      </div>
                      <div class="form-group">
                        <input type="submit" value="Post Comment" class="btn py-3 px-4 btn-primary">
                      </div>

                    </form>
                  </div>
                </div>

              </div> <!-- .col-md-8 -->
              <div class="col-md-4 sidebar">
                <div class="sidebar-box">
                  <form action="#" class="search-form">
                    <div class="form-group">
                      <span class="icon fa fa-search"></span>
                      <input type="text" class="form-control" placeholder="Type a keyword and hit enter">
                    </div>
                  </form>
                </div>
                <div class="sidebar-box">
                  <!-- <div class="categories">
                    <h3>Categories</h3>
                    <li><a href="#">Charity <span>(12)</span></a></li>
                    <li><a href="#">Donations <span>(22)</span></a></li>
                    <li><a href="#">News <span>(37)</span></a></li>
                    <li><a href="#">Updates <span>(42)</span></a></li>
                  </div> -->
                </div>
                <div class="sidebar-box">
                  <img src="images/person_1.jpg" alt="Image placeholder" class="img-fluid mb-4 rounded">
                  <h3>About The Author</h3>
                  <p>Đặng Quỳnh Trang!</p>
                  <p><a href="#" class="btn btn-primary btn-lg">Read More</a></p>
                </div>

                <div class="sidebar-box">
                  <h3>Tag Cloud</h3>
                  <div class="tagcloud">
                    <a href="#" class="tag-cloud-link">Charities</a>
                    <a href="#" class="tag-cloud-link">Missionary</a>
                    <a href="#" class="tag-cloud-link">School</a>
                    <a href="#" class="tag-cloud-link">Donation</a>
                    <a href="#" class="tag-cloud-link">Children</a>
                    <a href="#" class="tag-cloud-link">Africa</a>
                    
                  </div>
                </div>

                <div class="sidebar-box">
                  <h3>Paragraph</h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
                </div>
              </div>

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
          <p><a href="#" class="link-underline">Read  More</a></p>
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