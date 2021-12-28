@extends('layouts.master')

@section('title', 'Danh sách giáo viên')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5><strong>Danh sách giáo viên</strong></h5>
        </div>
        <div class="card-body">
            {!! Toastr::message() !!}
            <a href="{{ url('admin/create') }}"><button class="btn btn-primary"><i class="fas fa-plus-circle"></i> Thêm giáo viên</button></a>
            <br><br>
            <table id="tbl" class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>Họ tên</th>
                        <th>Email</th>
                        <th>Trạng thái</th>
                        {{-- <th>Chức năng</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rs as $item)
                        <tr>
                            @if ($item->level != 1)
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>
                                    @if ($item->is_active == 1)
                                        <i class="fas fa-check-circle" style="color: green"></i>
                                    @endif
                                    @if ($item->is_active == 0)
                                        <i class="fas fa-ban" style="color: red"></i>
                                    @endif
                                </td>
                                {{-- <td>
                                    @if ($item->is_active == 1)
                                        <a onclick="return confirm('Bạn có chắc không ?');"
                                            href="{{ url('admin/destroyAccount/' . $item->id) }}">
                                            <button class="btn btn-danger">
                                                <i class="fas fa-ban"></i>
                                            </button>
                                        </a>
                                    @endif
                                    @if ($item->is_active == 0)
                                        <a onclick="return confirm('Bạn có chắc không ?');"
                                            href="{{ url('admin/acceptAccount/' . $item->id) }}">
                                            <button class="btn btn-primary">
                                                <i class="fas fa-check-circle"></i>
                                            </button>
                                        </a>
                                    @endif
                                </td> --}}
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
