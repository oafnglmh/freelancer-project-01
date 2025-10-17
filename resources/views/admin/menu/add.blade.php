@extends('admin.main')
@section('content')
<form action="{{route('addMenu')}}" method="POST">
    @include('alert')
    <div class="card-body">
        <h1>Thêm Danh Mục</h1>
        <div class="form-group">
            <label for="menu">Mã Danh Mục</label>
            <input type="text" style="color: aliceblue;" name="sp_product" class="form-control" placeholder="Nhập mã Danh Mục">
        </div>
        <div class="form-group">
            <label for="menu">Tên Danh Mục</label>
            <input type="text" style="color: aliceblue;" name="name" class="form-control" placeholder="Nhập tên Danh Mục">
        </div>
    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Tạo danh mục</button>
    </div>
    @csrf
</form>
@endsection