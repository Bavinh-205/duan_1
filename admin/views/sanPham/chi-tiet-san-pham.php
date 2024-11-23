<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">


<!-- Mirrored from themesbrand.com/velzon/html/master/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Oct 2024 07:29:52 GMT -->

<head>

    <meta charset="utf-8" />
    <title>Chi Tiết Sản Phẩm</title>
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
                                <h4 class="mb-sm-0">Chi Tiết sản Phẩm</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                        <li class="breadcrumb-item active">sChi tiết sản phẩm</li>
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
                                        <h4 class="card-title mb-0 flex-grow-1"> Sản Phẩm Chi Tiết</h4>
                                    </div><!-- end card header -->
                                    <div class="card-body">
                                        <div class="live-preview">
                                            <form action="index.php?act=form-chi-tiet-san-pham" method="POST" enctype="multipart/form-data">
                                                <input type="hidden" name="id" value=" <?= $sanPhams['id'] ?> ">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="cart-header">
                                                            <h3 class="cart-title">Thông Tin Sản Phẩm : <?= $sanPhams['ten_san_pham']  ?></h3>
                                                        </div>
                                                        <br><br>
                                                        <div class="border p-3 rounded">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="mb-3">
                                                                        <label for="" class="form-label">Mã Sản Phẩm</label>
                                                                        <input type="text" class="form-control" name="ma_san_pham" placeholder="Nhập mã sản phẩm" value="<?= $sanPhams['ma_san_pham'] ?>" readonly>

                                                                    </div>
                                                                </div>
                                                                <!--end md-->
                                                                <div class="col-md-6">
                                                                    <div class="mb-3">
                                                                        <label for="" class="form-label">Tên Sản Phẩm</label>
                                                                        <input type="text" class="form-control" name="ten_san_pham" placeholder="Nhập mã sản phẩm" value="<?= $sanPhams['ten_san_pham'] ?>" readonly>
                                                                    </div>
                                                                </div>
                                                                <!--end md-->
                                                                <div class="col-md-6">
                                                                    <div class="mb-3">
                                                                        <label for="hinh_anh" class="form-label">Hình Ảnh</label>
                                                                        <!-- Hiển thị ảnh hiện tại nếu có -->
                                                                        <?php if (!empty($sanPhams['hinh_anh'])): ?>
                                                                            <div class="mt-2">
                                                                                <img src="<?= $sanPhams['hinh_anh'] ?>" alt="Current Avatar" style="width: 100px; height: 100px; object-fit: cover;">
                                                                            </div>
                                                                        <?php endif; ?>

                                                                        <span class="text-danger">
                                                                            <?= !empty($_SESSION['errors']['hinh_anh']) ? $_SESSION['errors']['hinh_anh'] : '' ?>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <!--end md-->
                                                                <div class="col-md-6">
                                                                    <div class="mb-3">
                                                                        <label for="" class="form-label">Giá Nhập</label>
                                                                        <input type="number" class="form-control" name="gia_nhap" placeholder="Nhập giá nhập" value="<?= $sanPhams['gia_nhap'] ?>" readonly>
                                                                    </div>
                                                                </div>
                                                                <!--end md-->
                                                                <div class="col-md-6">
                                                                    <div class="mb-3">
                                                                        <label for="" class="form-label">Giá Bán</label>
                                                                        <input type="number" class="form-control" name="gia_ban" placeholder="Nhập giá bán" value="<?= $sanPhams['gia_ban'] ?>" readonly>

                                                                    </div>
                                                                </div>
                                                                <!--end md-->
                                                                <div class="col-md-6">
                                                                    <div class="mb-3">
                                                                        <label for="" class="form-label">Giá Khuyến Mãi</label>
                                                                        <input type="number" class="form-control" name="gia_khuyen_mai" placeholder="Nhập giá khuyễn mãi" value="<?= $sanPhams['gia_khuyen_mai'] ?>" readonly>

                                                                    </div>
                                                                </div>
                                                                <!--end md-->
                                                                <div class="col-md-6">
                                                                    <div class="mb-3">
                                                                        <label for="" class="form-label">Ngày Nhập</label>
                                                                        <input type="date" class="form-control" name="ngay_nhap" placeholder="Ngày Nhập" value="<?= $sanPhams['ngay_nhap'] ?>" readonly>

                                                                    </div>
                                                                </div>
                                                                <!--end md-->
                                                                <div class="col-md-6">
                                                                    <div class="mb-3">
                                                                        <label for="" class="form-label">Số Lượng</label>
                                                                        <input type="number" class="form-control" name="so_luong" placeholder=" Nhập Số Lượng" value="<?= $sanPhams['so_luong'] ?>" readonly>

                                                                    </div>
                                                                </div>
                                                                <!--end md-->
                                                                <div class="col-md-6">
                                                                    <div class="mb-3">
                                                                        <label for="" class="form-label">Lượt Xem</label>
                                                                        <input type="number" class="form-control" name="luot_xem" placeholder=" Nhập Lượt Xem" value="<?= $sanPhams['luot_xem'] ?>" readonly>

                                                                    </div>
                                                                </div>
                                                                <!--end md-->
                                                                <div class="col-md-6">
                                                                    <div class="mb-3">
                                                                        <label for="" class="form-label">Mô tả</label>
                                                                        <input type="text" class="form-control" name="mo_ta" placeholder=" Nhập Mô tả" value="<?= $sanPhams['mo_ta'] ?>" readonly>

                                                                    </div>
                                                                </div>
                                                                <!--end md-->
                                                                <div class="col-md-6">
                                                                    <div class="mb-3">
                                                                        <label for="" class="form-label">Danh Mục Sản Phẩm</label>
                                                                        <?php
                                                                        // Tìm tên danh mục phù hợp với id trong $sanPhams
                                                                        // $tenDanhMuc = '';
                                                                        // foreach ($danhMucs as $danhMuc) {
                                                                        //     if ($danhMuc['id'] == $sanPhams['danh_muc_id']) {
                                                                        //         $tenDanhMuc = $danhMuc['ten_danh_muc'];
                                                                        //         break;
                                                                        //     }
                                                                        // }
                                                                        ?>
                                                                        <!-- Hiển thị tên danh mục thay vì select box -->
                                                                        <input type="text" class="form-control" value="<?= $sanPhams['danh_muc_id'] ?>" readonly>
                                                                    </div>
                                                                </div>

                                                                <!--end md-->
                                                                <div class="col-md-6">
                                                                    <div class="mb-3">
                                                                        <label for="" class="form-label">Trạng thái</label>
                                                                        <?php
                                                                        // Xác định tên trạng thái dựa trên giá trị
                                                                        $tenTrangThai = ($sanPhams['trang_thai'] == 2) ? 'Còn Hàng' : 'Hết Hàng';
                                                                        ?>
                                                                        <!-- Hiển thị trạng thái thay vì sử dụng select box -->
                                                                        <input type="text" class="form-control" value="<?= $tenTrangThai ?>" readonly>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>

                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="cart-header">
                                                            <h3 class="cart-title">Hình Ảnh Sản Phẩm</h3>
                                                        </div>
                                                        <br><br>
                                                        <div class="mb-3">
                                                            <label for="" class="form-label"></label>
                                                            <div style="display: flex; flex-wrap: wrap; gap: 10px;">

                                                                <!-- chỗ này để in ra nhiều hình ảnh sp -->

                                                            </div>
                                                        </div>

                                                    </div>
                                                    <br>
                                                    <br>
                                                    <hr>
                                                    <!--end col-->
                                                </div>
                                                <!--end row-->
                                            </form>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-8">
                                                <label for="" class="form-label">Mô tả chi tiết</label>
                                                <textarea class="form-control" name="mo_ta_chi_tiet" placeholder="Nhập Mô tả chi tiết" rows="5" readonly><?= $sanPhams['mo_ta_chi_tiet'] ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">Bình Luận Về Sản Phẩm</h4>
                                    </div><!-- end card header -->
                                    <div class="card-body">
                                        <div class="col-md-6">
                                            <!-- Hiển thị các bình luận -->
                                            <?php if (!empty($binhLuans)): ?>
                                                <?php foreach ($binhLuans as $binhLuan): ?>
                                                    <div class="border p-3 mb-3 rounded">
                                                        <div class="d-flex justify-content-between">
                                                            <div class="fw-bold"><?= htmlspecialchars($binhLuan['ten_nguoi_dung']) ?> :</div>
                                                            <div class="text-muted"><?= $binhLuan['ngay_dang'] ?></div>
                                                        </div>
                                                        <div class="mt-2">
                                                            <p><?= nl2br(htmlspecialchars($binhLuan['noi_dung'])) ?></p>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            <?php else: ?>
                                                <p>Chưa có bình luận nào.</p>
                                            <?php endif; ?>

                                        </div>
                                    </div><!-- end card-body -->
                                </div><!-- end card -->
                                <div class="card">
                                    <div class="card-header align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">Đánh Giá Về Sản Phẩm</h4>
                                    </div>
                                    <div class="card-body">
                                        <!-- đánh giá in ở đây -->
                                        <?php if (!empty($danhgia)): ?>
                                            <?php foreach ($danhgia as $danhGia): ?>
                                                <div class="border p-3 mb-3 rounded">
                                                    <div class="d-flex justify-content-between">
                                                        <div class="fw-bold"><?= htmlspecialchars($danhGia['ten_nguoi_dung']) ?> :</div>
                                                        <div class="text-muted"><?= $danhGia['ngay_tao'] ?></div>
                                                    </div>
                                                    <div class="mt-2">
                                                        <p>
                                                            <?php
                                                            $soSao = intval($danhGia['diem_danh_gia']);
                                                            echo str_repeat('⭐', $soSao);
                                                            ?>
                                                        </p>
                                                        <!-- <p><?= nl2br(htmlspecialchars($danhGia['diem_danh_gia'])) ?></p> -->
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <p>Chưa có đánh giá nào cho sản phẩm này.</p>
                                        <?php endif; ?>
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
                            Design & Develop by duync
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