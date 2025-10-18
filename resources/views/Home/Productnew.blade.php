@extends('layout.content')

@section('other')
<link rel="stylesheet" href="{{ asset('user-asset/CSS/all_products.css') }}">
@endsection

@section('content')

<!-- Breadcrumb -->
<div class="breadcrumb fade-in">
    <a href="{{ route('viewhome') }}">Trang chủ</a> <span>/</span>
    <span>Tất cả sản phẩm</span>
</div>

<!-- Banner -->
<div class="banner-products fade-in">
    <img src="{{ asset('user-asset/img/allsp.webp') }}" alt="Tất cả sản phẩm">
</div>

<!-- Main Container -->
<div class="products-container">
    <!-- Sidebar -->
    <aside class="products-sidebar slide-left">
        <h3>Danh mục</h3>
        <ul>
            <li><a href="">Tất cả sản phẩm</a></li>
            @foreach ($type_products as $type)
            <li><a href="/collections/product/{{$type->url}}">{{ $type->name_type }}</a></li>
            @endforeach
        </ul>

        <div class="filter-section">
            <h4>Màu sắc</h4>
            <div class="colors">
                @foreach($colors as $color)
                <a href="/productSearch/{{$color->id}}" class="color-circle" style="background-color: {{$color->color}};"></a>
                @endforeach
            </div>
        </div>

        <div class="filter-section">
            <h4>Giá</h4>
            <ul class="price-filter">
                <li><a href="/">Tất cả</a></li>
                <li><a href="{{ request()->fullUrlWithQuery(['price'=>'asc']) }}">Giá thấp → cao</a></li>
                <li><a href="{{ request()->fullUrlWithQuery(['price'=>'desc']) }}">Giá cao → thấp</a></li>
            </ul>
        </div>
    </aside>

    <!-- Product Grid -->
    <section class="products-grid fade-up">
        @foreach ($productnews as $product)
        <div class="product-card">
            <div class="product-image">
                <img src="/user-asset/img/{{ $product->sp_hinh }}" alt="{{ $product->sp_ten }}">
                @if ($product->sp_sale != 0)
                <div class="badge-sale">-{{$product->sp_sale}}%</div>
                @endif
            </div>
            <div class="product-info">
                <h3>{{ $product->sp_ten }}</h3>
                @if ($product->sp_sale != 0)
                @php
                $salePrice = $product->sp_giaBan - ($product->sp_giaBan * $product->sp_sale / 100);
                @endphp
                <p class="price-original">{{ number_format($product->sp_giaBan,0,',','.') }}₫</p>
                <p class="price-sale">{{ number_format($salePrice,0,',','.') }}₫</p>
                @else
                <p class="price-sale">{{ number_format($product->sp_giaBan,0,',','.') }}₫</p>
                @endif
            </div>
            <div class="product-actions">
                <a href="#" class="btn-action">Tư vấn ngay</a>
            </div>
        </div>
        @endforeach
    </section>
</div>

<!-- Pagination -->
<div class="pagination-wrapper fade-in">
    {{ $productnews->links() }}
</div>

<!-- Newsletter & Map -->
<div class="newsletter-map fade-in">
    <div class="map-section">
        <iframe src="https://www.google.com/maps/embed?...your_link..."
                    width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
    <div class="newsletter-section">
        <h3>Đăng Kí Bảng Tin</h3>
        <p>Nhận mẫu thiết kế mới nhất và ưu đãi hấp dẫn</p>
        <form class="newsletter-form">
            <input type="email" placeholder="Nhập email của bạn" required>
            <button type="submit">Gửi</button>
        </form>
        <div class="social-icons">
            <a href="#"><i class="fa-brands fa-facebook"></i></a>
            <a href="#"><i class="fa-brands fa-instagram"></i></a>
            <a href="#"><i class="fa-brands fa-youtube"></i></a>
        </div>
    </div>
</div>

@endsection