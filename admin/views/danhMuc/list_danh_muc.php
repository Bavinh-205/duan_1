<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">


<!-- Mirrored from themesbrand.com/velzon/html/master/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Oct 2024 07:29:52 GMT -->

<head>

    <meta charset="utf-8" />
    <title>Danh Mục Sản Phẩm | NN Shop</title>
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

<link rel="shortcut icon" href="assets/images/favicon.ico">

<!--datatable css-->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
<!--datatable responsive css-->
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />

<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">


<!-- Layout config Js -->
<script src="assets/js/layout.js"></script>
<!-- Bootstrap Css -->
<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<!-- Icons Css -->
<link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
<!-- App Css-->
<link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
<!-- custom Css-->
<link href="assets/css/custom.min.css" rel="stylesheet" type="text/css" />
        
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
                                <h4 class="mb-sm-0">Quản Lý Danh Mục Dản Phẩm </h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                        <li class="breadcrumb-item active">Truy cập vào danh mục Sản Phẩm </li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col">

                            <div class="h-100">
                                <!-- Striped Rows -->
                                <div class="card">
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">Danh Sách Mục Sản Phẩm</h4>
                                    <!-- <form action="?act=danh-mucs" method="post">
                        <input type="text" name="tukhoa">
                        <input type="submit" name="timkiem" value="tim kiem">
                    </form> -->
                                    <a href="?act=from-them-danh-muc" class="btn btn-soft-success material-shadow-none"><i class="ri-add-circle-line align-middle me-1"></i> Thêm Danh Mục</a>
                                </div><!-- end card header -->

                                <div class="card-body">
                           
                                    <div class="live-preview">
                                        <div class="table-responsive">
                                            <table id="example" class="table table-striped table-nowrap align-middle mb-0">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">STT</th>
                                                        <th scope="col">Tên danh mục</th>
                                                        <th scope="col">Trạng Thái</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($danhMucs as $index => $danhMuc) : ?>
                                                    <tr>
                                                        <td class="fw-medium"><?= $index+1 ?></td>
                                                        <td><?= $danhMuc['ten_danh_muc'] ?></td>
                                                       
                                                        <td>
                                                            <?php
                                                            if($danhMuc['trang_thai'] == 1)  { 
                                                            ?>
                                                                <span class="badge bg-success">Hiển Thị</span>
                                                            <?php
                                                            }else{  
                                                            ?>
                                                                    <span class="badge bg-danger">Không Hiển Thị</span>

                                                            <?php
                                                            }
                                                            ?>
                                                            
                                                        </td>
                                                        <td>
                                                                    <div class="hstack gap-3 flex-wrap">
                                                                        <a href="?act=form-sua-danh-muc&danh_muc_id=<?=$danhMuc['id'] ?>" class="link-success fs-15"><i class="ri-edit-2-line"></i></a>
                                                                        <form action="?act=xoa-danh-muc" method="post"
                                                                        onsubmit="return confirm('bạn có chắc chắn xóa')">
                                                                        <input type="hidden" name="danh_muc_id" value="<?=$danhMuc['id'] ?>">
                                                                        <button type="submit" class="link-danger fs-15" style="border: none; background : none">
                                                                            <i class="ri-delete-bin-line"></i></button>
                                                                        </form>
                                                                        
                                                                    </div>
                                                                </td>
                                                    </tr>
                                                   

                                                    <?php endforeach ;?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    
                                </div><!-- end card-body -->
                            </div><!-- end card -->
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

    <!-- JAVASCRIPT -->
 <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>
    <script src="assets/libs/feather-icons/feather.min.js"></script>
    <script src="assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
    <script src="assets/js/plugins.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!--datatable js-->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

    <script src="assets/js/pages/datatables.init.js"></script>
    <!-- App js -->
    <script src="assets/js/app.js"></script>

</body>

</html>