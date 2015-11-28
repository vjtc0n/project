
@extends('base')

@section('content')

    @include('errors')
    
    <form action="" method="post">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
        <div class="form-group">
            <label>Tài khoản</label>
            <input type="text" class="form-control" name="txtUsername" placeholder="Please Enter Username" autocomplete="off" value="{{ old('txtUsername') }}" />
        </div>
        <div class="form-group">
            <label>Tên tài khoản</label>
            <input type="text" class="form-control" name="txtName" placeholder="Please Enter Name" autocomplete="off" value="{{ old('txtName') }}" />
        </div>
        <div class="form-group">
            <label>Mật khẩu</label>
            <input type="password" class="form-control" name="txtPassword" placeholder="Please Enter Password" autocomplete="off" />
        </div>
        <div class="form-group">
            <label>Nhập lại mật khẩu</label>
            <input type="password" class="form-control" name="txtRepassword" placeholder="Please ReEnter Password" autocomplete="off" />
        </div>
        <button type="submit" class="btn btn-primary">Add</button>
        <button type="reset" class="btn btn-default">Reset</button>
    </form>

@endsection
