<!--<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Bootstrap Login Form</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	</head>
	<body>
	 -->

@extends('base')

@section('content')

<!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" >Login</button>-->
        

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="exampleModalLabel">Login</h4>
      </div>
      <div class="modal-body">
        
        <form id="loginform" class="form col-md-12 center-block" method="post"  action="<?php echo URL::to('/login');?>">

            <div class="form-group">
              <input name="user_input" type="text" class="form-control input-lg" placeholder="Nhập tài khoản">
            </div>
            <div class="form-group">
                <input name="password" type="password" class="form-control input-lg" placeholder="Password">
            </div>
            <div class="form-group">
          <button class="btn btn-primary btn-lg btn-block" id="login">Log In</button>
              
        </div>

        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>


        <div>
              @if ($alert = Session::get('fail'))
                <div class="alert alert-warning">
                  {{ $alert }}
                </div>
              @endif
        </div>

@endsection


<!--	</body>

	</html>
  -->