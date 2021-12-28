@extends('layouts.master')

@section('title', 'Danh sách lớp học')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5><strong>Danh sách lớp học</strong></h5>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <a href="{{ route('admin.class.create') }}"><button class="btn btn-primary"><i class="fas fa-plus-circle"></i> Thêm lớp học</button></a>
            <br>
            {!! Toastr::message() !!}
            <table id="tbl_class" class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>Tên lớp</th>
                        <th>Tên ngành học</th>
                        <th>Sửa</th>
                        <th>Xoá</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($classes as $item)
                        <tr>
                            <td>
                                <a title="Chi tiết lớp học" style="text-decoration: none" href="{{ url('admin/class/detail/' . $item->id_class) }}">{{ $item->name_class }}</a>
                            </td>
                            <td>{{ $item->name_major }}</td>
                            <td>
                                <a title="Cập nhật" style="text-decoration: none" href="{{ url('admin/class/edit/' . $item->id_class) }}"><i class="fas fa-edit"></i> Sửa</a>
                            </td>
                            <td>
                                <a title="Xoá" style="text-decoration: none" href="{{ url('admin/class/delete/' . $item->id_class) }}" onclick="return confirm('Bạn có muốn xoá không ?');"><i class="fas fa-trash-alt" style="color: red"></i> Xoá</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">Danh sách trống</td>
                        </tr>
                    @endforelse 

                </tbody>
            </table>
        </div>
    </div>
    @endsection
