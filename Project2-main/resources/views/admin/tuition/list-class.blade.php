@extends('layouts.master')

@section('title', 'Thống kê theo lớp')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5><strong>Thống kê theo lớp</strong></h5>
        </div>
        <div class="card-body">
            <table id="tbl_class" class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>Tên lớp</th>
                        <th>Chuyên ngành</th>
                        <th>Thống kê</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($rs as $item)
                        <tr>
                            <td>{{ $item->name_class }}</td>
                            <td>{{ $item->name_major }}</td>
                            <td>
                                <a href="{{ url('admin/tuition/statistical/'.$item->id_class) }}" style="text-decoration: none">Xem thống kê</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">Danh sách trống</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>
    @endsection
