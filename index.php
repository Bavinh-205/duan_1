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
require_once 'view/controllers/billControllers.php';
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
            exit;}

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
                        $size = $_POST['size']; 
                
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
                    $email = $_SESSION['user']['email'];
                    $action = $_POST['action'];
                
                    $cart = new Cart();
                
                    if ($action == 'increase') {
                        $cart->updateQuantity($ma_san_pham, $email, 1); // Tăng số lượng trong cả giỏ và kho
                    } elseif ($action == 'decrease') {
                        $cart->updateQuantity($ma_san_pham, $email, -1); // Giảm số lượng trong cả giỏ và kho
                    }
                
                    header('Location: index.php?act=cart');
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
            include 'view/bill.php';  // Hiển thị giao diện thanh toán
            break;
            case 'checkout':
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $total_amount = isset($_POST['total_amount']) ? $_POST['total_amount'] : 0;
                    $email = $_SESSION['user']['email']; 
                    $name = isset($_POST['name']) ? $_POST['name'] : '';
                    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
                    $address = isset($_POST['address']) ? $_POST['address'] : '';
                    $payment_method = isset($_POST['payment_method']) ? (int) $_POST['payment_method'] : 0;
                    $payment = isset($_POST['payment']) ? $_POST['payment'] : '';
                    $payment = isset($_POST['payment_method']) ? (int)$_POST['payment_method'] : 0;     
                    $images = isset($_POST['images']) ? $_POST['images'] : '';
                    // $desc = isset($_POST['desc']) ? $_POST['desc'] : '';       
                    // Giả sử thanh toán thành công
                    if ($total_amount > 0) {
                        // Tạo mã đơn hàng
                        $order_id = 'DH-' . uniqid(); // ID người dùng từ session
                        $_SESSION['order_id'] = $order_id;
            
                        // Khởi tạo đối tượng Order
                        $order = new Order();
                        $cartItems = $order->getCartItems($email);
                        $_SESSION['cart'] = $cartItems;
                        $user_id = $order->getUserIdByEmail($email);
                        
                        // Lưu đơn hàng vào bảng don_hangs
                        if ($order->createOrder($order_id, $user_id, $name, $email, $images,$desc, $phone, $address, $payment, $total_amount, $payment_method)) {     
                            // Lưu chi tiết sản phẩm vào bảng chi_tiet_don_hangs
                            // Xóa giỏ hàng trong cơ sở dữ liệu sau khi thanh toán
                            $bill = new Bill();
                            // $bill->saveOrderDetails($order_id, $cartItems);
                            $bill->clearAllCart();
            
                            // Xóa giỏ hàng trong session
                                // unset($email);
            
                            // Chuyển hướng đến trang xác nhận đơn hàng
                            $_SESSION['message'] = "Thanh toán thành công!";
                            header('Location: index.php?act=bill');
                            exit;
                        } else {
                            $_SESSION['error'] = "Có lỗi trong quá trình thanh toán.";
                            header('Location: index.php?act=cart');
                            exit;
                        }
                    } else {
                        $_SESSION['error'] = "Có lỗi trong quá trình thanh toán.";
                        header('Location: index.php?act=cart');
                        exit;
                    }
                }
                include 'view/bill.php';  // Hiển thị giao diện thanh toán
                break;
            
                    case 'bill-confirm':
                        if (isset($_SESSION['order_id'])) {  // Kiểm tra sự tồn tại của order_id trong session
                            $order = new Order();
                            $order_id = $_SESSION['order_id'];  // Lấy mã đơn hàng từ session
                    
                            // Lấy chi tiết đơn hàng
                            $orderDetails = $order->getOrderDetails($order_id);
                            if (!$orderDetails) {
                                $_SESSION['error'] = "Không tìm thấy đơn hàng.";
                                // Không chuyển hướng về trang chủ, mà vẫn giữ lại trang bill-confirm
                                include 'view/bill-confirm.php';
                                exit;
                            }
                            $email = $_SESSION['user']['email'] ??null;
                            $orderItems = $order->getAllOrder($email);  // Lấy danh sách sản phẩm của đơn hàng
                            include 'view/bill-confirm.php';
                        } else {
                            $_SESSION['error'] = "Không tìm thấy mã đơn hàng. Vui lòng thử lại.";
                            include 'view/bill-confirm.php';
                            exit;
                        }
                        break;
                    
                        case 'delete-bill':
                            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete-bill'])) {
                                $order_id = $_POST['order_id'] ?? null;
                                
                                if ($order_id) {
                                    $order = new Order();
                                    
                                    // Cập nhật trạng thái đơn hàng thành "Đã hủy"
                                    if ($order->deleteOrder($order_id)) {
                                        $_SESSION['message'] = "Đơn hàng đã bị hủy!";
                                    } else {
                                        $_SESSION['error'] = "Không thể hủy đơn hàng. Vui lòng thử lại!";
                                    }
                                } else {
                                    $_SESSION['error'] = "Không tìm thấy mã đơn hàng để hủy.";
                                }
                                
                                // Sau khi xử lý xong, reload lại trang hiện tại để cập nhật trạng thái
                                header('Location: index.php?act=bill-confirm');
                                exit;
                            }
                            break;
                        
                            case 'bill-detail':
                                if (isset($_GET['order_id'])) {
                                    $order_id = $_GET['order_id'];
                                    $order = new Order();
                                    $orderDetails = $order->getOrderDetails($order_id);
                    
                                    if ($orderDetails) {
                                        $orderItems = $order->getOrderItems($order_id);
                                        include 'view/bill-detail.php';  // Hiển thị chi tiết đơn hàng
                                    } else {
                                        $_SESSION['error'] = "Không tìm thấy đơn hàng.";
                                        include 'view/bill-detail.php';
                                    }
                                } else {
                                    $_SESSION['error'] = "Không tìm thấy mã đơn hàng. Vui lòng thử lại.";
                                    include 'view/bill-detail.php';
                                }
                                break;
                            
                            
    }
}else{
    require_once 'view/home.php';
}
require_once 'view/footer.php';
ob_end_flush();