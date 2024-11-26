<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['error_message'])) {
    echo '<div style="color: red;">' . $_SESSION['error_message'] . '</div>';
    unset($_SESSION['error_message']);  // Xóa thông báo sau khi hiển thị
}

if (isset($_SESSION['success_message'])) {
    echo '<div style="color: green;">' . $_SESSION['success_message'] . '</div>';
    unset($_SESSION['success_message']);
}
?>
<style>
    .input-sreach  {
        border: none;
        border-bottom: 2px solid #000;
        outline: none;
        padding: 5px;
        font-size: 16px;
        width: 510px;
        margin-left: 480px;
    }

    .input-sreach:focus {
        border-bottom-color: #FF0000;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 5px;
        font-size: 18px;
        margin-left: 480px;
    }

    .hover-text {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 200px;
        height: 40px;
        position: relative;
    }

    .hover-text p {
        transition: opacity 0.3s ease;
        white-space: nowrap;
    }

    .hover-text:after {
        content: "Lần sau chú ý hơn nhớ chưa !!!";
        position: absolute;
        opacity: 0;
        top: 50%;
        left: 50%;
        white-space: nowrap;
        transform: translate(-50%, -50%);
        color: #ffc107;
        transition: opacity 0.3s ease;
    }

    .hover-text:hover p {
        opacity: 0;
        color: #ff0000;
    }

    .hover-text:hover:after {
        opacity: 1;
    }
</style>
<div class="container-fluid">
        <div class="form-control">
            <form action="index.php?act=regist" method="POST">
                <h3 class="text-center my-4">Đăng Ký</h3>

                <div class="form-group">
                    <label for="text">UserName</label>
                    <input class="input-sreach" type="text" id="text" name="text" placeholder="Nhập tên của bạn" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="input-sreach" type="email" id="email" name="email" placeholder="Nhập email của bạn" required>
                </div>
                <div class="form-group">
                    <label for="phone">Số điện thoại</label>
                    <input class="input-sreach" type="phone" id="phone" name="phone" placeholder="Nhập số điện thoại của bạn" required>
                </div>
                <div class="form-group">
                    <label for="date">Ngày sinh</label>
                    <input class="input-sreach" type="date" id="date" name="date" placeholder="Nhập ngày sinh của bạn" required>
                </div>
                <div class="form-group">
                    <label for="password">Mật khẩu</label>
                    <input class="input-sreach" type="password" id="password" name="password" placeholder="Nhập mật khẩu của bạn" required>
                </div>

                <div class="d-grid gap-2 col-4 mx-auto">
                    <input class="btn btn-danger" type="submit" name="regist" value="Đăng Ký">
                </div>
            </form>
        </div>
    </div>
