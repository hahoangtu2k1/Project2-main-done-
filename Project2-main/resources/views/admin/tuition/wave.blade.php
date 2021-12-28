@extends('layouts.master')

@section('title', 'Tăng đợt thu học phí')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5><strong>Tăng đợt thu học phí</strong></h5>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            {!! Toastr::message() !!}
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <th>Khoá</th>
                    <th>Đợt hiện tại</th>
                    <th>Tăng đợt</th>
                </tr>
                @foreach ($wave as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->schoolyear}}</td>
                    <td>{{$item->currentbatch}}</td>
                    <td>
                        <a onclick="return confirm('Xác nhận tăng đợt');" href="{{ url('admin/tuition/increaseWave/' . $item->id) }}"><button class="btn btn-primary">Tăng đợt</button></a>
                    </td>
                </tr>
            @endforeach
            </table>
        </div>
    </div>
@endsection
