@extends('admin.main')
@section('content')
@foreach($type_products as $type_product)
<form action="/menu/edit/{{$type_product->id}}" method="POST">
    @endforeach
    @include('alert')
    <div class="card-body">
        <h1>Thêm Danh Mục</h1>
        @foreach($type_products as $type_product)
        <div class="form-group">
            <label for="menu">Mã Danh Mục</label>
            <input type="text" value="{{$type_product->id}}" style="color: aliceblue;" name="sp_product" class="form-control" placeholder="Nhập mã Danh Mục">
        </div>
        <div class="form-group">
            <label for="menu">Tên Danh Mục</label>
            <input type="text" value="{{$type_product->name_type}}" style="color: aliceblue;" name="name" class="form-control" placeholder="Nhập tên Danh Mục">
        </div>
        @endforeach
    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Cập nhật danh mục</button>
    </div>
    @csrf
</form>
@endsection