<?php

class Dashboard
{
    public $conn;

    // kết nối cơ sở dữ liệu
    public  function __construct()
    {
        $this->conn = connectDB();
    }



    public function layTongThuNhapHomNay()
    {
        try {
            // Câu truy vấn SQL để tính tổng thu nhập của tất cả các đơn hàng
            $sql = "SELECT SUM(tong_tien) AS tong_thu_nhap FROM don_hangs";
    
            $stmt = $this->conn->prepare($sql);
            // Thực thi câu lệnh mà không cần tham số
            $stmt->execute();
    
            // Lấy kết quả và trả về tổng thu nhập, nếu không có thì trả về 0
            $ketQua = $stmt->fetch();
            return $ketQua['tong_thu_nhap'] ?? 0; // Trả về 0 nếu không có đơn hàng nào
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }
    public function demSoLuongDonHangHomNay()
    {
        try {
            // Câu truy vấn SQL để đếm số lượng đơn hàng
            $sql = "SELECT COUNT(*) AS so_luong_don_hang FROM don_hangs";
    
            $stmt = $this->conn->prepare($sql);
            // Thực thi câu lệnh
            $stmt->execute();
    
            // Lấy kết quả và trả về số lượng đơn hàng, nếu không có thì trả về 0
            $ketQua = $stmt->fetch();
            return $ketQua['so_luong_don_hang'] ?? 0;
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }
    public function demSoLuongKhachHang()
    {
        try {

            $sql = "SELECT COUNT(*) AS so_luong_khach_hang FROM nguoi_dungs";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $ketQua = $stmt->fetch();

            return $ketQua['so_luong_khach_hang'] ?? 0; // Trả về 0 nếu không có đơn hàng nào
            //code...
        } catch (PDOException $e) {
            //throw $th;
            echo 'Lỗi: ' . $e->getMessage();
        }
    }










    // huy ket noi csdl
    public function  __destruct()
    {
        $this->conn = null;
    }
}
