@extends('layouts.master')

@section('title', 'Thêm nhân viên')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5><strong>Thêm nhân viên</strong></h5>
        </div>

        <div class="card-body">
                <form method="POST" autocomplete="off">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Họ tên<nav></nav></label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            name="name" value="{{ old('name') }}">
                        @error('name')
                            <div class="text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="text" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp"
                            name="email" value="{{ old('email') }}">
                        @error('email')
                            <div class="text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Số điện thoại</label>
                        <input type="text" class="form-control" id="exampleInputEmail3" aria-describedby="emailHelp"
                            name="phone" value="{{ old('phone') }}">
                        @error('phone')
                            <div class="text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Địa chỉ</label>
                        <input type="text" class="form-control" id="exampleInputEmail4" aria-describedby="emailHelp"
                            name="address" value="{{ old('address') }}">
                        @error('address')
                            <div class="text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm giáo viên</button>
                </form>
        </div>
    </div>
@endsection
