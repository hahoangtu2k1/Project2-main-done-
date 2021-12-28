@extends('layouts.master')

@section('title', 'Quản lý sinh viên')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5><strong>Danh sách sinh viên</strong></h5>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div>
                <a style="float: left" href="{{ route('admin.student.create') }}"><button class="btn btn-primary"><i
                            class="fas fa-plus-circle"></i>
                        Thêm sinh viên</button></a>
                {{-- <button style="float: left; margin-left: 10px" type="button" class="btn btn-warning" data-toggle="modal"
                    data-target="#exampleModal" data-whatever="@mdo"><i class="fas fa-upload"></i> Import
                    Excel</button>
                <form action="{{ url('export-csv') }}" method="POST" style="float: left; margin-left: 10px">
                    @csrf
                    <button type="submit" name="export_csv" class="btn btn-success"><i class="fas fa-download"></i> Export
                        Excel</button>
                </form>
            </div>
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Thêm file excel</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ url('import-csv') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <input type="file" class="form-control-file" name="file" accept=".xlsx">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Huỷ</button>
                                    <button type="submit" name="import_csv" class="btn btn-primary">Xác nhận</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div> --}}
            </div>
            <br><br>
            {!! Toastr::message() !!}
            <table id="tbl_student" class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>Mã sinh viên</th>
                        <th>Tên sinh viên</th>
                        <th>Lớp</th>
                        <th>Giới tính</th>
                        <th>Số điện thoại</th>
                        <th>Ngày sinh</th>
                        <th>Địa chỉ</th>
                        <th>Học bổng</th>
                        <th>Sửa</th>
                        <th>Xoá</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($rs as $item)
                        <tr>
                            <td>{{ $item->student_code }}</td>
                            <td>{{ $item->name_student }}</td>
                            <td>{{ $item->name_class }}</td>
                            <td>
                                {{ $item->gender == 0 ? 'Nữ' : 'Nam' }}
                            </td>
                            <td>{{ $item->phone }}</td>
                            <td>{{ $item->dob }}</td>
                            <td>{{ $item->address }}</td>
                            <td>{{ number_format($item->money_hb, 0, '', '.') }}</td>
                            <td>
                                <a style="text-decoration: none"
                                    href="{{ url('admin/student/edit/' . $item->id_student) }}" title="Cập nhật"><i
                                        class="fas fa-edit"></i> Sửa</a>
                            </td>
                            <td>
                                <a style="text-decoration: none"
                                    href="{{ url('admin/student/delete/' . $item->id_student) }}"
                                    onclick="return confirm('Bạn có muốn xoá không ?');" title="Xoá"><i
                                        class="fas fa-trash-alt" style="color: red"></i> Xoá</i></a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="11">Danh sách trống</td>
                        </tr>
                    @endforelse 

                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
