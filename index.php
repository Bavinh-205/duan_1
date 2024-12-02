<?php
session_start();
ob_start();
require_once './commons/env.php';
require_once './commons/ConnectDatabase.php';
require_once 'view/controllers/client.php';
require_once 'view/controllers/product.php';
require_once 'view/controllers/productdetail.php';
require_once 'view/controllers/Cart.php';
require_once 'view/controllers/regist.php';
require_once 'view/controllers/bill.php';
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
                'name' => $result ['ten_nguoi_dung'],
                'phone' => $result ['sdt'],
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
                if (isset($_SESSION['user'])) {
                    $email = $_SESSION['user']['email'];
                    $cart = new Cart();
                    $cartItems = $cart->getCartItems($email);
                    // var_dump($cartItems); 
                } else {
                    echo "Bạn cần đăng nhập để xem giỏ hàng!";
                }
                if (isset($_POST['add_to_cart'])) {
                    if (isset($_POST['ma_san_pham']) && isset($_POST['so_luong'])) {
                        $ma_san_pham = $_POST['ma_san_pham'];
                        $email = $_SESSION['user']['email'];
                        $so_luong = $_POST['so_luong'];
                
                        $cart = new Cart();
                        $cart->addProductToCart($ma_san_pham, $email, $so_luong); // Gọi phương thức thêm sản phẩm vào giỏ
                    } else {
                        echo "Thiếu thông tin sản phẩm hoặc số lượng!";
                    }
                }
                if (isset($_POST['remove']) && isset($_POST['ma_san_pham'])) {
                    $ma_san_pham = $_POST['ma_san_pham'];
                    $email = $_SESSION['user']['email']; // Thay vì $_SESSION['email'], sử dụng $_SESSION['user']['email']
            
                    $cart = new Cart();
                    $cart->removeProductFromCart($ma_san_pham, $email);
            
                    header('Location: index.php?act=cart');
                    exit();
                }
                if (isset($_POST['update_quantity'])) {
                    $ma_san_pham = $_POST['ma_san_pham'];
                    $email = $_SESSION['user']['email']; // Lấy email người dùng từ session
                    $action = $_POST['action']; // Lấy hành động (increase hoặc decrease)
            
                    $cart = new Cart();
                    if ($action == 'increase') {
                        $cart->updateQuantity($ma_san_pham, $email, 1); // Tăng số lượng
                    } elseif ($action == 'decrease') {
                        $cart->updateQuantity($ma_san_pham, $email, -1); // Giảm số lượng
                    }
            
                    header('Location: index.php?act=cart'); // Chuyển hướng về giỏ hàng sau khi cập nhật
                    exit();
                }
                
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
        case 'bill':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (isset($_SESSION['user'])) {
                // Lấy thông tin từ form thanh toán
                $fullName = $_POST['fullName'] ?: $_SESSION['user']['name'];  // Nếu form không có tên, lấy từ session
                $email = $_POST['email'] ?: $_SESSION['user']['email'];       // Nếu form không có email, lấy từ session
                $phone = $_POST['phone'] ?: $_SESSION['user']['phone'];       // Nếu form không có số điện thoại, lấy từ session
                $address = $_POST['address'];
                $total = $_POST['total'];  // Tổng tiền
                $payment_method = $_POST['payment_method'];  // Phương thức thanh toán
                $order_status = 1;  // Trạng thái đơn hàng (1 - Đang xử lý)
        
                // Lưu thông tin vào bảng "don_hangs"
                $bill = new Bill();  
                $order_id = $bill->savePayment($user_id, $fullName, $email, $phone, $address, $total, $payment_method, $order_status);
        
                // Sau khi lưu đơn hàng, lấy các sản phẩm trong giỏ hàng
                $cartItems = $bill->getCartItems($email);

                // Sau khi lưu đơn hàng, lấy các sản phẩm trong giỏ hàng
                $cartItems = $bill->getCartItems($email);
                $email = $_SESSION['user']['email']; // Lấy email từ session
                $user_id = $_SESSION['user']['id'];  // Lấy ID người dùng từ session
                header('Location: bill.php');
                exit;
                } else {
                // Nếu chưa đăng nhập, chuyển hướng đến trang đăng nhập
                header('Location: login.php');
                exit;
                }
            }
            var_dump($order_id);
            include 'view/bill.php';  // Hiển thị giao diện thanh toán
            break;
        case 'checkout':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Nhận tổng tiền từ form
            $total_amount = isset($_POST['total_amount']) ? $_POST['total_amount'] : 0;
            
            if ($total_amount > 0) {
                // Xử lý thanh toán thành công
                // Ở đây, bạn có thể làm việc với API thanh toán hoặc thực hiện thao tác thanh toán (ở ví dụ này, chúng ta giả sử thanh toán thành công).

                // Sau khi thanh toán thành công, xóa giỏ hàng của người dùng (nếu giỏ hàng được lưu trong session)
                $email = $_SESSION['user']['email'];  // Lấy email người dùng
                unset($_SESSION['cart']);  // Xóa giỏ hàng khỏi session (nếu giỏ hàng được lưu trong session)
                unset($_SESSION['user']['name']);
                unset($_SESSION['user']['email']);
                unset($_SESSION['user']['address']);
                unset($_SESSION['user']['payment_method']);
    
                // Thông báo thành công
                $_SESSION['message'] = "Thanh toán thành công! Cảm ơn bạn đã mua hàng.";

                // Chuyển hướng người dùng về trang giỏ hàng hoặc trang chủ
                header('Location: index.php?act=bill');
                exit;
            } else {
                // Nếu có lỗi trong quá trình thanh toán
                $_SESSION['error'] = "Có lỗi trong quá trình thanh toán. Vui lòng thử lại.";
                header('Location: index.php?act=cart');
                exit;
            }
            }
            break;
         
    }
}else{
    require_once 'view/home.php';
}
require_once 'view/footer.php';
ob_end_flush();