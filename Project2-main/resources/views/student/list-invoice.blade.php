<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Danh sách phiếu thu sinh viên</title>
</head>

<body>
    <div class="container-fluid">
        <h1 style="margin-top: 50px; text-align: center">Danh sách phiếu thu sinh viên</h1>
        <br>
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th>Mã hoá đơn</th>
                    <th>Mã sinh viên</th>
                    <th>Tên sinh viên</th>
                    <th>Lớp</th>
                    <th>Loại thu</th>
                    <th>Số tiền</th>
                    <th>Thời gian đóng</th>
                    <th>Người thu tiền</th>
                    <th>Số đợt</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($invoice as $item)
                <tr>
                    <td>{{ $item->id_invoice }}</td>
                    <td>{{ $item->student_code }}</td>
                    <td>{{ $item->name_student }}</td>
                    <td>{{ $item->name_class }}</td>
                    <td>{{ $item->tolltype }}</td>
                    <td>{{ number_format($item->totalamount, 0, '', '.') }}</td>
                    <td>{{ $item->time }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->batch }}</td>
                </tr>
                @empty
                    <tr>
                        <td colspan="9">Không có phiếu thu</td>
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
