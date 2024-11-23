<?php
class tintuc{
    public $conn;
    // hàm kết nối csdl
    public function __construct()
    {
        $this->conn = connectDB();
    }
    // Danh sách danh mục
    public function getAll(){
        try{
            $sql = 'SELECT * FROM tin_tuc';
            $stmt = $this->conn->prepare($sql);
            $stmt ->execute();
            return $stmt->fetchAll();
        }catch(PDOException $e){
            echo 'lỗi'.$e->getMessage();
        }
    }

    // thêm dữ liệu mới
    public function postData($tieu_de,$noi_dung,$ngay_tao,$trang_thai){
        // var_dump($ten_danh_muc,$trang_thai);die();
        // var_dump($tieu_de,$noi_dung,$ngay_tao,$trang_thai); die();
        try{
            $sql = 'INSERT INTO tin_tuc (tieu_de,noi_dung,ngay_tao,trang_thai)
            VALUES (:tieu_de,:noi_dung,:ngay_tao,:trang_thai)';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':tieu_de',$tieu_de);
            $stmt->bindParam(':noi_dung',$noi_dung);
            $stmt->bindParam(':ngay_tao',$ngay_tao);
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
            $sql = 'SELECT * FROM tin_tuc WHERE id=:id';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id',$id);
            $stmt ->execute();
            return $stmt->fetch();
        }catch(PDOException $e){
            echo 'lỗi'.$e->getMessage();
        }
    }

    // update
    public function UpdateData($id,$tieu_de,$noi_dung,$ngay_tao,$trang_thai){
        // var_dump($tieu_de,$noi_dung,$ngay_tao,$trang_thai); die();
        try{
            $sql = 'UPDATE  tin_tuc SET tieu_de=:tieu_de,noi_dung=:noi_dung,ngay_tao=:ngay_tao,trang_thai=:trang_thai WHERE id=:id ';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id',$id);
            $stmt->bindParam(':tieu_de',$tieu_de);
            $stmt->bindParam(':noi_dung',$noi_dung);
            $stmt->bindParam(':ngay_tao',$ngay_tao);
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
            $sql = 'DELETE  FROM tin_tuc WHERE id=:id';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id',$id);
            $stmt ->execute();
            return true;
        }catch(PDOException $e){
            echo 'lỗi'.$e->getMessage();
        }
    }






    // hủy kết nối CSDL
    public function __destruct()
    {
        $this->conn = null ;
    }
}
?>