@extends('layout.content')
@section('other')
<link rel="stylesheet" href="{{asset('user-asset/CSS/thanhtoan.css')}}">
<link rel="stylesheet" href="{{asset('user-asset/CSS/bosuutap.css')}}">
@endsection
@section('content ')
<div class="menu2">

    <div class="menu2-left">
        <div class="info">
            <a href="../HTML/giohang.html">Giỏ hàng <b>></b></a>
            <span>Thông tin vận chuyển <b>></b></span>
            <span>Phương thức thanh toán</span>
        </div>
        <div class="thongtinthanhtoan">Thông tin thanh toán</div>
        @if(Auth::check())
        <p> Xin chào, {{ Auth::user()->name }} </p>
        @else
        <div class="dtk"> Bạn đã có tài khoản chưa? <a href="">Đăng Nhập </a> </div>
        @endif
        <form action="{{route('addpay')}}" method="post">
            @csrf
            <input style="width:640px" name="username" type="text" value="{{ Auth::user()->name }} " placeholder="Họ và tên">
            <input type="tel" style="width:640px" name="tel" value="{{ Auth::user()->number_phone }} " id="" placeholder="Số Điện Thoại">
            <input style="width:640px" name="address" type="text" name="" id="" placeholder="Chi tiết địa chỉ">
            <div class="gioihang">
                <a href="giohang.html" style=" text-decoration: none;">
                    <div class="gioihang1">Giỏ Hàng</div>
                </a>
                <button></button>
                <button style="submit" onclick="dathang()">
                    <div class="phuongthucthanhtoan" style="cursor: pointer;">Đặt Hàng</div>
                </button>
            </div>




    </div>
    <div class="menu2-right">
        @if(Auth::check())
        <table class="table">
            <tbody>
                @foreach($carts as $cart)
                <tr>
                    <td> <img style="width: 70px" src="/user-asset/img/{{$cart->sp_hinh}}" alt="">
                    </td>
                    <td>{{$cart->sp_ten}} <br> {{$cart->size}} / {{$cart->color}} / {{$cart->quantity}}</td>
                    <td>{{ number_format($cart->price, 0, ',', '.') }} VND</td>

                </tr>




                @endforeach
                <tr>
                    <td colspan="2">
                        <h4>Tạm tính</h4>
                    </td>
                    <td>
                        <h5>{{ number_format($total, 0, ',', '.') }} VND</h5>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <h4>Tổng tiền</h4>
                    </td>
                    <td>
                        <input type="hidden" name="tongtien" value=" {{$total}}">
                        <h5>{{ number_format($total, 0, ',', '.') }} VND</h5>
                    </td>
                </tr>
                </form>
            </tbody>
        </table>

        @else
        <h1>Bạn chưa đăng nhập</h1>
        @endif
    </div>
</div>

</body>

</html>