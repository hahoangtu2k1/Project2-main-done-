@extends('layouts.master')
@include('sweetalert::alert')

@section('title', 'Cập nhật ngành học')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5><strong>Cập nhật ngành học</strong></h5>
        </div>

        <div class="card-body">
            <form method="POST">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Tên ngành học<nav></nav></label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        name="name" value="{{ old('name', $major->name_major) }}">
                    @error('name')
                        <div class="text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Học phí</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="money">
                        <option value="">---Chọn học phí---</option>
                        @foreach ($money as $item)
                            <option value="{{ $item->id }}" @if ($item->id == $major->id)
                                selected
                        @endif>
                        {{ number_format($item->money, 0, '', '.') }}</option>
                        @endforeach
                    </select>
                    @error('money')
                        <div class="text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </form>
        </div>
    </div>
@endsection
