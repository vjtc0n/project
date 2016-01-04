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
          <table class="infor">
            <tr>
              <th width="34%">Thí sinh</th>
              <th width="66%">&nbsp;&nbsp;{{ $student['ten'] }}</th>
            </tr>
            @foreach ($diems as $diem)
            <tr>
              <td>Môn 1</td>
              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $diem['mon1'] }}</td>
            </tr>
            <tr>
              <td>Môn 2</td>
              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $diem['mon2'] }}</td>
            </tr>
            <tr>
              <td>Môn 3</td>
              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $diem['mon3'] }}</td>
            </tr>
            <tr>
              <td>Tổng</td>
              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $diem['mon1'] + $diem['mon2'] + $diem['mon3'] }}</td>
            </tr>
            @endforeach
          </table>
        </div>
        </div>
      <div class=" panel-heading">THÔNG TIN ĐĂNG KÝ</div>
      <div class="panel-body">
        <div class="regi">
        
        @if($checknganh == 0)
        <h4>VUI lÒNG ĐĂNG KÝ</h4>
         <form class="form-inline" role="form" name="dang-ky">
          <input type="hidden" name="_token" value="{{  csrf_token() }}" />
          <input type="text" class="form-control" id="MKDK" name="makhoa" placeholder="Nhập mã khoa">
          <br/>
          <button type="button" id="btn-dang-ky" class="btn btn-primary bttimkiem">Đăng ký</button>
        </form>
        @else
        <h4>BẠN ĐÃ ĐĂNG KÝ</h4>
        <table class="infor">
          <tr>
            <th width="20%">Ngành</th>
            <th width="80%">&nbsp;&nbsp;&nbsp;&nbsp;{{$nganh->tennganh}}</th>
          </tr>
          <tr>
              <td>Điểm</td>
              <td>&nbsp;&nbsp;&nbsp;&nbsp;{{$nganh->diemchuan}}</td>
            </tr>
        </table>
            <button type="button"  class="btn btn-primary bttimkiem"><a href="{{ url('rut-ho-so/'.$dangkis->id)}}" onclick="return xacnhanxoa('Bạn có muốn rút hồ sơ?')">Rút hồ sơ</a>
            </button>
        @endif  
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
        <ul id="dstruong">
          @foreach ($truongs as $truong)
            <li id="{{ $truong['id'] }}">{{ $truong['matr'] }} - {{ $truong['tentr'] }}</li>
          @endforeach
        </ul>
      </div>
    </div>
    <div class="listtruong panel panel-default">
      <div id="scroll_box">
        <ul id="dsnganh">      
        </ul>
      </div>
    </div>


  </div>
</div>

<script>
$(document).ready(function() {
  $("#MT").keyup(function() {
    var keyword = $(this).val();
    var url = "{{ route('tim-truong') }}";
    var _token = "{{ csrf_token() }}"
    $.ajax({
      url: url,
      type: 'POST',
      cache: false,
      data: {"_token": _token, "keyword": keyword},
      success: function(data) {
        var truongs = JSON.parse(data);
        $("#dstruong").empty();
        for (var i = 0; i < truongs.length; i++) {
          $("#dstruong").append('<li id="' + truongs[i].id + '">' + truongs[i].matr + ' - ' + truongs[i].tentr + '</li>');
        }
      }
    });
  });
});

$(document).ready(function(){
    $("#dstruong li").click(function(){
        var truong_id = $(this).attr("id");
        var url = "{{ route('liet-ke-nganh') }}";
        var _token = "{{ csrf_token() }}"
        $.ajax({
          url: url,
          type: 'GET',
          cache: false,
          data: {"_token": _token, "truong_id": truong_id},
          success: function(data) {
            var nganhs = JSON.parse(data);
            $("#dsnganh").empty();
            for (var i = 0; i < nganhs.length; i++) {
              $("#dsnganh").append('<li nganh_id="'+ nganhs[i].id +'">' + nganhs[i].manganh + ' - ' + nganhs[i].tennganh + '</li>');
            }
          }
        });
    });
});

$(document).ready(function() {
  $( "#btn-dang-ky" ).click(function() {
    var _token = $("form[name='dang-ky']").find("input[name='_token']").val();
    var makhoa = $("form[name='dang-ky']").find("input[name='makhoa']").val();
    $.ajax({
      url: "{{ route('dang-ky') }}",
      type : "GET",
      cache: false,
      data: {"_token": _token, "makhoa": makhoa},
      success: function(data){
        alert(data);
      }
    });
  });
});

</script>

@stop