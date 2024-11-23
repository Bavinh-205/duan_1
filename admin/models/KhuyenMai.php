<?php
class khuyenMai
{
    public $conn;
    // hàm kết nối csdl
    public function __construct()
    {
        $this->conn = connectDB();
    }
    // Danh sách danh mục
    public function getAll()
    {
        try {
            $sql = 'SELECT * FROM khuyen_mais';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo 'lỗi' . $e->getMessage();
        }
    }

    // thêm dữ liệu mới
    public function postData($ten_khuyen_mai, $ma_khuyen_mai, $gia_tri, $ngay_bat_dau, $ngay_ket_thuc, $mo_ta, $trang_thai)
    {
        // var_dump($ten_danh_muc,$trang_thai);die();
        try {
            $sql = 'INSERT INTO khuyen_mais (ten_khuyen_mai, ma_khuyen_mai, gia_tri, ngay_bat_dau, ngay_ket_thuc, mo_ta, trang_thai)
            VALUES (:ten_khuyen_mai, :ma_khuyen_mai, :gia_tri, :ngay_bat_dau, :ngay_ket_thuc, :mo_ta, :trang_thai)';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':ten_khuyen_mai', $ten_khuyen_mai);
            $stmt->bindParam(':ma_khuyen_mai', $ma_khuyen_mai);
            $stmt->bindParam(':gia_tri', $gia_tri);
            $stmt->bindParam(':ngay_bat_dau', $ngay_bat_dau);
            $stmt->bindParam(':ngay_ket_thuc', $ngay_ket_thuc);
            $stmt->bindParam(':mo_ta', $mo_ta);
            $stmt->bindParam(':trang_thai', $trang_thai);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo 'lỗi' . $e->getMessage();
        }
    }
    // lấy thông tin chi tiết
    public function getDetaiData($id)
    {
        try {
            $sql = 'SELECT * FROM khuyen_mais WHERE id=:id';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch();
        } catch (PDOException $e) {
            echo 'lỗi' . $e->getMessage();
        }
    }

    // update
    public function UpdateData($id, $ten_khuyen_mai, $ma_khuyen_mai, $gia_tri, $ngay_bat_dau, $ngay_ket_thuc, $mo_ta, $trang_thai)
    {
        // var_dump($ten_danh_muc,$trang_thai);die();
        try {
            $sql = 'UPDATE  khuyen_mais 
            SET ten_khuyen_mai=:ten_khuyen_mai,
                ma_khuyen_mai=:ma_khuyen_mai,
                gia_tri=:gia_tri,
                ngay_bat_dau=:ngay_bat_dau,
                ngay_ket_thuc=:ngay_ket_thuc,
                mo_ta=:mo_ta,
                trang_thai=:trang_thai
            WHERE id=:id';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':ten_khuyen_mai', $ten_khuyen_mai);
            $stmt->bindParam(':ma_khuyen_mai', $ma_khuyen_mai);
            $stmt->bindParam(':gia_tri', $gia_tri);
            $stmt->bindParam(':ngay_bat_dau', $ngay_bat_dau);
            $stmt->bindParam(':ngay_ket_thuc', $ngay_ket_thuc);
            $stmt->bindParam(':mo_ta', $mo_ta);
            $stmt->bindParam(':trang_thai', $trang_thai);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo 'lỗi' . $e->getMessage();
        }
    }

    // xóa danh mục
    public function deleteData($id)
    {
        try {
            $sql = 'DELETE  FROM khuyen_mais WHERE id=:id';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo 'lỗi' . $e->getMessage();
        }
    }






    // hủy kết nối CSDL
    public function __destruct()
    {
        $this->conn = null;
    }
}
