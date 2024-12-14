<?php
class DonHang
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
            $sql = 'SELECT * FROM don_hangs ORDER BY id DESC';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo 'lỗi' . $e->getMessage();
        }
    }
    public function getDetailDonHang($id)
    {
        try {

            $sql = 'SELECT don_hangs.*,
                            trang_thai_don_hangs.ten_trang_thai,
                            nguoi_dungs.ten_nguoi_dung,
                            nguoi_dungs.email,
                            nguoi_dungs.sdt,
                            phuong_thuc_thanh_toans.ten_phuong_thuc
            FROM don_hangs
            INNER JOIN trang_thai_don_hangs ON don_hangs.trang_thai_id = trang_thai_don_hangs.id
            INNER JOIN nguoi_dungs ON don_hangs.nguoi_dung_id = nguoi_dungs.id
            INNER JOIN phuong_thuc_thanh_toans ON don_hangs.phuong_thuc_thanh_toan_id = phuong_thuc_thanh_toans.id
            WHERE don_hangs.id = :id';


            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id', $id);
            $stmt->execute();

            return $stmt->fetch();
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }

    public function getListSpDonHang($id)
    {
        try {
            $sql = 'SELECT chi_tiet_don_hangs.*, san_pham.ten_san_pham
            FROM chi_tiet_don_hangs
            INNER JOIN san_pham ON chi_tiet_don_hangs.san_pham_id = san_pham.id
            WHERE chi_tiet_don_hangs.don_hang_id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id', $id);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }

    public function getAllTrangThaiDonHang()
    {
        try {
            $sql = 'SELECT * FROM trang_thai_don_hangs';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
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
            $sql = 'SELECT * FROM don_hangs WHERE id=:id';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch();
        } catch (PDOException $e) {
            echo 'lỗi' . $e->getMessage();
        }
    }

    // update
    public function UpdateData($id, $trang_thai_id)
{
    try {
        // Lấy dữ liệu hiện tại của đơn hàng
        $currentData = $this->getDetaiData($id);
        $currentStatus = $currentData['trang_thai_id'];

        // Kiểm tra nếu trạng thái mới bằng với trạng thái hiện tại
        if ($trang_thai_id == $currentStatus) {
            throw new Exception('Trạng thái này đã được chọn. Vui lòng chọn trạng thái khác.');
        }

        // Kiểm tra nếu trạng thái mới nhỏ hơn trạng thái hiện tại
        if ($trang_thai_id < $currentStatus) {
            throw new Exception('Không thể chọn trạng thái đã chọn trước đó.');
        }

        // Câu lệnh SQL cập nhật
        $sql = 'UPDATE don_hangs 
                SET trang_thai_id = :trang_thai_id
                WHERE id = :id';

        $stmt = $this->conn->prepare($sql);

        // Truyền tham số vào câu lệnh SQL
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':trang_thai_id', $trang_thai_id);

        // Thực thi câu lệnh
        $stmt->execute();
        return true;
    } catch (Exception $e) {
        echo 'Lỗi: ' . $e->getMessage();
        return false;
    } catch (PDOException $e) {
        echo 'Lỗi cơ sở dữ liệu: ' . $e->getMessage();
        return false;
    }
}


    public function updateTrangThaiThanhToan($id, $trang_thai_thanh_toan)
    {
        try {
            $sql = 'UPDATE don_hangs SET trang_thai_thanh_toan = :trang_thai_thanh_toan WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':trang_thai_thanh_toan', $trang_thai_thanh_toan);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return true;
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
            return false;
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
