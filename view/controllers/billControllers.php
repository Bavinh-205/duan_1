<?php
class Order {
    private $conn;

    public function __construct() {
        $this->conn = connectDB();
    }

   // Sửa lại phương thức sử dụng PDO


public function getOrderDetails($order_id) {
    $sql = "SELECT don_hangs.*, phuong_thuc_thanh_toans.ten_phuong_thuc,trang_thai_don_hangs.ten_trang_thai,trang_thai_thanh_toan.ten_phuong_thucs
            FROM don_hangs
            JOIN trang_thai_don_hangs ON don_hangs.trang_thai_id = trang_thai_don_hangs.id
            JOIN trang_thai_thanh_toan ON don_hangs.trang_thai_thanh_toan = trang_thai_thanh_toan.id
            JOIN phuong_thuc_thanh_toans ON don_hangs.phuong_thuc_thanh_toan_id = phuong_thuc_thanh_toans.id
            WHERE don_hangs.ma_don_hang = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindValue(1, $order_id, PDO::PARAM_STR); // Thay bind_param bằng bindValue
    $stmt->execute();
    
    // Fetch kết quả với phương thức fetch()
    return $stmt->fetch(PDO::FETCH_ASSOC);  // Trả về thông tin đơn hàng và tên phương thức thanh toán
}


    // Thêm đơn hàng vào bảng don_hangs
    public function createOrder($order_id,$user_id, $name, $email, $phone, $address, $total_amount, $payment_method) {
        $sql = "INSERT INTO don_hangs (ma_don_hang,nguoi_dung_id, ten_nguoi_nhan, email_nguoi_nhan, sdt_nguoi_nhan, dia_chi_nguoi_nhan, ngay_dat, tong_tien, phuong_thuc_thanh_toan_id, trang_thai_id) 
                VALUES (:order_id,:user_id, :name, :email, :phone, :address, NOW(), :total_amount, :payment_method, :status)";
        
        // Chuẩn bị câu lệnh SQL
        $stmt = $this->conn->prepare($sql);
        $user_id = $this->getUserIdByEmail($email);
        // Gán giá trị cho các tham số
        $status = 1; // Trạng thái đơn hàng (mới)
        $stmt->bindValue(':order_id', $order_id, PDO::PARAM_STR);
$stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$stmt->bindValue(':phone', $phone, PDO::PARAM_STR);
$stmt->bindValue(':address', $address, PDO::PARAM_STR);
$stmt->bindValue(':total_amount', $total_amount, PDO::PARAM_INT);
$stmt->bindValue(':payment_method', $payment_method, PDO::PARAM_STR);
$stmt->bindValue(':status', $status, PDO::PARAM_INT); 
        return $stmt->execute();
    }
    
    // Thêm sản phẩm vào bảng chi_tiet_don_hangs
    public function createOrderItems($order_id, $product_id, $price, $quantity, $total_price) {
        $sql = "INSERT INTO chi_tiet_don_hangs (don_hang_id, san_pham_id,hinh_anh, don_gia, so_luong, thanh_tien) 
                VALUES (:order_id, :product_id, :price, :quantity, :total_price)";
        $stmt = $this->conn->prepare($sql);
        
        $stmt->bindValue(':order_id', $order_id, PDO::PARAM_INT);
        $stmt->bindValue(':product_id', $product_id, PDO::PARAM_INT);
        $stmt->bindValue(':price', $price, PDO::PARAM_INT);
        $stmt->bindValue(':quantity', $quantity, PDO::PARAM_INT);
        $stmt->bindValue(':total_price', $total_price, PDO::PARAM_INT);
    
        return $stmt->execute();
    }
    public function getUserIdByEmail($email) {
        $sql = "SELECT id FROM nguoi_dungs WHERE email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['id'] ?? null;
    }
    public function getOrderItems($order_id) {
        $sql = "SELECT * FROM chi_tiet_don_hangs WHERE don_hang_id = :order_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':order_id', $order_id, PDO::PARAM_STR); 
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);  
    }
    public function cancelOrder($order_id) {
        $sql = "SELECT trang_thai_id FROM don_hangs WHERE ma_don_hang = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(1, $order_id, PDO::PARAM_STR);
        $stmt->execute();
    
        $order = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($order && ($order['trang_thai_id'] == 1 || $order['trang_thai_id'] == 2)) {
            $deleteSql = "DELETE FROM don_hangs WHERE ma_don_hang = ?";
            $stmtDelete = $this->conn->prepare($deleteSql);
            $stmtDelete->bindValue(1, $order_id, PDO::PARAM_STR);
    
            if ($stmtDelete->execute()) {
                return true;
            }
        }
        return false;
    }
    
    
}
?>
