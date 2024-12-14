<?php
class Bill {
    public $conn;

    public function __construct() {
        $this->conn = connectDB();  // Kết nối cơ sở dữ liệu
    }

    // Lấy thông tin người dùng
    public function getUser($id) {
        $sql = "SELECT * FROM nguoi_dungs WHERE id = :id";  // Sử dụng tham số named placeholder (:id)
        $stmt = $this->conn->prepare($sql);  // Chuẩn bị câu lệnh SQL

        // Sử dụng bindParam() thay vì bind_param()
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);  // Gắn giá trị vào tham số :id
        $stmt->execute();  // Thực thi câu lệnh SQL

        // Lấy kết quả và trả về dưới dạng mảng kết hợp
        return $stmt->fetch(PDO::FETCH_ASSOC);  
    }

    // Lấy sản phẩm trong giỏ hàng của người dùng
    public function getCartItems($email) {
        $sql = "SELECT * FROM gio_hangs WHERE email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);  // Lấy tất cả các sản phẩm trong giỏ hàng
    }

    // Tính tổng giá trị giỏ hàng
    public function priceTotal($cartItems) {
        $total = 0;
        foreach ($cartItems as $item) {
            $total += $item['gia_ban'] * $item['so_luong'];  // Tính tổng tiền cho mỗi sản phẩm
        }
        return $total;
    }
    public function savePayment($user_id, $email, $fullName, $phone, $address, $total, $payment_method, $order_status) {
        // Chuẩn bị câu lệnh SQL để chèn dữ liệu vào bảng "don_hangs"
        $sql = "INSERT INTO `don_hangs` 
                    (`nguoi_dung_id`, `ten_nguoi_nhan`, `email_nguoi_nhan`, `sdt_nguoi_nhan`, `dia_chi_nguoi_nhan`, 
                     `ngay_dat`, `tong_tien`, `phuong_thuc_thanh_toan_id`, `trang_thai_id`, `trang_thai_thanh_toan`) 
                VALUES 
                    (:user_id, :fullName, :email, :phone, :address, NOW(), :total, :payment_method, :order_status, 'pending')";
        
        // Chuẩn bị câu lệnh SQL để thực thi
        $stmt = $this->conn->prepare($sql);
    
        // Liên kết các tham số với giá trị truyền vào
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':fullName', $fullName);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':total', $total);
        $stmt->bindParam(':payment_method', $payment_method);  // Phương thức thanh toán
        $stmt->bindParam(':order_status', $order_status);      // Trạng thái đơn hàng (ví dụ: đang xử lý)
    
        // Thực thi câu lệnh
        $stmt->execute();
    
        // Trả về ID đơn hàng vừa lưu
        return $this->conn->lastInsertId();
    }
    // Sau khi tạo đơn hàng và lưu vào bảng "don_hangs", bạn cần thêm các sản phẩm vào bảng "chi_tiet_don_hangs"

// public function saveOrderDetails($order_id, $cartItems) {
//     foreach ($cartItems as $item) {
//         // Kiểm tra giá trị của mỗi item
//         if (empty($item['ma_san_pham']) || empty($item['so_luong']) || empty($item['gia_ban'])) {
//             echo "Missing data for product ID: " . $item['ma_san_pham'];
//             continue;  // Bỏ qua item này nếu có dữ liệu bị thiếu
//         }
    
//         $sql = "INSERT INTO chi_tiet_don_hangs (order_id, product_id, so_luong, don_gia, hinh_anh)
//                 VALUES (:order_id, :product_id, :so_luong, :gia_ban, :hinh_anh)";
//         $stmt = $this->conn->prepare($sql);
//         $stmt->bindParam(':order_id', $order_id);
//         $stmt->bindParam(':product_id', $item['ma_san_pham']);
//         $stmt->bindParam(':so_luong', $item['so_luong']);
//         $stmt->bindParam(':gia_ban', $item['don_gia']);
//         $stmt->bindParam(':hinh_anh', $item['hinh_anh']);
//         $stmt->execute();
//     }
    
// }

    public function deleteCartItems($email) {
        $sql = "DELETE FROM gio_hangs WHERE email = :email";  // Xóa sản phẩm trong giỏ hàng của người dùng
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        return $stmt->execute();  // Thực thi câu lệnh SQL
    }
    public function clearAllCart(){
        $sql = "DELETE FROM gio_hangs";  // Xóa tất cả sản phẩm trong
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute();  // Thực thi câu lệnh SQLs
    }
    public function getOrderDetails($order_id) {
        $sql = "SELECT ctdh.*, sp.ten_san_pham, sp.hinh_anh 
                FROM chi_tiet_don_hangs ctdh
                INNER JOIN san_phams sp ON ctdh.product_id = sp.id
                WHERE ctdh.order_id = :order_id";  // Lấy thông tin chi tiết của đơn hàng theo order_id
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':order_id', $order_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);  // Lấy tất cả các sản phẩm trong đơn hàng
    }



}
