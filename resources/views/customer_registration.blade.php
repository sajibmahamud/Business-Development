<!DOCTYPE html>
<html lang="en">

<head>

  <!-- start: Meta -->
  <meta charset="utf-8">
  <title>Registration</title>
  <meta name="description" content="Metro Admin Template.">
  <meta name="author" content="Łukasz Holeczek">
  <meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <!-- end: Meta -->
  
  <!-- start: Mobile Specific -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- end: Mobile Specific -->
  
  <!-- start: CSS -->
  <link id="bootstrap-style" href="{{asset('backend/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('backend/css/bootstrap-responsive.min.css')}}" rel="stylesheet">
  <link id="base-style" href="{{asset('backend/css/style.css')}}" rel="stylesheet">
  <link id="base-style-responsive" href="{{asset('backend/css/style-responsive.css')}}" rel="stylesheet">
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
  <!-- end: CSS -->

  <!-- start: Favicon -->
  <link rel="shortcut icon" href="{{URL::to('backend/img/favicon.ico')}}">
  <!-- end: Favicon -->
  
  <style type="text/css">
  body { background: url({{URL::to('backend/img/bg-login.jpg')}}) !important; }
</style>

</head>

<body>
  <div class="container-fluid-full">
    <div class="row-fluid">

      <div class="row-fluid">
        <div class="login-box">
          <div class="icons">
            <a href="index.html"><i class="halflings-icon home"></i></a>
            <a href="#"><i class="halflings-icon cog"></i></a>
          </div>

          <!-- session message start -->
          <p class="alert-success" style="font-size: 20px; color: #149278;">
            <?php 
            $message = Session::get('message');
            if ($message) {
              echo $message;
              session::put('message', null);
            }
            ?>
          </p>
          <!-- sesstion message end -->

          <h2 style="text-align: center; font-size: 25px;">Registration</h2>
          <form class="form-horizontal" action="{{url('/customer-registration')}}" method="post">
            {{ csrf_field() }}
            <fieldset>  
              <div class="input-prepend" title="AdminEmail">
                <span class="add-on"><i class="halflings-icon user"></i></span>
                <input class="input-large span10" name="c_name" id="name" type="text" placeholder="Type Name"/>
              </div>
              <div class="input-prepend" title="AdminEmail">
                <span class="add-on"><i class="halflings-icon user"></i></span>
                <input class="input-large span10" name="c_email" id="email" type="email" placeholder="Type Email Address"/>
              </div>
              <div class="clearfix"></div>
              <div class="input-prepend" title="AdminEmail">
                <span class="add-on"><i class="halflings-icon user"></i></span>
                <input class="input-large span10" name="c_phone" id="phone" type="text" placeholder="Type Phone Number"/>
              </div>
              <div class="input-prepend" title="AdminPassword">
                <span class="add-on"><i class="halflings-icon lock"></i></span>
                <input class="input-large span10" name="c_password" id="password" type="password" placeholder="Type Password"/>
              </div>
              

              <div class="button-login">  
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
              <div class="clearfix"></div>
            </form>
            <h2>
              <a href="{{URL::to('/')}}">click here </a> to Cancel.
            </h2> 
            <hr>          
            <h3>
              <a href="{{URL::to('/login')}}">click here</a> to Login.
            </h3>  
          </div><!--/span-->
        </div><!--/row-->


      </div><!--/.fluid-container-->

    </div><!--/fluid-row-->

    <!-- start: JavaScript-->

    <script src="{{asset('backend/js/jquery-1.9.1.min.js')}}"></script>
    <script src="{{asset('backend/js/jquery-migrate-1.0.0.min.js')}}"></script>
    <script src="{{asset('backend/js/jquery-ui-1.10.0.custom.min.js')}}"></script>
    <script src="{{asset('backend/js/modernizr.js')}}"></script>
    <script src="{{asset('backend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('backend/js/jquery.cookie.js')}}"></script>
    <script src="{{asset('backend/js/fullcalendar.min.js')}}"></script>
    <script src="{{asset('backend/js/excanvas.js')}}"></script>
    <script src="{{asset('backend/js/jquery.uniform.min.js')}}"></script>
    <script src="{{asset('backend/js/custom.js')}}"></script>
    <!-- end: JavaScript-->

  </body>

  </html>
