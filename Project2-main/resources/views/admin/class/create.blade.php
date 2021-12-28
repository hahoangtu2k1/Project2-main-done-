@extends('layouts.master')

@section('title', 'Thêm lớp học')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5><strong>Thêm lớp học</strong></h5>
        </div>

        <div class="card-body">
            <form method="POST">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Tên lớp học<nav></nav></label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        name="name" value="{{ old('name') }}">
                    @error('name')
                        <div class="text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Tên ngành học</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="major">
                        <option value="">---Chọn ngành học---</option>
                        @foreach ($rs as $item)
                            <option {{ old('major') == $item->id?'selected':''  }} value="{{ $item->id }}">{{ $item->name_major }}</option>
                        @endforeach
                    </select>
                    @error('major')
                        <div class="text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Khoá</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="schoolyear">
                        <option value="">---Chọn khoá---</option>
                        @foreach ($year as $item)
                            <option {{ old('schoolyear') == $item->id?'selected':''  }} value="{{ $item->id }}">{{ $item->schoolyear }}</option>
                        @endforeach
                    </select>
                    @error('schoolyear')
                        <div class="text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Thêm lớp học</button>
            </form>
        </div>
    </div>

@endsection
