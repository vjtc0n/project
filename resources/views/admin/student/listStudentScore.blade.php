@extends('admin.maxter')
@section('controller','Student Score')
@section('action','ListStudentScore')
@section('content')
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr align="center">
            <th>STT</th>
            <th>Họ và tên</th>
            <th>Giới tính</th>
            <th>Năm Sinh</th>
            <th>Quê quán</th>
            <th>Khu vực</th>
            <th>Số báo danh</th>
            <th>Điểm môn 1</th>
            <th>Điểm môn 2</th>
            <th>Điểm môn 3</th>
            <th>Khối thi</th>
        </tr>
    </thead>
    <tbody>
              <?php $stt = 0; ?>
                @foreach($data as $item)
                <?php $stt = $stt + 1 ?>
                 <tr class="odd gradeX" align="center">
                    <td>{!! $stt !!}</td>
                    <td>{!! $item['ten']!!}</td>
                    <td>{!! $item['gioitinh']!!}</td>
                    <td>{!! $item['namsinh']!!}</td>
                    <td>{!! $item['quequan']!!}</td>
                    <td>{!! $item['khuvuc']!!}</td>
                    <td>{!! $item['sbd']!!}</td>
                    <td>{!! $item['mon1']!!}</td>
                    <td>{!! $item['mon2']!!}</td>
                    <td>{!! $item['mon3']!!}</td>
                    <td>{!! $item['khoi']!!}</td>
                </tr>
                @endforeach   

                
    </tbody>
</table>

@endsection()
