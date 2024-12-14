<?php
if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];
    // Tạo đối tượng Order để lấy thông tin đơn hàng
    $order = new Order();
    $orderDetails = $order->getOrderDetails($order_id);  // Lấy thông tin đơn hàng

    if ($orderDetails) {
        // Lấy danh sách các sản phẩm trong đơn hàng
        $orderItems = $order->getOrderItems($order_id);  // Lấy các sản phẩm từ đơn hàng
    } else {
        echo 'Không tìm thấy đơn hàng!';
        exit;
    }
}
$cartItems = $_SESSION['cart'] ?? []; 
?>
<div class="container-fluid my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="form-control">
                <?php if ($orderDetails): ?>
                    <h5 class="mb-4 my-4">Chi tiết đơn hàng <?= $orderDetails['ma_don_hang'] ?></h5>
                    <form class="mx-5">
                        <p><strong>Tên người nhận:</strong> <?php echo $orderDetails['ten_nguoi_nhan']; ?></p>
                        <p><strong>Email:</strong> <?php echo $orderDetails['email_nguoi_nhan']; ?></p>
                        <p><strong>Số điện thoại:</strong> <?php echo $orderDetails['sdt_nguoi_nhan']; ?></p>
                        <p><strong>Địa chỉ:</strong> <?php echo $orderDetails['dia_chi_nguoi_nhan']; ?></p>
                        <p><strong>Tổng tiền:</strong> <?php echo number_format($orderDetails['tong_tien'], 0, ',', '.'); ?> VND</p>
                        <p><strong>Phương thức thanh toán:</strong> <?php echo $orderDetails['ten_phuong_thuc']; ?></p>
                        <p><strong>Trạng Thái Đơn Hàng:</strong> <?php echo $orderDetails['ten_trang_thai']; ?></p>
                    </form>
                    
                    <?php endif ;?>
                    <!-- Hiển thị danh sách sản phẩm trong đơn hàng -->
                    <h6>Sản phẩm trong đơn hàng:</h6>
                    <ul style="list-style:none" class="justify-content-center d-flex">
                        <?php if($cartItems) :?>
                        <?php foreach ($cartItems as $item): ?>
                            <li>
                                <img width="200px" src="<?php echo $item['hinh_anh']; ?>" alt=""> 
                            </li>
                            <li>
                            <p>Số lượng : <?php echo $item['so_luong']; ?> </p>
                            </li>
                            
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
