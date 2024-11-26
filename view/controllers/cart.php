<?php
// Chỉ khởi tạo session nếu cần thiết
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once 'products.php';

// Khởi tạo giỏ hàng nếu chưa tồn tại
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Hàm thêm sản phẩm vào giỏ hàng
function addToCart($productId, $products, $quantity = 1) {
    if (isset($_SESSION['cart'][$productId])) {
        $_SESSION['cart'][$productId]['quantity'] += $quantity;
    } else {
        if (isset($products[$productId])) {
            $product = $products[$productId];
            $_SESSION['cart'][$productId] = [
                'name' => $product['name'],
                'price' => $product['price'],
                'image' => $product['image'],
                'quantity' => $quantity,
            ];
        }
    }

    // In ra giỏ hàng sau khi thêm sản phẩm
    echo '<pre>';
    print_r($_SESSION['cart']);
    echo '</pre>';
}



// Ví dụ thêm sản phẩm (giả sử bạn gửi ID sản phẩm qua form POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['productId'])) {
    $productId = $_POST['productId'];
    $quantity = $_POST['quantity'] ?? 1;

    // Danh sách sản phẩm có sẵn
    $products = [
        'MZN001' => [
            'name' => 'Nước Hoa Nữ',
            'price' => 900000,
            'image' => 'uploads/user/6741fac5e8c48_product14.webp',
            'danh_muc' => 'Nike',
        ],
        'PM002' => [
            'name' => 'Puma Ultra 1.1',
            'price' => 2500000,
            'image' => 'uploads/user/6741fb756f8b0_product8.webp',
            'danh_muc' => 'Nike',
        ],
        'AD001' => [
            'name' => 'Adidas X18.1',
            'price' => 2500000,
            'image' => 'uploads/user/6741fb8b779fd_product13.webp',
            'danh_muc' => 'Nike',
        ],
        'KMT001' => [
            'name' => 'Kamito QH19',
            'price' => 2500000,
            'image' => 'uploads/user/6741fb9b1a327_product11.webp',
            'danh_muc' => 'Nike',
        ],
        'KMT002' => [
            'name' => 'Kamito TA11',
            'price' => 2500000,
            'image' => 'uploads/user/674204ae50e50_product5.webp',
            'danh_muc' => 'Nike',
        ],
        'NK001' => [
            'name' => 'Nike Air Zoom Mercurial Vapor 15',
            'price' => 2500000,
            'image' => 'uploads/user/674204b856cb1_product-ct-1.webp',
            'danh_muc' => 'Nike',
        ],
        'MZN002' => [
            'name' => 'Mizuno Monarcida',
            'price' => 2500000,
            'image' => 'uploads/user/674204ca312d7_product-ct-3.webp',
            'danh_muc' => 'Nike',
        ],
        'NK002' => [
            'name' => 'NIKE AIR ZOOM MERCURIAL VAPOR 15 ACADEMY',
            'price' => 2500000,
            'image' => 'uploads/user/674204d57829d_product14.webp',
            'danh_muc' => 'Nike',
        ],
        'NK003' => [
            'name' => 'Nike Mercurial Vapor Zoom XIV Pro TF',
            'price' => 2500000,
            'image' => 'uploads/user/674204e0ac07a_product10.webp',
            'danh_muc' => 'Nike',
        ],
    ];

    // Thêm sản phẩm vào giỏ hàng
    addToCart($productId, $quantity, $products);

    // Điều hướng lại về trang giỏ hàng
    header('Location: cart.php');
    exit;
}
