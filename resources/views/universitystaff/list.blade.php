
@extends('base')

@section('content')

    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr align="center">
                <th>Tên ngành</th>
                <th>Mã ngành</th>
                <th>Điểm chuẩn</th>
                <th>Xoá</th>
                <th>Sửa</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($nganhs as $nganh)
                <tr class="odd gradeX" align="center">
                    <td>{!! $nganh['tennganh'] !!}</td>
                    <td>{!! $nganh['manganh'] !!}</td>
                    <td>{!! $nganh['diemchuan'] !!}</td>
                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return xacnhanxoa('Bạn có chắc là muốn xoá không?')" href="{!! URL::route('university-staff.xoa-khoa', $nganh['id']) !!}">Delete</a></td>
                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!! URL::route('university-staff.sua-khoa', $nganh['id']) !!}">Edit</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
