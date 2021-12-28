@extends('layouts.master')

@section('title', 'Thông tin tài khoản')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3><strong>Thông tin tài khoản</strong></h3>
        </div>
        <div class="card-body">
            <table class="text-center">
                {!! Toastr::message() !!}
                <form method="POST">
                    @csrf
                    @foreach ($rs as $item)
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Họ tên<nav></nav></label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                name="name" value="{{ $item->name }}">
                            @error('name')
                                <div class="text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email<nav></nav></label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                name="email" value="{{ $item->email }}">
                            @error('email')
                                <div class="text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Số điện thoại<nav></nav></label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                name="phone" value="{{ $item->phone }}">
                            @error('phone')
                                <div class="text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Địa chỉ</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                name="address">{{$item->address}}</textarea>
                        </div>
                        @error('address')
                            <div class="text text-danger">{{ $message }}</div>
                        @enderror
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                    @endforeach
                </form>
            </table>
        </div>
    </div>
@endsection
