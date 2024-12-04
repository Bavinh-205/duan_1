<?php
$order = new Order();
$order_id = $_SESSION['order_id'] ?? null;

if ($order_id) {
    $orderDetails = $order->getOrderDetails($order_id);
    $orderItems = $orderDetails ? $order->getOrderItems($order_id) : [];
} else {
    $orderDetails = null;
}
?>

<div class="container-fluid my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="form-control">
                <h4 class="text-center my-4">Đơn hàng của Bạn</h4>

                <?php if ($orderDetails): ?>
                    <!-- Hiển thị chi tiết đơn hàng nếu có -->
                    <form class="mx-5">
                        <h6>Mã đơn hàng: <?php echo $orderDetails['ma_don_hang']; ?></h6>
                        <p class="mt-2"><strong>Tên người nhận:</strong> <?php echo $orderDetails['ten_nguoi_nhan']; ?></p>
                        <p><strong>Email:</strong> <?php echo $orderDetails['email_nguoi_nhan']; ?></p>
                        <p><strong>Số điện thoại:</strong> <?php echo $orderDetails['sdt_nguoi_nhan']; ?></p>
                        <p><strong>Địa chỉ:</strong> <?php echo $orderDetails['dia_chi_nguoi_nhan']; ?></p>
                        <p><strong>Tổng tiền:</strong> <?php echo number_format($orderDetails['tong_tien'], 0, ',', '.'); ?> VND</p>
                        <p><strong>Phương thức thanh toán:</strong> <?php echo $orderDetails['ten_phuong_thuc']; ?></p>
                        <p><strong>Trạng Thái Đơn Hàng:</strong> <?php echo $orderDetails['ten_trang_thai']; ?></p>
                        <p><strong>Trạng Thái Thanh Toán:</strong> <?php echo $orderDetails['ten_phuong_thucs']; ?></p>
                    </form>
                <?php else: ?>
                    <!-- Thông báo không có đơn hàng -->
                    <p class="text-center text-danger">Không có đơn hàng nào để hiển thị.</p>
                <?php endif; ?>

                <!-- Nút Hủy Đơn -->
                <div class="d-flex justify-content-start mt-5">
                    <form action="index.php?act=delete-bill" method="POST" class="me-2">
                        <input type="hidden" name="order_id" value="<?php echo $order_id ?? ''; ?>" />
                        <input type="submit" class="btn btn-warning" name="delete-bill" value="Hủy Đơn" 
                            <?php echo !$orderDetails ? 'disabled' : ''; ?>/>

                    </form>

                    <!-- Nút Xem chi tiết đơn hàng -->
                    <form action="view/bill-detail.php" method="GET">
                        <input type="submit" class="btn btn-danger" value="Xem chi tiết đơn hàng" 
                            <?php echo !$orderDetails ? 'disabled' : ''; ?>/>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid my-4">
    <div class="row  justify-content-center">
        <div class="col-md-8">
            <div class="form-control">
            <?php if ($orderDetails && $orderDetails['ten_trang_thai'] == 'Đã giao hàng'): ?>
                    <h4 class="mt-4">Đánh giá sản phẩm</h4>
                    <?php foreach ($orderItems as $item): ?>
                        <form action="index.php?act=review" method="POST">
                            <div class="mb-3">
                                <label for="rating-<?php echo $item['product_id']; ?>" class="form-label">Đánh giá (1-5 sao)</label>
                                <input type="number" id="rating-<?php echo $item['product_id']; ?>" name="rating" min="1" max="5" required class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label for="review-<?php echo $item['product_id']; ?>" class="form-label">Nhận xét</label>
                                <textarea id="review-<?php echo $item['product_id']; ?>" name="review" class="form-control"></textarea>
                            </div>
                            <input type="hidden" name="order_id" value="<?php echo $order_id; ?>" />
                            <input type="hidden" name="product_id" value="<?php echo $item['product_id']; ?>" />
                            <input type="hidden" name="user_email" value="<?php echo $_SESSION['user']['email']; ?>" />
                            <button type="submit" class="btn btn-primary">Gửi đánh giá</button>
                        </form>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="text-muted">Bạn không thể đánh giá sản phẩm vì đơn hàng chưa được giao.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
