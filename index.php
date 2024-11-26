<?php
session_start();
ob_start();
require_once './commons/env.php';
require_once './commons/ConnectDatabase.php';
require_once 'view/controllers/client.php';
require_once 'view/controllers/product.php';
require_once 'view/controllers/productdetail.php';
require_once 'view/controllers/cart.php';
require_once 'view/controllers/regist.php';
require_once 'view/header.php';

$product = new Product();
$allProducts = $product->getAllProduct(); // Lấy tất cả sản phẩm
if((isset($_GET['act']))&&($_GET['act']!="")){
    $act = $_GET['act'];
    switch ($act) {
        case 'product-ct':
            $product = new ProductDetail();
            $id = isset($_GET['id']) ? $_GET['id'] : 0;  // Kiểm tra và lấy ID
        
            if ($id > 0) {
                $productDetail = $product->getProduct($id);  // Gọi hàm getProduct từ model để lấy chi tiết sản phẩm
                if ($productDetail) {
                    include 'view/product-ct.php';  // Nếu tìm thấy sản phẩm, hiển thị trang chi tiết sản phẩm
                } else {
                    echo "Sản phẩm không tồn tại.";  // Nếu không tìm thấy sản phẩm, hiển thị thông báo lỗi
                }
            } else {
                echo "ID sản phẩm không hợp lệ.";
            }
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
        $pass = $_POST['password'];

        // Tạo đối tượng Client và gọi hàm checkUser để kiểm tra đăng nhập
        $client = new Client();
        $result = $client->checkUser($email, $pass);  // Gọi hàm checkUser()

        // Kiểm tra kết quả trả về từ checkUser()
        if ($result && isset($result['status']) && $result['status'] === true) {
            // Tiến hành xử lý sau khi đăng nhập thành công
            $_SESSION['user'] = [
                'email' => $email,
                'role' => $result['role']  // Lưu role (admin hoặc user)
            ];

            // Điều hướng đến trang admin hoặc user dashboard
            if ($result['role'] === 'admin') {
                header('Location: admin/index.php');  // Điều hướng đến trang admin
            } else {
                header('Location: index.php');  // Điều hướng đến trang người dùng
            }
            exit;
        } else {
            // Nếu đăng nhập thất bại, hiển thị thông báo lỗi
            echo "Lỗi: " . (isset($result['message']) ? $result['message'] : 'Đăng nhập thất bại');
        }
    }
                
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
        case 'regist':
            if ($_SERVER['REQUEST_METHOD'] === 'POST' ) {
                // Lấy thông tin từ form
                $username = $_POST['text'];
                $email = $_POST['email'];
                $sdt = $_POST['phone'];
                $ngay_sinh = $_POST['date'];
                $pass = $_POST['password'];
                
        
                // Khởi tạo đối tượng User và gọi phương thức regist
                $userController = new User();
                $result = $userController->regist($username, $email, $sdt, $ngay_sinh, $pass);
        
                // Lưu thông báo thành công vào session
                if ($result === true) {
                    $_SESSION['success_message'] = "Đăng ký thành công! Bạn có thể đăng nhập ngay.";
                    header('Location : index.php?act=regist.php');
                    exit;
                } else {
                    $_SESSION['error_message'] = "Đăng ký thất bại, vui lòng thử lại.";
                    header('Location : regist.php');
                    exit;
                }
            }
            include 'view/regist.php';
            break;
        // default:
        //     header('Location: index.php');
        //     break;
         
    }
}else{
    require_once 'view/home.php';
}
require_once 'view/footer.php';
ob_end_flush();