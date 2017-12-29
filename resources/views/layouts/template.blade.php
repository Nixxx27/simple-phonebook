<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Nikko Zabala Phone Book</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://use.fontawesome.com/541dc58dff.js"></script>
	<link rel="stylesheet" type="text/css" href="{{url('css/style.css')}}">
  @yield('css')
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="{{url('/home')}}" style="color:white;"><i class="fa fa-address-book-o" aria-hidden="true"></i> NZ <span style="color:#E8B335;font-weight: bold">PHONE</span> BOOK</a>
    </div>
    @guest
      <ul class="nav navbar-nav pull-right" style="margin-right:50px;color:white">
    	  <li><a style="color:white" href="{{url('/')}}">Login</a></li>
		{{--<li><a href="{{ route('register') }}">Register</a></li> --}}
    	</ul>
     @else
    <ul class="nav navbar-nav">
      	<li class="active"><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
        <li><a href="{{ url('/logout') }}"  onclick="return confirm('Are you sure you want to Logout?')" ><i class="fa fa-sign-out" aria-hidden="true"></i> Log-Out</a>
        </li>
    </ul>
    @endguest

  </div>
</nav>

	@yield('content')
  @yield('modal')
  <footer style="margin-top:80px">
    <div class="col-md-12"><hr></div>
    <div class="col-md-offset-8 col-md-4">
       <small style="font-size:80%">by: <a href="http://www.nikkozabala.com" target="_blank">Nikko Zabala</a> | email: nikko.zabala@gmail.com | cp: 09175958552</small>
    </div>
  </footer>
</body>
</html>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
