@extends('layouts.master')

@section('title', 'Cập nhật sinh viên')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5><strong>Cập nhật sinh viên</strong></h5>
        </div>

        <div class="card-body">
            <form method="POST">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Mã sinh viên<nav></nav></label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        name="student_code" value="{{ $student->student_code }}">
                    @error('student_code')
                        <div class="text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Tên sinh viên<nav></nav></label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        name="name" value="{{ $student->name_student }}">
                    @error('name')
                        <div class="text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Lớp</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="class">
                        <option value="">---Chọn lớp---</option>
                        @foreach ($class as $item)
                            <option value="{{ $item->id_class }}" @if ($item->id_class == $student->id_class)
                                selected
                        @endif>
                        {{ $item->name_class }}-{{ $item->name_major }}-{{ number_format($item->money, 0, '', '.') }}
                        </option>
                        @endforeach
                    </select>
                    @error('class')
                        <div class="text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Giới tính</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="gender">
                        <option value="">---Chọn giới tính---</option>
                        
                        <option value="0" @if ($student->gender == 0)
                            selected
                        @endif>Nữ</option>
                        <option value="1" @if ($student->gender == 1)
                            selected
                        @endif>Nam</option>
                    </select>
                    @error('gender')
                        <div class="text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Số điện thoại<nav></nav></label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        name="phone" value="{{ $student->phone }}">
                    @error('phone')
                        <div class="text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Ngày sinh<nav></nav></label>
                    <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        name="dob" value="{{ $student->dob }}">
                    @error('dob')
                        <div class="text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Địa chỉ<nav></nav></label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        name="address" value="{{ $student->address }}">
                    @error('address')
                        <div class="text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Học bổng</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="scholarchip">
                        <option value="">---Chọn mức học bổng---</option>
                        @foreach ($hb as $item)
                            <option value="{{ $item->id_hb }}" @if ($item->id_hb == $student->id_scholarchip)
                                selected
                            @endif>{{ number_format($item->money_hb, 0, '', '.') }}
                            </option>
                        @endforeach
                    </select>
                    @error('scholarchip')
                        <div class="text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Hình thức thu học phí</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="tolltype">
                        <option value="">---Chọn hình thức thu học phí---</option>
                        @foreach ($tolltype as $item)
                            <option value="{{ $item->id_type }}" @if ($item->id_type == $student->id_tolltype)
                                selected
                            @endif>{{ $item->tolltype }}
                            </option>
                        @endforeach
                    </select>
                    @error('tolltype')
                        <div class="text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </form>
        </div>
    </div>
@endsection
