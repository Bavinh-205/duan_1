<?php
class Order {
    private $conn;

    public function __construct() {
        $this->conn = connectDB();
    }

    // Lấy thông tin đơn hàng theo mã đơn hàng
    public function getOrderDetails($order_id) {
        $sql = "SELECT * FROM don_hangs WHERE ma_don_hang = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('s', $order_id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();  // Trả về thông tin đơn hàng
    }

    // Lấy danh sách sản phẩm trong đơn hàng
    public function getOrderItems($order_id) {
        $sql = "SELECT * FROM order_items WHERE ma_don_hang = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('s', $order_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $items = [];
        while ($row = $result->fetch_assoc()) {
            $items[] = $row;  // Lưu các sản phẩm vào mảng
        }
        return $items;
    }
}
?>
