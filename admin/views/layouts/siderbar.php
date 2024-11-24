<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="index.html" class="logo logo-dark">
            <span class="logo-sm">
                <img src="assets/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="assets/images/logo-dark.png" alt="" height="17">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="index.html" class="logo logo-light">
            <span class="logo-sm">
                <img src="assets/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="assets/images/logo-light.png" alt="" height="17">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div class="dropdown sidebar-user m-1 rounded">
        <button type="button" class="btn material-shadow-none" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="d-flex align-items-center gap-2">
                <img class="rounded header-profile-user" src="assets/images/users/avatar-1.jpg" alt="Header Avatar">
                <span class="text-start">
                    <span class="d-block fw-medium sidebar-user-name-text">ShoesWorld</span>
                    <span class="d-block fs-14 sidebar-user-name-sub-text"><i class="ri ri-circle-fill fs-10 text-success align-baseline"></i> <span class="align-middle">Online</span></span>
                </span>
            </span>
        </button>
        <div class="dropdown-menu dropdown-menu-end">
            <!-- item-->
            <h6 class="dropdown-header">Welcome ShoesWorld!</h6>
            <a class="dropdown-item" href="pages-profile.html"><i class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Profile</span></a>
            <a class="dropdown-item" href="auth-logout-basic.html"><i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span class="align-middle" data-key="t-logout">Logout</span></a>
        </div>
    </div>
    <div id="scrollbar">
        <div class="container-fluid">


            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Quản lý</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="./index.php">
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Dashboards</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarDanhMuc" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDanhMuc">
                        <i class="ri-stack-line"></i> <span data-key="t-advance-ui">Danh mục sản phẩm</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarDanhMuc">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="?act=danh-mucs" class="nav-link" data-key="t-sweet-alerts">
                                    Vào Trang Danh Mục
                                </a>

                            </li>

                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarLienHe" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLienHe">
                        <i class="ri-stack-line"></i> <span data-key="t-advance-ui">Liên Hệ</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarLienHe">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">

                                <a href="?act=lien-he" class="nav-link" data-key="t-sweet-alerts">
                                    Vào Trang Liên Hệ
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarNguoiDung" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarNguoiDung">
                        <i class="ri-stack-line"></i> <span data-key="t-advance-ui">Người dùng</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarNguoiDung">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">

                                <a href="?act=nguoi-dung" class="nav-link" data-key="t-sweet-alerts">
                                    Vào Trang Người Dùng
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarTinTuc" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarTinTuc">
                        <i class="ri-stack-line"></i> <span data-key="t-advance-ui">Tin tức</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarTinTuc">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">

                                <a href="?act=tin-tuc" class="nav-link" data-key="t-sweet-alerts">
                                    Vào Trang Tin Tức
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarSanPham" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarSanPham">
                        <i class="ri-stack-line"></i> <span data-key="t-advance-ui">Sản Phẩm</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarSanPham">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">

                                <a href="?act=san-pham" class="nav-link" data-key="t-sweet-alerts">
                                    Vào Sản Phẩm
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarBanner" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarBanner">
                        <i class="ri-stack-line"></i> <span data-key="t-advance-ui">Banner</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarBanner">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">

                                <a href="?act=banner" class="nav-link" data-key="t-sweet-alerts">
                                    Vào Trang Banner
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarDonhang" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDonhang">
                        <i class="ri-stack-line"></i> <span data-key="t-advance-ui">Trạng Thái Đơn hàng</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarDonhang">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">

                                <a href="?act=trang-thai" class="nav-link" data-key="t-sweet-alerts">
                                    Trạng Thái Đơn Hàng
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarKhuyenMai" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarKhuyenMai">
                        <i class="ri-stack-line"></i> <span data-key="t-advance-ui">Khuyến Mãi</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarKhuyenMai">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">

                                <a href="?act=khuyen-mai" class="nav-link" data-key="t-sweet-alerts">
                                    Vào Trang Khuyến Mãi
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarDonHang" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDonHang">
                        <i class="ri-stack-line"></i> <span data-key="t-advance-ui">Đơn Hàng</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarDonHang">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">

                                <a href="?act=don-hang" class="nav-link" data-key="t-sweet-alerts">
                                    Vào Trang Đơn Hàng
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>


                <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-pages">Bán hàng</span></li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>