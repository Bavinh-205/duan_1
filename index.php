<?php

require_once 'view/header.php';


if((isset($_GET['act']))&&($_GET['act']!="")){
    $act = $_GET['act'];
    switch ($act) {
        case 'product-ct':
            include 'view/product-ct.php';
            break;
        case 'product':
            include 'view/product.php';
            break;
        case 'login':
            include 'view/login.php';
            break;
        case 'cart':
            include 'view/cart.php';
            break;
        default:
            # code...
            break;
    }
}else{
    require_once 'view/home.php';
}
require_once 'view/footer.php';