<?php
// Hàm kết nối cơ sở dữ liệu
function connectDb()
{
    $host = 'localhost';
    $dbname = 'xuong_du_an_1'; // Tên database
    $username = 'root'; // Tên người dùng cơ sở dữ liệu
    $password = ''; // Mật khẩu của cơ sở dữ liệu

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        die("Kết nối thất bại: " . $e->getMessage());
    }
}

// Hàm xác thực người dùng
function authenticate($ten_nguoi_dung, $pass)
{
    $pdo = connectDb();
    $stmt = $pdo->prepare("SELECT * FROM nguoi_dungs WHERE ten_nguoi_dung = :ten_nguoi_dung");
    $stmt->bindParam(':ten_nguoi_dung', $ten_nguoi_dung);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // So sánh mật khẩu
        if ($user['pass'] === $pass) {
            // Kiểm tra vai trò
            if ($user['vai_tro'] == 1) {
                return ['authenticated' => true, 'message' => 'Đăng nhập thành công'];
            } else {
                return ['authenticated' => false, 'message' => 'Tài khoản không có quyền truy cập'];
            }
        } else {
            return ['authenticated' => false, 'message' => 'Mật khẩu không đúng'];
        }
    } else {
        return ['authenticated' => false, 'message' => 'Tên người dùng không tồn tại'];
    }
}
