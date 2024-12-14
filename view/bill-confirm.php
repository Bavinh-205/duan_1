<?php
$order = new Order();
$order_id = $_SESSION['order_id'] ?? null;
$email = $_SESSION['user']['email'] ?? null;
$orderItems = $order->getAllOrder($email);
$orderDetails = [];
if (!empty($orderItems)) {
    foreach ($orderItems as $item) {
        $orderDetails[$item['ma_don_hang']] = $order->getOrderDetails($item['ma_don_hang']);
    }
}
?>

<div class="container-fluid my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="form-control">
                <h4 class="text-center my-4">Đơn hàng của Bạn</h4>

                <?php foreach ($orderItems as $item): ?>
                    <div class="d-flex justify-content-between align-items-center border p-3 mb-3">
                        <!-- Bên trái: Mã đơn hàng và trạng thái -->
                        <div>
                            <h6>Mã đơn hàng: <?php echo $item['ma_don_hang']; ?></h6>
                            <p><strong>Trạng thái đơn hàng:</strong> 
                                <?php echo $orderDetails[$item['ma_don_hang']]['ten_trang_thai'] ?? 'Không rõ'; ?>
                            </p>
                        </div>

                        <!-- Bên phải: Nút Hủy đơn và Xem chi tiết -->
                        <div class="d-flex gap-3">
                            <!-- Form Hủy Đơn -->
                            <form action="index.php?act=delete-bill" method="POST" class="me-4">
                                <input type="hidden" name="order_id" value="<?php echo $item['ma_don_hang']; ?>" />
                                <input type="submit" class="btn btn-warning" name="delete-bill" value="Hủy Đơn" 
                                    <?php echo (isset($orderDetails[$item['ma_don_hang']]['ten_trang_thai']) && $orderDetails[$item['ma_don_hang']]['ten_trang_thai'] === 'Đã hủy') ? 'disabled' : ''; ?> />
                            </form>

                            <!-- Form Xem Chi Tiết (gửi đến đúng trang chi tiết đơn hàng) -->
                            <form action="index.php" method="GET">
    <input type="hidden" name="act" value="bill-detail" />
    <input type="hidden" name="order_id" value="<?php echo $item['ma_don_hang']; ?>" />
    <input type="submit" class="btn btn-danger" value="Xem chi tiết đơn hàng" />
</form>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>



