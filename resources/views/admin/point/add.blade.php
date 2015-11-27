@extends('admin.master')
@section('controller','Point')
@section('action','Add')
@section('content')
<div class="col-lg-7" style="padding-bottom:120px">
    @include('admin.blocks.error')
    <form action="{!! route('admin.point.getAdd') !!}" method="POST">
      <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
      
        <div class="form-group">
            <label>Số báo danh</label>
            <input class="form-control" name="txtsbd" placeholder="Nhập số báo danh thí sinh" />
        </div>
        <div class="form-group">
            <label>Điểm môn 1</label>
            <input class="form-control" name="txtdmon1" placeholder="Nhập điểm môn 1" />
        </div>
        <div class="form-group">
            <label>Điểm môn 2</label>
            <input class="form-control" name="txtdmon2" placeholder="Nhập điểm môn 2" />
        </div>
        <div class="form-group">
            <label>Điểm môn 3</label>
            <input class="form-control" name="txtdmon3" placeholder="Nhập điểm môn 3" />
        </div>
        <div class="form-group">
            <label>Khối thi</label>
            <input class="form-control" name="txtkt" placeholder="Nhập khối thi" />
        </div>
        <button type="submit" class="btn btn-default">Thêm điểm</button>
        <button type="reset" class="btn btn-default">Reset</button>
    <form>
</div>
@endsection()