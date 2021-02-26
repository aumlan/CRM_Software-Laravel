<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Client Report</title>
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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
            ['City', 'Count'],
            <?php
            for($i=0; $i<count($clientData); $i++) {
                echo "['".$clientData[$i]['city']."', '".$clientData[$i]['count']."'],";
            }
            ?>
        ]);

        var options = {
          title: 'Clients Origin',
          is3D: true,
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>
</head>

<body>
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center">

            <h1 class="logo mr-auto"><a href="/manager-dashboard">CRM Spot</a></h1>

            <nav class="nav-menu d-none d-lg-block">
                <ul>
                <li><a href="/manager-dashboard">Dashboard</a></li>
            <li class="active"><a href="/manager/clients">Clients</a></li>
            <li><a href="/manager/company">Company</a></li>
            <li><a href="/manager/services">Services</a></li>
            <li><a href="/manager/chat">Chat</a></li>
            <li><a href="/manager/profile">Profile</a></li>
            <li><a href="/manager/signout">Sign Out</a></li>

                </ul>
            </nav><!-- .nav-menu -->
        </div>
    </header><!-- End Header -->



    <main id="main">
        <section>
            <div class="row justify-content-center">
                <div class="col-12 col-xl-10">
                    <div class="text-center">
                        <br><h2><b><i><u>System Clients Current Report</u></i></b></h2>
                        <div class="text-center" id="donutchart" style="margin-left:400px;width: 1000px; height: 500px;"></div>
                        <span class="float-left">Date : {{date("Y-m-d")}}</span><br>
                        <hr>
                    </div>
                    <table id="proposalTable" class="table table-bordered">
                        <tr>
                            <th>Sl. No.</th>
                            <th>Client Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>City</th>
                            <th>Country</th>
                            <th>Website</th>
                            <th>Added on</th>
                            <th>Current Status</th>
                            <th>Billing City</th>
                            <th>Billing Zip Code</th>
                        </tr>
                        @for($i = 0; $i < count($clients); $i++)
                            <tr>
                                <td>{{$i+1}}</td>
                                <td>{{$clients[$i]['full_name']}}</td>
                                <td>{{$clients[$i]['email']}}</td>
                                <td>0{{$clients[$i]['phone']}}</td>
                                <td>{{$clients[$i]['address']}}</td>
                                <td>{{$clients[$i]['city']}}</td>
                                <td>{{$clients[$i]['country']}}</td>
                                <td>{{$clients[$i]['website']}}</td>
                                <td>{{$clients[$i]['adding_date']}}</td>
                                <td>{{$clients[$i]['status']}}</td>
                                <td>{{$clients[$i]['billing_city']}}</td>
                                <td>{{$clients[$i]['billing_zip']}}</td>
                            </tr>
                            @endfor
                    </table>
                    <div class="text-center" id="printBtnID">
                        <button class="btn w-50 btn-success" onclick="printMe('printBtnID','proposalTable');">Print/Download</button>
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
                    Designed by <a href="#">Shohag</a>
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
    <script src="{{asset('js/clientProfile.js')}}"></script>
    <script src="{{asset('js/printProposal.js')}}"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#myTable').DataTable();
        });
    </script>
</body>

</html>