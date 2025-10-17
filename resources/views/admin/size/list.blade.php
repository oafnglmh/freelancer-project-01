@extends('admin.main')
@section('content')
<div class="container">
    <h1>Danh sách sản phẩm</h1>
    @include('alert')
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Mã Size</th>
                <th>Tên Size </th>
                <th>Thao Tác</th>
        </thead>
        <tr>
            @foreach($sizes as $sizes)
            <th>{{ $sizes->id }}</th>
            <th>{{ $sizes->size }}</th>
            <th><a class="btn btn-primary btn-sm" href="/size/edit/{{$sizes->id}}">
                    <i class="fas fa-edit"></i> Sửa
                </a>
                <a class="btn btn-danger btn-sm" href="/size/delete/{{ $sizes->id }}">
                    <i class="fas fa-trash"></i> Xóa
                </a>
            </th>
        </tr>
        @endforeach
    </table>
</div>
@endsection