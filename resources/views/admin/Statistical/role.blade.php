@extends('admin.main')
@section('content')
@foreach($sqls as $sql)
<form action="/statistical/user-role/{{$sql->id}}" method="POST">
    @endforeach
    @include('alert')
    <div class="card-body">
        <h1>Phân quyền người dùng</h1>
        <div class="form-group">
            <label for="menu">Phân Quyền</label>
            <br>
            <select name="tinhtrang">
                <option>Phân quyền</option>
                <option name="tinhtrang" value="1">ADMIN</option>
                <option name="tinhtrang" value="0">User</option>
            </select>
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </div>
    @csrf
</form>
@endsection