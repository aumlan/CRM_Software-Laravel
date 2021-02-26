<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Service Management</title>
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
            <li><a href="/manager/clients">Clients</a></li>
            <li><a href="/manager/company">Company</a></li>
            <li class="active"><a href="/manager/services">Services</a></li>
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
        <div class="col col-lg-8 mt-4">
          <div class="row">
            <div class="col">
              <h4>Service Management</h4>
              <span class="text-danger">{{session('msg')}}</span>
            </div>
            <div class="col text-right">
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                Add New Service
              </button>

              <!-- Modal -->
              <form action="/services/add-service" method="post">
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                  aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Add New Service</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">

                        <h5 class="text-left">Service Details</h5>
                        <div class="form-row">
                          @csrf
                          <input type="text" class="form-control mt-1" placeholder="Service Name" name="name">
                          <input type="text" class="form-control mt-1" placeholder="Type" name="type">
                          <input type="text" class="form-control mt-1" placeholder="Cost" name="cost">
                          <select name="status" class="form-control mt-1">
                            <option value="" disabled="disabled" selected="selected">Select Status</option>
                            <option value="Available">Available</option>
                            <option value="Unavailable">Unavailable</option>
                          </select>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Add Service</button>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col col-xl-8 mt-4">
          <table id="myTable" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th>Service Name</th>
                <th>Type</th>
                <th>Cost</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @for($i = 0; $i < count($services); $i++)
              <tr>
                <td>{{$services[$i]['name']}}</td>
                <td>{{$services[$i]['type']}}</td>
                <td>{{$services[$i]['cost']}}</td>
                <td>{{$services[$i]['status']}}</td>

                <td>
                  <form action="/services/update/{{$services[$i]['id']}}" method="post">
                    <button type="button" class="btn btn-block btn-warning" data-toggle="modal" data-target="#exampleModalCenter2">
                      Edit Service
                    </button>
                  <div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog"
                  aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Edit Service</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <h5 class="text-left">Edit Service Details</h5>
                        <div class="form-row">
                          @csrf
                          <input type="text" class="form-control mt-1" placeholder="Service Name" name="name" value="{{$services[$i]['name']}}">
                          <input type="text" class="form-control mt-1" placeholder="Type" name="type" value="{{$services[$i]['type']}}">
                          <input type="number" class="form-control mt-1" placeholder="Cost" name="cost" value="{{$services[$i]['cost']}}">
                          <select name="status" class="form-control mt-1">
                            <option value="" disabled="disabled" selected="selected">Select Status</option>
                            @if($services[$i]['status'] == "Available")
                            <option value="Available" selected="selected">Available</option>
                            <option value="Unavailable">Unavailable</option>
                            @elseif($services[$i]['status'] == "Unavailable")
                            <option value="Available">Available</option>
                            <option value="Unavailable" selected="selected">Unavailable</option>
                            @endif
                          </select>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Update Service</button>
                      </div>
                    </div>
                  </div>
                </div>
              </form>

                  <a href="/services/delete/{{$services[$i]['id']}}" class="btn btn-block btn-danger">Delete</a>
                </td>
              </tr>
              @endfor
          </table>
        </div>
      </div>
    </section>
  </main>
  <!--=======Footer=======-->
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

  <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>

  <script>
    $(document).ready(function () {
      $('#myTable').DataTable();
    });
  </script>
</body>

</html>