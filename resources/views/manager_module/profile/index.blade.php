<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Manager Profile</title>
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
            <li><a href="/manager-dashboard">Dashboard</a></li>
            <li><a href="/manager/clients">Clients</a></li>
            <li><a href="/manager/company">Company</a></li>
            <li><a href="/manager/services">Services</a></li>
            <li><a href="/manager/chat">Chat</a></li>
            <li class="active"><a href="/manager/profile">Profile</a></li>
            <li><a href="/manager/signout">Sign Out</a></li>
        </ul>
      </nav><!-- .nav-menu -->


    </div>
  </header><!-- End Header -->

  <main id="main">
    <section id="manager-profile-section">
      <div class="row justify-content-center">
        <div class="col col-xl-5 mt-3">
          <div id="manager-profile-box">
            <div class="bg-primary text-light pt-3 pb-2 pl-2">
              <div class="row justify-content-between">
                <div class="col-4">
                  <h5 class="text-left">Welcome, {{$manager['full_name']}}</h5>
                </div>
                <div class="col-4 text-right">
                  <a class="btn btn-warning mr-1" href="/manager/profile/{{$manager['id']}}/edit">Edit</a>
                </div>
              </div>
            </div>
            <div class="text-center mt-3 mb-2">
              
            <form class="text-center" method="post" action="/manager/upload-profile-pic" enctype="multipart/form-data">
            @csrf
              <img src="{{asset('uploads/profile-pic/'.$manager['id'].'JPG')}}" alt="No Image.." id="manager-profile-pic"><br><br>
              <input type="file" class="w-50 text-center" name="profile-pic">
              <button type="submit" class="btn btn-success btn-sm">Upload Profile Pic</button>
            </form>
              <span class="text-danger">{{session('msg')}}</span>
            </div>
            <table id="appointmentsTable" class="table table-striped table-bordered" style="width:100%">
              <tbody>
                <tr>
                  <td>Full Name : </td>
                  <td>{{$manager['full_name']}}</td>
                </tr>
                <tr>
                  <td>Company Name : </td>
                  <td>{{$manager['company_name']}}</td>
                </tr>
                <tr>
                  <td>Email : </td>
                  <td>{{$manager['email']}}</td>
                </tr>
                <tr>
                  <td>Phone : </td>
                  <td> 0{{$manager['phone']}}</td>
                </tr>
                <tr>
                  <td>Date of Birth : </td>
                  <td>{{$manager['dob']}}</td>
                </tr>
                <tr>
                  <td>Address : </td>
                  <td>{{$manager['address']}}</td>
                </tr>
                <tr>
                  <td>City : </td>
                  <td>{{$manager['city']}}</td>
                </tr>
                <tr>
                  <td>Joining Date : </td>
                  <td>{{$manager['joining_date']}}</td>
                </tr>
              </tbody>
            </table>
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