@extends('layout.content')

@section('other')
<link rel="stylesheet" href="{{ asset('user-asset/CSS/sale.css') }}">
@endsection

@section('content')

<!-- Breadcrumb -->
<div class="breadcrumb fade-in">
    <a href="{{ route('viewhome') }}">Trang chủ</a>
    <span>/</span>
    <span>Tất cả sản phẩm</span>
</div>

<!-- Banner -->
<div class="banner zoom-in">
    <img src="{{ asset('user-asset/img/allsp.webp') }}" alt="Tất cả sản phẩm">
</div>

<!-- Layout -->
<div class="product-page slide-up">
    <!-- Sidebar -->
    <aside class="sidebar">
        <ul class="sidebar__menu">
            <li><strong>Danh mục</strong></li>
            <li><a href="#">Tất cả sản phẩm</a></li>
            @foreach ($type_products as $type_product)
            <li><a href="/collections/product/{{ $type_product->url }}">{{ $type_product->name_type }}</a></li>
            @endforeach
        </ul>
    </aside>

    <!-- Product Section -->
    <section class="product-section">
        <div class="product-header">
            <h3>TẤT CẢ SẢN PHẨM</h3>
            <div class="filter-tools">
                <!-- Màu sắc -->
                <div class="filter color-filter">
                    <span>Màu sắc <i class="fa-solid fa-chevron-down"></i></span>
                    <div class="filter-dropdown">
                        @foreach($colors as $color)
                        <a href="/productSearch/{{$color->id}}" class="color-dot"
                            style="background-color: {{ $color->color }}"></a>
                        @endforeach
                    </div>
                </div>

                <!-- Giá -->
                <div class="filter price-filter">
                    <span>Giá <i class="fa-solid fa-chevron-down"></i></span>
                    <div class="filter-dropdown">
                        <ul>
                            <li><a href="/">Tất cả</a></li>
                            <li><a href="{{ request()->fullUrlWithQuery(['price'=>'asc']) }}">Thấp → cao</a></li>
                            <li><a href="{{ request()->fullUrlWithQuery(['price'=>'desc']) }}">Cao → thấp</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        @if(isset($product_sales) && count($product_sales) > 0)
        <div class="product-grid">
            @foreach ($product_sales as $product)
            <div class="product-card fade-in">
                <div class="product-card__img">
                    <img src="/user-asset/img/{{ $product->sp_hinh }}" alt="{{ $product->sp_ten }}">
                    @if ($product->sp_sale != 0)
                    <div class="product-card__badge">-{{ $product->sp_sale }}%</div>
                    @endif
                </div>

                <div class="product-card__info">
                    <h4 class="product-card__title">{{ $product->sp_ten }}</h4>
                    @if ($product->sp_sale != 0)
                    <p class="product-card__price--old">{{ number_format($product->sp_giaBan, 0, ',', '.') }}₫</p>
                    @php
                    $priceAfterSale = $product->sp_giaBan - ($product->sp_giaBan * $product->sp_sale) / 100;
                    @endphp
                    <p class="product-card__price">{{ number_format($priceAfterSale, 0, ',', '.') }}₫</p>
                    @else
                    <p class="product-card__price">{{ number_format($product->sp_giaBan, 0, ',', '.') }}₫</p>
                    @endif
                </div>

                <div class="product-card__actions">
                    <a href="#" class="btn-action">Tư vấn ngay</a>
                </div>
            </div>
            @endforeach
        </div>

        <div class="pagination bounce-in">
            {{ $product_sales->links() }}
        </div>
        @else
        <h4 class="no-product fade-in">Không có sản phẩm nào.</h4>
        @endif
    </section>
</div>

<!-- Newsletter -->
<div class="newsletter fade-in">
    <div class="newsletter__map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3835.7333963918236!2d108.24978007500275!3d15.97529308469066!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3142108997dc971f%3A0x1295cb3d313469c9!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBDw7RuZyBuZ2jhu4cgVGjDtG5nIHRpbiB2w6AgVHJ1eeG7gW4gdGjDtG5nIFZp4buHdCAtIEjDoG4!5e0!3m2!1svi!2s!4v1686645400615!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

    <div class="newsletter__content">
        <h3>Đăng ký bản tin</h3>
        <p>Nhận ưu đãi và mẫu thiết kế mới nhất mỗi tuần.</p>
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