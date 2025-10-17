@extends('admin.main')
@section('content')
@foreach($sizes as $size)
<form action="/size/edit/{{$size->id}}" method="POST">
    @endforeach
    @include('alert')
    <div class="card-body">
        <h1>Cập Nhật</h1>
        @foreach($sizes as $size)
        <div class="form-group">
            <label for="menu">Mã Size</label>
            <input type="text" value="{{$size->id}}" style="color: aliceblue;" name="id" class="form-control" placeholder="Nhập mã Danh Mục">
        </div>
        <div class="form-group">
            <label for="menu">Tên Size</label>
            <input type="text" value="{{$size->size}}" style="color: aliceblue;" name="name" class="form-control" placeholder="Vui lòng nhập bằng tiếng anh">
        </div>
        @endforeach
    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </div>
    @csrf
</form>
@endsection