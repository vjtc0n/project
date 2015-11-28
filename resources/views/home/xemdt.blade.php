@extends('base')
@section('title')
  Tra cứu điểm thi
@stop
@section('content')
	<div class="content-left">
  <div class="panel panel-default">   
      <div class="panel-heading">TRA CỨU ĐIỂM THI</div>
      <div class="panel-body">    
        <div class="regi">
        <h4>NHẬP SỐ BÁO DANH</h4>
        <form class="form-inline" role="form" action="{{ route('tra-diem') }}" method="POST" name="tra-diem">
          <input type="hidden" name="_token" value="{{  csrf_token() }}" />
          <input type="text" class="form-control" id="MKDK" name="txtSdb" placeholder="Nhập SBD">
          <button type="button" id="btn-tra-diem" class="btn btn-primary bttimkiem">Tra Cứu</button>
        </form>
      </div>
      </div>
      
  </div>
  
</div>

<div class="content-right">
  <div id="diem">
  
  </div>
</div>

<script>
$(document).ready(function() {
  $( "#btn-tra-diem" ).click(function() {
    var _token = $("form[name='tra-diem']").find("input[name='_token']").val();
    var txtSbd = $("form[name='tra-diem']").find("input[name='txtSdb']").val();
    $.ajax({
      url: "{{ route('tra-diem') }}",
      type : "GET",
      cache: false,
      data: {"_token": _token, "txtSbd": txtSbd},
      success:function(data){
        var diems = JSON.parse(data);
        $("#diem").empty();
        for (var i = 0; i < diems.length; i++) {
          $("#diem").append("<p>");
          $("#diem").append("<b>Tên: " + diems[i].ten + "</b>");
          $("#diem").append("<br>");
          $("#diem").append("Khối thi: " + diems[i].khoi);
          $("#diem").append("<br>");
          $("#diem").append("Môn 1: " + diems[i].mon1);
          $("#diem").append("<br>");
          $("#diem").append("Môn 2: " + diems[i].mon2);
          $("#diem").append("<br>");
          $("#diem").append("Môn 3: " + diems[i].mon3);
          $("#diem").append("</p>");
        }
      }
    });
  });
});

</script>

@stop