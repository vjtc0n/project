@extends('admin.maxter')
@section('controller','Student')
@section('action','List')
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
            <th>Delete</th>
            <th>Edit Student</th>
            <th>Edit Score</th>
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
                    
                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return xacnhanxoa('Bạn Có Chắc Xóa Thông tin  Không?')" href="{!! URL::route('cluster-staff.quan-ly-thong-tin-thi-sinh.getDeleteStudent',$item['id']) !!}"> Delete</a></td>
                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!! URL::route('cluster-staff.quan-ly-thong-tin-thi-sinh.getEditStudent',$item['id']) !!}">Edit Student</a></td>
                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!! URL::route('cluster-staff.quan-ly-diem-thi.getEditScore',$item['id']) !!}">Edit Score</a></td>
                </tr>
                @endforeach
    </tbody>
</table>
<a href="{!! URL::route('cluster-staff.quan-ly-thong-tin-thi-sinh.getStudent')!!}" class="btn btn-primary">Add Student News</a>
@endsection()
