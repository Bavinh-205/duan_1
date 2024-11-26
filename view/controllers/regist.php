<?php
class User {
    private $conn;  // Kết nối cơ sở dữ liệu

    // Hàm khởi tạo (constructor)
    public function __construct() {
        $this->conn = connectDB();  // Kết nối cơ sở dữ liệu
    }

    // Phương thức đăng ký người dùng
    public function regist($username, $email, $sdt, $ngay_sinh, $pass) {
        // Kiểm tra xem email đã tồn tại trong cơ sở dữ liệu chưa
        $sql = "SELECT * FROM nguoi_dungs WHERE email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
    
        
            try {
                $sql = "INSERT INTO nguoi_dungs (ten_nguoi_dung, email, sdt, ngay_sinh, pass) 
                        VALUES (:ten_nguoi_dung, :email, :sdt, :ngay_sinh, :pass)";
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(':ten_nguoi_dung', $username);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':sdt', $sdt);
                $stmt->bindParam(':ngay_sinh', $ngay_sinh);
                $stmt->bindParam(':pass', $pass);
                $stmt->execute();
                return $stmt;
            } catch (PDOException $e) {
                $_SESSION['error_message'] = "Lỗi: " . $e->getMessage();
                header('Location: index.php?act=regist.php'); // Nếu có lỗi, quay lại trang đăng ký
                exit;
            }
        }
    }
    
?>

