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
    public function getProductSizes($productId) {
        $sql = "SELECT size.ma_size, san_pham_size.gia 
                FROM san_pham_size 
                JOIN size ON san_pham_size.size_id = size.id
                WHERE san_pham_size.san_pham_id = :productId";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':productId', $productId, PDO::PARAM_INT);
        $stmt->execute();
        $sizes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $sizes;
    }

    public function getProductPriceBySize($productId, $sizeId) {
        $sql = "SELECT gia FROM san_pham_size 
                WHERE san_pham_id = :productId AND size_id = :sizeId";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':productId', $productId, PDO::PARAM_INT);
        $stmt->bindParam(':sizeId', $sizeId, PDO::PARAM_INT);
        $stmt->execute();
        $price = $stmt->fetch(PDO::FETCH_ASSOC);
        return $price ? $price['gia'] : 0;
    }

}