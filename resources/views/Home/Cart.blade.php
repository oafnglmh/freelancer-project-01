@extends('layout.content')
@section('other')
<link rel="stylesheet" href="{{ asset('user-asset/CSS/giohang.css') }}">
@endsection
@section('content')

<body>

    <div class="linksmall">

        <a href="./index.html"> TRANG CHỦ </a>
        <span>/</span>
        <a href="">GIỎ HÀNG CỦA BẠN - LVT SHOP
            <h1><b>GIỎ HÀNG</b></h1>
        </a>

    </div>



    <style>
        .table th,
        .table td {
            text-align: center;
            vertical-align: middle;
        }
    </style>
    <form action="{{ route('updateQuantityCart') }}" method="POST">
        @csrf
        <table class="table" style="margin-top: 40px">
            <thead>
                <tr>
                    <th scope="col" style="width: 200px;">Ảnh</th>
                    <th scope="col" style="width: 400px;">Sản Phẩm</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Số Lượng</th>
                    <th scope="col">Tổng Tiền</th>
                    <th scope="col">Thao Tác</th>
                </tr>
            </thead>
            <tbody>
                @php
                $productIds = [];

                @endphp
                @foreach ($carts as $cart)
                @php
                $productIds[] = $cart->product_ma;
                @endphp

                <tr>
                    <td> <img src="/user-asset/img/{{ $cart->sp_hinh }}" alt="" style="width: 150px; height: 200px;"></td>
                    <td class="text-center align-middle">
                        <a href="/product/{{ $cart->product_ma }}">{{ $cart->sp_ten }}</a>
                        <br>
                        <span>Phiên bản: Size {{ $cart->size }} / {{ $cart->color }}<br> Thương hiệu:
                            LVTSHOP</span>
                    </td>
                    <td>

                        @if ($cart->sp_sale > 0)
                        <p style="text-decoration: line-through; color: red;">
                            {{ number_format($cart->sp_giaBan, 0, ',', '.') }} VND
                        </p>
                        @endif
                        <p>{{ number_format($cart->price, 0, ',', '.') }} VND</p>
                    </td>
                    <td>
                        <input type="number" name="quantity[{{ $cart->id }}]" class="quantity-input" min="1" max="10" value="{{ $cart->quantity }}">
                        <input type="hidden" name="idCartQuantity[]" value="{{ $cart->id }}">
                    </td>
                    <td>
                        <a href="/deleteCart/{{$cart->id}}">X</a>
                    </td>
                    @php
                    $price = $cart->price * $cart->quantity;
                    @endphp
                    <th>{{ number_format($price, 0, ',', '.') }} VND</th>
                </tr>
                @endforeach
                @php
                session(['productIds' => $productIds]);

                @endphp
            </tbody>
        </table>
        <div class="home-1">
            <div class="chuthich">
                Chú thích <br>
                <textarea name="" id="" cols="30" rows="10"></textarea>
            </div>
            <div class="chithich-1">
                <div class="tongtien">
                    Tổng tiền <h1>{{ number_format($total, 0, ',', '.') }} VND</h1>

                </div>
                <br>
                <div class="check1">
                    <div class="capnhat"> <button type="submit" style="background-color: black;color: aliceblue;border: none;">Cập Nhật</button></div>
                    <div class="thanhtoan"> <a href="{{ route('viewpay') }}" style=" text-decoration: none;color: rgb(255, 255, 255);">Thanh Toán</a> </div>
                </div>
            </div>
        </div>
    </form>
    <div class="dangkibangtien">
        <div class="MAP">

            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3835.7333963918236!2d108.24978007500275!3d15.97529308469066!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3142108997dc971f%3A0x1295cb3d313469c9!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBDw7RuZyBuZ2jhu4cgVGjDtG5nIHRpbiB2w6AgVHJ1eeG7gW4gdGjDtG5nIFZp4buHdCAtIEjDoG4!5e0!3m2!1svi!2s!4v1686645400615!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="chu">
            <div class="dangkibangtin"> Đăng Kí Bảng Tin </div>
            <div class="dangkibangtinmail">
                Đăng kí bảng tin để nhận mẫu thiết kế mới nhất
            </div>

            <input type="text" placeholder="Vui lòng nhập email.... " />
            <input style="height: 40px;width: 50px ; background-color: rgb(0, 0, 0);color: aliceblue; margin-left:-2px ;" type="submit" value="Gửi"> <br>
            <div class="icon">
                <a href="" class="facebook">
                    <div class="fa-brands fa-facebook"></div>
                </a>
                <a href="" class="instagram">
                    <div class="fa-brands fa-instagram"></div>
                </a>
                <a href="" class="youtube">
                    <div class="fa-brands fa-youtube"></div>
                </a>
            </div>



        </div>
    </div>
    </div>
</body>

</html>