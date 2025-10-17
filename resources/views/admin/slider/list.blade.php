
@extends('admin.main')
@section('content')
    <div class="container">
        <h1>Danh sách sản phẩm</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Tên Slide</th>
                    <th>Hình Ảnh</th>
                    <th>Mô Tả Sản Phẩm</th>
                    <th>Loại</th>
                    <th>Thao Tác</th>
                </tr>
            </thead>
            @foreach ($slide as $slide)
                
                <tr>
                    <th>{{ $slide->t_name }}</th>
                    <th > <img style="width:100px;height:100px;border-radius:0%"  src="/user-asset/img/{{ $slide->t_Image}}" alt=""> </th>
                    <th>{{ $slide->t_decription }}</th>
                    <th>{{ $slide->identify }}</th>
                    <th><a class="btn btn-primary btn-sm" href="/slide/edit/{{$slide->id}}">
                            <i class="fas fa-edit"></i> Sửa
                        </a>
                        <a class="btn btn-danger btn-sm" href="/slide/delete/{{ $slide->id }}">
                            <i class="fas fa-trash"></i> Xóa
                        </a>
                    </th>
                </tr>
                
            @endforeach
                
        </table>
    </div>
@endsection
