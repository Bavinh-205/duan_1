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
?>

<div class="container-fluid my-4">  
    <div class="row">  
        <!-- Thông tin giao hàng -->  
        <div class="col-md-4" style="margin-left: 250px;"> <!-- Sử dụng padding-right để giảm khoảng cách -->  
            <h4>Thông tin giao hàng</h4>  
            <form action="index.php?act=bill" method="POST">  
                <div class="mb-3">  
                    <input type="text" class="form-control" value=""  placeholder="Nhập họ và tên" style="max-width: 580px;" />  
                </div>  
                <div class="input-group mb-3">  
                    <input type="text" class="form-control" value="<?= $user_email?>" placeholder="Nhập Email" style="max-width: 350px; margin-right: 10px;" />  
                    <input type="tel" class="form-control" value="" placeholder="Số điện thoại" style="max-width: 210px;" />  
                </div>  
                <div class="mb-3">  
                    <label for="address">Địa chỉ</label>  
                    <input type="text" class="form-control" id="address" placeholder="Nhập địa chỉ" style="max-width: 580px;" />  
                </div>   
                <div class="mb-3">  
                    <select class="form-select" id="district" style="max-width: 580px;">  
                        <option selected>Chọn Phương Thức Thanh Toán</option>  
                        <option value="1">Thanh toán khi nhận hàng</option>  
                    </select>  
                </div>     
            </form>  
        </div>  

        <!-- Thông tin sản phẩm -->  
        <div class="col-md-5">   
            <h4>Thông tin sản phẩm</h4>  
            <?php if (!empty($cartItems)) : ?>
                <?php
                foreach ($cartItems as $item) : 
        ?>
            <div class="d-flex mb-3">  
                <img src="<?= $item['hinh_anh']?>" alt="<?= $item['ma_san_pham']?>" style="width: 100px; height: 100px; margin-right: 20px;" />  
                <div>  
                    <h5><?= $item['ten_san_pham']?></h5>  
                    <p><?= $item['ma_san_pham']?></p>  
                    <p>Số lượng: <?= $item['so_luong']?></p>
                    <p>Giá Bán : <?= number_format($item['gia_ban'], 0, ',', '.') ?> ₫</p>
                    <p><strong class="text-danger">Tổng giá: <?= number_format($item['gia_ban'] * $item['so_luong'], 0, ',', '.') ?> ₫</strong></p>  
                </div>  
            </div>  
        <?php endforeach; ?>
        <div class="mb-3 d-flex justify-content-start align-items-center">   
            <input type="text" id="discountCode" class="form-control" placeholder="Nhập mã giảm giá"  style="max-width: 400px; margin-right: 20px;" />  
            <button type="submit" class="btn btn-outline-secondary">Sử Dụng</button>
        </div>   
        <div class="mt-3">  
            <h5>Tạm tính:<strong class="text-danger"> <?= number_format(array_sum(array_map(function($item) {
                        return $item['gia_ban'] * $item['so_luong']; // Tổng tiền cho mỗi sản phẩm
                    }, $cartItems)), 0, ',', '.') ?> đ</strong></h5>  
            <h6 class="mt-3">Phí vận chuyển: <strong class="text-success">Free</strong></h6>  
            <h5>Tổng cộng:<strong class="text-danger"> <?= number_format(array_sum(array_map(function($item) {
                        return $item['gia_ban'] * $item['so_luong']; // Tổng tiền cho mỗi sản phẩm
                    }, $cartItems)), 0, ',', '.') ?> đ</strong></h5>  
        </div>
            <?php endif; ?>
            <div class="mt-4">
    <form action="index.php?act=checkout" method="POST">
        <input type="hidden" name="total_amount" value="<?= array_sum(array_map(function($item) {
    return $item['gia_ban'] * $item['so_luong'];
}, $cartItems)); ?>"> <!-- Truyền tổng tiền -->
        <button type="submit" class="btn btn-primary btn-lg">Xác nhận thanh toán</button>
    </form>
    
</div>
        </div>  
    </div>  
</div>