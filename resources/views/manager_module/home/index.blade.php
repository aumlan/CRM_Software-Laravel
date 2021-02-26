<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Manager Dashboard</title>
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
    
      <nav class="nav-menu d-none d-lg-block">
        <ul>
          @if(true)
            <li class="active"><a href="/manager-dashboard">Home</a></li>
            <li><a href="/manager/clients">Clients</a></li>
            <li><a href="/manager/company">Company</a></li>
            <li><a href="/manager/services">Services</a></li>
            <li><a href="/manager/chat">Chat</a></li>
            <li><a href="/manager/profile">Profile</a></li>
            <li><a href="/manager/signout">Sign Out</a></li>
          @else
            <li><a href="/manager/login">Sign In</a></li>
          @endif

        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

 

  <main id="main">

    <section>
        <div class="row justify-content-center mt-3">
            <div class="col col-xl-8">
              <div class="row justify-content-around">
                
                <div class="col-xl-4 col-md-5">
                  <div class="card bg-primary text-white" >
                      <div class="card-body" ><a class="border-bottom border-light mb-1 text-center text-light  text-decoration-none" href="/manager/clients">Manage Clients</a></div>
                      <div class="card-footer align-items-center justify-content-between"> 
                          <div class="small text-white"><h5 class="mb-5">Total Clients: <span class="h1"><b>{{$totalClients}}</b></span></h5></div>
                          <div class="small text-white"><h5 class="mb-5">Active Clients: <span class="h1"><b>{{$activeClients}}</b></span></h5></div>
                      </div>
                  </div>
                </div>
                <div class="col-xl-4 col-md-5">
                  <div class="card bg-info text-white" >
                      <div class="card-body" ><a class="border-bottom border-light  mb-1 text-center text-light  text-decoration-none" href="/manager/services">Manage Services</a></div>
                      <div class="card-footer align-items-center justify-content-between"> 
                          <div class="small text-white"><h5 class="mb-5">Total Services: <span class="h1"><b>{{$totalServices}}</b></span></h5></div>
                          <div class="small text-white"><h5 class="mb-5">Available Services: <span class="h1"><b>{{$availableServices}}</b></span></h5></div>
                      </div>
                  </div>
                </div>
                <div class="col-xl-4 col-md-3">
                  <div class="card bg-success text-white" >
                      <div class="card-body" ><a href="/manager/transaction" class="border-bottom border-light  mb-1 text-center text-light  text-decoration-none">Manage Transactions</a></div>
                      <div class="card-footer align-items-center justify-content-between"> 
                          <div class="small text-white"><h5 class="mb-5">Total Transactions: <span class="h1"><b>{{$totalTransactions}}</b></span></h5></div>
                          <div class="small text-white"><h6 class="mb-5">Successful Transactions: <span class="h1"><b>{{$totalSuccessfullTransactions}}</b></span></h6></div>
                          <div class="small text-white"><h5 class="mb-5">Pending Transactions: <span class="h1"><b>{{$totalPendingTransactions}}</b></span></h5></div>
                      </div>
                  </div>
                </div>
              
              </div>
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
          Designed by <a href="#">Aumlan</a>
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