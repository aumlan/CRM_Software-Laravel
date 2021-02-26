<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Manager Sign Up</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">
  
  <link href="{{asset('img/favicon.png')}}" rel="icon">
  <link href="{{asset('img/apple-touch-icon.png')}}" rel="apple-touch-icon">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('/vendor/icofont/icofont.min.css')}}" rel="stylesheet">
  <link href="{{asset('vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('vendor/venobox/venobox.css')}}" rel="stylesheet">
  <link href="{{asset('vendor/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
  <link href="{{asset('vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('css/style.css')}}" rel="stylesheet">
</head>

<body>
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
      <h1 class="logo mr-auto"><a href="/manager-dashboard">CRM Spot</a></h1>
      <a href="#about" class="get-started-btn scrollto">Get Started</a>
    </div>
  </header><!-- End Header -->

  <main id="main">
    <section>
        <div class="row justify-content-center">
            <div class="col col-sm-7 col-lg-5 col-xl-3 text-center" id="login-box">
                <h2>Sign Up</h2>
                <h5 class="text-danger"><i><b>{{session('msg')}}</b></i></h5><br>
                @foreach($errors->all() as $err)
                <span class="text-danger">*{{$err}}</span><br>
                @endforeach
                <form method="post" action="/manager/signup">
                @csrf
                <input class="form-control"type="text" placeholder="Full Name" value="{{ old('full_name') }}" name="full_name"><br>
                <input class="form-control"type="text" placeholder="User Name" value="{{ old('user_name') }}" name="user_name"><br>
                <input class="form-control"type="email" placeholder="Email" value="{{ old('email') }}" name="email"><br>
                <input class="form-control"type="number" placeholder="Phone" value="{{ old('phone') }}" name="phone"><br>
                <input class="form-control"type="date" placeholder="Date of Birth" value="{{ old('dob') }}" name="dob"><br>
                <input class="form-control"type="text" placeholder="Address" value="{{ old('address') }}" name="address"><br>
                <input class="form-control"type="text" placeholder="City" value="{{ old('city') }}" name="city"><br>
                <input class="form-control"type="text" placeholder="Country" value="{{ old('country') }}" name="country"><br>
                <input class="form-control"type="text" placeholder="Company Name" value="{{ old('company_name') }}" name="company_name"><br>
                <input class="form-control"type="password" placeholder="Password" name="password"><br>
                <input class="form-control"type="password" placeholder="Re-enter Password" name="confirm_password"><br>
                <br><button class="form-control btn btn-primary">Sign Up</button><br><br>
                <a href="/manager/login">Want to sign in?</a><br><br>
                </form>
            </div>
        </div>
    </section>
  </main>

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container d-md-flex py-4">
      <div class="mr-md-auto text-center text-md-left">
        <div class="copyright">
          &copy; Copyright <strong><span>CRM Spot</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          Designed by <a href="#">APWT G7</a>
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer>
  <a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>
  <div id="preloader"></div>
  <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('vendor/jquery.easing/jquery.easing.min.js')}}"></script>
  <script src="{{asset('vendor/php-email-form/validate.js')}}"></script>
  <script src="{{asset('vendor/waypoints/jquery.waypoints.min.js')}}"></script>
  <script src="{{asset('vendor/counterup/counterup.min.js')}}"></script>
  <script src="{{asset('vendor/venobox/venobox.min.js')}}"></script>
  <script src="{{asset('vendor/owl.carousel/owl.carousel.min.js')}}"></script>
  <script src="{{asset('vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('vendor/aos/aos.js')}}"></script>
  <script src="{{asset('js/main.js')}}"></script>
</body>

</html>