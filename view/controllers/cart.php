<?php
class Cart {
    public $conn;

    public function __construct() {
        $this->conn = connectDB(); // Kết nối cơ sở dữ liệu
    }
    private function getProductStock($ma_san_pham) {
        $sql = "SELECT so_luong FROM san_pham WHERE ma_san_pham = :ma_san_pham";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':ma_san_pham', $ma_san_pham);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($result) {
            return $result['so_luong'];
        } else {
            return 0; // Nếu không tìm thấy sản phẩm, trả về 0
        }
    }
    private function updateProductStock($ma_san_pham, $newStock) {
        echo "Cập nhật số lượng kho: " . $newStock . "<br>"; // Kiểm tra số lượng kho cần cập nhật
        $sql = "UPDATE san_pham SET so_luong = :so_luong WHERE ma_san_pham = :ma_san_pham";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':so_luong', $newStock);
        $stmt->bindParam(':ma_san_pham', $ma_san_pham);
        $stmt->execute();
    }
    
    // Thêm sản phẩm vào giỏ hàng cho người đã đăng nhập
    public function addProductToCart($ma_san_pham, $email, $so_luong) {
        $stock = $this->getProductStock($ma_san_pham); // Lấy số lượng còn lại của sản phẩm

        if ($so_luong > $stock) {
            echo "Số lượng yêu cầu vượt quá số lượng trong kho!";
            return;
        }
        // Lấy thông tin sản phẩm từ cơ sở dữ liệu
        $sqlProduct = "SELECT ten_san_pham, gia_ban, hinh_anh, danh_muc_id, so_luong FROM san_pham WHERE ma_san_pham = :ma_san_pham";
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
                $sqlInsert = "INSERT INTO gio_hangs (ma_san_pham, email, so_luong,so_luong_con_lai, ten_san_pham, gia_ban, hinh_anh, danh_muc_id) 
                             VALUES (:ma_san_pham, :email, :so_luong, :so_luong_con_lai, :ten_san_pham, :gia_ban, :hinh_anh, :danh_muc_id)";
                $stmtInsert = $this->conn->prepare($sqlInsert);
                $stmtInsert->bindParam(':ma_san_pham', $ma_san_pham);
                $stmtInsert->bindParam(':email', $email);
                $stmtInsert->bindParam(':so_luong', $so_luong);
                $stmtInsert->bindParam(':so_luong_con_lai', $stock);
                $stmtInsert->bindParam(':ten_san_pham', $product['ten_san_pham']);
                $stmtInsert->bindParam(':gia_ban', $product['gia_ban']);
                $stmtInsert->bindParam(':hinh_anh', $product['hinh_anh']);
                $stmtInsert->bindParam(':danh_muc_id', $product['danh_muc_id']);  // Truyền tên thương hiệu vào
                $stmtInsert->execute();
            }
            header('Location: index.php?act=cart');
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
    public function removeProductFromCart($ma_san_pham, $email) {
        $sql = "DELETE FROM gio_hangs WHERE ma_san_pham = :ma_san_pham AND email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':ma_san_pham', $ma_san_pham);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
    }
    public function updateQuantity($ma_san_pham, $email, $so_luong_thay_doi) {
        // Lấy thông tin sản phẩm trong giỏ hàng của người dùng
        $sql = "SELECT so_luong FROM gio_hangs WHERE ma_san_pham = :ma_san_pham AND email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':ma_san_pham', $ma_san_pham);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $item = $stmt->fetch(PDO::FETCH_ASSOC);
    
        // Nếu sản phẩm có trong giỏ hàng
        if ($item) {
            // Lấy số lượng sản phẩm còn trong kho
            $stock = $this->getProductStock($ma_san_pham); // Lấy số lượng kho
            echo "Số lượng kho hiện tại: " . $stock . "<br>"; // Kiểm tra số lượng kho hiện tại
    
            // Tính toán số lượng mới trong giỏ hàng
            $newQuantity = $item['so_luong'] + $so_luong_thay_doi;
    
            // Kiểm tra nếu số lượng mới không nhỏ hơn 1 và không vượt quá số lượng trong kho
            if ($newQuantity > 0 && $newQuantity <= $stock) {
                // Cập nhật số lượng sản phẩm trong giỏ hàng
                $sqlUpdate = "UPDATE gio_hangs SET so_luong = :so_luong WHERE ma_san_pham = :ma_san_pham AND email = :email";
                $stmtUpdate = $this->conn->prepare($sqlUpdate);
                $stmtUpdate->bindParam(':so_luong', $newQuantity);
                $stmtUpdate->bindParam(':ma_san_pham', $ma_san_pham);
                $stmtUpdate->bindParam(':email', $email);
                $stmtUpdate->execute();
    
                // Nếu số lượng thay đổi dương, giảm số lượng trong kho
                if ($so_luong_thay_doi > 0) {
                    $newStock = $stock - $so_luong_thay_doi;
                    $this->updateProductStock($ma_san_pham, $newStock); // Gọi phương thức cập nhật kho
                }
                // Nếu số lượng thay đổi âm, tăng số lượng trong kho
                elseif ($so_luong_thay_doi < 0) {
                    $newStock = $stock + abs($so_luong_thay_doi); // abs() để lấy số dương
                    $this->updateProductStock($ma_san_pham, $newStock); // Gọi phương thức cập nhật kho
                }
    
                // Kiểm tra lại số lượng kho sau khi cập nhật
                echo "Số lượng kho sau khi cập nhật: " . $newStock . "<br>";
            } else {
                echo "Số lượng không hợp lệ!";
            }
        } else {
            echo "Sản phẩm không có trong giỏ hàng!";
        }
    }
    
    
}



?>