@extends('layout.content')

@section('other')
<link rel="stylesheet" href="{{ asset('user-asset/CSS/myorder.css') }}">
@endsection

@section('content')

<!-- Breadcrumb -->
<div class="breadcrumb fade-in">
    <a href="{{ route('viewhome') }}">Trang chủ</a>
    <span>/</span>
    <span>Đơn hàng của bạn</span>
</div>

<!-- Page Title -->
<div class="page-title fade-in-up">
    <h1>ĐƠN HÀNG CỦA BẠN</h1>
</div>

<!-- Orders Table -->
<div class="orders-container fade-in-up">
    <table class="orders-table">
        <thead>
            <tr>
                <th>STT</th>
                <th>Mã Đơn Hàng</th>
                <th>Thông tin đơn hàng</th>
                <th>Số Tiền</th>
                <th>Tình Trạng Đơn Hàng</th>
                <th>Chi Tiết</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $index => $order)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $order->id_donhang }}</td>
                <td>
                    {{ $order->name }}<br>
                    {{ $order->diachi }}<br>
                    {{ $order->sodienthoai }}
                </td>
                <td>{{ number_format($order->tongtien, 0, ',', '.') }} VND</td>
                <td>
                    <span class="order-status {{ Str::slug($order->status_order->name) }}">
                        {{ $order->status_order->name }}
                    </span>
                </td>
                <td>
                    <a href="/donhang/detail/{{ $order->id_donhang }}" class="btn-detail">Chi Tiết</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Newsletter -->
<div class="newsletter fade-in">
    <div class="newsletter__map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3835.7333963918236!2d108.24978007500275!3d15.97529308469066!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3142108997dc971f%3A0x1295cb3d313469c9!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBDw7RuZyBuZ2jhu4cgVGjDtG5nIHRpbiB2w6AgVHJ1eeG7gW4gdGjDtG5nIFZp4buHdCAtIEjDoG4!5e0!3m2!1svi!2s!4v1686645400615!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

    <div class="newsletter__content">
        <h3>Đăng Kí Bản Tin</h3>
        <p>Nhận thông tin về mẫu thiết kế mới nhất và ưu đãi độc quyền.</p>
        <div class="newsletter__form">
            <input type="email" placeholder="Nhập email của bạn...">
            <button>Gửi</button>
        </div>
        <div class="newsletter__socials">
            <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
            <a href="#"><i class="fa-brands fa-instagram"></i></a>
            <a href="#"><i class="fa-brands fa-youtube"></i></a>
        </div>
    </div>
</div>

@endsection