@extends('layouts.master')

@section('title', 'Chi tiết phiếu thu')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5><strong>Chi tiết phiếu thu</strong></h5>
        </div>
        <div class="card-body">
            <table class="table table-borderless text-center">
                @foreach ($rs as $item)
                   <tr>
                        <th width = "200px">Họ tên</th>
                        <td style="text-align:left">{{$item->name_student}}</td>
                    </tr>
                    <tr>
                        <th width = "200px">Ngày sinh</th>
                        <td style="text-align:left">{{ $item->dob }}</td>
                    </tr>
                    <tr>
                        <th width = "200px">Lớp</th>
                        <td style="text-align:left">{{ $item->name_class }}</td>
                    </tr>
                    <tr>
                        <th width = "200px">Số tiền</th>
                        <td style="text-align:left">{{ number_format($item->totalamount, 0, '', '.') }}</td>
                    </tr>
                    <tr>
                        <th width = "200px">Loại thu</th>
                        <td style="text-align:left">{{ $item->tolltype }}</td>
                    </tr>
                    <tr>
                        <th width = "200px">Thời gian nộp</th>
                        <td style="text-align:left">{{ $item->time }}</td>
                    </tr>
                    <tr>
                        <th width = "200px">Đợt</th>
                        <td style="text-align:left">{{ $item->batch }}</td>
                    </tr>
                    <tr>
                        <th width = "200px">Người thu tiền</th>
                        <td style="text-align:left">{{ $item->name }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
