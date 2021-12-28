@extends('layouts.master')

@section('title', 'Quản lý ngành học')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5><strong>Danh sách ngành học</strong></h5>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <a href="{{ route('admin.major.create') }}"><button class="btn btn-primary"><i class="fas fa-plus-circle"></i> Thêm ngành học</button></a>
            <br>
            {!! Toastr::message() !!}
            <table id="tbl_major" class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>Tên ngành học</th>
                        <th>Học phí</th>
                        <th>Sửa</th>
                        <th>Xoá</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($rs as $item)
                        <tr>
                            <td>{{ $item->name_major }}</td>
                            <td>{{ number_format($item->money, 0, '', '.') }}</td>
                            <td>
                                <a style="text-decoration: none" href="{{ url('admin/major/edit/' . $item->id) }}" title="Cập nhật"><i class="fas fa-edit"></i> Sửa</a>
                            </td>
                            <td>
                                <a style="text-decoration: none" onclick="return confirm('Bạn có muốn xoá không ?');" href="{{ url('admin/major/delete/' . $item->id) }}" title="Xoá"><i class="fas fa-trash-alt" style="color: red"></i> Xoá</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">Danh sách trống</td>
                        </tr>
                    @endforelse 

                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    @endsection
