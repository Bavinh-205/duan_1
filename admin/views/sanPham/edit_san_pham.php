<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">


<!-- Mirrored from themesbrand.com/velzon/html/master/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Oct 2024 07:29:52 GMT -->

<head>

    <meta charset="utf-8" />
    <title>Thêm Sản Phẩm | NN Shop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />

    <!-- CSS -->
    <?php
    require_once "views/layouts/libs_css.php";
    ?>

</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <!-- HEADER -->
        <?php
        require_once "views/layouts/header.php";

        require_once "views/layouts/siderbar.php";
        ?>
        
        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">
                                 <!-- start page title -->
                                 <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                                <h4 class="mb-sm-0">Quản Lý Danh Sách sản phẩm </h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                        <li class="breadcrumb-item active">Truy Cập Vào Danh Sách sản phẩm </li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col">

                            <div class="h-100">
                            <div class="card">
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">Sửa sản phẩm</h4>  
                                </div><!-- end card header -->

                                <div class="card-body">
                                   
                                    <div class="live-preview">
                                        <form action="?act=sua-san-pham" method="POST" enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="<?=$SanPham['id']?>">
                                            <div class="row">
                                                
                                                <!--end col-->
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="citynameInput" class="form-label">Mã Sản Phẩm</label>
                                                        <input type="text" class="form-control" placeholder="Nhập Mã Sản Phẩm" name="ma_san_pham" value="<?=$SanPham['ma_san_pham']?>">
                                                        <span class="text-danger">
                                                            <?=!empty($_SESSION['errors']['ma_san_pham']) ? $_SESSION['errors']['ma_san_pham'] : '' ?>

                                                        </span>
                                                    </div>
                                                </div>
                                                <!--end col-->
                                               
                                                    <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="citynameInput" class="form-label">Tên Sản Phẩm</label>
                                                        <input type="text" class="form-control" placeholder="Nhập Tên Sản Phẩm" name="ten_san_pham" value="<?=$SanPham['ten_san_pham']?>">
                                                        <span class="text-danger">
                                                            <?=!empty($_SESSION['errors']['ten_san_pham']) ? $_SESSION['errors']['ten_san_pham'] : '' ?>

                                                        </span>
                                                    </div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="citynameInput" class="form-label">Avata</label>
                                                        <input type="file" class="form-control" placeholder="Trọn file" name="hinh_anh">
                                                        <div class="text-danger">
                                                        <img src="<?= $SanPham['hinh_anh'] ?>" alt="Hình ảnh" width="80px">

                                                        </div>
                                                    </div>
                                                </div>
                                                  <!--end col-->
                                        
                                                <!--end col-->
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="citynameInput" class="form-label">Giá Nhập</label>
                                                        <input type="text" class="form-control" placeholder="Nhập giá" name="gia_nhap" value="<?=$SanPham['gia_nhap']?>">
                                                        <span class="text-danger">
                                                            <?=!empty($_SESSION['errors']['gia_nhap']) ? $_SESSION['errors']['gia_nhap'] : '' ?>

                                                        </span>
                                                    </div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="citynameInput" class="form-label">giá bán</label>
                                                        <input type="text" class="form-control" placeholder="Nhập giá" name="gia_ban" value="<?=$SanPham['gia_ban']?>">
                                                        <span class="text-danger">
                                                            <?=!empty($_SESSION['errors']['gia_ban']) ? $_SESSION['errors']['gia_ban'] : '' ?>

                                                        </span>
                                                    </div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="citynameInput" class="form-label">Giá Khuyến Mãi</label>
                                                        <input type="text" class="form-control" placeholder="Nhập giá" name="gia_khuyen_mai" value="<?=$SanPham['gia_khuyen_mai']?>">
                                                        <span class="text-danger">
                                                            <?=!empty($_SESSION['errors']['gia_khuyen_mai']) ? $_SESSION['errors']['gia_khuyen_mai'] : '' ?>

                                                        </span>
                                                    </div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="citynameInput" class="form-label">Ngày Nhập</label>
                                                        <input type="date" class="form-control" placeholder="Ngày nhập" name="ngay_nhap" value="<?=$SanPham['ngay_nhap']?>">
                                                        <span class="text-danger">
                                                            <?=!empty($_SESSION['errors']['ngay_nhap']) ? $_SESSION['errors']['ngay_nhap'] : '' ?>

                                                        </span>
                                                    </div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="citynameInput" class="form-label">Số Lượng</label>
                                                        <input type="text" class="form-control" placeholder="Nhập Số Lượng" name="so_luong" value="<?=$SanPham['so_luong']?>">
                                                        <span class="text-danger">
                                                            <?=!empty($_SESSION['errors']['so_luong']) ? $_SESSION['errors']['so_luong'] : '' ?>

                                                        </span>
                                                    </div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="citynameInput" class="form-label">lượt xem</label>
                                                        <input type="text" class="form-control" placeholder="Nhập lượt xem" name="luot_xem" value="<?=$SanPham['luot_xem']?>">
                                                        <span class="text-danger">
                                                            <?=!empty($_SESSION['errors']['luot_xem']) ? $_SESSION['errors']['luot_xem'] : '' ?>

                                                        </span>
                                                    </div>
                                                </div>
                                                
                                                <!--end col-->
                                               
                                                <!--end col-->
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="citynameInput" class="form-label">Mô tả</label>
                                                        <input type="text" class="form-control" placeholder="Nhập Mô tả" name="mo_ta" value="<?=$SanPham['mo_ta']?>">
                                                        <span class="text-danger">
                                                            <?=!empty($_SESSION['errors']['mo_ta']) ? $_SESSION['errors']['mo_ta'] : '' ?>

                                                        </span>
                                                    </div>
                                                </div>
                                              
                                                <!--end col-->
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="citynameInput" class="form-label">Mô tả chi tiết</label>
                                                        <input type="text" class="form-control" placeholder="Nhập Mô tả chi tiết" name="mo_ta_chi_tiet" value="<?=$SanPham['mo_ta_chi_tiet']?>">
                                                        <span class="text-danger">
                                                            <?=!empty($_SESSION['errors']['mo_ta_chi_tiet']) ? $_SESSION['errors']['mo_ta_chi_tiet'] : '' ?>

                                                        </span>
                                                    </div>
                                                </div>
                                              
                                                <!--end col-->
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                    
                                                    <label for="inputStatus">Danh mục sản phẩm</label>
                                                            <select id="inputStatus" name="danh_muc_id" class="form-control custom-select">
                                                            <?php foreach ($danhMucs as $danhmuc) : ?>
                                                                    <option <?= $danhmuc['id'] == $SanPham['danh_muc_id'] ? 'selected' : '' ?> value="<?= $danhmuc['ten_danh_muc'] ?>"><?= $danhmuc['id']; echo"."; ?><?= $danhmuc['ten_danh_muc'] ?></option>
                                                                <?php endforeach; ?>

                                                            <?php if (isset($_SESSION['errors']['danh_muc_id'])) { ?>
                                                                <p class="text-danger"><?= $_SESSION['errors']['danh_muc_id'] ?></p>
                                                            <?php  } ?>
                                                            </select>
                                                        
                                                    </div>
                                                </div>
                                             
                                                <!--end col-->
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="ForminputState" class="form-label">Trạng Thái</label>
                                                        <select class="form-select" name="trang_thai">
                                                            <option selected disabled>Trọn trạng thái</option>
                                                            <option value="1" <?= $SanPham['trang_thai']==1 ? 'selected' : '' ?>>Còn Hàng</option>
                                                            <option value="2" <?= $SanPham['trang_thai']==2 ? 'selected' : '' ?>>Hết Hàng</option>
                                                        </select>
                                                        <span class="text-danger">
                                                            <?=!empty($_SESSION['errors']['trang_thai']) ? $_SESSION['errors']['trang_thai'] : '' ?>

                                                        </span>
                                                    </div>
                                                </div>
                                                <!--end col-->
                                                <!--end col-->
                                                <div class="col-lg-12">
                                                    <div class="text-center">
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </div>
                                                </div>
                                                <!--end col-->
                                            </div>
                                            <!--end row-->
                                        </form>
                                    </div>
          
                                </div>
                            </div>
                            </div> <!-- end .h-100-->
                        </div> <!-- end col -->
                    </div>

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> © Velzon.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">
                                Design & Develop by Themesbrand
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->



    <!--start back-to-top-->
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>
    <!--end back-to-top-->

    <!--preloader-->
    <div id="preloader">
        <div id="status">
            <div class="spinner-border text-primary avatar-sm" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>

    <div class="customizer-setting d-none d-md-block">
        <div class="btn-info rounded-pill shadow-lg btn btn-icon btn-lg p-2" data-bs-toggle="offcanvas" data-bs-target="#theme-settings-offcanvas" aria-controls="theme-settings-offcanvas">
            <i class='mdi mdi-spin mdi-cog-outline fs-22'></i>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <?php
    require_once "views/layouts/libs_js.php";
    ?>

</body>

</html>