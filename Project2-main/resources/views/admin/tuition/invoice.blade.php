@extends('layouts.master')

@section('title', 'Quản lý phiếu thu')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5><strong>Quản lý phiếu thu</strong></h5>
        </div>
        <div class="card-body">
            <table id="tbl_invoice" class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>Mã sinh viên</th>
                        <th>Tên sinh viên</th>
                        <th>Lớp</th>
                        <th>Phiếu thu</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($stud as $item)
                        <tr>
                            <td>{{ $item->student_code }}</td>
                            <td>{{ $item->name_student }}</td>
                            <td>{{ $item->name_class }}</td>
                            <td>
                                <a href="{{ url('admin/tuition/list-invoice/' . $item->id_student) }}" title="Xem phiếu thu" style="text-decoration: none"><i class="fas fa-eye"></i> Xem phiếu thu</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">Danh sách trống</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>
    @endsection
