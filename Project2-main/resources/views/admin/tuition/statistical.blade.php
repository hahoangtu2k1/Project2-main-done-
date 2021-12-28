@extends('layouts.master')

@section('title', 'Thống kê')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5><strong>Thống kê học phí</strong></h5>
        </div>
        <div class="card-body">
            <table id="tbl_statistical" class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>Mã sinh viên</th>
                        <th>Tên sinh viên</th>
                        <th>Lớp</th>
                        <th>Loại thu</th>
                        <th>Đợt hiện tại</th>
                        <th>Số đợt đã đóng</th>
                        <th>Tình trạng</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($batch as $item)
                        <tr id="tr2">
                            @if ($item->number_payment >= $item->currentbatch)
                            <script>
                                document.getElementById("tr2").style.display = "none";
                            </script>
                            @endif
                            
                            <td>{{ $item->student_code }}</td>
                            <td>{{ $item->name_student }}</td>
                            <td>{{ $item->name_class }}</td>
                            <td>{{ $item->tolltype }}</td>
                            <td>{{ $item->currentbatch }}</td>
                            <td>{{ $item->number_payment }}</td>
                            <td>
                                {{-- @if ($item->number_payment >= $item->currentbatch)
                                <p style="color: blue">Đã nộp đủ</p>
                                 @endif --}}
                                @php
                                    $loai = $item->id_type;
                                    $dothientai = $item->currentbatch;
                                    $dotdadong = $item->number_payment;
                                    if ($loai == 1 && $dotdadong < $dothientai) {
                                        echo 'Nợ ' . $dothientai - $dotdadong . ' tháng';
                                    }
                                    if ($loai == 2 && $dothientai - $dotdadong <= 5 && $dotdadong < $dothientai) {
                                        echo 'Nợ 1 kỳ';
                                    } 
                                    elseif ($loai == 2 && $dothientai - $dotdadong > 5 && $dothientai - $dotdadong <= 10 && $dotdadong < $dothientai){
                                        echo 'Nợ 2 kỳ';
                                    }
                                     elseif ($loai == 2 && $dothientai - $dotdadong > 10 && $dothientai - $dotdadong <= 15 && $dotdadong < $dothientai) {
                                        echo 'Nợ 3 kỳ'; 
                                    }
                                    elseif ($loai == 2 && $dothientai - $dotdadong > 15 && $dothientai - $dotdadong <= 20 && $dotdadong < $dothientai){
                                        echo 'Nợ 4 kỳ'; 
                                    }
                                    elseif ($loai == 2 && $dothientai - $dotdadong > 20 && $dothientai - $dotdadong <= 25 && $dotdadong < $dothientai) {
                                        echo 'Nợ 5 kỳ'; 
                                    }
                                    elseif ($loai == 2 && $dothientai - $dotdadong > 25 && $dothientai - $dotdadong < 30 && $dotdadong < $dothientai) {
                                        echo 'Nợ 6 kỳ'; 
                                    }
                                    if ($loai == 3 && $dothientai - $dotdadong <= 10 && $dotdadong < $dothientai ){
                                        echo 'Nợ 1 năm';
                                    }
                                    elseif ($loai == 3 && $dothientai - $dotdadong > 10 && $dothientai - $dotdadong <=20 && $dotdadong < $dothientai) {
                                        echo 'Nợ 2 năm';
                                    }
                                    elseif ($loai == 3 && $dothientai - $dotdadong > 20 && $dothientai - $dotdadong <30 && $dotdadong < $dothientai) {
                                        echo 'Nợ 3 năm';
                                    }
                                    if ($loai == 4 && $dothientai - $dotdadong > 0 && $dothientai - $dotdadong < 30 && $dotdadong < $dothientai){
                                        echo 'Nợ 3 năm';
                                    }
                                    // if ($loai == 4 && $dothientai > $dotdadong){
                                    //     echo 'Nợ 3 năm';
                                    // }
                                   
                                @endphp
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
    </div>
@endsection
