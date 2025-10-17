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
    <div class="singin">
        @include('alert')
        <form action="" method="POST" id="registrationForm">
            @csrf
            <div class="dangki2">
                <label for="pass"> Đặt lại Mật Khẩu (ít nhất 8 ký tự)</label> <br>
                <input type="password" name="password" required minlength="8"> <br>
                <input type="submit" value="Đặt lại" id="submitButton">
            </div>
        </form>
    </div>
</div>
@endsection