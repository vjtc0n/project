<!DOCTYPE html>
<html>
<head>
	<meta charset ="utf-8">
	<meta http-equiv="X-UA-Compatible" content="TE-edge">
	<title>PHP -
		@section('title')
		master
		@show 
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  	<style>
      .content    {width:970px;min-height:500px;margin-left: 136px;}
      .content-left {float:left;width:235px;min-height: 500px;padding-bottom: 5px;}
      .content-right  {float:right;width:730px;min-height: 500px;background: #b200ff;}
      .regi {text-align: center;}
    </style>
</head>
<body>
	<div id ="wrapper">
		<div id ="header">
			<nav class="navbar navbar-default">
  				<div class="container-fluid">
    				<div class="navbar-header">
      					<a class="navbar-brand" href="#">PROJECT-III</a>
   					</div>
    				<div>
      					<ul class="nav navbar-nav">
                  @section('navbar')
                    <li class="active"><a href="/project/home">Trang chủ</a></li>
                    <li><a href="/project/score">Điểm Thi</a></li>
                    <li><a href="/project/register">Đăng ký tuyển sinh</a></li>
                    <li><a href="#">Hỗ trợ tuyển sinh</a></li>
                  @show     				
      					</ul>
      					<ul class="nav navbar-nav navbar-right">
        					<li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Đăng Nhập</a></li>
      					</ul>
    				</div>
  				</div>
			</nav>
		</div>
		<div class ="content">
      @section('noidung')
      
      @show
			
		</div>
		<div id ="footer"></div>

</body>
</html>