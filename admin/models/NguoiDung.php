<?php
class nguoiDung
{
    public $conn;
    // hàm kết nối csdl
    public function __construct()
    {
        $this->conn = connectDB();
    }
    // Danh sách danh mục
    public function getAllNguoiDung()
    {
        try {
            $sql = 'SELECT * FROM nguoi_dungs';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo 'lỗi' . $e->getMessage();
        }
    }

    // thêm dữ liệu mới
    public function postData($ten_nguoi_dung, $email, $sdt, $dia_chi, $pass, $ngay_sinh, $gioi_tinh, $avatar, $vai_tro, $trang_thai)
    {
        // var_dump($ten_nguoi_dung,$email,$sdt,$dia_chi,$pass,$ngay_sinh,$gioi_tinh,$avatar,$vai_tro,$trang_thai);die();
        // var_dump($avatar);die();
        try {
            $sql = 'INSERT INTO  nguoi_dungs (ten_nguoi_dung, email, sdt, dia_chi, pass, ngay_sinh, gioi_tinh, avatar, vai_tro, trang_thai)
            VALUES (:ten_nguoi_dung, :email, :sdt, :dia_chi, :pass, :ngay_sinh, :gioi_tinh, :avatar, :vai_tro, :trang_thai)';
            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':ten_nguoi_dung', $ten_nguoi_dung);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':sdt', $sdt);
            $stmt->bindParam(':dia_chi', $dia_chi);
            $stmt->bindParam(':pass', $pass);
            $stmt->bindParam(':ngay_sinh', $ngay_sinh);
            $stmt->bindParam(':gioi_tinh', $gioi_tinh);
            $stmt->bindParam(':avatar', $avatar);
            $stmt->bindParam(':vai_tro', $vai_tro);
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
            $sql = 'SELECT * FROM nguoi_dungs WHERE id=:id';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch();
        } catch (PDOException $e) {
            echo 'lỗi' . $e->getMessage();
        }
    }

    // update
    public function UpdateData($id, $ten_nguoi_dung, $email, $sdt, $dia_chi, $pass, $ngay_sinh, $gioi_tinh, $avatar, $vai_tro, $trang_thai)
    {
        try {
            // Corrected SQL query
            $sql = 'UPDATE nguoi_dungs 
                    SET ten_nguoi_dung = :ten_nguoi_dung,
                        email = :email,
                        sdt = :sdt,
                        dia_chi = :dia_chi,
                        pass = :pass,
                        ngay_sinh = :ngay_sinh,
                        gioi_tinh = :gioi_tinh,
                        avatar=:avatar,
                        vai_tro = :vai_tro,
                        trang_thai = :trang_thai
                    WHERE id = :id';

            $stmt = $this->conn->prepare($sql);

            // var_dump($stmt);die();
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':ten_nguoi_dung', $ten_nguoi_dung);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':sdt', $sdt);
            $stmt->bindParam(':dia_chi', $dia_chi);
            $stmt->bindParam(':pass', $pass);
            $stmt->bindParam(':ngay_sinh', $ngay_sinh);
            $stmt->bindParam(':gioi_tinh', $gioi_tinh);
            $stmt->bindParam(':avatar', $avatar);
            $stmt->bindParam(':vai_tro', $vai_tro);
            $stmt->bindParam(':trang_thai', $trang_thai);
            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }



    // xóa danh mục
    public function deleteData($id)
    {
        try {
            $sql = 'DELETE  FROM nguoi_dungs WHERE id=:id';
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
