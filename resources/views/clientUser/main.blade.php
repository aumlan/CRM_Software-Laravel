<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>CRM Spot</title>
    <meta content="" name="descriptison" />
    <meta content="" name="keywords" />

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

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" type="text/css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body onload="clientBodyLoader();">
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center">
            <h1 class="logo mr-auto"><a href="/home">CRM Spot</a></h1>

            <!-- <form
        method="post"
        class="input-group mr-auto md-form form-sm form-1 pl-0"
        style="width: 40%"
      >
        <input
          class="form-control my-0 py-1"
          name="searchInput"
          type="text"
          placeholder="...search company"
          aria-label="Search"
        />
        <input
          class="btn btn-primary"
          type="submit"
          name="search"
          value="Search"
        />
      </form> -->

            <nav class="nav-menu d-none d-lg-block">
                <ul>

                    <li class="active"><a href="/client">Dashboard</a></li>
                    <li><a href="/companylist">Company</a></li>
                    <li><a href="/proposallist">Proposal</a></li>
                    <li><a href="/servicelist">Service History</a></li>
                    <li><a href="/client/profile">Profile</a></li>
                    <li><a href="/chat">Chat</a></li>
                    <li><a href="/logout">Sign Out</a></li>
                </ul>
            </nav>
            <!-- .nav-menu -->

            <a href="/registration" class="get-started-btn scrollto">Get Started</a>
        </div>
    </header>
    <!-- End Header -->
</body>

<div>
<main id="main">

</main>

</div>

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

<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('js/clientProfile.js')}}"></script>

<script>
    function printFile(a, e) {
        var restorePage = document.body.innerHTML;
        document.getElementById(a).style.display = 'none';
        var printContent = document.getElementById(e);
        window.print();
        document.getElementById(a).style.display = 'block';
        document.body.innerHTML = restorePage;
    }
</script>

<script>
    $(document).ready(function() {
        $("#companyTable").DataTable();
        $("#servicesTable").DataTable();
        $("#appointmentsTable").DataTable();
        $("#notesTable").DataTable();
        $("#proposalsTable").DataTable();
    });
    $(function() {
        $('[data-toggle="popover"]').popover();
    });
</script>

<!-- <script>
  $(document).ready(function(){
  setInterval(function(){
  $("#messaging").load('messaging')
  }, 2000);
  });
</script> -->

<script>
    const goBtn = document.getElementById("btn1");
    goBtn.addEventListener("click", (e) => {
        e.preventDefault();

        let text1 = document.getElementById("text1").value;

        $.ajax({
            type: "POST",
            url: window.location.pathname,
            contentType: "application/json",
            data: JSON.stringify({
                text: text1
            }),
            success: (data) => {
                document.getElementById("loaddiv").innerHTML = data;
            }
        });
    });
</script>


</html>