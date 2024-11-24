<?php
    class Client{
        public $conn;

        public function __construct(){
            $this->conn = connectDB();
        }
        public function checkUser($email, $pass) {
            try {
                $sql = "SELECT * FROM `nguoi_dungs` WHERE email = :email";
                $stmt = $this->conn->prepare($sql);  
                $stmt->bindParam(':email', $email);
                $stmt->execute();
        
                if ($stmt->rowCount() > 0) {
                    $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
                    if ($pass === $user['pass']) {  // Giả sử mật khẩu đã được mã hóa
                        if ($user['vai_tro'] == 'admin') {
                            return ['status' => true, 'role' => 'admin'];
                        } else {
                            return ['status' => true, 'role' => 'user'];
                        }
                    } else {
                        return ['status' => false, 'message' => 'Sai mật khẩu'];
                    }
                } else {
                    return ['status' => false, 'message' => 'Tài Khoản Không tồn tại'];
                }
            } catch (PDOException $e) {
                error_log($e->getMessage());
                return ['status' => false, 'message' => 'Lỗi kết nối đến cơ sở dữ liệu'];
            }
        }
        

}