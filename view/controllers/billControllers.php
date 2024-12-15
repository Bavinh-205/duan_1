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

public function getCartItems($email) {
    $sql = "SELECT * FROM gio_hangs WHERE email = :email";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);  // Lấy tất cả các sản phẩm trong giỏ hàng
}
public function createOrder($order_id, $user_id, $name, $email, $images, $desc, $phone, $address, $payment, $total_amount, $payment_method) {
    $sql = "INSERT INTO don_hangs (ma_don_hang, nguoi_dung_id, ten_nguoi_nhan, email_nguoi_nhan, hinh_anh,  sdt_nguoi_nhan, dia_chi_nguoi_nhan, ngay_dat, trang_thai_thanh_toan, tong_tien, phuong_thuc_thanh_toan_id, trang_thai_id) 
            VALUES (:order_id, :user_id, :name, :email, :images, :phone, :address, NOW(), :payment, :total_amount, :payment_method, :status)";
    $stmt = $this->conn->prepare($sql);
    $status = 1;

    // Bind các tham số
    $stmt->bindValue(':order_id', $order_id, PDO::PARAM_STR);
    $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->bindValue(':name', $name, PDO::PARAM_STR);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->bindValue(':phone', $phone, PDO::PARAM_STR);
    $stmt->bindValue(':address', $address, PDO::PARAM_STR);
    $stmt->bindValue(':payment', $payment, PDO::PARAM_INT);
    $stmt->bindValue(':total_amount', $total_amount, PDO::PARAM_INT);
    $stmt->bindValue(':images', $images, PDO::PARAM_STR);  // Đảm bảo dữ liệu hình ảnh được truyền đúng
    // $stmt->bindValue(':desc', $desc, PDO::PARAM_STR);      // Đảm bảo mô tả được truyền đúng
    $stmt->bindValue(':payment_method', $payment_method, PDO::PARAM_INT);
    $stmt->bindValue(':status', $status, PDO::PARAM_INT);

    return $stmt->execute();  // Thực hiện lệnh và trả về kết quả
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
    public function getAllOrder($email){
        $sql = "SELECT * FROM don_hangs WHERE email_nguoi_nhan = :email ORDER BY id DESC";
        $stmt = $this->conn->prepare($sql); 
        $stmt->bindParam('email',$email, PDO::PARAM_STR);   
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);  
    }
    public function cancelOrder($order_id) {
        $sql = "SELECT trang_thai_id FROM don_hangs WHERE ma_don_hang = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('s', $order_id);
        $stmt->bindValue(1, $order_id, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->get_result();
        $items = [];
        while ($row = $result->fetch_assoc()) {
            $items[] = $row;  // Lưu các sản phẩm vào mảng
    
        $order = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($order && ($order['trang_thai_id'] == 1 || $order['trang_thai_id'] == 2)) {
            $deleteSql = "DELETE FROM don_hangs WHERE ma_don_hang = ?";
            $stmtDelete = $this->conn->prepare($deleteSql);
            $stmtDelete->bindValue(1, $order_id, PDO::PARAM_STR);
    
            if ($stmtDelete->execute()) {
                return true;
            }
        }
        return $items;
        return false;
    }
}
public function deleteOrder($order_id) {
    // Lấy trạng thái hiện tại của đơn hàng
    $sql = "SELECT trang_thai_id FROM don_hangs WHERE ma_don_hang = :order_id";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindValue(':order_id', $order_id, PDO::PARAM_STR);
    $stmt->execute();
    $order = $stmt->fetch(PDO::FETCH_ASSOC);

    // Kiểm tra nếu trạng thái không phải 1 hoặc 2 thì không cho phép hủy
    if ($order && in_array($order['trang_thai_id'], [1, 2])) {
        // Cập nhật trạng thái đơn hàng thành "Đã hủy" (id = 15)
        $updateSql = "UPDATE don_hangs SET trang_thai_id = 15 WHERE ma_don_hang = :order_id";
        $updateStmt = $this->conn->prepare($updateSql);
        $updateStmt->bindValue(':order_id', $order_id, PDO::PARAM_STR);
        return $updateStmt->execute();
    }

    // Nếu không thỏa mãn điều kiện, trả về false
    return false;
}

public function getOrderItems($order_id) {
    $sql = "SELECT * FROM don_hangs WHERE ma_don_hang = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindValue(1, $order_id, PDO::PARAM_STR);  // Sử dụng bindValue thay vì bind_param
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);  // Trả về mảng các sản phẩm
}

}
?>
