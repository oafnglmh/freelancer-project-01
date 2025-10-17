@extends('admin.main')
@section('content')
@foreach($colors as $color)
<form action="/color/edit/{{$color->id}}" method="POST">
    @endforeach
    @include('alert')
    <div class="card-body">
        <h1>Cập Nhật Tên Màu</h1>
        @foreach($colors as $color)
        <div class="form-group">
            <label for="menu">Mã Màu Sắc</label>
            <input type="text" value="{{$color->id}}" style="color: aliceblue;" name="idColor" class="form-control" placeholder="Nhập mã Danh Mục">
        </div>
        <div class="form-group">
            <label for="menu">Tên Màu sắc</label>
            <input type="text" value="{{$color->color}}" style="color: aliceblue;" name="nameColor" class="form-control" placeholder="Vui lòng nhập bằng tiếng anh">
        </div>
        @endforeach
    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Cập nhật danh mục</button>
    </div>
    @csrf
</form>
@endsection