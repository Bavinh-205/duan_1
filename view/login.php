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
        <form action="index.php?act=login" method="POST">
            <h3 class="text-center my-4">Đăng nhập</h3>
            <div class="form-group">
                <label for="email">Email</label>
                <input class="input-sreach" type="email" id="email" name="email" placeholder="Nhập email của bạn" required>
            </div>
            <div class="form-group">
                <label for="password">Mật Khẩu</label>
                <input class="input-sreach" type="password" id="password" name="password" placeholder="Nhập mật khẩu của bạn" required>
            </div>
            <div class="d-grid gap-2 col-2 mx-auto">
                <a class="hover-text text-decoration-none text-dark text-center " href=""><p>Quên Mật Khẩu</p></a>
            </div>
            <input class="my-4" style="margin-left:500px;" type="checkbox" name="" id=""> Lưu thông tin khi đăng nhập

            <div class="d-grid gap-2 col-4 mx-auto">
                <button class="btn btn-danger" type="submit" name="login">Đăng Nhập</button>
            </div>
            <h5 class="my-4 text-center">Đăng nhập với</h5>
            <div class="d-grid gap-2 col-4 mx-auto">
                <button class="btn btn-outline-danger btn-social mb-2"><i class="bi bi-google"></i> Đăng Nhập Với Google</button>
                <button class="btn btn-outline-primary btn-social"><i class="bi bi-facebook"></i> Đăng Nhập Với Facebook</button>
            </div>
            <div class="container-fluid mt-2" style="background-color:#6c757d ;border-radius:5px;height:200px;">
                <h5 class="mt-2 text-center text-light " style="margin-top: 50px;">Thành Viên Mới</h5>
                <p class="mt-2 text-center text-light">Trở thành thành viên của <strong>Namperfume</strong></p>
                <p class="mt-2 text-center text-light">Để nhận được những ưu đãi và dịch vụ bất ngờ</p>
                <div class="d-grid gap-2 col-4 mx-auto">
                    <button class="btn btn-light" type="submit"><a class="text-decoration-none text-dark" href="">Đăng ký</a></button>
                </div>
            </div>
        </form>
    </div>
</div>
