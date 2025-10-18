@extends('layout.content')

@section('other')
    <link rel="stylesheet" href="{{ asset('user-asset/CSS/slider.css') }}">
    <link rel="stylesheet" href="{{ asset('user-asset/CSS/slider1.css') }}">
    <link rel="stylesheet" href="{{ asset('user-asset/CSS/sliderblog.css') }}">
    <link rel="stylesheet" href="{{ asset('user-asset/CSS/Home.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="{{ asset('user-asset/JS/javascrip.js') }}" defer></script>
    <script src="{{ asset('user-asset/JS/jsao.js') }}" defer></script>
    <script src="{{ asset('user-asset/JS/jsblog.js') }}" defer></script>
@endsection




@section('content')
<div class="home">

    {{-- ========== SLIDER ========== --}}
    <section class="home__slider">
        <div id="mainCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($sliders as $key => $slide)
                    <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                        <img src="{{ asset('user-asset/img/' . $slide->t_Image) }}" class="d-block w-100" alt="Slider Image">
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#mainCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#mainCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
    </section>

    {{-- ========== COLLECTION ========== --}}
    <section class="collection container py-5">
        <div class="row g-4">
            @foreach ($banners->take(2) as $banner)
                <div class="col-md-6" data-aos="fade-up">
                    <a href="#" class="collection__item position-relative d-block">
                        <img src="{{ asset('user-asset/img/' . $banner->t_Image) }}" class="img-fluid rounded" alt="Collection">
                        <div class="collection__overlay d-flex flex-column justify-content-center align-items-center">
                            <h5 class="text-white fw-bold">NEW COLLECTION</h5>
                            <span class="btn btn-light btn-sm mt-2">SHOP NOW</span>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </section>

    {{-- ========== NEW PRODUCTS ========== --}}
    <section class="products container py-5">
        <h2 class="section-title" data-aos="fade-right">SẢN PHẨM MỚI</h2>
        <div class="row g-4 mt-3">
            @foreach ($products->take(6) as $product)
                <div class="col-6 col-md-4 col-lg-2" data-aos="zoom-in">
                    <div class="product-card text-center">
                        <a href="/product/{{ $product->sp_ma }}">
                            <img src="{{ asset('user-asset/img/' . $product->sp_hinh) }}" class="product-card__img rounded">
                        </a>
                        <h6 class="mt-2">{{ $product->sp_ten }}</h6>
                        <p class="text-muted">{{ number_format($product->sp_giaBan, 0, ',', '.') }} VND</p>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    {{-- ========== CATEGORY: ÁO SƠ MI ========== --}}
    <section class="category container py-5">
        <h2 class="section-title" data-aos="fade-right">ÁO SƠ MI</h2>
        <div class="category__carousel d-flex overflow-auto gap-4 mt-3 pb-3">
            @foreach ($productaovets as $item)
                <div class="category__item flex-shrink-0" data-aos="zoom-in">
                    <a href="/product/{{ $item->sp_ma }}">
                        <img src="{{ asset('user-asset/img/' . $item->sp_hinh) }}" class="category__img rounded">
                    </a>
                    <h6 class="mt-2">{{ $item->sp_ten }}</h6>
                    <p class="text-muted">{{ number_format($item->sp_giaBan, 0, ',', '.') }} VND</p>
                </div>
            @endforeach
        </div>
    </section>

    {{-- ========== CATEGORY: ÁO THUN ========== --}}
    <section class="category container py-5">
        <h2 class="section-title" data-aos="fade-right">ÁO THUN CAO CẤP</h2>
        <div class="category__carousel d-flex overflow-auto gap-4 mt-3 pb-3">
            @foreach ($productaothuns as $item)
                <div class="category__item flex-shrink-0" data-aos="zoom-in">
                    <a href="/product/{{ $item->sp_ma }}">
                        <img src="{{ asset('user-asset/img/' . $item->sp_hinh) }}" class="category__img rounded">
                    </a>
                    <h6 class="mt-2">{{ $item->sp_ten }}</h6>
                    <p class="text-muted">{{ number_format($item->sp_giaBan, 0, ',', '.') }} VND</p>
                </div>
            @endforeach
        </div>
    </section>

    {{-- ========== BLOG SECTION ========== --}}
    <section class="blog container py-5">
        <h2 class="section-title" data-aos="fade-right">BLOG</h2>
        <p class="text-muted text-center">ĐÓN ĐẦU PHONG CÁCH XU HƯỚNG</p>
        <div class="row g-4 mt-3">
            @foreach ($blogs as $blog)
                <div class="col-12 col-md-4" data-aos="fade-up">
                    <div class="blog-card">
                        <a href="#">
                            <img src="{{ asset('user-asset/img/' . $blog->sp_hinh) }}" class="blog-card__img rounded">
                        </a>
                        <div class="blog-card__body mt-2">
                            <h6>{{ $blog->sp_ten ?? 'MINIMAL CHIC' }}</h6>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    {{-- ========== MAP & NEWSLETTER ========== --}}
    <section class="newsletter container-fluid py-5 bg-light">
        <div class="row align-items-center">
            <div class="col-md-6" data-aos="fade-right">
                <iframe src="https://www.google.com/maps/embed?...your_link..."
                    width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
            <div class="col-md-6 text-center" data-aos="fade-left">
                <h3 class="fw-bold mb-3">Đăng Ký Bảng Tin</h3>
                <p>Nhận mẫu thiết kế mới nhất từ chúng tôi</p>
                <form class="d-flex justify-content-center mb-3">
                    <input type="email" class="form-control w-50" placeholder="Nhập email...">
                    <button type="submit" class="btn btn-dark ms-2">Gửi</button>
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

{{-- Bootstrap JS --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@endsection
