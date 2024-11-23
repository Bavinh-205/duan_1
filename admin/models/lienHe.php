<?php
class lienHe
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
            $sql = 'SELECT * FROM lien_he';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo 'lỗi' . $e->getMessage();
        }
    }

    // thêm dữ liệu mới

    // lấy thông tin chi tiết
    public function getDetaiData($id)
    {
        try {
            $sql = 'SELECT * FROM lien_he WHERE id=:id';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch();
        } catch (PDOException $e) {
            echo 'lỗi' . $e->getMessage();
        }
    }

    // update
    public function UpdateData($id, $email, $noi_dung, $ngay_tao, $trang_thai)
    {
        // var_dump($email,$noi_dung);die();
        try {
            $sql = 'UPDATE  lien_he SET email=:email ,noi_dung=:noi_dung ,ngay_tao=:ngay_tao, trang_thai=:trang_thai WHERE id=:id ';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':noi_dung', $noi_dung);
            $stmt->bindParam(':ngay_tao', $ngay_tao);
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
            $sql = 'DELETE  FROM lien_he WHERE id=:id';
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
