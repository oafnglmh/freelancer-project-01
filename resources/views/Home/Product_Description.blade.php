@extends('layout.content')

@section('other')
<link rel="stylesheet" href="{{ asset('user-asset/CSS/product_detail.css') }}">
<<link rel="stylesheet" type="text/css" href="/templateNew/vendor/bootstrap/css/bootstrap.min.css">
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
    <div class="breadcrumb-container">
        <a href="/">Trang chủ</a>
        <span>/</span>
        <a href="#">Tất cả sản phẩm</a>
        @foreach ($products as $product)
        <span>/</span><span>{{ $product->sp_ten }}</span>
        @endforeach
    </div>

    <div class="product-detail container">
        @foreach ($products as $product)
        <div class="row product-main">
            <!-- Hình ảnh sản phẩm -->
            <div class="col-md-6 image-gallery">
                <div class="thumbs">
                    <i class="fa fa-chevron-up nav-up"></i>
                    <div class="thumb-list">
                        <img src="/user-asset/img/{{ $product->sp_hinh1 }}" alt="">
                        <img src="/user-asset/img/{{ $product->sp_hinh2 }}" alt="">
                        <img src="/user-asset/img/{{ $product->sp_hinh3 }}" alt="">
                    </div>
                    <i class="fa fa-chevron-down nav-down"></i>
                </div>
                <div class="main-img">
                    <img src="/user-asset/img/{{ $product->sp_hinh }}" alt="">
                </div>
            </div>

            <!-- Thông tin sản phẩm -->
            <div class="col-md-6 product-info">
                <h1 class="product-name animate-fade">{{ $product->sp_ten }}</h1>
                <p class="product-meta">Thương hiệu: <b>NEM</b> | Mã SP: <b>{{ $product->sp_ma }}</b></p>

                @php
                $tienSale = $product->sp_giaBan - ($product->sp_giaBan * $product->sp_sale) / 100;
                @endphp
                <div class="product-price">
                    <span class="current">{{ number_format($tienSale, 0, ',', '.') }}đ</span>
                    @if ($product->sp_sale != 0)
                    <span class="old">{{ number_format($product->sp_giaBan, 0, ',', '.') }}đ</span>
                    @endif
                </div>

                <form action="/addPay/{{ $product->sp_ma }}" method="POST">
                    @csrf
                    <input type="hidden" name="price" value="{{ $tienSale }}">

                    <div class="product-size">
                        <h4>Kích thước</h4>
                        <div class="size-options">
                            @foreach ($sizes as $size)
                            <label class="size-item">
                                <input type="radio" name="size" value="{{ $size->size }}">
                                <span>{{ $size->size }}</span>
                            </label>
                            @endforeach
                        </div>
                    </div>

                    <div class="product-color">
                        <h4>Màu sắc</h4>
                        <div class="color-circle" style="background-color: {{ $product->color }}"></div>
                    </div>

                    <div class="product-quantity">
                        <label>Số lượng</label>
                        <input type="number" name="quantity" min="1" max="10" value="1">
                    </div>

                    <div class="product-actions">
                        @if (Auth::check())
                        <button type="submit" class="btn btn-cart">Thêm vào giỏ hàng</button>
                        <button type="submit" class="btn btn-buy">Đặt mua ngay</button>
                        @else
                        <p class="login-notice">Bạn đã có tài khoản chưa? <a href="/login">Đăng nhập</a></p>
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

    <!-- Đánh giá -->
    <section class="review-section container">
        <h3 class="section-title">Đánh giá sản phẩm</h3>

        @foreach($comment as $cmt)
        <div class="review animate-slide">
            <img src="https://thespiritofsaigon.net/wp-content/uploads/2022/10/avatar-vo-danh-11.jpg" alt="avatar" class="avatar">
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

        <form id="comment-form" class="comment-form">
            <input type="hidden" name="id_product" value="{{ $product->sp_ma }}">

            <div class="star-input mb-3">
                <label class="d-block mb-2 fw-bold">Đánh giá của bạn:</label>
                <div class="wrap-rating" id="rating-stars">
                    <i class="item-rating zmdi zmdi-star-outline" data-value="1"></i>
                    <i class="item-rating zmdi zmdi-star-outline" data-value="2"></i>
                    <i class="item-rating zmdi zmdi-star-outline" data-value="3"></i>
                    <i class="item-rating zmdi zmdi-star-outline" data-value="4"></i>
                    <i class="item-rating zmdi zmdi-star-outline" data-value="5"></i>
                    <input type="hidden" id="rating" name="rating" value="0">
                </div>
            </div>

            <textarea name="review" id="review" class="form-control mb-3" rows="3" placeholder="Viết nhận xét của bạn..."></textarea>
            <button type="submit" id="send" class="btn btn-submit">Gửi đánh giá</button>
        </form>
    </section>

    <!-- Sản phẩm tương tự -->
    <section class="related-products container">
        <h3 class="section-title">Sản phẩm tương tự</h3>
        <div class="row">
            @foreach ($productss->take(3) as $productt)
            <div class="col-md-4 related-item animate-pop">
                <div class="card">
                    <img src="/user-asset/img/{{ $productt->sp_hinh }}" alt="{{ $productt->sp_ten }}">
                    <div class="card-body">
                        <a href="/product/{{ $productt->sp_ma }}" class="product-link">{{ $productt->sp_ten }}</a>
                        <p class="price">{{ number_format($productt->sp_giaGoc, 0, ',', '.') }}₫</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <!-- Đăng ký bảng tin -->
    <section class="newsletter container-fluid">
        <div class="newsletter-inner">
            <div class="text">
                <h2>Đăng ký bảng tin</h2>
                <p>Nhận mẫu thiết kế mới nhất qua email</p>
                <form class="newsletter-form">
                    <input type="email" placeholder="Nhập email của bạn...">
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

            stars.on("mouseenter", function() {
                const value = $(this).data("value");
                stars.each(function(index) {
                    $(this).toggleClass("hovered", index < value);
                });
            });

            stars.on("mouseleave", function() {
                stars.removeClass("hovered");
            });

            stars.on("click", function() {
                const value = $(this).data("value");
                $("#rating").val(value);
                stars.each(function(index) {
                    $(this).toggleClass("active", index < value);
                });
            });
            $("#comment-form").submit(function(event) {
                event.preventDefault();

                const content = $("#review").val().trim();
                const rating = $("#rating").val();
                const id_product = $("input[name='id_product']").val();

                if (rating == 0) {
                    $("#comment-error").html("Vui lòng chọn số sao trước khi gửi.");
                    return;
                }
                if (content.length < 5) {
                    $("#comment-error").html("Nội dung đánh giá quá ngắn (tối thiểu 5 ký tự).");
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
                            $("#comment-error").html(res.error);
                        } else {
                            $("#comment-error").html('<span class="text-success">Gửi đánh giá thành công!</span>');
                            $("#review").val("");
                            $("#rating").val(0);
                            stars.removeClass("active hovered");
                        }
                    },
                    error: function() {
                        $("#comment-error").html(" Có lỗi xảy ra, vui lòng thử lại sau.");
                    },
                });
            });
        });
    </script>

    @endsection