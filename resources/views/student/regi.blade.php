@extends('base')
@section('title')
  Tuyển sinh đại học
@stop
@section('content')
<div class="content-left">
  <div class="panel panel-default">
      <div class="panel-heading">THÔNG TIN THÍ SINH</div>
      <div class="panel-body">
        <div>
          <table>
            <tr>
              <th width="40%">Thí sinh</th>
              <th width="60%">{{ $student['ten'] }}</th>
            </tr>
            @foreach ($diems as $diem)
              <tr>
                <td>Môn 1</td>
                <td>{{ $diem['mon1'] }}</td>
              </tr>
              <tr>
                <td>Môn 2</td>
                <td>{{ $diem['mon2'] }}</td>
              </tr>
              <tr>
                <td>Môn 3</td>
                <td>{{ $diem['mon3'] }}</td>
              </tr>
              <tr>
                <td>Tổng</td>
                <td>{{ $diem['mon1'] + $diem['mon2'] + $diem['mon3'] }}</td>
              </tr>
            @endforeach
          </table>
        </div>
        </div>
      <div class=" panel-heading">THÔNG TIN ĐĂNG KÝ</div>
      <div class="panel-body">    
        <div class="regi">
        <h4>VUI lÒNG ĐĂNG KÝ</h4>
        <form class="form-inline" role="form">
          <input type="text" class="form-control" id="MKDK" placeholder="Nhập mã khoa">    
          <button type="submit" class="btn btn-default bttimkiem">Đăng ký</button>
        </form>
      </div>
      </div>            
  </div>
</div>
<div class="content-right">
  <div class="panel panel-default">
    <div class="panel-heading menutong">
      <h4 class="menuleft">Chọn trường</h4>
      <input type="text" class="form-control menuright" id="MT" placeholder="Nhập tên trường hoặc mã trường vào đây">
    </div>
  </div>
  <div>
    <div class="listtruong panel panel-default">
      <div id="scroll_box">
        <ul>
          @foreach ($truongs as $truong)
            <li><a href="">{{ $truong['matr'] }}-{{ $truong['tentr'] }}</a></li>
          @endforeach
        </ul>
      </div>
    </div>
    <div class="sxtruong">
      <h4>Sắp xếp trường theo</h4>
      <select class="form-control" id="sel2">
        <option>-- Sắp xếp theo--</option>
        <option>Tên trường theo thứ tự ABC</option>
        <option>Mã trường theo thứ tự ABC</option>
      </select>
    </div>
  </div>
</div>

@stop