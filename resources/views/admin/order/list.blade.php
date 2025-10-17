@extends('admin.main')
@section('content')
<div class="container">
    <h1>Danh sách sản phẩm</h1>
    @include('alert')
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Mã đơn hàng</th>
                <th>Người đặt</th>
                <th>Địa Chỉ</th>
                <th>Số điện thoại</th>
                <th>Tổng tiền</th>
                <th>Tình Trạng</th>
                <th>Thao Tác</th>
        </thead>
        <tr>
            @foreach($orders as $order)
            <th>{{ $order->id_donhang }}</th>
            <th>{{ $order->userName }}</th>
            <th>{{ $order->diachi }}</th>
            <th>{{ $order->sodienthoai }}</th>
            <th>{{ $order->tongtien }}</th>
            <th>{{ $order->tinhtrang }}</th>
            <th><a class="btn btn-primary btn-sm" href="/order/edit/{{$order->id_donhang}}">
                    <i class="fas fa-edit"></i> Sửa Trạng Thái
                </a>
                <a style="background-color: green;" class="btn btn-danger btn-sm" href="/order/detail/{{ $order->id_donhang }}">
                    <i class="fas fa-trash"></i> Chi Tiết
                </a>
            </th>
        </tr>
        @endforeach
    </table>
</div>
@endsection