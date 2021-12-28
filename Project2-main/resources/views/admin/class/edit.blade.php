@extends('layouts.master')

@section('title', 'Cập nhật lớp học')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5><strong>Cập nhật lớp học</strong></h5>
        </div>

        <div class="card-body">
            <form method="POST">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Tên lớp học<nav></nav></label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        name="name" value="{{ $class->name_class }}">
                    @error('name')
                        <div class="text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Tên ngành học</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="major">
                        <option value="">---Chọn ngành học---</option>
                        @foreach ($major as $item)
                            <option value="{{ $item->id }}" @if ($item->id == $class->id)
                                selected
                        @endif>
                        {{ $item->name_major }}
                        </option>
                        @endforeach
                    </select>
                    @error('major')
                        <div class="text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </form>
        </div>
    </div>

@endsection
