
<html>
  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ url('public/favicon.ico') }}">


    <meta name="generator" content="Bootply" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <title>
    	@section('title')
          Trang chủ
    	@stop
    </title>
    
    <!--[if lt IE 9]>
      <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="{{ url('public/js/html5shiv.min.js') }}"></script>
      <script src="{{ url('public/js/respond.min.js') }}"></script>
    <![endif]-->
    
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="{{ url('public/js/ie10-viewport-bug-workaround.js') }}"></script>
    <!-- Scripts -->
    <script src="{{ url('public/js/jquery.min.js') }}"></script>
    <script src="{{ url('public/js/bootstrap.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/2.0.0/handlebars.js"></script>

    <!-- Bootstrap core CSS -->
    <link href="{{ url('public/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('public/css/bootstrap-theme.min.css') }}" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{ url('public/css/custom.css') }}" rel="stylesheet">
  </head>

  <body>
    <div class ="header">
      <nav class="navbar navbar-default">
          <div class="container-fluid">
              <div class="navbar-header">
                <a class="navbar-brand" href="home">Hệ Thống Tuyển Sinh Đại Học</a>
              </div>
            
              <div >
                <ul class="nav navbar-nav">
                    <li><a href="xem-dt">Tra Cứu Điểm Thi</a></li>
                    <li @if(Request::url() === 'your url here')// code
                        @endif><a href="tuyen-sinh"> Tuyển Sinh Đại Học</a></li>
                    <li class="dropdown">
                      <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" href="#">Quản lý
                        <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        <li><a href="#">Admin</a></li>
                        <li><a href="#">Quản lý cụm</a></li>
                        <li><a href="#">Quản lý trường</a></li> 
                      </ul>
                    </li>
                </ul>
                 <ul class="nav navbar-nav navbar-right">
                  @if (Auth::guest())
                    <li><a href="{{ url('/login') }}"><span class="glyphicon glyphicon-log-in"></span>&nbsp;Đăng Nhập</a></li>
            
                    <script>
                      $(function() {
                        $('#loginModal').modal('show');
                      });
                    </script>
                    @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                          {{ Auth::user()->name }}
                
                      </a></li>
                    <!--<li><a id = "noti_href" href="#">Thông Báo</a></li>

                      <script>
                      $("#noti_href").click(function(){
                         $('#myModal').modal('show');
                      });
                      </script>
                    -->
                   
                    <li><a href="{{ url('/doi-mat-khau') }}"><span class="glyphicon glyphicon-log-in"></span>&nbsp;Đổi Mật Khẩu</a></li>
            
                    <script>
                      $(function() {
                        $('#changePasswdModal').modal('show');
                      });
                      </script>
                    
                    <li><a href="{{ url('/logout') }}">Logout</a></li>     
                    @endif
                  </ul>
              </div>
          </div>
      </nav>

    </div>
    <div class='content'>
      @section('content')

      @show
    </div>
    <div class='change'>
      @section('change')
      @show
    </div>
    
    
    
    <!--@include('notification')

    <div>
           
              @if ($alert = Session::get('success_changePasswd'))
                <div class="alert alert-warning">
                  {{ $alert }}
                </div>
              @endif
        
        

        </div>
    <script type="text/javascript">
     //  setInterval(function(){
     //  );
     // }, 3000);
      
      setInterval(noticeCall, 3000);
      function noticeCall(){
        $.ajax({
          url: "{{url('http://localhost/project/public/api/notification')}}",
          type : "GET",
          
          
          success:function(data){
            console.log(data);
            
            
          }
        });

      }

    </script> -->

    
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
    

  </body>

</html> 