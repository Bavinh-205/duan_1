<?php
class SanPham
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
            $sql = 'SELECT * FROM san_pham';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo 'lỗi' . $e->getMessage();
        }
    }
    public function getBanChay()
    {
        try {
            $sql = 'SELECT * FROM san_pham ORDER BY luot_xem DESC LIMIT 5';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo 'lỗi' . $e->getMessage();
        }
    }
    public function getMoiNhat()
    {
        try {
            $sql = 'SELECT * FROM san_pham ORDER BY ngay_nhap DESC LIMIT 5';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo 'lỗi' . $e->getMessage();
        }
    }

    // thêm dữ liệu mới
    public function postData($ma_san_pham, $ten_san_pham, $hinh_anh, $gia_nhap, $gia_ban, $gia_khuyen_mai, $ngay_nhap, $so_luong, $luot_xem, $mo_ta, $mo_ta_chi_tiet, $danh_muc_id, $trang_thai)
    {
        // var_dump($ten_nguoi_dung,$email,$sdt,$dia_chi,$pass,$ngay_sinh,$gioi_tinh,$img,$vai_tro,$trang_thai);die();
        // var_dump($img);die();
        try {
            $sql = 'INSERT INTO  san_pham (ma_san_pham, ten_san_pham, hinh_anh, gia_nhap, gia_ban, gia_khuyen_mai, ngay_nhap, so_luong,luot_xem, mo_ta,  mo_ta_chi_tiet, danh_muc_id, trang_thai)
            VALUES (:ma_san_pham, :ten_san_pham, :hinh_anh, :gia_nhap, :gia_ban, :gia_khuyen_mai, :ngay_nhap, :so_luong, :luot_xem, :mo_ta, :mo_ta_chi_tiet, :danh_muc_id, :trang_thai)';
            $stmt = $this->conn->prepare($sql);
            //    var_dump($sql);die();
            $stmt->bindParam(':ma_san_pham', $ma_san_pham);
            $stmt->bindParam(':ten_san_pham', $ten_san_pham);
            $stmt->bindParam(':hinh_anh', $hinh_anh);
            $stmt->bindParam(':gia_nhap', $gia_nhap);
            $stmt->bindParam(':gia_ban', $gia_ban);
            $stmt->bindParam(':gia_khuyen_mai', $gia_khuyen_mai);
            $stmt->bindParam(':ngay_nhap', $ngay_nhap);
            $stmt->bindParam(':so_luong', $so_luong);
            $stmt->bindParam(':luot_xem', $luot_xem);
            $stmt->bindParam(':mo_ta', $mo_ta);
            $stmt->bindParam(':mo_ta_chi_tiet', $mo_ta_chi_tiet);
            $stmt->bindParam(':danh_muc_id', $danh_muc_id);
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
            $sql = 'SELECT * FROM san_pham WHERE id=:id';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch();
        } catch (PDOException $e) {
            echo 'lỗi' . $e->getMessage();
        }
    }

    // update
    public function UpdateData($id, $ma_san_pham, $ten_san_pham, $hinh_anh, $gia_nhap, $gia_ban, $gia_khuyen_mai, $ngay_nhap, $so_luong, $luot_xem, $mo_ta, $mo_ta_chi_tiet, $danh_muc_id, $trang_thai)
    {
        try {
            // Corrected SQL query
            $sql = 'UPDATE san_pham 
                    SET ma_san_pham=:ma_san_pham,
                    ten_san_pham=:ten_san_pham,
                    hinh_anh=:hinh_anh,
                    gia_nhap=:gia_nhap,
                    gia_ban=:gia_ban,
                    gia_khuyen_mai=:gia_khuyen_mai,
                    ngay_nhap=:ngay_nhap,
                    so_luong=:so_luong,
                    luot_xem=:luot_xem,
                    mo_ta=:mo_ta,
                    mo_ta_chi_tiet=:mo_ta_chi_tiet,
                    danh_muc_id=:danh_muc_id,
                    trang_thai=:trang_thai
                    WHERE id = :id';

            // var_dump($sql);die();

            $stmt = $this->conn->prepare($sql);

            // var_dump($stmt);die();
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':ma_san_pham', $ma_san_pham);
            $stmt->bindParam(':ten_san_pham', $ten_san_pham);
            $stmt->bindParam(':hinh_anh', $hinh_anh);
            $stmt->bindParam(':gia_nhap', $gia_nhap);
            $stmt->bindParam(':gia_ban', $gia_ban);
            $stmt->bindParam(':gia_khuyen_mai', $gia_khuyen_mai);
            $stmt->bindParam(':ngay_nhap', $ngay_nhap);
            $stmt->bindParam(':so_luong', $so_luong);
            $stmt->bindParam(':luot_xem', $luot_xem);
            $stmt->bindParam(':mo_ta', $mo_ta);
            $stmt->bindParam(':mo_ta_chi_tiet', $mo_ta_chi_tiet);
            $stmt->bindParam(':danh_muc_id', $danh_muc_id);
            $stmt->bindParam(':trang_thai', $trang_thai);
            // var_dump($ma_san_pham,$ten_san_pham,$hinh_anh,$gia_nhap,$gia_ban,$gia_khuyen_mai,$ngay_nhap,$so_luong,$luot_xem,$mo_ta,$mo_ta_chi_tiet,$danh_muc_id,$trang_thai);die();
            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }

    public function getChitietDanhMuc($id)
    {
        try {
            $sql = 'SELECT * FROM danh_mucs WHERE id=:id';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch();
        } catch (PDOException $e) {
            echo 'lỗi' . $e->getMessage();
        }
    }

    public function getChitiet($id)
    {
        try {
            $sql = 'SELECT * FROM san_pham WHERE id=:id';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch();
        } catch (PDOException $e) {
            echo 'lỗi' . $e->getMessage();
        }
    }

    public function getBinhLuanFromSanPham($id)
    {
        try {
            $sql = 'SELECT binh_luans.*, nguoi_dungs.ten_nguoi_dung 
            FROM binh_luans
            INNER JOIN nguoi_dungs ON binh_luans.nguoi_dung_id = nguoi_dungs.id
            WHERE binh_luans.san_pham_id = :id';

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "CÓ LỖI:" . $e->getMessage();
        }
    }
    public function getdanhGia($id)
    {
        try {
            $sql = 'SELECT danh_gia.*, nguoi_dungs.ten_nguoi_dung 
            FROM danh_gia
            INNER JOIN nguoi_dungs ON danh_gia.nguoi_dung_id = nguoi_dungs.id
            WHERE danh_gia.san_pham_id = :id';

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "CÓ LỖI:" . $e->getMessage();
        }
    }

    // xóa danh mục
    public function deleteData($id)
    {
        try {
            $sql = 'DELETE  FROM san_pham WHERE id=:id';
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
