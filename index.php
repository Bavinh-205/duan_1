<?php
session_start();
ob_start();
require_once './commons/env.php';
require_once './commons/ConnectDatabase.php';
require_once 'view/controllers/client.php';
require_once 'view/controllers/product.php';
require_once 'view/header.php';

$product = new Product();
$allProducts = $product->getAllProduct(); // Lấy tất cả sản phẩm
if((isset($_GET['act']))&&($_GET['act']!="")){
    $act = $_GET['act'];
    switch ($act) {
        case 'product-ct':
            include 'view/product-ct.php';
            break;
        case 'product':
            include 'view/product.php';
            break;
        case 'login':
                if (isset($_SESSION['user'])) {
                    // Nếu đã đăng nhập, điều hướng đến trang dashboard của họ
                    if ($_SESSION['user']['role'] === 'admin') {
                        header('Location: admin/index.php');
                    } else {
                        header('Location: index.php');
                    }
                    exit;
                }
            
                // Kiểm tra nếu form đăng nhập được gửi
                if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
                    // Lấy dữ liệu từ form đăng nhập
                    $email = $_POST['email'];
                    $password = $_POST['password'];  // Đảm bảo là $_POST['pass'] và không phải $_POST['password']
            
                    // Tạo đối tượng Client và gọi hàm checkUser để kiểm tra đăng nhập
                    $client = new Client();
                    $result = $client->checkUser($email, $password);  // Gọi hàm checkUser()
            
                    // Kiểm tra kết quả trả về từ checkUser()
                    if ($result && isset($result['status']) && $result['status'] === true) {
                        // Tiến hành xử lý sau khi đăng nhập thành công
                        $_SESSION['user'] = [
                            'email' => $email,
                            'role' => $result['role']  // Lưu role (admin hoặc user)
                        ];
            
                        // Điều hướng đến trang admin hoặc user dashboard
                        if ($result['role'] === 'admin') {
                            header('Location: index.php');  // Điều hướng đến trang admin
                        } else {
                            header('Location: index.php');  // Điều hướng đến trang người dùng
                        }
                        exit;
                    } else {
                        // Nếu đăng nhập thất bại, hiển thị thông báo lỗi
                        echo "Lỗi: " . (isset($result['message']) ? $result['message'] : 'Đăng nhập thất bại');
                    }
                }
                var_dump($result);
                include 'view/login.php';  // Load trang đăng nhập
            break;
            
        case 'logout':
            session_unset(); // Hủy tất cả các biến session
            session_destroy(); // Hủy session
            header('Location: index.php'); // Điều hướng về trang chủ sau khi đăng xuất
            exit;
            break;
        case 'cart':
            include 'view/cart.php';
            break;
        default:
           header('Loacation: index.php');
            break;
    }
}else{
    require_once 'view/home.php';
}
require_once 'view/footer.php';
ob_end_flush();