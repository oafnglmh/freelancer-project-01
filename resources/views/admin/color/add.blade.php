@extends('admin.main')
@section('content')
<form action="{{route('addColor')}}" method="POST">
    @include('alert')
    <div class="card-body">
        <h1>Thêm Màu</h1>
        <div class="form-group">
            <label for="menu">Mã Màu Sắc</label>
            <input type="text" style="color: aliceblue;" name="idColor" class="form-control" placeholder="Nhập mã Danh Mục">
        </div>
        <div class="form-group">
            <label for="menu">Tên Màu sắc</label>
            <input type="text" style="color: aliceblue;" name="nameColor" class="form-control" placeholder="Vui lòng nhập bằng tiếng anh">
        </div>
    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Tạo Màu</button>
    </div>
    @csrf
</form>
@endsection