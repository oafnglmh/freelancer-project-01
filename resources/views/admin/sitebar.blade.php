<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
    <a class="sidebar-brand brand-logo" href="index.html">LVT SHOP</a>
    <a class="sidebar-brand brand-logo-mini" href="index.html">
      <img src="/template/assets/images/logo-mini.svg" alt="logo" />
    </a>
  </div>

  <ul class="nav">
    <!-- Hồ sơ admin -->
    <li class="nav-item profile">
      <div class="profile-desc">
        <div class="profile-pic d-flex align-items-center">
          <div class="count-indicator">
            <img class="img-xs rounded-circle" src="/template/assets/images/faces/face15.jpg" alt="">
            <span class="count bg-success"></span>
          </div>
          <div class="profile-name ml-2">
            <h5 class="mb-0 font-weight-normal">ADMIN</h5>
            <span>Administrator</span>
          </div>
        </div>
        <a href="#" id="profile-dropdown" data-toggle="dropdown">
          <i class="mdi mdi-dots-vertical"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-dark rounded-circle">
                <i class="mdi mdi-onepassword text-info"></i>
              </div>
            </div>
            <div class="preview-item-content">
              <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
            </div>
          </a>
        </div>
      </div>
    </li>

    <li class="nav-item nav-category">
      <span class="nav-link">Navigation</span>
    </li>

    <!-- Product -->
    <li class="nav-item menu-items">
      <a class="nav-link" data-toggle="collapse" href="#product" aria-expanded="false" aria-controls="product">
        <span class="menu-icon"><i class="mdi mdi-cube-outline"></i></span>
        <span class="menu-title">Sản phẩm</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="product">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"><a class="nav-link" href="/product/add">Thêm sản phẩm</a></li>
          <li class="nav-item"><a class="nav-link" href="/product/list">Danh sách sản phẩm</a></li>
        </ul>
      </div>
    </li>

    <!-- Danh mục -->
    <li class="nav-item menu-items">
      <a class="nav-link" data-toggle="collapse" href="#category" aria-expanded="false" aria-controls="category">
        <span class="menu-icon"><i class="mdi mdi-view-list"></i></span>
        <span class="menu-title">Danh mục</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="category">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"><a class="nav-link" href="/menu/add">Thêm danh mục</a></li>
          <li class="nav-item"><a class="nav-link" href="/menu/list">Danh sách danh mục</a></li>
        </ul>
      </div>
    </li>

    <!-- Tình trạng đơn hàng -->
    <li class="nav-item menu-items">
      <a class="nav-link" data-toggle="collapse" href="#status" aria-expanded="false" aria-controls="status">
        <span class="menu-icon"><i class="mdi mdi-timetable"></i></span>
        <span class="menu-title">Tình trạng đơn hàng</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="status">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"><a class="nav-link" href="/status/add">Thêm tình trạng</a></li>
          <li class="nav-item"><a class="nav-link" href="/status/list">Danh sách tình trạng</a></li>
        </ul>
      </div>
    </li>

    <!-- Màu sắc -->
    <li class="nav-item menu-items">
      <a class="nav-link" data-toggle="collapse" href="#color" aria-expanded="false" aria-controls="color">
        <span class="menu-icon"><i class="mdi mdi-palette"></i></span>
        <span class="menu-title">Màu sắc</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="color">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"><a class="nav-link" href="/color/add">Thêm màu</a></li>
          <li class="nav-item"><a class="nav-link" href="/color/list">Danh sách màu</a></li>
        </ul>
      </div>
    </li>

    <!-- Size -->
    <li class="nav-item menu-items">
      <a class="nav-link" data-toggle="collapse" href="#size" aria-expanded="false" aria-controls="size">
        <span class="menu-icon"><i class="mdi mdi-ruler"></i></span>
        <span class="menu-title">Kích thước</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="size">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"><a class="nav-link" href="/size/add">Thêm size</a></li>
          <li class="nav-item"><a class="nav-link" href="/size/list">Danh sách size</a></li>
        </ul>
      </div>
    </li>

    <!-- Đơn hàng -->
    <li class="nav-item menu-items">
      <a class="nav-link" data-toggle="collapse" href="#order" aria-expanded="false" aria-controls="order">
        <span class="menu-icon"><i class="mdi mdi-cart" style="color: coral;"></i></span>
        <span class="menu-title">Đơn hàng</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="order">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"><a class="nav-link" href="/order/list">Danh sách đơn hàng</a></li>
        </ul>
      </div>
    </li>

    <!-- Slide -->
    <li class="nav-item menu-items">
      <a class="nav-link" data-toggle="collapse" href="#slide" aria-expanded="false" aria-controls="slide">
        <span class="menu-icon"><i class="mdi mdi-image-multiple"></i></span>
        <span class="menu-title">Slide</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="slide">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"><a class="nav-link" href="/slide/add">Thêm slide</a></li>
          <li class="nav-item"><a class="nav-link" href="/slide/list">Danh sách slide</a></li>
        </ul>
      </div>
    </li>

    <!-- Doanh thu -->
    <li class="nav-item menu-items">
      <a class="nav-link" data-toggle="collapse" href="#revenue" aria-expanded="false" aria-controls="revenue">
        <span class="menu-icon"><i class="mdi mdi-cash-multiple" style="color: chocolate;"></i></span>
        <span class="menu-title">Doanh thu</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="revenue">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"><a class="nav-link" href="/statistical/main">Tổng doanh thu</a></li>
        </ul>
      </div>
    </li>
  </ul>
</nav>
