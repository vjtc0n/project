@extends('base')
@section('content')
<div class="content-left">
  <div class="panel panel-default">
      <div class="panel-heading">THÔNG TIN THÍ SINH</div>

      <div class="panel-body">
        <div>
          <table>
            <tr>
              <th>Thí sinh &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
              <td>Phạm Ngọc Hoàn</td>
            </tr>
            <tr>
              <th>Toán</th>
              <td>8</td>
            </tr>
            <tr>
              <th>Lý</th>
              <td>9</td>
            </tr>
            <tr>
              <th>Hóa</th>
              <td>8</td>
            </tr>
              
          </table>
        </div>
        </div>
      <div class="panel-heading">THÔNG TIN ĐĂNG KÝ</div>
      <div class="panel-body">    
        <div class="regi">
        <h4>VUI lÒNG ĐĂNG KÝ</h4>
        <form class="form-inline" role="form">
          <input type="text" class="form-control" id="MKDK" placeholder="Nhập mã khoa">    
          <button type="submit" class="btn btn-default">Đăng ký</button>
        </form>
      </div>
      </div>
        
      
  </div>
  
</div>

<div class="content-right"></div>

@stop