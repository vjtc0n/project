@extends('admin.master')
@section('controller','Point')
@section('action','List')
@section('content')
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr align="center">
            <th>ID</th>
            <th>Số báo danh</th>
            <th>Điểm môn 1</th>
            <th>Điểm môn 2</th>
            <th>Điểm môn 3</th>
            <th>Khối thi</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
        <tr class="odd gradeX" align="center">
            <td>1</td>
            <td>Bk103</td>
            <td>9</td>
            <td>8</td>
            <td>8</td>
            <td>A</td>
            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Delete</a></td>
            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="#">Edit</a></td>
        </tr>
    </tbody>
</table>
@endsection()
