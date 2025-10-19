<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fashion Shop</title>

    {{-- Font & Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('user-asset/fontawesome-free-6.3.0-web/css/all.min.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">

    {{-- Custom CSS --}}
    <link rel="stylesheet" href="{{ asset('user-asset/CSS/style.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('other')
</head>
<script>
    window.Laravel = {
        userId: {{ auth()->id() ?? 'null' }}
    };
</script>
<body>
    {{-- ===== Top Bar ===== --}}
    <div class="top-bar d-flex justify-content-between align-items-center px-3">
        <a href="{{ route('viewhome') }}" class="top-link"><i class="fa fa-home me-2"></i>Hệ Thống Cửa Hàng</a>
        <a href="tel:0368535276" class="top-link"><i class="fa fa-phone me-2"></i>0368535276</a>
    </div>

    {{-- ===== Header / Navbar ===== --}}
    <header class="main-header shadow-sm">
        <div class="container d-flex justify-content-between align-items-center py-2">
            <a href="{{ route('viewhome') }}" class="logo">
                <img src="/user-asset/img/logoshop.jpg" alt="Logo" class="logo-img">
            </a>

            <nav class="main-nav d-none d-lg-block">
                <ul class="nav-list">
                    <li><a href="{{ route('viewproduct') }}">Sản Phẩm</a></li>
                    <li><a href="{{ route('viewproductnew') }}">Sản Phẩm Mới</a></li>
                    <li><a href="{{ route('viewcollection') }}">Bộ Sưu Tập</a></li>
                    <li><a href="{{ route('viewproductonline') }}">Fashion Online</a></li>
                    <li><a href="{{ route('viewproductsale') }}">Sale</a></li>
                </ul>
            </nav>

            <div class="header-icons d-flex align-items-center gap-3">
                {{-- Search --}}
                <div class="search-box position-relative">
                    <button class="btn-search"><i class="fa fa-search"></i></button>
                    <div class="search-input">
                        <form action="/search/" method="GET" class="d-flex">
                            <input type="text" name="search" placeholder="Tìm sản phẩm..." class="form-control me-2">
                            <button type="submit" class="btn btn-dark"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>

                {{-- User --}}
                <div class="user-menu dropdown">

                    @if(auth()->check())
                    <a class="nav-link dropdown-toggle authCheck" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-user-circle fa-lg"></i>
                    </a>
                    @else
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-user-circle fa-lg"></i>
                    </a>
                    @endif
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        @if(auth()->check())
                        <li><a class="dropdown-item" href="{{ route('viewprofile') }}">Tài Khoản</a></li>
                        @if(auth()->user()->Role==1)
                        <li><a class="dropdown-item" href="{{ route('index') }}">Trang Quản Lý</a></li>
                        @endif
                        <li><a class="dropdown-item" href="{{ route('logout') }}">Đăng Xuất</a></li>
                        @else
                        <li><a class="dropdown-item" href="{{ route('register') }}">Đăng Nhập</a></li>
                        <li><a class="dropdown-item" href="{{ route('register') }}">Đăng Ký</a></li>
                        @endif
                    </ul>
                </div>

                {{-- Cart --}}
                <a href="{{ Route('viewcart') }}" class="cart-link position-relative">
                    <i class="fa fa-shopping-cart fa-lg"></i>
                    @if (auth()->check())
                    <span class="cart-count">
                        {{ DB::table('carts')->where('user_id', auth()->id())->count() }}
                    </span>
                    @endif

                </a>

                {{-- Mobile menu --}}
                <button class="btn d-lg-none" id="mobileMenuBtn"><i class="fa fa-bars"></i></button>
            </div>
        </div>
    </header>

    {{-- ===== Mobile Navbar ===== --}}
    <div class="mobile-nav d-lg-none" id="mobileNav">
        <ul>
            <li><a href="{{ route('viewproduct') }}">Sản Phẩm</a></li>
            <li><a href="{{ route('viewproductnew') }}">Sản Phẩm Mới</a></li>
            <li><a href="{{ route('viewcollection') }}">Bộ Sưu Tập</a></li>
            <li><a href="{{ route('viewproductsale') }}">Sale</a></li>
            <li><a href="{{ route('viewcart') }}">Giỏ Hàng</a></li>
        </ul>
    </div>

    <main>
        @yield('content')
    </main>

    {{-- ===== Footer ===== --}}
    <footer class="footer mt-5">
        <div class="container py-4">
            <div class="row">
                <div class="col-md-4">
                    <h5>DATTENSHOP</h5>
                    <p>Địa chỉ: Đường số 18 Phạm Đăng Giảng Bình Hưng hòa TP. Hồ chí Minh<br>Email: xxxx@gmail.com</p>
                </div>
                <div class="col-md-4">
                    <h6>Về Chúng Tôi</h6>
                    <ul class="footer-links">
                        <li><a href="#">Giới thiệu</a></li>
                        <li><a href="#">Blog thời trang</a></li>
                        <li><a href="#">Liên hệ</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h6>Hỗ Trợ</h6>
                    <ul class="footer-links">
                        <li><a href="#">Chính sách vận chuyển</a></li>
                        <li><a href="#">Hướng dẫn thanh toán</a></li>
                        <li><a href="#">Tra cứu đơn hàng</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    {{-- ===== Scripts ===== --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('mobileMenuBtn').addEventListener('click', () => {
            document.getElementById('mobileNav').classList.toggle('open');
        });

        // document.querySelectorAll('.authCheck').forEach(el => {
        //     el.addEventListener('click', e => {
        //         e.preventDefault();
        //         e.stopPropagation();
        //         const menu = el.nextElementSibling;
        //         menu.classList.toggle('show');
        //     });
        // });
    </script>
</body>

</html>