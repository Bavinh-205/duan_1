<?php

class DashboardController
{

    public $modelDashboard;
    public $modelSanPham;

    public function __construct()
    {
        $this->modelDashboard = new Dashboard();
        $this->modelSanPham = new SanPham();
    }

    public function index()
    {
        $tongThuNhap = $this->modelDashboard->layTongThuNhapHomNay();
        $soLuongDonHangHomNay = $this->modelDashboard->demSoLuongDonHangHomNay();
        $soLuongKhachHang = $this->modelDashboard->demSoLuongKhachHang();
        $banChays = $this->modelSanPham->getBanChay();
        $moiNhats = $this->modelSanPham->getMoiNhat();
        // var_dump($soLuongKhachHang);die();

        require_once "./views/dashboard.php";
    }
}
