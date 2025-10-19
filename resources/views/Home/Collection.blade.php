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
    <img src="https://res.klook.com/image/upload/w_750,h_469,c_fill,q_85/w_80,x_15,y_15,g_south_west,l_Klook_water_br_trans_yhcmh3/activities/xh1tentbdn0tvhcg6zjh.jpg" alt="Bộ sưu tập" class="fade-in">
</div>

<!-- Collection Section -->
<section class="collection">
    <div class="collection-left">
        <div class="product-grid">
            @for ($i = 0; $i < 4; $i++)
                <div class="product-card">
                <div class="product-img">
                    <img src="{{ asset('user-asset/img/tui01.jpg') }}" alt="Sản phẩm {{ $i + 1 }}">
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
        <img src="{{ asset('user-asset/img/tui01.jpg') }}" alt="">
        <img src="{{ asset('user-asset/img/tui01.jpg') }}" alt="">
    </div>
</section>

<!-- Newsletter -->
<section class="newsletter">
    <div class="newsletter-map">
       <iframe src="https://www.google.com/maps/embed?...your_link..."
                    width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
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