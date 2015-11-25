 <!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ url('public/favicon.ico') }}">


    <meta name="generator" content="Bootply" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!--[if lt IE 9]>
      <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <title>@yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ url('public/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ url('public/css/custom.css') }}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="{{ url('public/js/html5shiv.min.js') }}"></script>
      <script src="{{ url('public/js/respond.min.js') }}"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">Hệ Thống Tuyển Sinh Đại Học</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
            <li><a href="#">Tra Cứu Điểm Thi</a></li>
            <li><a href="#">Admin</a></li>
            <!-- <li><a href="#">Quản Lý Nhân Viên Cụm</a></li> -->
            <li><a href="#">Nhân Viên Cụm</a></li>
            <li><a href="#">Nhân Viên Trường Đại Học</a></li>
            <li><a href="#">Tuyển Sinh Đại Học</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            @if (Auth::guest())
            <li><a href="{{ url('/login') }}">Login</a></li>
            
            <script>
              $(function() {
              $('#exampleModal').modal('show');
              });
            </script>
            @else
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                {{ Auth::user()->name }}
                
              </a></li>
              <li><a href="{{ url('/logout') }}">Logout</a></li>

            
            @endif
          </ul>
        </div>
      </div>
    </nav>

    @yield('content')
		
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{ url('public/js/jquery.min.js') }}"></script>
    <script src="{{ url('public/js/bootstrap.min.js') }}"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="{{ url('public/js/ie10-viewport-bug-workaround.js') }}"></script>
    <!-- Scripts -->
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/js/bootstrap.min.js"></script>

  </body>

</html> 