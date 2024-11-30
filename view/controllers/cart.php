<?php
class Cart {
    public $conn;

    public function __construct() {
        $this->conn = connectDB(); // Kết nối cơ sở dữ liệu
    }

    // Thêm sản phẩm vào giỏ hàng cho người đã đăng nhập
    public function addProductToCart($ma_san_pham, $email, $so_luong) {
        // Lấy thông tin sản phẩm từ cơ sở dữ liệu
        $sqlProduct = "SELECT ten_san_pham, gia_ban, hinh_anh, danh_muc_id FROM san_pham WHERE ma_san_pham = :ma_san_pham";
$stmtProduct = $this->conn->prepare($sqlProduct);
$stmtProduct->bindParam(':ma_san_pham', $ma_san_pham);
$stmtProduct->execute();
$product = $stmtProduct->fetch(PDO::FETCH_ASSOC);

// Debug thông tin sản phẩm
var_dump($product); // In ra thông tin sản phẩm để kiểm tra
        
        if ($product) {
            // Kiểm tra xem tên thương hiệu có hợp lệ không
            if (empty($product['danh_muc_id'])) {
                echo "Sản phẩm này không có tên thương hiệu hợp lệ, không thể thêm vào giỏ hàng!";
                return;
            }

            // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
            $sql = "SELECT * FROM gio_hangs WHERE ma_san_pham = :ma_san_pham AND email = :email";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':ma_san_pham', $ma_san_pham);
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                // Cập nhật số lượng nếu sản phẩm đã có trong giỏ
                $sqlUpdate = "UPDATE gio_hangs SET so_luong = so_luong + :so_luong WHERE ma_san_pham = :ma_san_pham AND email = :email";
                $stmtUpdate = $this->conn->prepare($sqlUpdate);
                $stmtUpdate->bindParam(':ma_san_pham', $ma_san_pham);
                $stmtUpdate->bindParam(':email', $email);
                $stmtUpdate->bindParam(':so_luong', $so_luong);
                $stmtUpdate->execute();
            } else {
                // Thêm sản phẩm mới vào giỏ hàng
                $sqlInsert = "INSERT INTO gio_hangs (ma_san_pham, email, so_luong, ten_san_pham, gia_ban, hinh_anh, danh_muc_id) 
                             VALUES (:ma_san_pham, :email, :so_luong, :ten_san_pham, :gia_ban, :hinh_anh, :danh_muc_id)";
                $stmtInsert = $this->conn->prepare($sqlInsert);
                $stmtInsert->bindParam(':ma_san_pham', $ma_san_pham);
                $stmtInsert->bindParam(':email', $email);
                $stmtInsert->bindParam(':so_luong', $so_luong);
                $stmtInsert->bindParam(':ten_san_pham', $product['ten_san_pham']);
                $stmtInsert->bindParam(':gia_ban', $product['gia_ban']);
                $stmtInsert->bindParam(':hinh_anh', $product['hinh_anh']);
                $stmtInsert->bindParam(':danh_muc_id', $product['danh_muc_id']);  // Truyền tên thương hiệu vào
                $stmtInsert->execute();
            }
            return "Sản phẩm đã được thêm vào giỏ hàng!";
        } else {
            echo "Sản phẩm không tồn tại!";
        }
    }

    // Lấy sản phẩm trong giỏ hàng của người dùng
    public function getCartItems($email) {
        $sql = "SELECT * FROM gio_hangs WHERE email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);  // Lấy tất cả các sản phẩm trong giỏ hàng
    }
}



?>