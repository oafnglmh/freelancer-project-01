@extends('layout.content');
{{-- kết thừa layout --}}

@section('other')
{{-- điên vào     @yield('other')  --}}

<link rel="stylesheet" href="{{ asset('user-asset/CSS/dangnhap.css') }}">
@endsection

@section('content')
<div class="linksmall">

    <a href="./index.html"> TRANG CHỦ </a>
    <span>/</span>
    <a href=""> ĐĂNG NHẬP- ĐĂNG KÍ</a>

</div>

<div class="home">
    <form action="" method="POST">
        @csrf
        <div style="margin-bottom: 50px;" class="login">
            @include('alert')
            <div class="dangnhap0"> <b>Quên mật khẩu</b></div>
            <div class="dangnhap2">
                <label for="hi">Nhập địa chỉ Email..</label> <br>
                <input type="email" name="email" placeholder="Email"> <br>
            </div>
            <input type="submit" value="Gửi">
        </div>
    </form>
</div>
</div>
@endsection