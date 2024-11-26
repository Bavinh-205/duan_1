<div class="container-fluid">
    <div class="row">
        <!-- Bộ lọc -->
        <div class="col-md-2" ">
            <h5 class="my-4 d-flex" style="margin-left:70px;">Deal Thơm 24 kết quả</h5>
            <ul class="nav flex-column" style="margin-left:50px;">
                <li class="nav-item">
                    <a class="nav-link active text-dark" aria-current="page" href="#">Bộ Lọc</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="#">Thương Hiệu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="#">Mức Giá</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="#">Size</a>
                </li>
            </ul>
        </div>
        <!-- Danh sách sản phẩm -->
        <div class="col-md-8 my-2">
        <div class="row">
    <?php if (!empty($allProducts)): ?>
        <?php foreach ($allProducts as $product): ?>
            <div class="col-md-3 p-1">
                <div class="card border-0 text-center">
                    <!-- Hiển thị ảnh sản phẩm -->
                    <img src="http://localhost/duan_1/<?php echo $product['hinh_anh'];?>" class="card-img-top" >

                    <div class="card-body">
                        <h6 class="card-title"><?php echo $product['ma_san_pham']; ?></h6>
                        <a class="card-text color-black text-decoration-none" href="index.php?act=product-ct&id=<?php echo $product['id']; ?>">
                            <p class="card-text"><?php echo $product['ten_san_pham']; ?></p>
                        </a>
                        <p class="card-price color-red">
                            <?php echo number_format($product['gia_ban'], 0, ',', '.'); ?>₫
                        </p>
                        <p><?php echo $product['trang_thai']; ?> Sizes</p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Không có sản phẩm nào.</p>
    <?php endif; ?>
</div>
                
                <!-- Các sản phẩm khác -->
                <!-- Thêm các thẻ sản phẩm khác vào đây -->
            </div>
        </div>
    </div>
</div>
