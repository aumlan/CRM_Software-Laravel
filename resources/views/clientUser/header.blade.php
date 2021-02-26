<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>CRM Spot</title>
    <meta content="" name="descriptison" />
    <meta content="" name="keywords" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

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
<style>
  #rcorners3 {
    border-radius: 80px 80px 80px 80px;
    background:#e4e6eb;
    padding:9px;
    color: #000000;
    font-size: 15px;
    
  } 
  #rcorners4 {
    border-radius: 80px 80px 80px 80px;
    background: rgb(0, 153, 255);
    padding:9px;
    color: #ffffff;
    
  }
  </style>

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
                    @if(session()->has('username'))
                    <li class="active"><a href="{{route('home.index')}}">Dashboard</a></li>
                    <li><a href="{{route('companylist.index')}}">Company</a></li>
                    <li><a href="{{route('proposal.index')}}">Proposal</a></li>
                    <li><a href="{{route('service.index')}}">Service History</a></li>
                    <li><a href="{{route('profile.index')}}">Profile</a></li>
                    <li><a href="{{route('transaction')}}">Transaction</a></li>
                    <li><a href="/chat">Chat</a></li>
                    <li><a href="{{route('logout.index')}}">Log Out</a></li>
                    @else
                    <li><a href="{{route('login.index')}}">Log In</a></li>
                    @endif
                </ul>
            </nav>
            <!-- .nav-menu -->

            <a href="{{route('registration.index')}}" class="get-started-btn scrollto">Register</a>
        </div>
    </header>
    <!-- End Header -->
</body>