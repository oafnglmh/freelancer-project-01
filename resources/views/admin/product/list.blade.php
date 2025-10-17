@extends('admin.main')
@section('content')
    <div class="container">
        <h1>Danh sách sản phẩm</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Mã Sản Phẩm</th>
                    <th>Tên Sản Phẩm</th>
                    <th>Hình Ảnh Sản Phẩm</th>
                    <th>Giá Gốc</th>
                    <th>Giá Bán</th>
                    <th>Mô Tả Sản Phẩm</th>
                    <th>Danh Mục </th>
                    <th>Trạng Thái</th>
                    <th>Thao Tác</th>
                </tr>
            </thead>
            @foreach ($products as $product)
                
                <tr>
                    <th>{{ $product->sp_ma }}</th>
                    <th style="white-space: normal; width:150px;">{{ $product->sp_ten }}</th>
                    <th> <img style="width:150px;height:200px;border-radius:0%" src="/user-asset/img/{{ $product->sp_hinh}}" alt=""> </th>
                    <th>{{ $product->sp_giaGoc }}</th>
                    <th>{{ $product->sp_giaBan }}</th>
                    <th style="white-space: normal;max-width: 70px; ">{{ $product->sp_thongTin }}</th>
                    <th>{{ $product->type_Product->name_type}}</th>
                    <th>{{ $product->status_product->name_status}}</th>
                    <th><a class="btn btn-primary btn-sm" href="/product/edit/{{$product->sp_ma}}">
                            <i class="fas fa-edit"></i> Sửa
                        </a>
                        <a class="btn btn-danger btn-sm" href="/product/delete/{{ $product->sp_ma }}">
                            <i class="fas fa-trash"></i> Xóa
                        </a>
                    </th>
                </tr>
                
            @endforeach
            {{-- <tbody>
            <tr>
                <td>
                    <a class="btn btn-primary btn-sm">
                        <i class="fas fa-edit"></i> Sửa
                    </a>    
                    <a class="btn btn-danger btn-sm" href="#">
                        <i class="fas fa-trash"></i> Xóa
                    </a>
                </td>
            </tr>
        </tbody> --}}
        </table>
    </div>
@endsection