@extends('admin.main')
@section('content')
<div class="container">
    <h1>Danh sách sản phẩm</h1>
    @include('alert')
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Mã Danh Mục</th>
                <th>Tên Danh Mục </th>
                <th>Thao Tác</th>
        </thead>
        <tr>
            @foreach($type_products as $type_products)
            <th>{{ $type_products->id }}</th>
            <th>{{ $type_products->name_type }}</th>
            <th><a class="btn btn-primary btn-sm" href="/menu/edit/{{$type_products->id}}">
                    <i class="fas fa-edit"></i> Sửa
                </a>
                <a class="btn btn-danger btn-sm" href="/menu/delete/{{ $type_products->id }}">
                    <i class="fas fa-trash"></i> Xóa
                </a>
            </th>
        </tr>
        @endforeach
    </table>
</div>
@endsection