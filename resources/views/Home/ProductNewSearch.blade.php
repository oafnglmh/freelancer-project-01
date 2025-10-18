@extends('layout.content')

@section('other')
<link rel="stylesheet" href="{{ asset('user-asset/CSS/pagesp.css') }}">
@endsection

@section('content')
<div class="breadcrumb">
    <a href="/">Trang chủ</a> <span>/</span>
    <a href="#">Tất cả sản phẩm</a>
    @foreach($productnews->take(1) as $color)
    <span>/</span> <a>#{{ $color->nameColor }}</a>
    @endforeach
</div>

<div class="banner">
    <img src="{{ asset('user-asset/img/1699199848-slide.webp') }}" alt="Tất cả sản phẩm">
</div>

<div class="product-page">
    <aside class="sidebar">
        <h4 class="sidebar__title">Danh mục</h4>
        <ul class="sidebar__menu">
            <li><a href="#">Tất cả sản phẩm</a></li>
            @foreach ($type_products as $type)
            <li><a href="/collections/product/{{ $type->url }}">{{ $type->name_type }}</a></li>
            @endforeach
        </ul>
    </aside>

    <div class="product-main">
        <div class="product-header">
            <h3>TẤT CẢ SẢN PHẨM</h3>
            @foreach($productnews->take(1) as $color)
            <span class="product-color">#{{ $color->nameColor }}</span>
            @endforeach
        </div>

        <div class="product-filters">
            <div class="filter filter-color">
                <span>Màu sắc <i class="fa-solid fa-chevron-down"></i></span>
                <div class="filter-dropdown">
                    @foreach($colors as $color)
                    <a href="/productSearch/{{ $color->id }}" class="color-swatch" style="background-color: {{ $color->color }}"></a>
                    @endforeach
                </div>
            </div>

            <div class="filter filter-price">
                <span>Giá <i class="fa-solid fa-chevron-down"></i></span>
                <ul class="filter-dropdown">
                    <li><a href="/">Tất cả</a></li>
                    <li><a href="{{ request()->fullUrlWithQuery(['price'=>'asc']) }}">Thấp đến cao</a></li>
                    <li><a href="{{ request()->fullUrlWithQuery(['price'=>'desc']) }}">Cao đến thấp</a></li>
                </ul>
            </div>
        </div>

        <div class="product-grid">
            @foreach ($productnews as $product)
            <div class="product-card">
                <div class="product-card__img">
                    <img src="/user-asset/img/{{ $product->sp_hinh }}" alt="{{ $product->sp_ten }}">
                    @if ($product->sp_sale)
                    <div class="product-card__sale">-{{ $product->sp_sale }}%</div>
                    @endif
                </div>
                <div class="product-card__info">
                    <a href="" class="product-card__title">{{ $product->sp_ten }}</a>
                    @if ($product->sp_sale)
                    @php
                    $priceSale = $product->sp_giaBan - ($product->sp_giaBan * $product->sp_sale / 100);
                    @endphp
                    <div class="product-card__price">
                        <span class="old">{{ number_format($product->sp_giaBan,0,',','.') }}₫</span>
                        <span class="new">{{ number_format($priceSale,0,',','.') }}₫</span>
                    </div>
                    @else
                    <div class="product-card__price">
                        <span class="new">{{ number_format($product->sp_giaBan,0,',','.') }}₫</span>
                    </div>
                    @endif
                </div>
                <div class="product-card__actions">
                    <button class="btn btn-consult">Tư vấn</button>
                    <a href="#" class="btn btn-view">Xem chi tiết</a>
                </div>
            </div>
            @endforeach
        </div>

        <div class="pagination-wrapper">
            {{ $productnews->links() }}
        </div>
    </div>
</div>

<div class="newsletter">
    <div class="newsletter__map">
        <iframe src="https://www.google.com/maps/embed?pb=!..." allowfullscreen="" loading="lazy"></iframe>
    </div>
    <div class="newsletter__content">
        <h3>Đăng ký bảng tin</h3>
        <p>Đăng ký để nhận mẫu thiết kế mới nhất mỗi tuần.</p>
        <form class="newsletter__form">
            <input type="email" placeholder="Nhập email của bạn...">
            <button type="submit">Gửi</button>
        </form>
        <div class="newsletter__socials">
            <a href="#" class="social facebook"><i class="fa-brands fa-facebook"></i></a>
            <a href="#" class="social instagram"><i class="fa-brands fa-instagram"></i></a>
            <a href="#" class="social youtube"><i class="fa-brands fa-youtube"></i></a>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const filters = document.querySelectorAll('.filter');

        filters.forEach(filter => {
            filter.addEventListener('click', (e) => {
                e.stopPropagation();
                filters.forEach(f => {
                    if (f !== filter) f.classList.remove('active');
                });
                filter.classList.toggle('active');
            });
        });

        document.addEventListener('click', () => {
            filters.forEach(f => f.classList.remove('active'));
        });
    });
</script>

@endsection