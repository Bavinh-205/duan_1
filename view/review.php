<form action="index.php?action=submit_review" method="POST">
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
    <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>" />
    <button type="submit" class="btn btn-primary">Gửi đánh giá</button>
</form>
