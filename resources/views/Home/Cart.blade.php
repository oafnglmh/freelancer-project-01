@extends('layout.content')

@section('other')
<link rel="stylesheet" href="{{ asset('user-asset/CSS/giohang.css') }}">
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

    .container-cart {
        max-width: 1200px;
        margin: auto;
        padding: 20px;
    }

    /* Breadcrumb */
    .cart-breadcrumb {
        background: #fff;
        padding: 15px 20px;
        border-radius: 8px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
        margin-bottom: 30px;
    }

    .cart-breadcrumb a {
        font-weight: 500;
        color: #333;
    }

    .cart-breadcrumb span {
        margin: 0 5px;
        color: #888;
    }

    .cart-breadcrumb h1 {
        margin-top: 5px;
        font-size: 26px;
        font-weight: 600;
    }

    /* Table */
    .cart-table {
        width: 100%;
        border-collapse: collapse;
        background: #fff;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        margin-bottom: 30px;
    }

    .cart-table th,
    .cart-table td {
        padding: 15px;
        text-align: center;
        vertical-align: middle;
    }

    .cart-table th {
        background: #f8f8f8;
        font-weight: 600;
    }

    .cart-table img {
        width: 120px;
        height: 150px;
        object-fit: cover;
        border-radius: 8px;
        transition: transform 0.3s ease;
    }

    .cart-table img:hover {
        transform: scale(1.05);
    }

    .quantity-input {
        width: 60px;
        padding: 5px;
        text-align: center;
        border-radius: 6px;
        border: 1px solid #ccc;
        transition: 0.2s;
    }

    .quantity-input:focus {
        outline: none;
        border-color: #c0392b;
        box-shadow: 0 0 5px rgba(192, 57, 43, 0.5);
    }

    /* Buttons */
    .btn {
        padding: 10px 20px;
        border-radius: 6px;
        border: none;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .btn:hover {
        transform: scale(1.05);
    }

    .btn-update {
        background: #000;
        color: #fff;
    }

    .btn-checkout {
        background: #c0392b;
        color: #fff;
    }

    .btn-checkout:hover {
        background: #e74c3c;
    }

    .btn-delete {
        background: #e74c3c;
        color: #fff;
    }

    /* Cart Footer */
    .cart-footer {
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 20px;
    }

    .cart-note {
        flex: 1;
        background: #fff;
        padding: 20px;
        border-radius: 10px;
    }

    .cart-note textarea {
        width: 100%;
        border-radius: 8px;
        border: 1px solid #ccc;
        padding: 10px;
        resize: vertical;
    }

    .cart-summary {
        flex: 1;
        max-width: 400px;
    }

    .cart-summary h2 {
        font-size: 28px;
        color: #c0392b;
        margin-bottom: 15px;
    }

    .cart-actions {
        display: flex;
        gap: 10px;
    }

    .cart-actions a,
    .cart-actions button {
        flex: 1;
    }

    /* Newsletter + Map */
    .cart-newsletter-map {
        display: flex;
        gap: 40px;
        flex-wrap: wrap;
        margin-top: 50px;
    }

    .newsletter-box,
    .map-box {
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

        .cart-footer,
        .cart-newsletter-map {
            flex-direction: column;
        }

        .cart-summary {
            max-width: 100%;
        }
    }
</style>
@endsection

@section('content')
<div class="container-cart">

    <!-- Breadcrumb -->
    <div class="cart-breadcrumb animate-fade">
        <a href="/">TRANG CHỦ</a> <span>/</span>
        <span>GIỎ HÀNG CỦA BẠN</span>
        <h1>GIỎ HÀNG</h1>
    </div>

    <!-- Cart Table -->
    <form action="{{ route('updateQuantityCart') }}" method="POST">
        @csrf
        <table class="cart-table animate-fade">
            <thead>
                <tr>
                    <th>Ảnh</th>
                    <th>Sản Phẩm</th>
                    <th>Giá</th>
                    <th>Số Lượng</th>
                    <th>Tổng</th>
                    <th>Thao Tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($carts as $cart)
                @php $price = $cart->price * $cart->quantity; @endphp
                <tr>
                    <td><img src="/user-asset/img/{{ $cart->sp_hinh }}" alt="{{ $cart->sp_ten }}"></td>
                    <td>
                        <a href="/product/{{ $cart->product_ma }}">{{ $cart->sp_ten }}</a>
                        <p>Size: {{ $cart->size }} / {{ $cart->color }}<br>Thương hiệu: SHOP</p>
                    </td>
                    <td>
                        @if ($cart->sp_sale > 0)
                        <p style="text-decoration: line-through; color:red;">{{ number_format($cart->sp_giaBan,0,',','.') }} VND</p>
                        @endif
                        <p>{{ number_format($cart->price,0,',','.') }} VND</p>
                    </td>
                    <td>
                        <input type="number" name="quantity[{{ $cart->id }}]" class="quantity-input" min="1" max="10" value="{{ $cart->quantity }}">
                        <input type="hidden" name="idCartQuantity[]" value="{{ $cart->id }}">
                    </td>
                    <td>{{ number_format($price,0,',','.') }} VND</td>
                    <td>
                        <a href="/deleteCart/{{$cart->id}}" class="btn btn-delete">Xóa</a>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Footer: Note + Summary -->
        <div class="cart-footer animate-fade">
            <div class="cart-note">
                <label>Ghi chú:</label>
                <textarea placeholder="Ghi chú cho đơn hàng..."></textarea>
            </div>
            <div class="cart-summary">
                <h2>Tổng tiền: {{ number_format($total,0,',','.') }} VND</h2>
                <div class="cart-actions">
                    <button type="submit" class="btn btn-update">Cập Nhật</button>
                    <a href="{{ route('viewpay') }}" class="btn btn-checkout">Thanh Toán</a>
                </div>
            </div>
        </div>
    </form>

    <!-- Newsletter + Map -->
    <div class="cart-newsletter-map animate-fade">
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