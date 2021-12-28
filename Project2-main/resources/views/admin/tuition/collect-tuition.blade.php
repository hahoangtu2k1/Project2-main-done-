@extends('layouts.master')

@section('title', 'Thu học phí')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3><strong>Thu học phí</strong></h3>
        </div>
        <div class="card-body">
            <form method="POST">
                @csrf
                <input name="id_student" type="hidden" value="{{ $rs->id_student }}">
                <input type="hidden" name="id_tolltype" value="{{ $rs->id_type }}">
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Mã sinh viên</label>
                    <input type="text" class="form-control" value="{{ $rs->student_code }}" disabled>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Tên sinh viên</label>
                    <input type="text" class="form-control" value="{{ $rs->name_student }}" disabled>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Lớp</label>
                    <input type="text" class="form-control" value="{{ $rs->name_class }}" disabled>
                </div>
                <div class="mb-3">
                    <input type="hidden" class="form-control" value="{{ $rs->tolltype }}">
                </div>
                <input type="hidden" value="{{ Auth::guard('admin')->user()->id }}" name="id_admin">
                <div class="mb-3">
                    <input type="hidden" class="form-control" value="{{ $money }}" name="money">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Số tiền</label>
                    <input type="text" class="form-control" value="{{ $money }}" disabled>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Đợt hiện tại</label>
                    <input type="text" class="form-control" value="Đợt {{ $rs->currentbatch }}" disabled>
                </div>
                @if ($rs->id_type == 1)
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Chọn đợt muốn đóng</label>
                        <select class="form-control" name="number_batch">
                            @php
                                $n = $rs->currentbatch;
                                for ($i = 1; $i <= $n; $i++) {
                                    echo "<option value='Đợt $i' if($i == $n) selected>Đợt $i</option>";
                                }
                            @endphp
                        </select>
                    </div>
                @endif
                @if ($rs->id_type == 2)
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Chọn kỳ</label>
                        <select class="form-control" name="number_batch" required>
                            <option value="">---Chọn kỳ---</option>
                            <option value="Kỳ 1">Đợt 1-5 => Kỳ 1</option>
                            <option value="Kỳ 2">Đợt 6-10 => Kỳ 2</option>
                            <option value="Kỳ 3">Đợt 11-15 => Kỳ 3</option>
                            <option value="Kỳ 4">Đợt 16-20 => Kỳ 4</option>
                            <option value="Kỳ 5">Đợt 21-25 => Kỳ 5</option>
                            <option value="Kỳ 6">Đợt 26-30 => Kỳ 6</option>
                        </select>
                    </div>
                @endif
                @if ($rs->id_type == 3)
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Chọn năm</label>
                        <select class="form-control" name="number_batch" required>
                            <option value="">---Chọn năm---</option>
                            <option value="Năm 1">Đợt 1-10 => Năm 1</option>
                            <option value="Năm 2">Đợt 11-20 => Năm 2</option>
                            <option value="Năm 3">Đợt 21-30 => Năm 3</option>
                        </select>
                    </div>
                @endif
                @if ($rs->id_type == 4)
                    <div class="form-group">
                        <input type="hidden" class="form-control" value="3 năm" name="number_batch">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Loại thu</label>
                        <input type="text" class="form-control" value="3 năm" disabled>
                    </div>
                @endif
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Người thu</label>
                    <input type="text" value="{{ Auth::guard('admin')->user()->name }}" disabled class="form-control">
                </div>
                <br>
                <button type="submit" class="btn btn-primary" onclick="return confirm('Xác nhận thu tiền !');">Xác
                    nhận</button>
            </form>
        </div>
    </div>
@endsection
