@extends('layout.content')

@section('other')
<link rel="stylesheet" href="{{ asset('user-asset/CSS/bosuutap.css') }}">
@endsection

@section('content')

<!-- Breadcrumb -->
<div class="breadcrumb">
    <a href="{{ route('viewhome') }}">Trang chủ</a> /
    <span>Bộ sưu tập</span>
</div>

<!-- Banner -->
<div class="banner">
    <img src="{{ asset('user-asset/img/1700062016-slide.webp') }}" alt="Bộ sưu tập" class="fade-in">
</div>

<!-- Collection Section -->
<section class="collection">
    <div class="collection-left">
        <div class="product-grid">
            @for ($i = 0; $i < 4; $i++)
                <div class="product-card">
                <div class="product-img">
                    <img src="{{ asset('user-asset/img/16987690410-product.webp') }}" alt="Sản phẩm {{ $i + 1 }}">
                </div>
                <div class="product-info">
                    <h3>Sản phẩm {{ $i + 1 }}</h3>
                    <p class="price">699,000₫</p>
                    <a href="#" class="btn-action">Tư vấn ngay</a>
                </div>
        </div>
        @endfor
    </div>

    <div class="collection-description">
        <h2>𝐍𝐀𝐓𝐔𝐑𝐄 𝐈𝐒 𝐂𝐀𝐋𝐋𝐈𝐍𝐆 // 𝐌𝐢𝐧𝐢 𝐂𝐨𝐥𝐥𝐞𝐜𝐭𝐢𝐨𝐧 '𝟐𝟑</h2>
        <p>
            Tháng 5 gần qua đi cũng là lúc báo hiệu cho ngày Hè cùng các item mang âm hưởng mùa nghỉ dưỡng đang dần quay trở lại.
            <br><br>
            Điểm nổi bật nhất của bộ sưu tập này là công nghệ đổ màu loang tie-dye, tạo hiệu ứng "những bông hoa nở’’ đầy bắt mắt
            trên thước vải mềm mại. <br><br>
            Hãy cùng NEM chuẩn bị những bộ trang phục đẹp nhất để chờ đón các chuyến đi đầy thú vị!
        </p>
        <a href="#" class="btn-more">Xem thêm</a>
    </div>
    </div>

    <div class="collection-right">
        <img src="{{ asset('user-asset/img/16987690410-product.webp') }}" alt="">
        <img src="{{ asset('user-asset/img/16987690410-product.webp') }}" alt="">
    </div>
</section>

<!-- Newsletter -->
<section class="newsletter">
    <div class="newsletter-map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3835.7333963918236!2d108.24978007500275!3d15.97529308469066!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3142108997dc971f%3A0x1295cb3d313469c9!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBDw7RuZyBuZ2jhu4cgVGjDtG5nIHRpbiB2w6AgVHJ1eeG7gW4gdGjDtG5nIFZp4buHdCAtIEjDoG4!5e0!3m2!1svi!2s!4v1686645400615!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <div class="newsletter-content">
        <h3>Đăng Kí Bảng Tin</h3>
        <p>Nhận mẫu thiết kế mới nhất và ưu đãi hấp dẫn</p>
        <form>
            <input type="email" placeholder="Nhập email của bạn..." required>
            <button type="submit">Gửi</button>
        </form>
        <div class="social-icons">
            <a href="#"><i class="fa-brands fa-facebook"></i></a>
            <a href="#"><i class="fa-brands fa-instagram"></i></a>
            <a href="#"><i class="fa-brands fa-youtube"></i></a>
        </div>
    </div>
</section>

@endsection