@extends('admin.main')
@section('content')
<form action="{{route('addStatus')}}" method="POST">
    @include('alert')
    <div class="card-body">
        <h1>Thêm tình trạng đơn hàng</h1>
        <div class="form-group">
            <label for="menu">Mã tình trạng</label>
            <input type="text" style="color: aliceblue;" name="id" class="form-control" placeholder="Nhập mã Danh Mục">
        </div>
        <div class="form-group">
            <label for="menu">Tên Tình Trạng</label>
            <input type="text" style="color: aliceblue;" name="name" class="form-control" placeholder="Vui lòng nhập bằng tiếng anh">
        </div>
    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Thêm</button>
    </div>
    @csrf
</form>
@endsection