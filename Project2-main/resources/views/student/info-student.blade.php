<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Tra cứu học phí</title>
</head>

<body>
    <div class="container-fluid">
        <h1 style="margin-top: 50px; text-align: center">Tra cứu học phí sinh viên</h1>
        <br>
        <div style="font-size: large">
            @foreach ($rs as $item)
                <b>Lưu ý:</b> <br>
                @php
                    if ($item->id_type == 1) {
                        echo '+ 1 đợt = 1 tháng';
                    }
                    if ($item->id_type == 2) {
                        echo "
                                        + Đợt hiện tại 1 - 5 = Kỳ 1 <br>
                                        + Đợt hiện tại 6 - 10 = Kỳ 2 <br>
                                        + Đợt hiện tại 11 - 15 = Kỳ 3 <br>
                                        + Đợt hiện tại 16 - 20 = Kỳ 4 <br>
                                        + Đợt hiện tại 21 - 25 = Kỳ 5 <br>
                                        + Đợt hiện tại 26 - 30 = Kỳ 6 ";
                    }
                    if ($item->id_type == 3) {
                        echo "
                                        + Đợt hiện tại 1 - 10 = Năm 1 <br>
                                        + Đợt hiện tại 11 - 20 = Năm 2 <br>
                                        + Đợt hiện tại 21 - 30 = Năm 3 <br>
                                        ";
                    }
                @endphp
            @endforeach
        </div>
        <br>
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th>Mã sinh viên</th>
                    <th>Tên sinh viên</th>
                    <th>Lớp</th>
                    <th>Loại thu</th>
                    <th>Số tiền 1 lần đóng</th>
                    <th>Tình trạng</th>
                    <th>Tổng nợ</th>
                    <th>Tất cả phiếu thu</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($rs as $item)
                    <tr>
                        <td>{{ $item->student_code }}</td>
                        <td>{{ $item->name_student }}</td>
                        <td>{{ $item->name_class }}</td>
                        <td>{{ $item->tolltype }}</td>
                        {{-- <td>{{ $item->currentbatch }}</td> --}}
                        <td>{{ number_format($money, 0, '', '.') }}đ</td>
                        <td>
                            @php
                                    $loai = $item->id_type;
                                    $dothientai = $item->currentbatch;
                                    $dotdadong = $item->number_payment;
                                    if ($loai == 1 && $dotdadong < $dothientai) {
                                        echo 'Nợ ' . $dothientai - $dotdadong . ' tháng';
                                    }
                                    if ($loai == 2 && $dothientai - $dotdadong <= 5) {
                                        echo 'Nợ 1 kỳ';
                                    } 
                                    elseif ($loai == 2 && $dothientai - $dotdadong > 5 && $dothientai - $dotdadong <= 10){
                                        echo 'Nợ 2 kỳ';
                                    }
                                     elseif ($loai == 2 && $dothientai - $dotdadong > 10 && $dothientai - $dotdadong <= 15) {
                                        echo 'Nợ 3 kỳ'; 
                                    }
                                    elseif ($loai == 2 && $dothientai - $dotdadong > 15 && $dothientai - $dotdadong <= 20){
                                        echo 'Nợ 4 kỳ'; 
                                    }
                                    elseif ($loai == 2 && $dothientai - $dotdadong > 20 && $dothientai - $dotdadong <= 25) {
                                        echo 'Nợ 5 kỳ'; 
                                    }
                                    elseif ($loai == 2 && $dothientai - $dotdadong > 25 && $dothientai - $dotdadong < 30) {
                                        echo 'Nợ 6 kỳ'; 
                                    }
                                    if ($loai == 3 && $dothientai - $dotdadong <= 10 ){
                                        echo 'Nợ 1 năm';
                                    }
                                    elseif ($loai == 3 && $dothientai - $dotdadong > 10 && $dothientai - $dotdadong <=20) {
                                        echo 'Nợ 2 năm';
                                    }
                                    elseif ($loai == 3 && $dothientai - $dotdadong > 20 && $dothientai - $dotdadong <30) {
                                        echo 'Nợ 3 năm';
                                    }
                                    
                                @endphp
                        </td>
                            
                            
                            
                            
                        
                        {{-- <td>{{ $item->number_payment }}</td> --}}
                        <td>
                            @if ($item->number_payment >= $item->currentbatch)
                                <p style="color: blue">Đã nộp đủ</p>
                            @endif
                            @php
                                $loai = $item->id_type;
                                $dothientai = $item->currentbatch;
                                $dotdadong = $item->number_payment;
                                if ($loai == 1 && $dotdadong < $dothientai) {
                                    echo "<p style='color:red'>".'Nợ ' . number_format($money * $dothientai - $dotdadong, 0, '', '.')." đ</p>";
                                }
                                if ($loai == 2 && $dothientai - $dotdadong <= 5) {
                                    echo "<p style='color:red'>".'Nợ ' . number_format($money, 0, '', '.')." đ</p>";
                                } elseif ($loai == 2 && $dothientai - $dotdadong > 5 && $dothientai - $dotdadong <= 10) {
                                    echo "<p style='color:red'>".'Nợ ' . number_format($money * 2, 0, '', '.')." đ</p>";
                                } elseif ($loai == 2 && $dothientai - $dotdadong > 10 && $dothientai - $dotdadong <= 15) {
                                    echo "<p style='color:red'>".'Nợ ' . number_format($money * 3, 0, '', '.')." đ</p>";
                                } elseif ($loai == 2 && $dothientai - $dotdadong > 15 && $dothientai - $dotdadong <= 20) {
                                    echo "<p style='color:red'>".'Nợ ' . number_format($money * 4, 0, '', '.')." đ</p>";
                                } elseif ($loai == 2 && $dothientai - $dotdadong > 20 && $dothientai - $dotdadong <= 25) {
                                    echo "<p style='color:red'>".'Nợ ' . number_format($money * 5, 0, '', '.')." đ</p>";
                                } elseif ($loai == 2 && $dothientai - $dotdadong > 25 && $dothientai - $dotdadong <= 30) {
                                    echo "<p style='color:red'>".'Nợ ' . number_format($money * 6, 0, '', '.')." đ</p>";
                                } 
                                if ($loai == 3 && $dothientai - $dotdadong <= 10) {
                                    echo "<p style='color:red'>".'Nợ ' . number_format($money, 0, '', '.')." đ</p>";
                                    
                                }
                                elseif ($loai == 3 && $dothientai - $dotdadong > 10 && $dothientai - $dotdadong <=20) {
                                    echo "<p style='color:red'>".'Nợ ' . number_format($money * 2, 0, '', '.')." đ</p>";
                                }
                                elseif ($loai == 3 && $dothientai - $dotdadong > 20 && $dothientai - $dotdadong <=30) {
                                    echo "<p style='color:red'>".'Nợ ' . number_format($money * 3, 0, '', '.')." đ</p>";
                                }
                                if ($loai == 4 && $dothientai - $dotdadong <= 30){
                                    echo "<p style='color:red'>".'Nợ ' . number_format($money, 0, '', '.')." đ</p>";
                                    
                                }
                                
                            @endphp
                        </td>
                        <td>
                            <a href="{{ url('student/list-invoice/' . $item->id_student) }}"
                                title="Xem danh sách phiếu thu" style="text-decoration: none"><i
                                    class="fas fa-eye"></i> Xem phiếu thu</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8">Không có dữ liệu sinh viên này</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</body>

</html>
