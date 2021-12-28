@extends('layouts.master')

@section('title', 'Danh sách phiếu thu')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5><strong>Danh sách phiếu thu</strong></h5>
        </div>
        <div class="card-body">
            <table id="tbl_invoice" class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>Mã hoá đơn</th>
                        <th>Mã sinh viên</th>
                        <th>Tên sinh viên</th>
                        <th>Lớp</th>
                        <th>Ngày đóng tiền</th>
                        <th>Người thu tiền</th>
                        <th>Số tiền</th>
                        <th>Loại thu</th>
                        <th>Đợt</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($invoice as $item)
                        <tr>
                            <td>
                                <a href="{{ url('admin/tuition/detail/'.$item->id_student) }}">{{ $item->id_invoice }}</a>
                            </td>
                            <td>{{ $item->student_code }}</td>
                            <td>{{ $item->name_student }}</td>
                            <td>{{ $item->name_class }}</td>
                            <td>{{ $item->time }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ number_format($item->totalamount, 0, '', '.') }}</td>
                            <td>{{ $item->tolltype }}</td>
                            <td>{{ $item->batch }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9">Chưa có phiếu thu</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>
    @endsection
