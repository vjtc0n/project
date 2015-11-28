
@extends('base')

@section('content')

    @include('errors')
    
    <form action="" method="post">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
        <div class="form-group">
            <label>Tên ngành</label>
            <input type="text" class="form-control" name="txtTenNganh" placeholder="Hãy nhập tên ngành" autocomplete="off" value="{{ old('txtTenNganh', isset($nganh['tennganh']) ? $nganh['tennganh'] : null) }}" />
        </div>
        <div class="form-group">
            <label>Mã ngành</label>
            <input type="text" class="form-control" name="txtMaNganh" placeholder="Hãy nhập mã ngành" autocomplete="off" value="{{ old('txtMaNganh', isset($nganh['manganh']) ? $nganh['manganh'] : null) }}" />
        </div>
        <div class="form-group">
            <label>Điểm chuẩn</label>
            <input type="text" class="form-control" name="txtDiemChuan" placeholder="Hãy nhập điểm chuẩn" autocomplete="off" value="{{ old('txtDiemChuan', isset($nganh['diemchuan']) ? $nganh['diemchuan'] : null) }}" />
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
        <button type="reset" class="btn btn-default">Reset</button>
    </form>

@endsection
