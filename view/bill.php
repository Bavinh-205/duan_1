<?php  

// Kiểm tra xem người dùng đã đăng nhập chưa  
if (isset($_SESSION['user'])) {  
    // Lấy thông tin người dùng từ session nếu có  
    $user_email = isset($_SESSION['user']['email']) ? $_SESSION['user']['email'] : '';  
} else {  
    // Nếu chưa đăng nhập, chuyển hướng đến trang đăng nhập  
    header('Location: login.php');  
    exit;  
}  

// Kiểm tra nếu có thông báo thành công hoặc lỗi  
if (isset($_SESSION['message'])) {  
    echo '<div class="alert alert-success" role="alert">' . $_SESSION['message'] . '</div>';  
    unset($_SESSION['message']);  // Xóa thông báo sau khi đã hiển thị  
}  

if (isset($_SESSION['error'])) {  
    echo '<div class="alert alert-danger" role="alert">' . $_SESSION['error'] . '</div>';  
    unset($_SESSION['error']);  // Xóa thông báo lỗi sau khi đã hiển thị  
}  

$bill = new Bill();  
$cartItems = $bill->getCartItems($user_email);  

if ($_SERVER['REQUEST_METHOD'] === 'POST') {  
    $name = isset($_POST['name']) ? $_POST['name'] : '';  
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';  
    $address = isset($_POST['address']) ? $_POST['address'] : '';  
    $payment_method = isset($_POST['payment_method']) ? $_POST['payment_method'] : '';  
    
    // Handle the form submission here  
    var_dump($name, $phone, $address, $payment_method);  
}  
?>  

<div class="container-fluid my-4">  
    <div class="row">  
        <!-- Thông tin giao hàng -->  
        <div class="col-md-4" style="margin-left: 250px;">  
            <h4>Thông tin giao hàng</h4>  
            <form action="index.php?act=checkout" method="POST">   
                <div class="mb-3">  
                    <input type="text" class="form-control" name="name" placeholder="Nhập họ và tên" style="max-width: 580px;" required />  
                </div>  
                <div class="input-group mb-3">  
                    <input type="text" class="form-control" name="email" value="<?= $user_email ?>" placeholder="Nhập Email" style="max-width: 350px; margin-right: 10px;" required />  
                    <input type="tel" class="form-control" name="phone" placeholder="Số điện thoại" style="max-width: 210px;" required />  
                </div>  
                <div class="mb-3">  
                    <label for="address">Địa chỉ</label>  
                    <input type="text" class="form-control" name="address" id="address" placeholder="Nhập địa chỉ" style="max-width: 580px;" required />  
                </div>   
                <div class="mb-3">  
                    <select class="form-select" name="payment_method" id="payment_method" style="max-width: 580px;" required>  
                        <option selected disabled>Chọn Phương Thức Thanh Toán</option>  
                        <option value="1">Thanh toán khi nhận hàng</option>  
                        <option value="2">Thanh toán online</option>  
                    </select>  
                </div>     
        </div>  

        <!-- Thông tin sản phẩm -->  
        <div class="col-md-5">   
            <h4>Thông tin sản phẩm</h4>  
            <?php if (!empty($cartItems)) : ?>  
                <?php foreach ($cartItems as $item) : ?>  
                    <div class="d-flex mb-3">  
                        <img src="<?= $item['hinh_anh'] ?>" alt="<?= $item['ma_san_pham'] ?>" style="width: 100px; height: 100px; margin-right: 20px;" />  
                        <div>  
                            <h5><?= $item['ten_san_pham'] ?></h5>  
                            <p><?= $item['ma_san_pham'] ?></p>  
                            <p>Số lượng: <?= $item['so_luong'] ?></p>  
                            <p>Giá Bán : <?= number_format($item['gia_ban'], 0, ',', '.') ?> ₫</p>  
                            <p><strong class="text-danger">Tổng giá: <?= number_format($item['gia_ban'] * $item['so_luong'], 0, ',', '.') ?> ₫</strong></p>  
                        </div>  
                    </div>  
                <?php endforeach; ?>  
                <div class="mb-3 d-flex justify-content-start align-items-center">   
                    <input type="text" id="discountCode" class="form-control" placeholder="Nhập mã giảm giá" style="max-width: 400px; margin-right: 20px;" />  
                    <button type="button" class="btn btn-outline-secondary">Sử Dụng</button>  
                </div>   
                <div class="mt-3">  
                    <h5>Tạm tính:<strong class="text-danger"> <?= number_format(array_sum(array_map(function($item) {  
                            return $item['gia_ban'] * $item['so_luong'];  
                    }, $cartItems)), 0, ',', '.') ?> ₫</strong></h5>  
                    <h6 class="mt-3">Phí vận chuyển: <strong class="text-success">Free</strong></h6>  
                    <h5>Tổng cộng:<strong class="text-danger"> <?= number_format(array_sum(array_map(function($item) {  
                            return $item['gia_ban'] * $item['so_luong'];  
                    }, $cartItems)), 0, ',', '.') ?> ₫</strong></h5>  
                </div>  
            <?php endif; ?>  
        </div>  

        <div class="col-md-5 mt-4 " style="margin-left:730px;">  
            <input type="hidden" name="total_amount" value="<?= array_sum(array_map(function($item) {  
                return $item['gia_ban'] * $item['so_luong'];  
            }, $cartItems)); ?>"> <!-- Truyền tổng tiền -->  
            <button type="submit" class="btn btn-primary btn-lg mx-4">Xác nhận thanh toán</button>  
            </form> <!-- Đóng form tại đây -->  
        </div>  
    </div>  
</div>
