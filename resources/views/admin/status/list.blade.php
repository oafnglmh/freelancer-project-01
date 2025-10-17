@extends('admin.main')
@section('content')
<div class="container">
    <h1>Danh sách sản phẩm</h1>
    @include('alert')
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Mã Tình Trạng</th>
                <th>Tên Tình Trạng </th>
                <th>Thao Tác</th>
        </thead>
        <tr>
            @foreach($status_orders as $statu)
            <th>{{ $statu->id }}</th>
            <th>{{ $statu->name }}</th>
            <th><a class="btn btn-primary btn-sm" href="/status/edit/{{$statu->id}}">
                    <i class="fas fa-edit"></i> Sửa
                </a>
                <a class="btn btn-danger btn-sm" href="/status/delete/{{ $statu->id }}">
                    <i class="fas fa-trash"></i> Xóa
                </a>
            </th>
        </tr>
        @endforeach
    </table>
</div>
@endsection