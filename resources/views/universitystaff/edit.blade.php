
@extends('base')

@section('content')

    @include('errors')
    
    <form action="" method="post">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
        <div class="form-group">
            <label>Tên ngành</label>
            <input type="text" class="form-control" name="txtTenNganh" placeholder="Hãy nhập tên ngành" autocomplete="off" value="{{ $nganh['tennganh'] }}" />
        </div>
        <div class="form-group">
            <label>Mã ngành</label>
            <input type="text" class="form-control" name="txtMaNganh" placeholder="Hãy nhập mã ngành" autocomplete="off" value="{{ $nganh['manganh'] }}" />
        </div>
        <div class="form-group">
            <label>Điểm chuẩn</label>
            <input type="text" class="form-control" name="txtDiemChuan" placeholder="Hãy nhập điểm chuẩn" autocomplete="off" value="{{ $nganh['diemchuan'] }}" />
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
        <button type="reset" class="btn btn-default">Reset</button>
    </form>

@endsection
