<?php
session_start();
session_unset(); // Hủy tất cả các phiên
session_destroy(); // Hủy phiên làm việc

// Chuyển hướng người dùng về trang đăng nhập
header("Location: login.php");
exit();
