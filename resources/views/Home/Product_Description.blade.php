@extends('layout.content')

@section('other')
<link rel="stylesheet" href="{{ asset('user-asset/CSS/product_detail.css') }}">
<link rel="stylesheet" type="text/css" href="/templateNew/vendor/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/templateNew/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="/templateNew/fonts/iconic/css/material-design-iconic-font.min.css">
<link rel="stylesheet" type="text/css" href="/templateNew/fonts/linearicons-v1.0.0/icon-font.min.css">
<link rel="stylesheet" type="text/css" href="/templateNew/vendor/animate/animate.css">
<link rel="stylesheet" type="text/css" href="/templateNew/vendor/css-hamburgers/hamburgers.min.css">
<link rel="stylesheet" type="text/css" href="/templateNew/vendor/animsition/css/animsition.min.css">
<link rel="stylesheet" type="text/css" href="/templateNew/vendor/select2/select2.min.css">
<link rel="stylesheet" type="text/css" href="/templateNew/vendor/daterangepicker/daterangepicker.css">
<link rel="stylesheet" type="text/css" href="/templateNew/vendor/slick/slick.css">
<link rel="stylesheet" type="text/css" href="/templateNew/vendor/MagnificPopup/magnific-popup.css">
<link rel="stylesheet" type="text/css" href="/templateNew/vendor/perfect-scrollbar/perfect-scrollbar.css">
<link rel="stylesheet" type="text/css" href="/templateNew/css/util.css">
<link rel="stylesheet" type="text/css" href="/templateNew/css/main.css">
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')

<!-- Breadcrumb -->
<nav class="breadcrumb">
    <a href="/">Trang chủ</a> /
    <a href="#">Tất cả sản phẩm</a> /
    @foreach ($products as $product)
    <span>{{ $product->sp_ten }}</span>
    @endforeach
</nav>

<div class="product-detail container">

    @foreach ($products as $product)
    <div class="product-main grid">

        <!-- Hình ảnh sản phẩm -->
        <div class="product-images">
            <div class="main-img">
                <img src="/user-asset/img/{{ $product->sp_hinh }}" alt="{{ $product->sp_ten }}">
            </div>
            <div class="thumbs">
                <img src="/user-asset/img/{{ $product->sp_hinh1 }}" alt="">
                <img src="/user-asset/img/{{ $product->sp_hinh2 }}" alt="">
                <img src="/user-asset/img/{{ $product->sp_hinh3 }}" alt="">
            </div>
        </div>

        <!-- Thông tin sản phẩm -->
        <div class="product-info">
            <h1 class="product-name">{{ $product->sp_ten }}</h1>
            <p class="product-meta">
                Thương hiệu: <b>NEM</b> | Mã SP: <b>{{ $product->sp_ma }}</b>
            </p>

            @php
            $tienSale = $product->sp_giaBan - ($product->sp_giaBan * $product->sp_sale) / 100;
            @endphp

            <div class="product-price">
                <span class="current">{{ number_format($tienSale,0,',','.') }}₫</span>
                @if($product->sp_sale)
                <span class="old">{{ number_format($product->sp_giaBan,0,',','.') }}₫</span>
                <span class="badge-sale">{{ $product->sp_sale }}% OFF</span>
                @endif
            </div>

            <form action="/addPay/{{ $product->sp_ma }}" method="POST" class="product-form">
                @csrf
                <input type="hidden" name="price" value="{{ $tienSale }}">

                <div class="product-options">

                    <!-- Kích thước -->
                    <div class="option-group">
                        <label class="option-title">Kích thước:</label>
                        <div class="size-options">
                            @foreach ($sizes as $size)
                            <label class="size-label">
                                <input type="radio" name="size" value="{{ $size->size }}">
                                <span>{{ $size->size }}</span>
                            </label>
                            @endforeach
                        </div>
                    </div>

                    <!-- Màu sắc -->
                    <div class="option-group">
                        <label class="option-title">Màu sắc:</label>
                        <div class="color-options">
                            <span class="color-circle" style="background-color: {{ $product->color }}"></span>
                        </div>
                    </div>

                    <!-- Số lượng -->
                    <div class="option-group">
                        <label class="option-title">Số lượng:</label>
                        <input type="number" name="quantity" min="1" max="10" value="1" class="quantity-input">
                    </div>
                </div>

                <!-- Nút đặt hàng -->
                <div class="product-actions">
                    @if(Auth::check())
                    <button type="submit" class="btn btn-cart">Thêm vào giỏ</button>
                    <button type="submit" class="btn btn-buy">Mua ngay</button>
                    @else
                    <p class="login-notice">Vui lòng <a href="/login">Đăng nhập</a> để mua hàng</p>
                    @endif
                </div>
            </form>

            <div class="product-description">
                {!! $product->sp_thongTin !!}
            </div>
        </div>

    </div>
    @endforeach
</div>

<!-- Đánh giá sản phẩm -->
<section class="reviews container">
    <h3 class="section-title">Đánh giá sản phẩm</h3>

    <!-- Existing comments -->
    @foreach($comment as $cmt)
    <div class="review-card animate-fade">
        <img src="https://thespiritofsaigon.net/wp-content/uploads/2022/10/avatar-vo-danh-11.jpg" class="avatar">
        <div class="review-content">
            <h5>{{ $cmt->name }}</h5>
            <div class="stars">
                @for($i = 0; $i < 5; $i++)
                    <i class="zmdi {{ $i < $cmt->rating ? 'zmdi-star' : 'zmdi-star-outline' }}"></i>
                    @endfor
            </div>
            <p>{{ $cmt->content }}</p>
        </div>
    </div>
    @endforeach

    <div id="comment-error" class="text-danger mt-2"></div>

    <!-- Form đánh giá -->
    <form id="comment-form" class="comment-form">
        <input type="hidden" name="id_product" value="{{ $product->sp_ma }}">
        <div class="star-input mb-3">
            <label class="d-block mb-2 fw-bold">Đánh giá của bạn:</label>
            <div class="wrap-rating" id="rating-stars">
                @for($i = 1; $i <= 5; $i++)
                    <i class="item-rating zmdi zmdi-star-outline" data-value="{{ $i }}"></i>
                    @endfor
                    <input type="hidden" id="rating" name="rating" value="0">
            </div>
        </div>
        <textarea name="review" id="review" class="form-control mb-3" rows="3" placeholder="Viết nhận xét của bạn..."></textarea>
        <button type="submit" class="btn btn-submit">Gửi đánh giá</button>
    </form>
</section>


<!-- Sản phẩm liên quan -->
<section class="related-products container">
    <h3 class="section-title">Sản phẩm tương tự</h3>
    <div class="related-grid">
        @foreach ($productss->take(3) as $p)
        <div class="related-item">
            <a href="/product/{{ $p->sp_ma }}">
                <img src="/user-asset/img/{{ $p->sp_hinh }}" alt="{{ $p->sp_ten }}">
                <p class="related-name">{{ $p->sp_ten }}</p>
                <p class="related-price">{{ number_format($p->sp_giaGoc,0,',','.') }}₫</p>
            </a>
        </div>
        @endforeach
    </div>
</section>

<!-- Newsletter -->
<section class="newsletter container-fluid">
    <div class="newsletter-inner">
        <div class="text">
            <h2>Đăng ký bảng tin</h2>
            <p>Nhận mẫu thiết kế mới nhất qua email</p>
            <form class="newsletter-form">
                <input type="email" placeholder="Nhập email của bạn">
                <button type="submit">Gửi</button>
            </form>
            <div class="socials">
                <a href="#" class="fa fa-facebook"></a>
                <a href="#" class="fa fa-instagram"></a>
                <a href="#" class="fa fa-youtube"></a>
            </div>
        </div>
        <div class="map">
            <iframe src="https://www.google.com/maps/embed?..."></iframe>
        </div>
    </div>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        const stars = $("#rating-stars .item-rating");
        let selectedRating = 0;

        // Hover effect
        stars.hover(function() {
            const value = $(this).data("value");
            stars.each(function() {
                $(this).toggleClass("hovered", $(this).data("value") <= value);
            });
        }, function() {
            stars.removeClass("hovered");
        });

        // Click chọn sao
        stars.click(function() {
            selectedRating = $(this).data("value");
            $("#rating").val(selectedRating);
            stars.each(function() {
                $(this).toggleClass("active", $(this).data("value") <= selectedRating);
            });
        });

        // Submit form ajax
        $("#comment-form").submit(function(e) {
            e.preventDefault();
            const content = $("#review").val().trim();
            const rating = $("#rating").val();
            const id_product = $("input[name='id_product']").val();

            if (rating == 0) {
                $("#comment-error").text("Vui lòng chọn số sao trước khi gửi.");
                return;
            }
            if (content.length < 5) {
                $("#comment-error").text("Nội dung đánh giá quá ngắn (tối thiểu 5 ký tự).");
                return;
            }

            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                url: "/comment",
                method: "POST",
                data: {
                    content,
                    rating,
                    id_product
                },
                success: function(res) {
                    if (res.error) {
                        $("#comment-error").text(res.error);
                    } else {
                        $("#comment-error").html('<span class="text-success">Gửi đánh giá thành công!</span>');
                        $("#review").val("");
                        $("#rating").val(0);
                        stars.removeClass("active hovered");
                    }
                },
                error: function() {
                    $("#comment-error").text("Có lỗi xảy ra, vui lòng thử lại sau.");
                }
            });
        });
    });
</script>

@endsection