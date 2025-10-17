@extends('admin.main')
@section('content')
<div class="container">
    <h1>Danh sách sản phẩm</h1>
    @include('alert')
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Mã Chi Tiết</th>
                <th>Mã đơn hàng</th>
                <th>Mã Sản Phẩm</th>
                <th>Số Lượng</th>
                <th>Giá</th>
        </thead>
        <tr>
            @foreach($details as $detail)
            <th>{{ $detail->id }}</th>
            <th>{{ $detail->id_order}}</th>
            <th>{{ $detail->ma_sp }}</th>
            <th>{{ $detail->soluong }}</th>
            <th>{{ $detail->gia }}</th>
        </tr>
        @endforeach
    </table>
</div>
@endsection