<?php
session_start();
// Require file Common

if (!isset($_SESSION['is_logged_in']) || $_SESSION['is_logged_in'] !== true) {
  header("Location: login.php");
  exit();
}
require_once '../commons/env.php'; // Khai báo biến môi trường
require_once '../commons/ConnectDatabase.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once 'controllers/DashboardController.php';
require_once './models/thongKe.php';

// danh mục
require_once 'controllers/DanhMucController.php';
require_once './models/DanhMuc.php';

// lien he
require_once './controllers/LienHeContronller.php';
require_once './models/lienHe.php';
// người dùng
require_once './controllers/NguoiDungController.php';
require_once './models/NguoiDung.php';
// sản phẩm
require_once './controllers/SanPhamController.php';
require_once './models/SanPham.php';
//tin tức
require_once './controllers/TintucControllers.php';
require_once './models/tintuc.php';
// Banner
require_once './controllers/Bannercontrollers.php';
require_once './models/banner.php';

// trạng thái
require_once './controllers/TrangThaiController.php';
require_once './models/TrangThai.php';
// khuyến mãi
require_once './controllers/KhuyenMaiController.php';
require_once './models/KhuyenMai.php';

// đơn hàng
require_once './controllers/DonHangController.php';
require_once './models/DonHang.php';

// Require toàn bộ file Models

// Route
$act = $_GET['act'] ?? '/';

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
  // Dashboards
  '/'                          => (new DashboardController())->index(),
  // quản lý danh mục sp
  'danh-mucs'                  => (new DanhMucController())->index(),
  'from-them-danh-muc'         => (new DanhMucController())->create(),
  'them-danh-muc'              => (new DanhMucController())->store(),
  'form-sua-danh-muc'          => (new DanhMucController())->edit(),
  'sua-danh-muc'               => (new DanhMucController())->update(),
  'xoa-danh-muc'               => (new DanhMucController())->destroy(),

  // quản lý Liên Hệ
  'lien-he'                    => (new LienHeController())->index(),
  'form-sua-lien-he'           => (new LienHeController())->edit(),
  'sua-lien-he'                => (new LienHeController())->update(),
  'xoa-lien-he'                => (new LienHeController())->destroy(),

  // quản lý người dùng
  'nguoi-dung'                    => (new nguoiDungController())->index(),
  'from-them-nguoi-dung'          => (new nguoiDungController())->create(),
  'them-nguoi-dung'               => (new nguoiDungController())->store(),
  'form-sua-nguoi-dung'           => (new nguoiDungController())->edit(),
  'sua-nguoi-dung'                => (new nguoiDungController())->update(),
  'xoa-nguoi-dung'                => (new nguoiDungController())->destroy(),

  // quản lý tin tức
  // 'tin-tuc'                    => (new TintucController())->index(),
  // 'from-them-tin-tuc'          => (new TintucController())->create(),
  // 'them-tin-tuc'               => (new TintucController())->store(),
  // 'form-sua-tin-tuc'           => (new TintucController())->edit(),
  // 'sua-tin-tuc'                => (new TintucController())->update(),
  // 'xoa-tin-tuc'                => (new TintucController())->destroy(),

  // quản lý Sản Phẩm
  'san-pham'                    => (new SanPhamController())->index(),
  'from-them-san-pham'          => (new SanPhamController())->create(),
  'them-san-pham'               => (new SanPhamController())->store(),
  'form-sua-san-pham'           => (new SanPhamController())->edit(),
  'sua-san-pham'                => (new SanPhamController())->update(),
  'chi-tiet-san-pham'           => (new SanPhamController())->chitiet(),
  'xoa-san-pham'               => (new SanPhamController())->destroy(),
  // quanr lý banner
  'banner'                     => (new BannerController())->index(),
  'from-them-banner'          => (new BannerController())->create(),
  'them-banner'               => (new BannerController())->store(),
  'form-sua-banner'           => (new BannerController())->edit(),
  'sua-banner'                => (new BannerController())->update(),
  'xoa-banner'                => (new BannerController())->destroy(),

  // quản lý tin tức
  'tin-tuc'                    => (new TintucController())->index(),
  'from-them-tin-tuc'          => (new TintucController())->create(),
  'them-tin-tuc'               => (new TintucController())->store(),
  'form-sua-tin-tuc'           => (new TintucController())->edit(),
  'sua-tin-tuc'                => (new TintucController())->update(),
  'xoa-tin-tuc'                => (new TintucController())->destroy(),

  // quản lý trạng thái
  'trang-thai'                    => (new trangThaiController())->index(),
  'form-them-trang-thai'          => (new trangThaiController())->create(),
  'them-trang-thai'               => (new trangThaiController())->store(),
  'form-sua-trang-thai'           => (new trangThaiController())->edit(),
  'sua-trang-thai'                => (new trangThaiController())->update(),
  'xoa-trang-thai'                => (new trangThaiController())->destroy(),

  // quản lý khuyến mãi
  'khuyen-mai'                      => (new khuyenMaiController())->index(),
  'form-them-khuyen-mai'            => (new khuyenMaiController())->create(),
  'them-khuyen-mai'                 => (new khuyenMaiController())->store(),
  'form-sua-khuyen-mai'             => (new khuyenMaiController())->edit(),
  'sua-khuyen-mai'                  => (new khuyenMaiController())->update(),
  'xoa-khuyen-mai'                  => (new khuyenMaiController())->destroy(),


  // quản lý Đơn hàng
  'don-hang'                      => (new DonHangController())->index(),
  //  'form-them-khuyen-mai'            => (new khuyenMaiController())->create(),
  //  'them-khuyen-mai'                 => (new khuyenMaiController())->store(),
  'form-sua-don-hang'             => (new DonHangController())->edit(),
  'sua-don-hang'                  => (new DonHangController())->update(),
  'xoa-don-hang'                  => (new DonHangController())->destroy(),
  'chi-tiet'                       => (new DonHangController())->chitiet(),
};
