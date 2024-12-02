<?php
// Kiểm tra xem có 'order_id' trong URL không
if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];

    // Tạo đối tượng Order để lấy thông tin đơn hàng
    $order = new Order();
    $orderDetails = $order->getOrderDetails($order_id);  // Lấy thông tin đơn hàng

    if ($orderDetails) {
        // Lấy danh sách các sản phẩm trong đơn hàng
        $orderItems = $order->getOrderItems($order_id);  // Lấy các sản phẩm từ đơn hàng
    } else {
        $_SESSION['error'] = "Đơn hàng không tồn tại.";
        header('Location: index.php?act=cart');
        exit;
    }
} else {
    $_SESSION['error'] = "Mã đơn hàng không hợp lệ.";
    header('Location: index.php?act=cart');
    exit;
}
?>

<div class="container">
    <h4>Thông Tin Đơn Hàng</h4>
    <p><strong>Mã Đơn Hàng:</strong> <?= $orderDetails['ma_don_hang'] ?></p>
    <p><strong>Ngày Đặt:</strong> <?= $orderDetails['ngay_dat'] ?></p>
    <p><strong>Người nhận:</strong> <?= $orderDetails['ten_nguoi_nhan'] ?></p>
    <p><strong>Email:</strong> <?= $orderDetails['email_nguoi_nhan'] ?></p>
    <p><strong>Số điện thoại:</strong> <?= $orderDetails['sdt_nguoi_nhan'] ?></p>
    <p><strong>Địa chỉ:</strong> <?= $orderDetails['dia_chi_nguoi_nhan'] ?></p>
    <p><strong>Tổng tiền:</strong> <?= number_format($orderDetails['tong_tien'], 0, ',', '.') ?> đ</p>
    <p><strong>Phương thức thanh toán:</strong> <?= $orderDetails['phuong_thuc_thanh_toan'] ?></p>

    <h5>Chi Tiết Đơn Hàng</h5>
    <table class="table">
        <thead>
            <tr>
                <th>Tên sản phẩm</th>
                <th>Số lượng</th>
                <th>Giá</th>
                <th>Tổng</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($orderItems)) : ?>
                <?php foreach ($orderItems as $item) : ?>
                    <tr>
                        <td><?= $item['ten_san_pham'] ?></td>
                        <td><?= $item['so_luong'] ?></td>
                        <td><?= number_format($item['gia'], 0, ',', '.') ?> đ</td>
                        <td><?= number_format($item['gia'] * $item['so_luong'], 0, ',', '.') ?> đ</td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="4">Không có sản phẩm trong đơn hàng.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
