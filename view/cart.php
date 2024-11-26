<?php
$cartItems = $_SESSION['cart'] ?? [];
$totalQuantity = array_sum(array_column($cartItems, 'quantity'));
$totalPrice = array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cartItems));
?>
<div class="container-fuild my-4">
    <h4 class="d-flex justify-content-between align-items-center" style="text-transform:none; font-weight:500; margin-left:80px;">
        Giỏ hàng (<?php echo $totalQuantity; ?> Sản Phẩm)
        <a href="index.php" class="text-decoration-none ml-auto text-dark" style="margin-right:20px;">Tiếp tục mua hàng</a>
    </h4>

    <div class="pie mx-5">
        <div class="row ">
            <div class="col-lg-9">
                <hr class="mx-4">
            </div>
        </div>
    </div>

    <?php foreach ($cartItems as $productId => $item): ?>
    <div class="row align-items-center mx-5">
        <div class="col-md-6 d-flex justify-content-start align-items-center">
            <img class="img-fluid mx-2" src="<?php echo $item['image']; ?>" alt="<?php echo $item['name']; ?>" style="width: 150px; height: 150px;">
            <div class="mx-5">
                <h6 class="mb-2"><?php echo $item['name']; ?></h6>
                <span class="d-block text-truncate">Mã hàng: <?php echo $productId; ?></span><br>
                <span>Đơn giá: <?php echo number_format($item['price'], 0, ',', '.'); ?>₫</span>
            </div>
            <div class="mx-5">
                <span>Số lượng: <?php echo $item['quantity']; ?></span>
            </div>
            <div class="mx-5">
                <form method="post" action="update_cart.php">
                    <input type="hidden" name="productId" value="<?php echo $productId; ?>">
                    <input type="number" name="quantity" value="<?php echo $item['quantity']; ?>" min="1">
                    <button type="submit" class="btn btn-warning">Cập nhật số lượng</button>
                </form>
            </div>
            <div class="mx-2">
                <form method="post" action="cart_controller.php">
                    <input type="hidden" name="action" value="remove">
                    <input type="hidden" name="productId" value="<?php echo $productId; ?>">
                    <button type="submit" class="btn btn-danger">Xóa</button>
                </form>
            </div>
        </div>
    </div>
    <?php endforeach; ?>

    <div class="col-md-6 mx-5">
        <div class="mx-2">
            <div class="d-flex justify-content-between mt-4">
                <h6 class="me-4">Tạm tính:</h6>
                <h6 class="text-danger ms-4"><?php echo number_format($totalPrice, 0, ',', '.'); ?>₫</h6>
            </div>
            <div class="d-flex justify-content-between mt-4">
                <h6 class="me-4">Phí vận chuyển:</h6>
                <h6 class="text-success ms-4">Free</h6>
            </div>

            <hr class="w-100">

            <div class="d-flex justify-content-between">
                <h5 class="text-danger me-4">Tổng:</h5>
                <h5 class="text-danger ms-4"><?php echo number_format($totalPrice, 0, ',', '.'); ?>₫</h5>
            </div>

            <button class="btn btn-danger btn-block w-100 mt-4">Thanh toán</button>
        </div>
    </div>
</div>
