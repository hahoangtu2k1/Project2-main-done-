@extends('layouts.master')

@section('title', 'Thêm sinh viên')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5><strong>Thêm sinh viên</strong></h5>
        </div>

        <div class="card-body">
            <form method="POST" autocomplete="off">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Mã sinh viên<nav></nav></label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        name="student_code" value="{{ old('student_code') }}">
                    @error('student_code')
                        <div class="text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Tên sinh viên<nav></nav></label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        name="name" value="{{ old('name') }}">
                    @error('name')
                        <div class="text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Lớp</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="class">
                        <option value="">---Chọn lớp---</option>
                        @foreach ($moneyClass as $item)
                            <option value="{{ $item->id_class }}">
                                {{ $item->name_class }}-{{ $item->name_major }}
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
                        <option value="1">Nam</option>
                        <option value="0">Nữ</option>
                    </select>
                    @error('gender')
                        <div class="text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Số điện thoại<nav></nav></label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        name="phone" value="{{ old('phone') }}">
                    @error('phone')
                        <div class="text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Ngày sinh<nav></nav></label>
                    <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        name="dob" value="{{ old('dob') }}">
                    @error('dob')
                        <div class="text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Địa chỉ<nav></nav></label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        name="address" value="{{ old('address') }}">
                    @error('address')
                        <div class="text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Học bổng</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="scholarchip">
                        <option value="">---Chọn mức học bổng---</option>
                        @foreach ($hb as $item)
                            <option value="{{ $item->id_hb }}">{{ number_format($item->money_hb, 0, '', '.') }}
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
                            <option value="{{ $item->id_type }}">{{ $item->tolltype }}
                            </option>
                        @endforeach
                    </select>
                    @error('tolltype')
                        <div class="text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Thêm sinh viên</button>
            </form>
        </div>
    </div>
@endsection
