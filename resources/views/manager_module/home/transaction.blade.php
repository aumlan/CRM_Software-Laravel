<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Transactions</title>
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
            <li class="active"><a href="/manager-dashboard">Dashboard</a></li>
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
        <div class="col-12 text-center">
          <span class="text-danger">{{session('msg')}}</span><br><br><br>
        </div>
        <div class="col-12 text-center text-success">
          <h3>Subscription Fees Transactions</h3><hr>
        </div>
            <div class="col-5">
            <h3>Transaction History</h3><hr>
              <table class="table table-bordered table-hover">
              <tr>
                <th>Sl. No.</th>
                <th>Transaction ID</th>
                <th>Email</th>
                <th>Date-Time</th>
                <th>Amount</th>
              </tr>
              @for($i=0; $i < count($transactions); $i++)
              <tr>
                <td>{{$i+1}}</td>
                <td>T-00{{$transactions[$i]['id']}}</td>
                <td>{{$transactions[$i]['email']}}</td>
                <td>{{$transactions[$i]['transaction_date']}}</td>
                <td>{{$transactions[$i]['amount']}}</td>
              </tr>
              @endfor
              </table><br>
              <h3>Pending Transactions</h3><hr>
              
              <table class="table table-bordered table-hover">
              <tr>
                <th>Sl. No.</th>
                <th>Transaction ID</th>
                <th>Date-Time</th>
                <th>Amount</th>
                <th>Status</th>
              </tr>
              @for($i=0; $i < count($pendingTransactions); $i++)
              <tr>
              <td>{{$i+1}}</td>
              <td>T-000{{$pendingTransactions[$i]['id']}}</td>
              <td>{{$pendingTransactions[$i]['issue_date']}}</td>
              <td>{{$pendingTransactions[$i]['amount']}} BDT</td>
              <td class="text-success">{{$pendingTransactions[$i]['status']}}</td>
              </tr>
              @endfor
              </table><br>
            </div>
            <div class="col-2">
            <h3>Make a transaction</h3><hr>
              <form action="/transaction/send" method="post" class="text-center">
              @csrf
                <input class="form-control" type="number" name="amount" value="{{old('amount')}}" placeholder="Amount*" required><br>
                <input class="form-control" type="email" name="email" value="{{$manager['email']}}" placeholder="Email*" required><br>
                <input class="form-control" type="password" name="password" value="" placeholder="Password*" required><br>
                <button class="btn btn-success btn-sm w-50" type="submit">Pay Fees</button>
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