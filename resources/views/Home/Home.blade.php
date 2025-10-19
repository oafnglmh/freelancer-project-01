@extends('layout.content')

@section('other')
    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('user-asset/CSS/Home.css') }}">
    {{-- Bootstrap JS --}}
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" defer></script> -->
    {{-- AOS animation --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js" defer></script>
    <script defer>
        document.addEventListener('DOMContentLoaded', () => AOS.init({ duration: 1000, once: true }));
    </script>
@endsection

@section('content')
<div class="home">

    {{-- ========== HERO SLIDER ========== --}}
    <section class="home__slider">
        <div id="mainCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                {{-- Slide 1 --}}
                <div class="carousel-item active">
                    <img src="https://datam.vn/wp-content/uploads/2017/04/edc-banner-collection.jpg" class="d-block w-100" alt="Slide 1">
                    <div class="carousel-caption text-start">
                        <h2 class="animate__fadeDown">Bộ Sưu Tập Mùa Thu 2025</h2>
                        <p class="animate__fadeUp">Phong cách tối giản – Sang trọng – Hiện đại</p>
                        <a href="#collection" class="btn btn-light mt-3 animate__slideIn">Khám phá ngay</a>
                    </div>
                </div>
                {{-- Slide 2 --}}
                <div class="carousel-item">
                    <img src="https://vuadasaigon.com/images/promo/5/Banner_wq7c-8y.jpg" class="d-block w-100" alt="Slide 2">
                    <div class="carousel-caption text-end">
                        <h2 class="animate__fadeDown">Thời Trang Nam Tinh Tế</h2>
                        <p class="animate__fadeUp">Định nghĩa lại sự lịch lãm và cá tính</p>
                        <a href="#products" class="btn btn-light mt-3 animate__slideIn">Xem Sản Phẩm</a>
                    </div>
                </div>
                {{-- Slide 3 --}}
                <div class="carousel-item">
                    <img src="https://jupiterleather.net/upload/images/jupiter-leather-1.jpg" class="d-block w-100" alt="Slide 3">
                    <div class="carousel-caption text-center">
                        <h2 class="animate__fadeDown">Khám Phá Phong Cách Của Bạn</h2>
                        <p class="animate__fadeUp">Mỗi outfit là một câu chuyện cá tính</p>
                        <a href="#blog" class="btn btn-light mt-3 animate__slideIn">Tìm Hiểu Ngay</a>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#mainCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#mainCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
    </section>

    {{-- ========== INTRO SECTION ========== --}}
    <section class="intro container text-center py-5" data-aos="fade-up">
        <h1 class="intro__title">
            <span class="typing-text">Thời Trang Tạo Dấu Ấn Riêng</span>
        </h1>
        <p class="intro__desc mt-3">
            Sự kết hợp giữa chất liệu cao cấp và thiết kế tinh tế giúp bạn tự tin khẳng định phong cách.
            Hãy để trang phục nói thay bạn.
        </p>
        <a href="#products" class="btn btn-dark mt-3 px-4 py-2 rounded-pill animate-btn">Khám Phá Ngay</a>
    </section>

    {{-- ========== COLLECTION SECTION ========== --}}
    <section id="collection" class="collection container py-5">
        <h2 class="section-title mb-5 text-center">BỘ SƯU TẬP NỔI BẬT</h2>
        <div class="row g-4">
            <div class="col-md-6" data-aos="fade-right">
                <div class="collection__item">
                    <img src="https://tamanh.net/wp-content/uploads/2023/08/shop-do-da-handmade-hcm-desino.jpg" class="img-fluid rounded" alt="">
                    <div class="collection__overlay">
                        <h5>NEW COLLECTION</h5>
                        <a href="#" class="btn btn-light btn-sm mt-2">SHOP NOW</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6" data-aos="fade-left">
                <div class="collection__item">
                    <img src="https://tamanh.net/wp-content/uploads/2022/08/nhu-cau-mua-sam-hang-thoi-trang-phu-kien-do-da-tai-quan-ha-dong.jpg" class="img-fluid rounded" alt="">
                    <div class="collection__overlay">
                        <h5>MEN'S FASHION</h5>
                        <a href="#" class="btn btn-light btn-sm mt-2">SHOP NOW</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ========== PRODUCT SECTION ========== --}}
    <section id="products" class="products container py-5">
        <h2 class="section-title mb-5 text-center">SẢN PHẨM MỚI</h2>
        <div class="row g-4 justify-content-center">
            @foreach ($products->take(6) as $product)
            <div class="col-6 col-md-4 col-lg-2" data-aos="zoom-in">
                <div class="product-card text-center shadow-sm p-3 rounded-4">
                <a href="/product/{{ $product->sp_ma }}" class="d-block overflow-hidden rounded-3">
                    <img src="{{ asset('user-asset/img/' . $product->sp_hinh) }}" 
                        class="product-card__img img-fluid" 
                        alt="{{ $product->sp_ten }}">
                </a>
                <h6 class="mt-3 fw-semibold" style="
                    white-space: nowrap;
                    overflow: hidden;
                    text-overflow: ellipsis;
                    display: block;
                    ">
                    {{ $product->sp_ten }}
                    </h6>
                <p class="text-muted mb-0">{{ number_format($product->sp_giaBan, 0, ',', '.') }}₫</p>
                </div>
            </div>
            @endforeach
        </div>
    </section>


    {{-- ========== BLOG SECTION ========== --}}
    <section id="blog" class="blog container py-5">
    <h2 class="section-title text-center mb-4">TIN TỨC & PHONG CÁCH</h2>
    <div class="row g-4">

        <!-- Bài viết 1 -->
        <div class="col-md-4">
        <div class="blog-card shadow-sm rounded-4 overflow-hidden position-relative fade-up">
            <img src="https://tamanh.net/wp-content/uploads/2023/06/do-da-handmade-la-gi.jpg" class="blog-card__img w-100" alt="Túi da thủ công">
            <div class="blog-card__overlay"></div>
            <div class="p-4 position-relative">
            <h5 class="fw-bold mb-2">Tinh Hoa Thủ Công Da Thật</h5>
            <p class="text-muted small mb-3">
                Mỗi sản phẩm da là kết tinh của thời gian, tỉ mỉ và bàn tay nghệ nhân.  
                Từng đường chỉ đều mang theo câu chuyện riêng.
            </p>
            <a href="#" class="text-dark fw-semibold text-decoration-none">Khám phá ngay →</a>
            </div>
        </div>
        </div>

        <!-- Bài viết 2 -->
        <div class="col-md-4">
        <div class="blog-card shadow-sm rounded-4 overflow-hidden position-relative fade-up">
            <img src="https://www.thegioibiada.com/images/upload/nhung-su-ket-hop-cac-chi-tiet-thoi-trang-do-da-voi-nhau_1631881433.jpg" class="blog-card__img w-100" alt="Phong cách thời trang da nam">
            <div class="blog-card__overlay"></div>
            <div class="p-4 position-relative">
            <h5 class="fw-bold mb-2">Phong Cách Da Nam 2025</h5>
            <p class="text-muted small mb-3">
                Từ áo khoác biker đến ví da tối giản — phong cách hiện đại pha chút cổ điển  
                luôn là biểu tượng của người đàn ông tự tin.
            </p>
            <a href="#" class="text-dark fw-semibold text-decoration-none">Xem xu hướng →</a>
            </div>
        </div>
        </div>

        <!-- Bài viết 3 -->
        <div class="col-md-4">
        <div class="blog-card shadow-sm rounded-4 overflow-hidden position-relative fade-up">
            <img src="https://file.hstatic.net/1000260559/article/mua_do_da_tren_internet_9ad7b192a58d4fa9ae650b2cdcd53e10_de85e2a4a8f44ec683e2697e850c0da6.jpg" class="blog-card__img w-100" alt="Cách bảo quản đồ da">
            <div class="blog-card__overlay"></div>
            <div class="p-4 position-relative">
            <h5 class="fw-bold mb-2">Bí Quyết Giữ Đồ Da Bền Đẹp</h5>
            <p class="text-muted small mb-3">
                Da thật càng dùng càng bóng đẹp, nhưng cũng cần được chăm sóc đúng cách.  
                Dưới đây là 5 mẹo giúp bạn giữ da như mới.
            </p>
            <a href="#" class="text-dark fw-semibold text-decoration-none">Tìm hiểu thêm →</a>
            </div>
        </div>
        </div>

    </div>
    </section>

    {{-- ========== MAP + NEWSLETTER ========== --}}
    <section class="newsletter container-fluid py-5 bg-light">
        <div class="row align-items-center">
            <div class="col-md-6" data-aos="fade-right">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18..." width="100%" height="400" style="border:0;" allowfullscreen loading="lazy"></iframe>
            </div>
            <div class="col-md-6 text-center" data-aos="fade-left">
                <h3 class="fw-bold mb-3">Đăng Ký Nhận Tin</h3>
                <p class="text-muted">Nhận xu hướng & ưu đãi mới nhất từ chúng tôi</p>
                <form class="d-flex justify-content-center mb-3">
                    <input type="email" class="form-control w-50 rounded-pill" placeholder="Nhập email của bạn...">
                    <button type="submit" class="btn btn-dark ms-2 rounded-pill px-4">Gửi</button>
                </form>
                <div class="social-icons d-flex justify-content-center gap-3">
                    <a href="#" class="text-dark fs-4"><i class="fa-brands fa-facebook"></i></a>
                    <a href="#" class="text-dark fs-4"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#" class="text-dark fs-4"><i class="fa-brands fa-youtube"></i></a>
                </div>
            </div>
        </div>
    </section>

</div>

{{-- Messenger Icon --}}
<div id="messenger-chat">
    <a href="{{ auth()->check() ? '/chatify/1' : '#' }}">
        <div id="messenger-icon">
            <i class="fa-brands fa-facebook-messenger"></i>
        </div>
    </a>
</div>

<script>
    const userId = {{ auth()->check() ? auth()->id() : 'null' }};
    console.log("Current user ID:", userId);
</script>
@endsection
