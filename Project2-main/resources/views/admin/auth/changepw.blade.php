@extends('layouts.master')

@section('title', 'Đổi mật khẩu')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3><strong>Đổi mật khẩu</strong></h3>
        </div>
        <div class="card-body">
            {!! Toastr::message() !!}
            <table class="text-center">
                <form method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Mật khẩu cũ<nav></nav></label>
                        <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            name="password" value="{{ old('password') }}">
                        @error('password')
                            <div class="text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Mật khẩu mới<nav></nav></label>
                        <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            name="new_password" value="{{ old('new_password') }}">
                        @error('new_password')
                            <div class="text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nhập lại mật khẩu mới<nav></nav></label>
                        <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            name="renew_password" value="{{ old('renew_password') }}">
                        @error('renew_password')
                            <div class="text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button class="btn btn-primary">Đổi mật khẩu</button>
                </form>
            </table>
        </div>
    </div>
@endsection
