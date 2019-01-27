<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" href="img/favicon.png" type="image/png">
  <title>Business Development Services</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="profile/css/bootstrap.css">
  <link rel="stylesheet" href="profile/vendors/linericon/style.css">
  <link rel="stylesheet" href="profile/css/font-awesome.min.css">
  <link rel="stylesheet" href="profile/vendors/owl-carousel/owl.carousel.min.css">
  <link rel="stylesheet" href="profile/vendors/lightbox/simpleLightbox.css">
  <link rel="stylesheet" href="profile/vendors/nice-select/css/nice-select.css">
  <link rel="stylesheet" href="profile/vendors/animate-css/animate.css">
  <link rel="stylesheet" href="profile/vendors/popup/magnific-popup.css">
  <link rel="stylesheet" href="profile/vendors/flaticon/flaticon.css">
  <!-- main css -->
  <link rel="stylesheet" href="profile/css/style.css">
  <link rel="stylesheet" href="profile/css/responsive.css">
</head>
<body>

  <!--================Header Menu Area =================-->
  <header class="header_area">
    <div class="main_menu">
     <nav class="navbar navbar-expand-lg navbar-light">
       <div class="container box_1620">


        <!-- Brand and toggle get grouped for better mobile display -->
        <!-- <a class="navbar-brand logo_h" href="/"><img src="{{URL::to('profile/img/logo.png')}}" alt=""></a> -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
       </button>

       <?php 
       $c_id = Session::get('c_id');
       ?>

       <!-- Collect the nav links, forms, and other content for toggling -->
       <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
         <ul class="nav navbar-nav menu_nav ml-auto">
          <li class="nav-item active"><a class="nav-link" href="{{URL::to('/')}}">Home</a></li>
          @if($c_id != NULL )
          <li class="nav-item"><a class="nav-link" href="{{URL::to('/services')}}">Order</a></li> 
          <li class="nav-item"><a class="nav-link" href="{{URL::to('/feedback')}}">Feedback</a></li> 
          <li class="nav-item submenu dropdown">
           <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{Session::get('c_name')}}</a>
           <ul class="dropdown-menu">
            <li class="nav-item"><a class="nav-link" href="{{URL::to('/customer-logout')}}">Logout</a></li>
          </ul>
        </li>
        @else
        <li class="nav-item"><a class="nav-link" href="{{URL::to('/contact')}}">Contact</a></li> 
        <li class="nav-item"><a class="nav-link" href="{{URL::to('/login')}}">Login</a></li> 
        <li class="nav-item"><a class="nav-link" href="{{URL::to('/registration')}}">Registration</a></li>
        @endif
      </ul>
    </div> 
  </div>
</nav>
</div>
</header>
<!--================Header Menu Area =================-->


@yield('content')





<!--================Footer Area =================-->
<footer class="footer_area p_120">
 <div class="container">
  <div class="row footer_inner">
   <div class="col-lg-5 col-sm-6">
    <aside class="f_widget ab_widget">
     <div class="f_title">
      <h3>About Me</h3>
    </div>
    <p>Do you want to be even more successful? Learn to love learning and growth. The more effort you put into improving your skills,</p>
    <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
      Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
      <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
    </aside>
  </div>
  <div class="col-lg-5 col-sm-6">
    <aside class="f_widget news_widget">
     <div class="f_title">
      <h3>Newsletter</h3>
    </div>
    <p>Stay updated with our latest trends</p>
    <div id="mc_embed_signup">
      <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="subscribe_form relative">
       <div class="input-group d-flex flex-row">
        <input name="EMAIL" placeholder="Enter email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address '" required="" type="email">
        <button class="btn sub-btn"><span class="lnr lnr-arrow-right"></span></button>		
      </div>				
      <div class="mt-10 info"></div>
    </form>
  </div>
</aside>
</div>
<div class="col-lg-2">
  <aside class="f_widget social_widget">
   <div class="f_title">
    <h3>Follow Me</h3>
  </div>
  <p>Let us be social</p>
  <ul class="list">
    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
    <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
    <li><a href="#"><i class="fa fa-behance"></i></a></li>
  </ul>
</aside>
</div>
</div>
</div>
</footer>
<!--================End Footer Area =================-->






<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="profile/js/jquery-3.3.1.min.js"></script>
<script src="profile/js/popper.js"></script>
<script src="profile/js/bootstrap.min.js"></script>
<script src="profile/js/stellar.js"></script>
<script src="profile/vendors/lightbox/simpleLightbox.min.js"></script>
<script src="profile/vendors/nice-select/js/jquery.nice-select.min.js"></script>
<script src="profile/vendors/isotope/imagesloaded.pkgd.min.js"></script>
<script src="profile/vendors/isotope/isotope.pkgd.min.js"></script>
<script src="profile/vendors/owl-carousel/owl.carousel.min.js"></script>
<script src="profile/vendors/popup/jquery.magnific-popup.min.js"></script>
<script src="profile/js/jquery.ajaxchimp.min.js"></script>
<script src="profile/vendors/counter-up/jquery.waypoints.min.js"></script>
<script src="profile/vendors/counter-up/jquery.counterup.min.js"></script>
<script src="profile/js/mail-script.js"></script>
<script src="profile/js/theme.js"></script>
</body>
</html>