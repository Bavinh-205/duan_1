<?php
class ProductDetail{
    public $conn;
    public function __construct(){
        $this->conn = connectDB();
    }
    public function getProduct($id) {
        // SQL truy vấn lấy thông tin chi tiết sản phẩm
        $sql = "SELECT * FROM san_pham WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $product = $stmt->fetch(PDO::FETCH_ASSOC);
        return $product;
    }

}