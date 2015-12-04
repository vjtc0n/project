@extends('admin.maxter')
@section('controller','Student')
@section('action','Edit')
@section('content')
<div class="col-lg-7" style="padding-bottom:120px">
    @include('admin.blocks.error')
    <form action="" method="POST">
      <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
      
        <div class="form-group">
            <label>Họ và tên</label>
            <input class="form-control" name="txtten" placeholder="Nhập họ tên thí sinh" value="{!! old('txtten',isset($data) ? $data['ten'] : null) !!}" />
        </div>
        <div class="form-group">
                <label>Giới tính</label>
                <select class="form-control" name="sltGt" value="{!! old('sltGt',isset($data) ? $data['gioitinh'] : null) !!}">
                    <option value="Nam">Nam</option>
                    <option value="Nữ">Nữ</option>
                </select>
            </div>
        <div class="form-group">
            <label>Năm sinh</label>
            <input class="form-control" name="txtns" placeholder="Nhập năm sinh " value="{!! old('txtns',isset($data) ? $data['namsinh'] : null) !!}" />
        </div>
        <div class="form-group">
            <label>Quê quán</label>
            <input class="form-control" name="txtqq" placeholder="Nhập quê quán " value="{!! old('txtqq',isset($data) ? $data['quequan'] : null) !!}" />
        </div>
        <div class="form-group">
            <label>Khu vực</label>
            <input class="form-control" name="txtkv" placeholder="Nhập khu vực" value="{!! old('txtkv',isset($data) ? $data['khuvuc'] : null) !!}" />
        </div>
        <button type="submit" class="btn btn-default">Edit Student</button>
        <button type="reset" class="btn btn-default">Reset</button>
    <form>
</div>
@endsection()