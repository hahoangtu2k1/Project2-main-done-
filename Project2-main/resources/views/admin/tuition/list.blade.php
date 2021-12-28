@extends('layouts.master')

@section('title', 'Quản lý học phí')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5><strong>Quản lý học phí</strong></h5>
        </div>
        <div class="card-body">
            <a href="{{ url('admin/tuition/wave') }}"><button class="btn btn-primary"><i class="fas fa-arrow-up"></i> Tăng đợt</button></a>
            <br><br>
            {!! Toastr::message() !!}
            <table id="tbl_tuition" class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>Mã sinh viên</th>
                        <th>Tên sinh viên</th>
                        <th>Lớp</th>
                        <th>Đợt hiện tại</th>
                        <th>Số đợt đã đóng</th>
                        <th>Loại thu</th>
                        <th>Thu tiền</th>
                        <th>Phiếu thu</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($list as $item)
                        <tr>
                            <td>{{ $item->student_code }}</td>
                            <td>{{ $item->name_student }}</td>
                            <td>{{ $item->name_class }}</td>
                            <td>Đợt {{ $item->currentbatch }}</td>
                            <td>{{ $item->number_payment }}</td>
                            <td>{{ $item->tolltype }}</td>
                            <td>
                                @if ($item->number_payment >= $item->currentbatch)
                                    <i class="fas fa-check-circle"></i> Đã đóng
                                @endif
                                @if ($item->number_payment < $item->currentbatch)
                                    <a style="text-decoration: none" title="Thu học phí" href="{{ url('admin/tuition/collect-tuition/' . $item->id_student) }}"><i class="fas fa-money-bill-alt"></i> Thu tiền</a>
                                @endif
                            </td>
                            <td>
                                <a href="{{ url('admin/tuition/list-invoice/' . $item->id_student) }}" title="Xem phiếu thu" style="text-decoration: none"><i class="fas fa-eye"></i> Xem phiếu thu</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9">Danh sách trống</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
