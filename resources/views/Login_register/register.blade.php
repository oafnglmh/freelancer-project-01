@extends('layout.content');
{{-- kết thừa layout --}}

@section('other')
{{-- điên vào     @yield('other')  --}}

<link rel="stylesheet" href="{{ asset('user-asset/CSS/dangnhap.css') }}">
<link rel="stylesheet" type="text/css" href="/templateNew/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
@endsection

@section('content')

<!-- Breadcrumb -->
<div class="breadcrumb">
    <a href="{{ route('viewhome') }}">Trang chủ</a> <span>/</span>
    <a href="#">Đăng Nhập / Đăng Kí</a>
</div>

<!-- Auth Container -->
<div class="auth-container">

    <!-- Login Section -->
    <div class="auth-card auth-card--login">
        <h2 class="auth-card__title">ĐĂNG NHẬP</h2>
        <p class="auth-card__desc">Đăng nhập để tích lũy điểm và nhận ưu đãi hấp dẫn.</p>

        <form action="{{ route('loginnow') }}" method="POST" class="auth-form">
            @csrf
            @if (Session::has('errorlogin'))
            <div class="alert alert-danger">{{ Session::get('errorlogin') }}</div>
            @endif
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Mật Khẩu" required>
            <div class="auth-form__links">
                <a href="/account/forget-password">Quên mật khẩu?</a>
            </div>
            <button type="submit" class="btn btn-primary">Đăng Nhập</button>
        </form>

        <div class="auth-divider">OR</div>

        <a href="{{ route('login-by-google') }}" class="btn btn-google">
            <i class="fa fa-google"></i> Đăng nhập với Google
        </a>
    </div>

    <!-- Register Section -->
    <div class="auth-card auth-card--register">
        <h2 class="auth-card__title">ĐĂNG KÍ</h2>
        <p class="auth-card__desc">Tạo tài khoản để nhận ưu đãi và tích lũy điểm thành viên.</p>

        @if (Session::has('error'))
        <div class="alert alert-danger">{{ Session::get('error') }}</div>
        @endif

        <form action="{{ route('getinfo') }}" method="POST" id="registerForm" class="auth-form">
            @csrf
            <input type="email" name="email" placeholder="Email" required>
            <input type="text" name="name" placeholder="Họ và tên" required>
            <input type="tel" name="number_phone" placeholder="Số điện thoại" pattern="0\d{9,10}|(\+84|0)\d{9,10}">
            <input type="password" name="password" placeholder="Mật Khẩu (ít nhất 8 ký tự)" required minlength="8">
            <div class="auth-form__checkbox">
                <label>
                    <input type="checkbox" name="newsletter"> Đăng ký nhận bản tin
                </label>
                <label>
                    <input type="checkbox" name="terms" required> Tôi đồng ý với điều khoản
                </label>
            </div>
            <button type="submit" class="btn btn-primary">Đăng Kí Tài Khoản</button>
        </form>
    </div>

</div>
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
    @if(Session::has('success_register'))
    <div id="registerToast" class="toast align-items-center text-bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                {{ Session::get('success_register') }}
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
    @endif
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var toastEl = document.getElementById('registerToast');
        if (toastEl) {
            var toast = new bootstrap.Toast(toastEl, {
                delay: 4000
            });
            toast.show();
        }
    });
</script>


@endsection