<?php
// $cartItems = isset($_SESSION['cart']) ? $_SESSION['cart'] : []; // Nếu chưa có giỏ hàng, khởi tạo mảng rỗng
?>  
<div class="container-fluid my-4">
    <h4 class="d-flex justify-content-between align-items-center" style="text-transform:none; font-weight:500; margin-left:80px;">
        Giỏ hàng <br> (<?= count($cartItems) ?> Sản Phẩm)
    </h4>

    <div class="row mx-5">
        <!-- Sản phẩm giỏ hàng -->
        <div class="col-lg-9">
            <div class="pie mx-5">
                <div class="row">
                    <div class="col-lg-12">
                        <hr class="mx-4">
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <?php if ($cartItems): ?>
                    <?php foreach ($cartItems as $item): ?>
                        <div class="col-md-12 d-flex justify-content-start align-items-center mb-3">
                            <img class="img-fluid mx-2" src="<?= $item['hinh_anh'] ?>" alt="<?= $item['ma_san_pham'] ?>" style="width: 150px; height: 150px;">
                            <div class="mx-5">
                                <h6 style=" white-space: normal; " class="mb-2"><?= $item['ten_san_pham'] ?></h6>
                                <span class="d-block text-truncate"><?= $item['ten_san_pham'] ?></span><br>
                                <span>Mã hàng: <?= $item['ma_san_pham'] ?></span>
                            </div>
                            <div class="mx-5">
                                <h5 class="text-danger"><?= number_format($item['gia_ban'], 0, ',', '.') ?>₫</h5>
                            </div>
                            <div class="mx-5">
                                <p class="mx-4">Số lượng còn:</p>
                                <h5 class="mx-5 text-danger"><?= $item['so_luong_con_lai'] ?> cái</h5>
                            </div>
                            <div class="mx-5">
                                <p class="mx-4">Số lượng</p>
                                <div class="d-flex align-items-center">
                                <form method="POST" action="">
                                    <input type="hidden" name="ma_san_pham" value="<?= $item['ma_san_pham'] ?>" />
                                    <input type="hidden" name="action" value="decrease" />
                                    <button type="submit" name="update_quantity" class="border border-1 mx-2 btn btn-outline-secondary" style="border-radius: 20%;">-</button>
                                </form>
                                <span><?= $item['so_luong'] ?></span>
                                <!-- Tăng số lượng -->
                                <form method="POST" action="">
                                    <input type="hidden" name="ma_san_pham" value="<?= $item['ma_san_pham'] ?>" />
                                    <input type="hidden" name="action" value="increase" />
                                    <button type="submit" name="update_quantity" class="border border-1 mx-2 btn btn-outline-danger" style="border-radius: 20%;">+</button>
                                </form>
                                                                                </div>
                            </div>
                            <div class="mx-5 mt-5">
                            <form method="POST" action="">
                                <input type="hidden" name="ma_san_pham" value="<?= $item['ma_san_pham'] ?>" />
                                     <button type="submit" name="remove" class="btn btn-danger">Xóa</button>
                             </form>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Giỏ hàng của bạn hiện đang trống.</p>
                <?php endif; ?>
            </div>
            <div class="pie mx-3">
                <div class="row">
                    <div class="col-lg-12">
                        <hr class="mx-4">
                    </div>
                </div>
            </div>
        </div>

        <!-- Phần thanh toán -->
        <div class="col-lg-3 ms-auto pe-0">
            <div class="mx-5">
                <div class="d-flex justify-content-between mt-3">
                    <h6 class="me-4">Mã Giảm Giá</h6>
                    <h6 class="text-dark ms-4">Nhập mã</h6>
                </div>
                <div class="d-flex justify-content-between mt-4">
                    <h6 class="me-4">Tạm tính:</h6>
                    <h6 class="text-danger ms-4"><?= number_format(array_sum(array_map(function($item) {
                        return $item['gia_ban'] * $item['so_luong']; // Tổng tiền cho mỗi sản phẩm
                    }, $cartItems)), 0, ',', '.') ?>₫</h6>
                </div>
                <div class="d-flex justify-content-between mt-4">
                    <h6 class="me-4">Phí vận chuyển:</h6>
                    <h6 class="text-success ms-4">Free</h6>
                </div>
                <hr class="w-100">
                <div class="d-flex justify-content-between">
                    <h5 class="text-danger me-4">Tổng:</h5>
                    <h5 class="text-danger ms-4"><?= number_format(array_sum(array_map(function($item) {
                        return $item['gia_ban'] * $item['so_luong']; // Tổng tiền cho mỗi sản phẩm
                    }, $cartItems)), 0, ',', '.') ?>₫</h5>
                </div>
                <a class="text-decoration-none" href="index.php?act=bill"><button class="btn btn-danger btn-block w-100 mt-4">Thanh toán</button></a>
                <a class="text-decoration-none" href="index.php"><button class="btn btn-warning btn-block w-100 mt-4">Tiếp Tục Mua Hàng</button></a>
            </div>
        </div>
    </div>
</div>
