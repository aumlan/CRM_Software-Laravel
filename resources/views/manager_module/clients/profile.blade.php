<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Client Profile</title>
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
            <div class="row mt-4 justify-content-center">
                <div class="col col-xl-2 border rounded border-primary">
                    <div class="border-bottom text-center border-sercondary">
                        <img class="mt-2" src="{{asset('img/team/team-1.jpg')}}" alt="No Image.." id="client-pro-pic"><br>
                        <label class="mt-4" for="">Name: {{$client['full_name']}}</label><br>
                        <label class="mt-2" for="">Phone: 0{{$client['phone']}}</label><br>
                        <label for="">Email: {{$client['email']}}</label>
                    </div>
                    <div class="border-top border-primary pt-4">
                    <a class="btn btn-primary btn-block"href="/manager/show-client/{{$client['id']}}"><span class="text-light">Profile</span></a></button><br>
                        <a class="btn btn-warning btn-block"href="/manager/show-client/{{$client['id']}}/calls"><span class="text-light">Calls</span></a></button><br>
                        <a class="btn btn-success btn-block"href="/manager/show-client/{{$client['id']}}/appointments"><span class="text-light">Appoitments</span></a></button><br>
                        <a class="btn btn-danger btn-block"href="/manager/show-client/{{$client['id']}}/notes"><span class="text-light">Notes</span></a></button><br>
                        <a class="btn btn-dark btn-block"href="/manager/show-client/{{$client['id']}}/proposals"><span class="text-light">Proposals</span></a></button><br>
                        <a class="btn btn-info btn-block"href="/manager/chat/{{$client['id']}}"><span class="text-light">Chat</span></a></button><br>  
                    </div>
                </div>
                <div class="col col-xl-6">
                    <section id="profile-section">
                        <div class="row m-0 p-0">
                            <div class="col-6 bg-primary  mb-3 pt-3">
                                <h5 class="text-light">Profile Details</h5>
                                <span class="text-danger">{{session('msg')}}</span>
                                @foreach($errors->all() as $err)
                                <span class="text-danger">*{{$err}}</span><br>
                                @endforeach
                            </div>
                            <div class="col-6 text-right bg-primary  mb-3 pt-3">
                                <button class="btn btn-success mb-2"><a href="/manager/show-client/{{$client['id']}}/edit" class="text-light">Edit</a></button>
                            </div>
                            <div class="col-12">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td>Name : </td>
                                            <td>{{$client['full_name']}}</td>
                                        </tr>
                                        <tr>
                                            <td>Phone : </td>
                                            <td>0{{$client['phone']}}</td></td>
                                        </tr>
                                        <tr>
                                            <td>Email : </td>
                                            <td>{{$client['email']}}</td></td>
                                        </tr>
                                        <tr>
                                            <td>Address : </td>
                                            <td>{{$client['address']}}</td></td>
                                        </tr>
                                        <tr>
                                            <td>City : </td>
                                            <td>{{$client['city']}}</td></td>
                                        </tr>
                                        <tr>
                                            <td>Country : </td>
                                            <td>{{$client['country']}}</td>
                                        </tr>
                                        <tr>
                                            <td>Website : </td>
                                            <td>{{$client['website']}}</td>
                                        </tr>
                                        <tr>
                                            <td>Billing City : </td>
                                            <td>{{$client['billing_city']}}</td>
                                        </tr>
                                        <tr>
                                            <td>Billing State : </td>
                                            <td>{{$client['billing_state']}}</td>
                                        </tr>
                                        <tr>
                                            <td>Billing Zip Code : </td>
                                            <td>{{$client['billing_zip']}}</td>
                                        </tr>
                                        <tr>
                                            <td>Billing Country : </td>
                                            <td>{{$client['billing_country']}}</td>
                                        </tr>
                                        <tr>
                                            <td>Status : </td>
                                            <td>{{$client['status']}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </section>
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
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#callsTable').DataTable();
            $('#appointmentsTable').DataTable();
            //$('#callsTable').DataTable();
        });
        $(function () {
            $('[data-toggle="popover"]').popover()
        });
    </script>
</body>

</html>