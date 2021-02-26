<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Proposal</title>
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
                <div class="col-12 col-xl-12">
                    <div class="text-center">
                        <br><h2><b><i><u>Proposal Details</u></i></b></h2><br>
                    </div>
                    <table id="proposalTable" class="table table-bordered table-hover">
                        <tr>
                            <th>Title</th>
                            <th>Subject</th>
                            <th>Body</th>
                            <th>Customer Name</th>
                            <th>Proposed By</th>
                            <th>Company</th>
                            <th>Starting Date</th>
                            <th>Deadline</th>
                            <th>Status</th>
                            <th>Address</th>
                            <th>City</th>
                            <th>Country</th>
                            <th>Zip Code</th>
                            <th>Phone</th>
                            <th>Item</th>
                            <th>Quantity</th>
                            <th>Rate</th>
                        </tr>
                            <tr class="">
                                <td>{{$proposal['title']}}</td>
                                <td>{{$proposal['subject']}}</td>
                                <td>{{$proposal['body']}}</td>
                                <td>{{$proposal['customer_name']}}</td>
                                <td>{{$proposal['full_name']}}</td>
                                <td>{{$proposal['company_name']}}</td>
                                <td>{{$proposal['starting_date']}}</td>
                                <td>{{$proposal['deadline_date']}}</td>
                                <td>{{$proposal['address']}}</td>
                                <td>{{$proposal['city']}}</td>
                                <td>{{$proposal['state']}}</td>
                                <td>{{$proposal['country']}}</td>
                                <td>{{$proposal['zip_code']}}</td>
                                <td>0{{$proposal['phone']}}</td></td>
                                <td>{{$proposal['item']}}</td>
                                <td>{{$proposal['quantity']}}</td>
                                <td>{{$proposal['rate']}}</td>
                            </tr>
                    </table>
                    <div class="text-center" id="printBtnID">
                        <button class="btn w-25 btn-success" onclick="printMe('printBtnID','proposalTable');">Print/Download PDF</button>
                        <button id="excelDownloadBtn" class="btn w-25 btn-info">Download Excel File</button>
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
  <script src="{{asset('js/printProposal.js')}}"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="{{asset('js/jquery.table2excel.js')}}"></script>

    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#myTable').DataTable();
        });
    </script>
</body>

</html>