@extends('layout.content')

@section('other')
<link rel="stylesheet" href="{{ asset('user-asset/CSS/giohang.css') }}">
<style>
    body {
        font-family: 'Poppins', sans-serif;
        background: #f5f5f5;
        color: #222;
    }

    a {
        text-decoration: none;
        color: inherit;
    }

    .container-order {
        max-width: 1200px;
        margin: auto;
        padding: 20px;
    }

    /* Breadcrumb */
    .order-breadcrumb {
        background: #fff;
        padding: 15px 20px;
        border-radius: 8px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
        margin-bottom: 30px;
    }

    .order-breadcrumb a {
        font-weight: 500;
        color: #333;
    }

    .order-breadcrumb span {
        margin: 0 5px;
        color: #888;
    }

    .order-breadcrumb h1 {
        margin-top: 5px;
        font-size: 26px;
        font-weight: 600;
    }

    /* Table */
    .order-table {
        width: 100%;
        border-collapse: collapse;
        background: #fff;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        margin-bottom: 30px;
    }

    .order-table th,
    .order-table td {
        padding: 15px;
        text-align: center;
        vertical-align: middle;
    }

    .order-table th {
        background: #f8f8f8;
        font-weight: 600;
    }

    .order-table img {
        width: 100px;
        height: 130px;
        object-fit: cover;
        border-radius: 8px;
        transition: transform 0.3s ease;
    }

    .order-table img:hover {
        transform: scale(1.05);
    }

    /* Footer section */
    .order-footer {
        display: flex;
        gap: 40px;
        flex-wrap: wrap;
        margin-top: 50px;
    }

    .map-box,
    .newsletter-box {
        flex: 1;
        min-width: 300px;
        background: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }

    .newsletter-box input[type="text"],
    .newsletter-box input[type="email"] {
        width: 70%;
        padding: 10px;
        border-radius: 5px 0 0 5px;
        border: 1px solid #ccc;
    }

    .newsletter-box input[type="submit"] {
        padding: 10px 20px;
        border-radius: 0 5px 5px 0;
        border: none;
        background: #000;
        color: #fff;
        cursor: pointer;
        transition: 0.3s;
    }

    .newsletter-box input[type="submit"]:hover {
        background: #c0392b;
    }

    /* Animations */
    @keyframes fadeInUp {
        0% {
            opacity: 0;
            transform: translateY(20px);
        }

        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fade {
        animation: fadeInUp 0.8s ease;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .order-footer {
            flex-direction: column;
        }
    }
</style>
@endsection

@section('content')
<div class="container-order">

    <!-- Breadcrumb -->
    <div class="order-breadcrumb animate-fade">
        <a href="/">TRANG CHỦ</a> <span>/</span>
        <span>ĐƠN HÀNG CỦA BẠN</span>
        <h1>CHI TIẾT ĐƠN HÀNG #{{ $id }}</h1>
    </div>

    <!-- Order Table -->
    <table class="order-table animate-fade">
        <thead>
            <tr>
                <th>STT</th>
                <th>Sản Phẩm</th>
                <th>Số Lượng</th>
                <th>Đơn Giá</th>
                <th>Thành Tiền</th>
            </tr>
        </thead>
        <tbody>
            @php $count = 0; @endphp
            @foreach ($orders as $order)
            @php
            $count++;
            $subtotal = $order->gia * $order->soluong;
            @endphp
            <tr>
                <td>{{ $count }}</td>
                <td>
                    <img src="/user-asset/img/{{ $order->sp_hinh }}" alt="{{ $order->sp_ten }}">
                    <br>
                    <a href="/product/{{ $order->ma_sp }}">{{ $order->sp_ten }}</a>
                    <br>
                    Size: {{ $order->size }} / {{ $order->color }}
                </td>
                <td>{{ $order->soluong }}</td>
                <td>{{ number_format($order->gia,0,',','.') }} VND</td>
                <td>{{ number_format($subtotal,0,',','.') }} VND</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Footer: Map + Newsletter -->
    <div class="order-footer animate-fade">
        <div class="map-box">
            <iframe src="https://www.google.com/maps/embed?pb=..." width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
        <div class="newsletter-box">
            <h3>Đăng Kí Bảng Tin</h3>
            <p>Nhận mẫu thiết kế mới nhất qua email</p>
            <form>
                <input type="email" placeholder="Nhập email của bạn">
                <input type="submit" value="Gửi">
            </form>
        </div>
    </div>

</div>
@endsection