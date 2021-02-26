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
    <style>
        #proposalTable {
            display: none;
        }
    </style>
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
                <div class="col col-xl-2 border rounded border-primary" id="navigationInfo">
                    <div class="border-bottom text-center border-sercondary">
                        <img class="mt-2" src="{{asset('/img/team/team-1.jpg')}}" alt="No Image.." id="client-pro-pic"><br>
                        <label class="mt-4" for="">{{$client['full_name']}}</label><br>
                        <label class="mt-2" for="">Phone: 0{{$client['phone']}}</label><br>
                        <label for="">Email: {{$client['email']}}</label>
                    </div>
                    <div class="border-top border-primary pt-4">
                        <div class="border-top border-primary pt-4">
                            <a class="btn btn-primary btn-block" href="/manager/show-client/{{$client['id']}}"><span class="text-light">Profile</span></a></button><br>
                            <a class="btn btn-warning btn-block" href="/manager/show-client/{{$client['id']}}/calls"><span class="text-light">Calls</span></a></button><br>
                            <a class="btn btn-success btn-block" href="/manager/show-client/{{$client['id']}}/appointments"><span class="text-light">Appoitments</span></a></button><br>
                            <a class="btn btn-danger btn-block" href="/manager/show-client/{{$client['id']}}/notes"><span class="text-light">Notes</span></a></button><br>
                            <a class="btn btn-dark btn-block" href="/manager/show-client/{{$client['id']}}/proposals"><span class="text-light">Proposals</span></a></button><br>
                            <a class="btn btn-info btn-block"href="/manager/chat/{{$client['id']}}"><span class="text-light">Chat</span></a></button><br>
                        </div>
                    </div>
                </div>
                <div class="col col-xl-6">
                    <section id="proposals-section">
                        <div class="row m-0 p-0">
                            <div class="col-7 ">
                            @foreach($errors->all() as $err)
                                <span class="text-danger">*{{$err}}</span><br>
                                @endforeach
                            </div>
                            <div class="col-6 bg-primary  mb-3 pt-3">
                                <h5 class="text-light">Proposals</h5>
                                <span class="text-danger">{{session('msg')}}</span>
                            </div>
                            <div class="col-6 text-right bg-primary  mb-3 pt-3">
                                <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#add-proposal-modal">
                                    Create a New Proposal
                                </button>

                                <!-- Modal -->
                                <form action="/clients/{{$client['id']}}/proposals/add-proposal" method="post">
                                    <div class="modal text-left fade" id="add-proposal-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Add New Proposal</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col">
                                                            @csrf
                                                            <input class="form-control" type="text" placeholder="Title" name="title" value="{{old('title')}}"><br>
                                                            <input class="form-control" type="text" placeholder="Subject" name="subject" value="{{old('subject')}}"><br>
                                                            <input class="form-control" type="text" placeholder="Body" name="body" value="{{old('body')}}"><br>
                                                            <input class="form-control" type="text" placeholder="Customer" name="customer_name" value="{{old('customer_name')}}"><br>
                                                            <input class="form-control" type="date" placeholder="Date" name="starting_date" value="{{old('starting_date')}}"><br>
                                                            <input class="form-control" type="date" placeholder="Deadline Date" name="deadline_date" value="{{old('deadline_date')}}"><br>
                                                            <input class="form-control" type="text" placeholder="Address" name="address" value="{{old('address')}}"><br>
                                                            <input class="form-control" type="text" placeholder="City" name="city" value="{{old('city')}}"><br>
                                                            <input class="form-control" type="text" placeholder="State" name="state" value="{{old('state')}}"><br>
                                                            <input class="form-control" type="text" placeholder="Country" name="country" value="{{old('country')}}"><br>
                                                            <input class="form-control" type="number" placeholder="Zip Code" name="zip_code" value="{{old('zip_code')}}"><br>
                                                            <input class="form-control" type="email" placeholder="Email" name="email" value="{{old('email')}}"><br>
                                                            <input class="form-control" type="number" placeholder="Phone" name="phone" value="{{old('phone')}}"><br>
                                                            <select name="item" class="form-control">
                                                            <option disabled="disabled" selected="selected">Select a service</option>
                                                            @foreach($services as $services)
                                                                <option value="{{$services['name']}}">{{$services['name']}}</option>
                                                            @endforeach
                                                            </select><br>
                                                            <select name="status" class="form-control">
                                                                <option disabled="disabled" selected="selected">Select a status</option>
                                                                <option value="Available">Available</option>
                                                                <option value="Unavailable">Unavailable</option>
                                                            </select><br>
                                                            <input class="form-control" type="number" placeholder="Quantity" name="quantity" value="{{old('quanitity')}}"><br>
                                                            <input class="form-control" type="number"  placeholder="Price Rate Pcs" name="rate" value="{{old('rate')}}"><br>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-success">Add Proposal</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-12">
                                <table id="appointmentsTable" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Subject</th>
                                            <th>Posted Date</th>
                                            <th>Deadline</th>
                                            <th>Item</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    @for($i = 0; $i < count($proposals); $i++) <tbody>
                                        <tr>
                                            <td>{{$proposals[$i]['title']}}</td>
                                            <td>{{$proposals[$i]['subject']}}</td>
                                            <td>{{$proposals[$i]['starting_date']}}</td>
                                            <td>{{$proposals[$i]['deadline_date']}}</td>
                                            <td>{{$proposals[$i]['item']}}</td>
                                            <td>{{$proposals[$i]['status']}}</td>
                                            <td class="text-center">
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-block btn-warning" data-toggle="modal" data-target="#exampleModalCenter">
                                                    Edit
                                                </button><br>

                                                <!-- Modal -->
                                                <form action="/clients/{{$client['id']}}/proposals/edit/{{$proposals[$i]['id']}}" method="post">
                                                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLongTitle">
                                                                        Edit Proposal</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            @csrf
                                                                            <input class="form-control" type="text" placeholder="Title" name="title" value="{{$proposals[$i]['title']}}"> <br>
                                                                            <input class="form-control" type="text" placeholder="Subject" name="subject" value="{{$proposals[$i]['subject']}}"><br>
                                                                            <input class="form-control" type="text" placeholder="Body" name="body" value="{{$proposals[$i]['body']}}"><br>
                                                                            <input class="form-control" type="text" placeholder="Customer" name="customer_name" value="{{$proposals[$i]['customer_name']}}"><br>
                                                                            <input class="form-control" type="date" placeholder="Date" name="starting_date" value="{{$proposals[$i]['starting_date']}}"><br>
                                                                            <input class="form-control" type="date" placeholder="Deadline Date" name="deadline_date" value="{{$proposals[$i]['deadline_date']}}"><br>
                                                                            <input class="form-control" type="text" placeholder="Status" name="status" value="{{$proposals[$i]['status']}}"><br>
                                                                            <input class="form-control" type="text" placeholder="Address" name="address" value="{{$proposals[$i]['address']}}"><br>
                                                                            <input class="form-control" type="text" placeholder="City" name="city" value="{{$proposals[$i]['city']}}"><br>
                                                                            <input class="form-control" type="text" placeholder="State" name="state" value="{{$proposals[$i]['state']}}"><br>
                                                                            <input class="form-control" type="text" placeholder="Country" name="country" value="{{$proposals[$i]['country']}}"><br>
                                                                            <input class="form-control" type="number" placeholder="Zip Code" name="zip_code" value="{{$proposals[$i]['zip_country']}}"><br>
                                                                            <input class="form-control" type="email" placeholder="Email" name="email" value="{{$proposals[$i]['email']}}"><br>
                                                                            <input class="form-control" type="number" placeholder="Phone" name="phone" value="0{{$proposals[$i]['phone']}}"><br>
                                                                            <input class="form-control" type="text" placeholder="Select Item" name="item" value="{{$proposals[$i]['item']}}"><br>
                                                                            <input class="form-control" type="number" placeholder="Quantity" name="quantity" value="{{$proposals[$i]['quantity']}}"><br>
                                                                            <input class="form-control" type="number" placeholder="Price Rate Pcs" name="rate" value="{{$proposals[$i]['rate']}}"><br>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-success">Save
                                                                        changes</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                                <a class="btn btn-block btn-danger" href="/clients/{{$client['id']}}/proposals/delete/{{$proposals[$i]['id']}}">Delete</a>
                                                <a href="/clients/{{$client['id']}}/proposals/{{$proposals[$i]['id']}}" class="btn btn-block btn-primary ">Download PDF/Excel</a>
                                            </td>
                                        </tr>
                                        @endfor
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
        $(document).ready(function() {
            $('#appointmentsTable').DataTable();
        });
        $(function() {
            $('[data-toggle="popover"]').popover()
        });
    </script>
</body>

</html>