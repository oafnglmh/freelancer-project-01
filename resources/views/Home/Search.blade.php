@extends('layout.content')

@section('other')
<link rel="stylesheet" href="{{ asset('user-asset/CSS/pagesp02.css') }}">
@endsection

@section('content')

<!-- Breadcrumb -->
<div class="breadcrumb">
    <a href="/">Trang chủ</a> <span>/</span>
    <a href="#">Tất cả sản phẩm</a>
</div>

<!-- Banner -->
<div class="banner">
    <img src="{{ asset('user-asset/img/1700061705-slide.webp') }}" alt="Banner sản phẩm">
</div>

<!-- Main Product Page -->
<div class="product-page">

    <!-- Sidebar -->
    <aside class="product-page__sidebar">
        <h4 class="sidebar__title">Danh mục</h4>
        <ul class="sidebar__menu">
            <li><a href="#">Tất cả sản phẩm</a></li>
            @foreach ($type_products as $type_product)
            <li><a href="/collections/product/{{ $type_product->url }}">{{ $type_product->name_type }}</a></li>
            @endforeach
        </ul>
    </aside>

    @if($results->isEmpty())
    <h2 class="product-page__empty">Không có sản phẩm</h2>
    @else
    <!-- Product Main -->
    <div class="product-page__main">

        <!-- Header -->
        <div class="product-page__header">
            <h3>TẤT CẢ SẢN PHẨM</h3>
        </div>

        <!-- Filters -->
        <div class="product-page__filters">
            <!-- Color Filter -->
            <div class="filter filter--color">
                <span class="filter__title">Màu sắc <i class="fa-solid fa-chevron-down"></i></span>
                <div class="filter__dropdown">
                    @foreach($colors as $color)
                    <a href="/productSearch/{{ $color->id }}" class="filter__color-swatch" style="background-color: {{ $color->color }}"></a>
                    @endforeach
                </div>
            </div>

            <!-- Price Filter -->
            <div class="filter filter--price">
                <span class="filter__title">Giá <i class="fa-solid fa-chevron-down"></i></span>
                <ul class="filter__dropdown">
                    <li><a href="/">Tất cả</a></li>
                    <li><a href="{{ request()->fullUrlWithQuery(['price'=>'asc']) }}">Thấp đến cao</a></li>
                    <li><a href="{{ request()->fullUrlWithQuery(['price'=>'desc']) }}">Cao đến thấp</a></li>
                </ul>
            </div>
        </div>

        <!-- Product Grid -->
        <div class="product-page__grid">
            @foreach($results as $result)
            <div class="product-card">
                <div class="product-card__img">
                    <img src="/user-asset/img/{{ $result->sp_hinh }}" alt="{{ $result->sp_ten }}">
                    @if ($result->sp_sale)
                    <div class="product-card__sale">-{{ $result->sp_sale }}%</div>
                    @endif
                </div>
                <div class="product-card__info">
                    <a href="#" class="product-card__title">{{ $result->sp_ten }}</a>
                    @if ($result->sp_sale)
                    @php
                    $priceSale = $result->sp_giaBan - ($result->sp_giaBan * $result->sp_sale / 100);
                    @endphp
                    <div class="product-card__price">
                        <span class="price--old">{{ number_format($result->sp_giaBan,0,',','.') }}₫</span>
                        <span class="price--new">{{ number_format($priceSale,0,',','.') }}₫</span>
                    </div>
                    @else
                    <div class="product-card__price">
                        <span class="price--new">{{ number_format($result->sp_giaBan,0,',','.') }}₫</span>
                    </div>
                    @endif
                </div>
                <div class="product-card__actions">
                    <button class="btn btn--consult">Tư vấn</button>
                    <a href="#" class="btn btn--view">Xem chi tiết</a>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="pagination-wrapper">
            {{ $results->links() }}
        </div>

    </div>
    @endif

</div>

<!-- Newsletter -->
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

<!-- JS: Filter Toggle -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const filters = document.querySelectorAll('.filter');

        filters.forEach(filter => {
            filter.addEventListener('click', e => {
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