<?php if ($orderDetails): ?>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Ảnh</th>
                <th>Tên sản phẩm</th>
                <th>Số lượng</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orderItems as $item): ?>
                <tr>
                    <td><img src="<?php echo 'path/to/images/' . $item['product_image']; ?>" alt="<?php echo $item['product_name']; ?>" width="100"></td>
                    <td><?php echo $item['product_name']; ?></td>
                    <td><?php echo $item['quantity']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p class="text-center text-danger">Không có đơn hàng nào để hiển thị.</p>
<?php endif; ?>
