<div class="container-fluid my-4">
    <h4 class="d-flex justify-content-between align-items-center" style="text-transform:none; font-weight:500; margin-left:80px;">
        Giỏ hàng <br> (<?= count($cartItems) ?> Sản Phẩm)
        <a href="index.php" class="text-decoration-none ml-auto text-dark" style="margin-right:20px;">Tiếp tục mua hàng</a>
    </h4>

    <div class="pie mx-5">
        <div class="row">
            <div class="col-lg-9">
                <hr class="mx-4">
            </div>
        </div>
    </div>

    <!-- Căn chỉnh sản phẩm và tổng tiền trong một hàng -->
    <div class="row mx-5">
        <!-- Sản phẩm giỏ hàng -->
        <div class="col-lg-8">
            <div class="row align-items-center">
                <?php if ($cartItems): ?>
                    <?php foreach ($cartItems as $item): ?>
                    <div class="col-md-12 d-flex justify-content-start align-items-center mb-3">
                        <img class="img-fluid mx-2" src="<?= $item['hinh_anh'] ?>" alt="<?= $item['ten_san_pham'] ?>" style="width: 150px; height: 150px;">
                        <div class="mx-5">
                            <h6 class="mb-2"><?= $item['ten_san_pham'] ?></h6>
                            <span class="d-block text-truncate"><?= $item['ten_san_pham'] ?></span><br>
                            <span>Mã hàng: <?= $item['ma_san_pham'] ?></span>
                        </div>
                        <div class="mx-5">
                            <h5 class="text-danger"><?= number_format($item['gia_ban'], 0, ',', '.') ?>₫</h5>
                        </div>
                        <div class="mx-5">
                            <p>Số Lượng</p>
                            <div class="d-flex align-items-center">
                                <button class="border border-1 mx-2 btn btn-outline-secondary" style="border-radius: 20%;">-</button>
                                <span><?= $item['so_luong'] ?></span>
                                <button class="border border-1 mx-2 btn btn-outline-danger" style="border-radius: 20%;">+</button>
                            </div>
                        </div>
                        <div class="mx-2">
                            <p>X</p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Giỏ hàng của bạn hiện đang trống.</p>
                <?php endif; ?>
            </div>
        </div>

        <!-- Phần Tổng tiền và thanh toán -->
        <div class="col-lg-4 ms-auto">
            <div class="mx-5">
                <div class="d-flex justify-content-between mt-3">
                    <h6 class="me-4">Mã Giảm Giá</h6>
                    <h6 class="text-dark ms-4">Nhập mã</h6>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <h6 class="me-4">Tạm tính:</h6>
                    <h6 class="text-danger ms-4"><?= number_format($item['gia_ban'], 0, ',', '.') ?>₫</h6>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <h6 class="me-4">Phí vận chuyển:</h6>
                    <h6 class="text-success ms-4">Free</h6>
                </div>

                <hr class="w-100">

                <div class="d-flex justify-content-between">
                    <h5 class="text-danger me-4">Tổng:</h5>
                    <h5 class="text-danger ms-4"><?= number_format($item['gia_ban'], 0, ',', '.') ?>₫</h5>
                </div>

                <button class="btn btn-danger btn-block w-100 mt-4">Thanh toán</button>
            </div>
        </div>
    </div>

    <!-- Một hr nữa cho phần giữa sản phẩm và tổng tiền -->
    <div class="pie mx-5">
        <div class="row">
            <div class="col-lg-9">
                <hr class="mx-4">
            </div>
        </div>
    </div>
</div>
