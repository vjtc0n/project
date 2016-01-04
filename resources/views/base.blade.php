
<html>
  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ url('public/favicon.ico') }}">


    <meta name="generator" content="Bootply" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <title>
    	@section('title')
          Trang chủ
    	@stop
    </title>
    
    <!--[if lt IE 9]>
      <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="{{ url('public/js/html5shiv.min.js') }}"></script>
      <script src="{{ url('public/js/respond.min.js') }}"></script>
    <![endif]-->
    
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="{{ url('public/js/ie10-viewport-bug-workaround.js') }}"></script>
    <!-- Scripts -->
    <script src="{{ url('public/js/jquery.min.js') }}"></script>
    <script src="{{ url('public/js/bootstrap.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/2.0.0/handlebars.js"></script>

    <!-- Bootstrap core CSS -->
    <link href="{{ url('public/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('public/css/bootstrap-theme.min.css') }}" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{ url('public/css/custom.css') }}" rel="stylesheet">
    <script src="{{ url('public/js/myscript.js') }}"></script>
  </head>

  <body>
    <div class ="header">
      <nav class="navbar navbar-default">
          <div class="container-fluid">
              <div class="navbar-header">
                <a class="navbar-brand" href="{{ url('/') }}">Hệ Thống Tuyển Sinh Đại Học</a>
              </div>
            
              <div >
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/xem-dt') }}">Tra Cứu Điểm Thi</a></li>
                    @if (!Auth::guest())
                    <?php
                      $pid = App\PermissionUser::where('user_id', Auth::user()->id)->get()->first()->permission_id;
                      $slug = App\Permission::where('id', $pid)->get()->first()->slug;
                    ?>
                    @if($slug == 'student')
                    <li @if(Request::url() === 'your url here')// code
                        @endif><a href="{{ url('/tuyen-sinh') }}"> Tuyển Sinh Đại Học</a></li>                
                    @else
                        <li class="dropdown">
                          <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" href="#">Quản lý
                            <span class="caret"></span></a>
                          <ul class="dropdown-menu">
                            @if ($slug == 'admin')
                              <li><a href="{{ url('/admin/taoTaiKhoanQuanLyNhanVienCum') }}">tạo tài khoản QLNV cụm</a></li>
                            @elseif ($slug == 'clusterstaffmanager')
                              <li><a href="{{ url('/cluster-staff-manager/taoTaiKhoanNhanVienCum') }}">tạo tài khoản NV cụm</a></li>
                              <li><a href="{{ url('/cluster-staff-manager/taoTaiKhoanNhanVienTruong') }}">tạo tài khoản NV trường</a></li>
                            @elseif ($slug == 'universitystaff')
                              <li><a href="{{ url('/university-staff') }}">Danh sách</a></li>
                              <li><a href="{{ url('/university-staff/them-khoa') }}">Thêm khoa</a></li>
                            @else
                              <li><a href="{{ url('/cluster-staff/quan-ly-thong-tin-thi-sinh/list') }}">Danh sách học sinh</a></li>
                            @endif
                          </ul>
                        </li>
                      @endif
                    @endif
                </ul>
                 <ul class="nav navbar-nav navbar-right">
                  @if (Auth::guest())
                    <li><a href="{{ url('/login') }}"><span class="glyphicon glyphicon-log-in"></span>&nbsp;Đăng Nhập</a></li>
            
                    <script>
                      $(function() {
                        $('#loginModal').modal('show');
                      });
                    </script>
                    @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                          {{ Auth::user()->name }}
                
                      </a></li>
                    <!--<li><a id = "noti_href" href="#">Thông Báo</a></li>

                      <script>
                      $("#noti_href").click(function(){
                         $('#myModal').modal('show');
                      });
                      </script>
                    -->
                   
                    <li><a href="{{ url('/doi-mat-khau') }}"><span class="glyphicon glyphicon-log-in"></span>&nbsp;Đổi Mật Khẩu</a></li>
            
                    <script>
                      $(function() {
                        $('#changePasswdModal').modal('show');
                      });
                      </script>
                    
                    <li><a href="{{ url('/logout') }}">Logout</a></li>     
                    @endif
                  </ul>
              </div>
          </div>
      </nav>

    </div>
    <div class='content'>
      @section('content')
 
      <div id="section1">    
        <p class="head">Quy chế đăng ký tuyển sinh 2016</p>
        <p class="headone">1. Công bố thông tin liên quan tới từng đợt xét tuyển</p>
        <p>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Trước mỗi đợt xét tuyển, các trường thông báo công khai trên trang thông tin
          điện tử các nội dung sau:<br>
          <p class="contentin">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;a) Chỉ tiêu của các ngành hoặc nhóm ngành (gọi chung là ngành) đối với đợt xét tuyển đó;<br/>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;b) Tổ hợp các môn thi dùng để xét tuyển vào từng ngành. Trường hợp sử dụng nhiều tổ hợp môn
              thi để xét tuyển cho một ngành, trường cần quy định rõ cách thức xét tuyển đối với từng tổ hợp.
               Lưu ý: đối với những ngành trường đã tuyển sinh từ năm 2014 trở về trước phải dành ít nhất 75% 
               chỉ tiêu để xét tuyển theo khối thi truyền thống (khối thi áp dụng từ năm 2014 trở về trước);<br/>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;c) Cách thức xử lý khi các thí sinh có cùng điểm xét tuyển; các điều kiện bổ sung (nếu có);<br/>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;d) Điểm xét tuyển của trường hoặc từng ngành. Điểm xét tuyển không được thấp hơn ngưỡng đảm bảo 
            chất lượng đầu vào do Bộ GDĐT quy định và đảm bảo yêu cầu: điểm xét tuyển đợt xét tuyển sau không 
            được thấp hơn điểm trúng tuyển đợt xét tuyển trước.  
          </p>
        </p>
        <p class="headone">2. Quy trình, hồ sơ đăng ký xét tuyển </p>
        <p class="headone">a) Xét tuyển nguyện vọng I</p>
        <p>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp; Thí sinh đăng nhập vào hệ thống. Nếu đăng nhập thành công, hệ thống sẽ hiển thị chức năng đăng ký
          tuyển sinh đại học. Thí sinh click vào chức năng đó và tiến hành đăng ký<br/>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp; Thí sinh chỉ được đăng ký 1 khoa,ngành mà mình mong muốn <br/>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp; Trong thời gian 20 ngày xét tuyển nguyện vọng I, nếu cần thí sinh có thể
          điều chỉnh nguyện vọng đã đăng ký ở trường đó hoặc rút hồ sơ để đăng ký sang
          trường khác; <br/>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp; Thí sinh đã trúng tuyển nguyện vọng I, không được đăng ký ở các đợt xét
          tuyển nguyện vọng bổ sung.
        </p>
        <p class="headone">b) Xét tuyển nguyện vọng bổ sung</p>
        <p>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp; Thí sinh có thể dùng đồng thời 3 giấy chứng nhận kết quả thi dùng cho xét
          tuyển nguyện vọng bổ sung để đăng ký tối đa vào 3 trường và trong mỗi trường 
          được đăng ký tối đa 4 nguyện vọng xếp theo thứ tự ưu tiên từ 1 đến 4;<br/>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp; Các nguyện vọng (từ 1 đến 4 trong một trường) của thí sinh có giá trị xét
          tuyển như nhau. Thí sinh trúng tuyển nguyện vọng trước thì không được xét tiếp
          các nguyện vọng sau;<br/>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp; Trong thời gian của từng đợt xét tuyển nguyện vọng bổ sung, thí sinh
          không được rút hồ sơ. Sau mỗi đợt xét tuyển, nếu không trúng tuyển, thí sinh
          được rút hồ sơ để đăng ký xét tuyển trong đợt xét tuyển nguyện vọng bổ sung tiếp theo;<br/>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp; Thí sinh đã trúng tuyển vào trường, không được tham gia xét tuyển ở đợt
          xét tuyển nguyện vọng bổ sung tiếp theo.
        </p>
        <p class="headone">c) Xác định điểm trúng tuyển</p>
        <p>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Các trường căn cứ vào chỉ tiêu tuyển sinh đã xác định, sau khi trừ số thí sinh
          được tuyển thẳng (kể cả số học sinh dự bị của trường và học sinh các trường Dự
          bị đại học được phân về trường); căn cứ vào quy định về khung điểm ưu tiên và
          vùng tuyển; căn cứ vào kết quả phân tích việc đáp ứng nguyện vọng đăng ký của
          thí sinh vào các ngành của trường do máy tính cung cấp, Ban thư ký trình Hội
          đồng tuyển sinh trường xem xét quyết định phương án điểm trúng tuyển.
        </p>
        <p class="headone">d) Cập nhật dữ liệu ĐKXT và công khai danh sách các thí sinh ĐKXT vào trường</p>
         <p>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp; Ít nhất mỗi ngày một lần, các trường cập nhật thông tin ĐKXT (bao gồm
          danh sách các thí sinh ĐKXT và danh sách các thí sinh rút hồ sơ ĐKXT) vào hệ
          thống quản lý dữ liệu tuyển sinh quốc gia và nhận dữ liệu của thí sinh từ hệ thống
          để xét tuyển; <br/>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp; Trong thời gian nhận hồ sơ của một đợt xét tuyển, ba ngày một lần các
          trường công bố trên trang thông tin điện tử của mình danh sách các thí sinh đã
          đăng ký xét tuyển vào trường theo từng ngành và xếp theo kết quả thi từ cao đến
          thấp (theo mẫu quy định tại Phụ lục IV);<br/>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp; Khuyến khích các trường công bố kết quả trúng tuyển tạm thời cập nhật
          đến ngày công bố.
        </p>
      </div>
      @show
    </div>
    <div class='change'>
      @section('change')
      @show
    </div>
    <div class="footer">
      <hr>
      <p class="footer1">
        BÀI THỰC HÀNH ĐỒ ÁN 3
      </p>
      <p class="footer1">
        SINH VIÊN ĐẠI HỌC BÁCH KHOA HÀ NỘI
      </p>
      <p class="footer1">
        BÂY GIỜ LÀ {{$now =date('d-m-Y H:i') }}
      </p>

    </div>
    
    
    <!--@include('notification')

    <div>
           
              @if ($alert = Session::get('success_changePasswd'))
                <div class="alert alert-warning">
                  {{ $alert }}
                </div>
              @endif
        
        

        </div>
    <script type="text/javascript">
     //  setInterval(function(){
     //  );
     // }, 3000);
      
      setInterval(noticeCall, 3000);
      function noticeCall(){
        $.ajax({
          url: "{{url('http://localhost/project/public/api/notification')}}",
          type : "GET",
          
          
          success:function(data){
            console.log(data);
            
            
          }
        });

      }

    </script> -->

    
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
    

  </body>

</html> 