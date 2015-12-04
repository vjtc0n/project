@extends('admin.maxter')
@section('controller','Student')
@section('action','Add')
@section('content')
<div class="col-lg-7" style="padding-bottom:120px">
    @include('admin.blocks.error')
    <form action="{!! route('cluster-staff.quan-ly-thong-tin-thi-sinh.getStudent') !!}" method="POST">
      <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
      
        <div class="form-group">
            <label>Họ và tên</label>
            <input class="form-control" name="txtten" placeholder="Nhập họ tên thí sinh" value="{!! old('txtten') !!}" />
        </div>
        <div class="form-group">
            <label>Số báo danh</label>
            <input class="form-control" name="txtsbd" placeholder="Nhập số báo danh thí sinh" value="{!! old('txtsbd') !!}" />
        </div>
        <div class="form-group">
                <label>Giới tính</label>
                <select class="form-control" name="sltGt" value="{!! old('sltGt') !!}">
                    <option value="Nam">Nam</option>
                    <option value="Nữ">Nữ</option>
                </select>
            </div>
        <div class="form-group">
            <label>Năm sinh</label>
            <input class="form-control" name="txtns" placeholder="Nhập năm sinh " value="{!! old('txtns') !!}" />
        </div>
        <div class="form-group">
            <label>Quê quán</label>
            <input class="form-control" name="txtqq" placeholder="Nhập quê quán " value="{!! old('txtqq') !!}" />
        </div>
        <div class="form-group">
            <label>Khu vực</label>
            <input class="form-control" name="txtkv" placeholder="Nhập khu vực" value="{!! old('txtkv') !!}" />
        </div>
        <div class="form-group">
            <label>Khối thi</label>
            <input class="form-control" name="txtkt" placeholder="Nhập khối thi" value="{!! old('txtkt') !!}" />
        </div>
        <button type="submit" class="btn btn-default">Add Student</button>
        <button type="reset" class="btn btn-default">Reset</button>
    <form>
</div>
@endsection()