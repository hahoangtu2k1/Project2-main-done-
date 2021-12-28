@extends('layouts.master')
@include('sweetalert::alert')

@section('title', 'Thêm ngành học')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5><strong>Thêm ngành học</strong></h5>
        </div>

        <div class="card-body">
            <form method="POST">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Tên ngành học<nav></nav></label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        name="name" value="{{ old('name') }}">
                    @error('name')
                        <div class="text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Học phí</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="money">
                        <option value="">---Chọn học phí---</option>
                        @foreach ($rs as $item)
                            <option {{ old('money') == $item->id?'selected':''  }} value="{{ $item->id }}">{{ number_format($item->money, 0, '', '.') }}</option>
                        @endforeach
                    </select>
                    @error('money')
                        <div class="text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Thêm Ngành học</button>
            </form>
        </div>
    </div>
@endsection
