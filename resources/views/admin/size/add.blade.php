@extends('admin.main')
@section('content')
<form action="{{route('addSize')}}" method="POST">
    @include('alert')
    <div class="card-body">
        <h1>Thêm Màu</h1>
        <div class="form-group">
            <label for="menu">Mã Size</label>
            <input type="text" style="color: aliceblue;" name="id" class="form-control" placeholder="Nhập mã Danh Mục">
        </div>
        <div class="form-group">
            <label for="menu">Tên Size</label>
            <input type="text" style="color: aliceblue;" name="name" class="form-control" placeholder="Size">
        </div>
    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Tạo Size</button>
    </div>
    @csrf
</form>
@endsection