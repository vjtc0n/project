
  @extends('base')
  @section('change')


    <div class="modal fade" id="changePasswdModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="exampleModalLabel">Change Your Password</h4>
      </div>
      
        
        <form id="changepasswd-form" class="form col-md-12 center-block" method="post"  action="<?php echo URL::to('/doi-mat-khau');?>">
            <br />
            <div class="form-group  @if ($errors->has('input_password')) has-error @endif" >
              <input name="input_password" type="password" class="form-control input-lg" placeholder="Nhập mật khẩu mới">
              @if ($errors->has('input_password')) <p class="help-block">{{ $errors->first('input_password') }}</p> @endif
            </div>

            <div class="form-group  @if ($errors->has('re_password')) has-error @endif">
                <input name="re_password" type="password" class="form-control input-lg" placeholder="Vui lòng nhập lại mật khẩu mới">
                @if ($errors->has('re_password')) <p class="help-block">{{ $errors->first('re_password') }}</p> @endif
            </div>
            <div class="form-group ">
          <button class="btn btn-primary btn-lg btn-block" id="changepasswd">Chấp nhận</button>
              
        </div>

        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        </form>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
      </div>
      <div>
            <ul>
            @foreach($errors->all() as $error)
            <li>
              {!!$error!!}
            </li>
            @endforeach
          </ul> 
        </div>
              
    </div>
        
    </div>
  </div>
</div>

@endsection

  