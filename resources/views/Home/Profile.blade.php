@extends('layout.content')

@section('other')
<link rel="stylesheet" href="{{ asset('user-asset/CSS/account.css') }}">
@endsection

@section('content')
<!-- Breadcrumb -->
<div class="breadcrumb fade-in">
    <a href="{{ route('viewhome') }}">Trang chủ</a>
    <span>/</span>
    <a href="#">Tài khoản</a>
</div>

<!-- Greeting -->
<div class="account-greeting fade-in-up">
    Xin chào,
    <strong>{{ auth()->check() ? auth()->user()->name : 'Khách' }}</strong>
</div>

<!-- Account Container -->
<div class="account-container">
    <!-- Sidebar -->
    <aside class="account-sidebar">
        <h4 class="account-sidebar__title">{{ auth()->check() ? auth()->user()->name : 'Chưa đăng nhập' }}</h4>
        <nav class="account-nav">
            <a href="#">Thông tin tài khoản</a>
            <a href="{{ route('orders') }}">Quản lý đơn hàng</a>
            <!-- <a href="#">Thông tin giao hàng</a> -->
        </nav>
    </aside>

    <!-- Main Content -->
    <section class="account-info">
        <div class="info-item fade-in-up">
            <label>Họ và Tên</label>
            <input type="text" value="{{ auth()->check() ? auth()->user()->name : 'Chưa đăng nhập' }}" readonly>
        </div>
        <div class="info-item fade-in-up">
            <label>Quốc gia</label>
            <input type="text" value="Việt Nam" readonly>
        </div>
        <div class="info-item fade-in-up">
            <label>Số điện thoại</label>
            <input type="text" value="{{ auth()->check() ? auth()->user()->number_phone : 'Chưa đăng nhập' }}" readonly>
        </div>
    </section>
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