<?php
class danhMuc{
    public $conn;
    // hàm kết nối csdl
    public function __construct()
    {
        $this->conn = connectDB();
    }
    // Danh sách danh mục
    public function getAllDanhMuc(){
        try{
            $sql = 'SELECT * FROM danh_mucs';
            $stmt = $this->conn->prepare($sql);
            $stmt ->execute();
            return $stmt->fetchAll();
        }catch(PDOException $e){
            echo 'lỗi'.$e->getMessage();
        }
    }

    // thêm dữ liệu mới
    public function postData($ten_danh_muc,$trang_thai){
        // var_dump($ten_danh_muc,$trang_thai);die();
        try{
            $sql = 'INSERT INTO danh_mucs (ten_danh_muc,trang_thai)
            VALUES (:ten_danh_muc,:trang_thai)';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':ten_danh_muc',$ten_danh_muc);
            $stmt->bindParam(':trang_thai',$trang_thai);
            $stmt ->execute();
            return $stmt->fetchAll();
        }catch(PDOException $e){
            echo 'lỗi'.$e->getMessage();
        }
    }
    // lấy thông tin chi tiết
    public function getDetaiData($id){
        try{
            $sql = 'SELECT * FROM danh_mucs WHERE id=:id';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id',$id);
            $stmt ->execute();
            return $stmt->fetch();
        }catch(PDOException $e){
            echo 'lỗi'.$e->getMessage();
        }
    }

    // update
    public function UpdateData($id,$ten_danh_muc,$trang_thai){
        // var_dump($ten_danh_muc,$trang_thai);die();
        try{
            $sql = 'UPDATE  danh_mucs SET ten_danh_muc=:ten_danh_muc ,trang_thai=:trang_thai WHERE id=:id ';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id',$id);
            $stmt->bindParam(':ten_danh_muc',$ten_danh_muc);
            $stmt->bindParam(':trang_thai',$trang_thai);
            $stmt ->execute();
            return true;
        }catch(PDOException $e){
            echo 'lỗi'.$e->getMessage();
        }
    }
    
     // xóa danh mục
    public function deleteData($id){
        try{
            $sql = 'DELETE  FROM danh_mucs WHERE id=:id';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id',$id);
            $stmt ->execute();
            return true;
        }catch(PDOException $e){
            echo 'lỗi'.$e->getMessage();
        }
    }

    public function timKiemTinTuc($tuKhoa) {
        try {
            $sql = "SELECT * FROM danh_mucs WHERE ten_danh_muc LIKE :tuKhoa";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':tuKhoa' => '%' . $tuKhoa . '%']);
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }

    






    // hủy kết nối CSDL
    public function __destruct()
    {
        $this->conn = null ;
    }
}
?>