@extends('admin.maxter')
@section('controller','Score')
@section('action','Edit')
@section('content')
<div class="col-lg-7" style="padding-bottom:120px">
    @include('admin.blocks.error')
    <form action="" method="POST">
      <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
      
        <div class="form-group">
            <label>Số báo danh</label>
            <input class="form-control" name="txtsbd" placeholder="Nhập số báo danh thí sinh" value="{!! old('txtsbd',isset($data) ? $data['sbd'] : null) !!}" />
        </div>
        <div class="form-group">
            <label>Điểm môn 1</label>
            <input class="form-control" name="txtdmon1" placeholder="Nhập điểm môn 1" value="{!! old('txtdmon1',isset($data) ? $data['mon1'] : null) !!}" />
        </div>
        <div class="form-group">
            <label>Điểm môn 2</label>
            <input class="form-control" name="txtdmon2" placeholder="Nhập điểm môn 2" value="{!! old('txtdmon2',isset($data) ? $data['mon2'] : null) !!}" />
        </div>
        <div class="form-group">
            <label>Điểm môn 3</label>
            <input class="form-control" name="txtdmon3" placeholder="Nhập điểm môn 3" value="{!! old('txtdmon3',isset($data) ? $data['mon3'] : null) !!}" />
        </div>
        <div class="form-group">
            <label>Khối thi</label>
            <input class="form-control" name="txtkt" placeholder="Nhập khối thi" value="{!! old('txtkt',isset($data) ? $data['khoi'] : null) !!}" />
        </div>
        <button type="submit" class="btn btn-default">Edit</button>
        <button type="reset" class="btn btn-default">Reset</button>
    <form>
</div>
@endsection()