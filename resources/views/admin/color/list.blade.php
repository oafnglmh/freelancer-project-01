@extends('admin.main')
@section('content')
<div class="container">
    <h1>Danh sách sản phẩm</h1>
    @include('alert')
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Mã Màu</th>
                <th>Tên Màu </th>
                <th>Thao Tác</th>
        </thead>
        <tr>
            @foreach($colors as $colors)
            <th>{{ $colors->id }}</th>
            <th>{{ $colors->color }}</th>
            <th><a class="btn btn-primary btn-sm" href="/color/edit/{{$colors->id}}">
                    <i class="fas fa-edit"></i> Sửa
                </a>
                <a class="btn btn-danger btn-sm" href="/color/delete/{{ $colors->id }}">
                    <i class="fas fa-trash"></i> Xóa
                </a>
            </th>
        </tr>
        @endforeach
    </table>
</div>
@endsection