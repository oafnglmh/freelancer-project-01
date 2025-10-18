@extends('layout.content')

@section('other')
<link rel="stylesheet" href="{{ asset('user-asset/CSS/thanhtoan.css') }}">
<style>
    /* Reset & Global */
    body {
        font-family: "Poppins", sans-serif;
        background: #f5f5f5;
        color: #222;
    }

    a {
        text-decoration: none;
        color: inherit;
    }

    .checkout-container {
        max-width: 1200px;
        margin: auto;
        padding: 20px;
    }

    /* Breadcrumb */
    .checkout-breadcrumb {
        background: #fff;
        padding: 15px 20px;
        border-radius: 8px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
        margin-bottom: 30px;
    }

    .checkout-breadcrumb a {
        font-weight: 500;
        color: #333;
    }

    .checkout-breadcrumb span {
        margin: 0 5px;
        color: #888;
    }

    .checkout-breadcrumb h1 {
        margin-top: 5px;
        font-size: 26px;
        font-weight: 600;
    }

    /* Layout */
    .checkout-main {
        display: flex;
        gap: 30px;
        flex-wrap: wrap;
    }

    .checkout-left,
    .checkout-right {
        background: #fff;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        flex: 1;
        min-width: 320px;
    }

    /* Form */
    .checkout-form input[type="text"],
    .checkout-form input[type="tel"],
    .checkout-form input[type="email"] {
        width: 100%;
        padding: 12px 15px;
        margin-bottom: 15px;
        border-radius: 6px;
        border: 1px solid #ccc;
        transition: 0.3s;
    }

    .checkout-form input:focus {
        border-color: #c0392b;
        box-shadow: 0 0 5px rgba(192, 57, 43, 0.4);
        outline: none;
    }

    .checkout-buttons {
        display: flex;
        gap: 15px;
        margin-top: 20px;
        flex-wrap: wrap;
    }

    .checkout-buttons button,
    .checkout-buttons a {
        flex: 1;
        padding: 12px 20px;
        border-radius: 6px;
        text-align: center;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .btn-back-cart {
        background: #000;
        color: #fff;
    }

    .btn-back-cart:hover {
        background: #333;
    }

    .btn-place-order {
        background: #c0392b;
        color: #fff;
    }

    .btn-place-order:hover {
        background: #e74c3c;
    }

    /* Order Summary */
    .checkout-summary table {
        width: 100%;
        border-collapse: collapse;
    }

    .checkout-summary th,
    .checkout-summary td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #eee;
    }

    .checkout-summary img {
        width: 60px;
        height: 60px;
        object-fit: cover;
        border-radius: 6px;
    }

    .checkout-summary h4,
    .checkout-summary h5 {
        margin: 0;
    }

    /* Animations */
    @keyframes fadeSlideUp {
        0% {
            opacity: 0;
            transform: translateY(20px);
        }

        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fade-slide {
        animation: fadeSlideUp 0.8s ease forwards;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .checkout-main {
            flex-direction: column;
        }
    }
</style>
@endsection

@section('content')
<div class="checkout-container">

    <!-- Breadcrumb -->
    <div class="checkout-breadcrumb animate-fade-slide">
        <a href="/">TRANG CHỦ</a> <span>/</span>
        <span>Thanh Toán</span>
        <h1>THANH TOÁN</h1>
    </div>

    <div class="checkout-main">

        <!-- Left: Form -->
        <div class="checkout-left animate-fade-slide">
            <h2>Thông tin thanh toán</h2>

            @if(Auth::check())
            <p>Xin chào, <b>{{ Auth::user()->name }}</b></p>
            @else
            <p>Bạn đã có tài khoản chưa? <a href="/login">Đăng Nhập</a></p>
            @endif

            <form class="checkout-form" action="{{ route('addpay') }}" method="POST">
                @csrf
                <input type="text" name="username" value="{{ Auth::user()->name ?? '' }}" placeholder="Họ và tên" required>
                <input type="tel" name="tel" value="{{ Auth::user()->number_phone ?? '' }}" placeholder="Số điện thoại" required>
                <input type="text" name="address" placeholder="Chi tiết địa chỉ" required>
                <input type="hidden" name="tongtien" value="{{$total}}">
                <div class="checkout-buttons">
                    <a href="#" class="btn-back-cart">Quay lại giỏ hàng</a>
                    <button type="submit" class="btn-place-order">Đặt hàng</button>
                </div>
            </form>
        </div>

        <!-- Right: Order Summary -->
        <div class="checkout-right animate-fade-slide">
            <h2>Đơn hàng của bạn</h2>
            @if(Auth::check())
            <div class="checkout-summary">
                <table>
                    <tbody>
                        @foreach($carts as $cart)
                        <tr>
                            <td><img src="/user-asset/img/{{ $cart->sp_hinh }}" alt="{{ $cart->sp_ten }}"></td>
                            <td>{{ $cart->sp_ten }} <br> {{ $cart->size }} / {{ $cart->color }} x {{ $cart->quantity }}</td>
                            <td>{{ number_format($cart->price,0,',','.') }} VND</td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="2">
                                <h4>Tạm tính</h4>
                            </td>
                            <td>
                                <h5>{{ number_format($total,0,',','.') }} VND</h5>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <h4>Tổng tiền</h4>
                            </td>
                            <td>
                                <h5>{{ number_format($total,0,',','.') }} VND</h5>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            @else
            <h3>Bạn chưa đăng nhập</h3>
            @endif
        </div>

    </div>
</div>
@endsection