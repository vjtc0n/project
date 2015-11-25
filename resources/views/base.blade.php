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
    <style type="text/css">
        #wrapper{margin: 20px 20px 40px 20px;}
        #header {padding-left: 100px;padding-right: 100px;}
        .content    {width:985px;min-height:500px;margin-left: 120px;}
        .content-left {float:left;width:235px;min-height: 500px;padding-bottom: 5px;}
        .content-right  {float:right;width:730px;min-height: 500px;background: #b200ff;}
        .regi {text-align: center;}
    </style>
  </head>

  <body>
    <div id ="wrapper">
    <div id ="header">
      <nav class="navbar navbar-default">
          <div class="container-fluid abc">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">PROJECT-III</a>
            </div>
            
            <div>
                <ul class="nav navbar-nav">
                    <li><a href="#">Tra Cứu Điểm Thi</a></li>
                    <li @if(Request::url() === 'your url here')// code
@endif><a href="tuyen-sinh"> Tuyển Sinh Đại Học</a></li>
                    <li><a href="">Admin</a></li>
                    <!-- <li><a href="#">Quản Lý Nhân Viên Cụm</a></li> -->
                    <li><a href="#">Nhân Viên Cụm</a></li>
                    <li><a href="#">Nhân Viên Trường Đại Học</a></li>          
                </ul>
                 <ul class="nav navbar-nav navbar-right">
                  @if (Auth::guest())
                    <li><a href="{{ url('/login') }}"><span class="glyphicon glyphicon-log-in"></span>&nbsp;Đăng Nhập</a></li>
            
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
            </div>
          </div>
      </nav>
    </div>
    </div>
    <div class='content'>
    @yield('content')
    </div>
		
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