@extends('home.home')
@section('navbar')
   <li ><a href="/project/home">Trang chủ</a></li>
  <li class="active"><a href="/project/score">Điểm Thi</a></li>
  <li ><a href="/project/register">Đăng ký tuyển sinh</a></li>
  <li><a href="#">Hỗ trợ tuyển sinh</a></li>
@stop
@section('noidung')
<div class="form-group">
	<div style="max-width: 240px; "
  	<input type="text" class="form-control" id="usr">
  	</div>
  	<button type="button" class="btn btn-primary">Search</button>
</div>
@stop