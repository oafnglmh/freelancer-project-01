@extends('admin.main')
@section('content')
@foreach($orders as $order)
<form action="/order/edit/{{$order->id_donhang}}" method="POST">
    @endforeach
    @include('alert')
    @foreach($orders as $order)
    <div class="card-body">
        <h1>Cập Nhật Tên Màu</h1>
        <div class="form-group">
            <label for="menu">Tình Trạng Đơn Hàng</label>
            <br>
            <select name="tinhtrang">
                @foreach($statusOrders as $statusOrder)
                <option name="tinhtrang" value="{{$statusOrder->id}}" {{ $order->id_status_orders == $statusOrder->id ? 'selected' : ''}}>{{$statusOrder->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    @endforeach

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Cập nhật danh mục</button>
    </div>
    @csrf
</form>
@endsection