<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">


<!-- Mirrored from themesbrand.com/velzon/html/master/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Oct 2024 07:29:52 GMT -->

<head>

    <meta charset="utf-8" />
    <title>NamPerfume</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <style>
        /* Card styling for order card */
        .order-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
        }

        /* Card header */
        .order-header {
            background-color: #f8f9fa;
            padding: 16px;
            border-bottom: 1px solid #ddd;
            color: #333;
        }

        /* Card body */
        .order-body {
            padding: 20px;
        }

        /* Table styling */
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            /* border-radius: 30px; */
        }

        /* Making all columns equal width */
        .table th,
        .table td {
            width: 16.66%;
            text-align: left;
            padding: 8px;
        }

        /* Border for each cell */
        .table th,
        .table td {
            border: 1px solid #ccc;
        }

        /* Header background color */
        .table thead {
            background-color: #f1f1f1;
            color: #333;
            font-weight: bold;
        }

        /* Additional styling for alert messages */
        .alert {
            font-weight: bold;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        /* Making sure responsive tables keep their style in mobile view */
        .table-responsive {
            overflow-x: auto;
        }

        /* Specific color for table headings for differentiation */
        .summary-table th {
            color: #555;
            text-align: right;
            padding-right: 20px;
        }
    </style>

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
                                <h4 class="mb-sm-0">Quản Lý Đơn hàng</h4>


                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                        <li class="breadcrumb-item active">Đơn hàng</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <div class="content-wrapper">
                        <div class="card order-card">
                            <div class="card-header order-header">
                                <h2>Quản lý danh sách đơn hàng - Đơn hàng: <?= $donHang['ma_don_hang'] ?></h2>
                            </div>
                            <div class="card-body order-body">
                                <?php
                                $colorAlerts = match ($donHang['trang_thai_id']) {
                                    1 => 'primary',
                                    2, 3, 4, 5, 6, 7, 8 => 'warning',
                                    9 => 'success',
                                    default => 'danger',
                                };
                                ?>
                                <div class="alert alert-<?= $colorAlerts ?>" role="alert">
                                    Đơn hàng: <?= $donHang['ten_trang_thai'] ?>
                                </div>

                                <!-- Thông tin người đặt Table -->
                                <div class="table-responsive mb-4">
                                    <table class="table info-table">
                                        <thead>
                                            <tr>
                                                <th colspan="2">Thông tin người đặt</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><strong>Họ tên:</strong></td>
                                                <td><?= $donHang['ten_nguoi_nhan'] ?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Email:</strong></td>
                                                <td><?= $donHang['email_nguoi_nhan'] ?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Số điện thoại:</strong></td>
                                                <td><?= $donHang['sdt_nguoi_nhan'] ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Người nhận Table -->
                                <div class="table-responsive mb-4">
                                    <table class="table info-table">
                                        <thead>
                                            <tr>
                                                <th colspan="2">Người nhận</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><strong>Họ tên:</strong></td>
                                                <td><?= $donHang['ten_nguoi_nhan'] ?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Email:</strong></td>
                                                <td><?= $donHang['email_nguoi_nhan'] ?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Số điện thoại:</strong></td>
                                                <td><?= $donHang['sdt_nguoi_nhan'] ?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Địa chỉ:</strong></td>
                                                <td><?= $donHang['dia_chi_nguoi_nhan'] ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Chi tiết đơn hàng Table -->
                                <div class="table-responsive mb-4">
                                    <table class="table info-table">
                                        <thead>
                                            <tr>
                                                <th colspan="2">Chi tiết đơn hàng</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><strong>Mã đơn hàng:</strong></td>
                                                <td><?= $donHang['ma_don_hang'] ?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Tổng tiền:</strong></td>
                                                <td><?= number_format($donHang['tong_tien'], 0, ',', '.') ?>đ</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Ghi chú:</strong></td>
                                                <td><?= $donHang['ghi_chu'] ?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Thanh toán:</strong></td>
                                                <td><?= $donHang['ten_phuong_thuc'] ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Product List Table -->
                                <div class="table-responsive">
                                    <table id="example" class="table product-table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Tên sản phẩm</th>
                                                <th>Số lượng</th>
                                                <th>Đơn giá</th>
                                                <th>Giảm giá</th>
                                                <th>Thành tiền</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $tong_tien = 0; ?>
                                            <?php foreach ($sanPhamDonHang as $key => $sanPham) : ?>
                                                <tr>
                                                    <td><?= ++$key ?></td>
                                                    <td><?= $sanPham['ten_san_pham'] ?></td>
                                                    <td><?= $sanPham['so_luong'] ?></td>
                                                    <td><?= number_format($sanPham['don_gia'], 0, ',', '.') ?>đ</td>
                                                    <td><?= number_format($sanPham['giam_gia'], 0, ',', '.') ?>đ</td>
                                                    <td><?= number_format($sanPham['thanh_tien'], 0, ',', '.') ?>đ</td>
                                                </tr>
                                                <?php $tong_tien += $sanPham['thanh_tien']; ?>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Order Summary Table -->
                                <div class="table-responsive">
                                    <table class="table summary-table">
                                        <tr>
                                            <th>Thành tiền:</th>
                                            <td><?= number_format($tong_tien, 0, ',', '.') ?>đ</td>
                                        </tr>
                                        <tr>
                                            <th>Vận chuyển:</th>
                                            <td>20.000đ</td>
                                        </tr>
                                        <tr>
                                            <th>Tổng tiền:</th>
                                            <td><?= number_format($tong_tien + 20000, 0, ',', '.') ?>đ</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
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
                                </script> © Shoes World
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