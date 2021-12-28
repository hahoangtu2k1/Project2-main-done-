@extends('layouts.master')

@section('title', 'Chi tiết lớp học')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5><strong>Chi tiết lớp: {{$name->name_class}}</strong></h5>
        </div>
        <div class="card-body">
            <table id="tbl_class" class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Lớp</th>
                        <th>Mã sinh viên</th>
                        <th>Tên sinh viên</th>
                        <th>Giới tính</th>
                        <th>Số điện thoại</th>
                        <th>Ngày sinh</th>
                        <th>Địa chỉ</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($detail as $item)
                        <tr>
                            <td>{{ $item->id_student }}</td>
                            <td>{{ $item->name_class }}</td>
                            <td>{{ $item->student_code }}</td>
                            <td>{{ $item->name_student }}</td>
                            <td>{{ $item->gender==0?'Nữ':'Nam'}}</td>
                            <td>{{ $item->phone }}</td>
                            <td>{{ $item->dob }}</td>
                            <td>{{ $item->address }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">Danh sách trống</td>
                        </tr>
                    @endforelse 

                </tbody>
            </table>
        </div>
    </div>
    @endsection
