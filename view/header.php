<!doctype html>
<html lang="en">
<head>
    <title>Trang Chủ</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style> 
    html, body {
    overflow-x: hidden; /* Ngừng cuộn ngang */
    width: 100%;
    margin: 0;
    padding: 0;
}    
        .color-white { color: white; }
        .color-black { color: black; }
        .color-red { color: red; }
        .search-input {
            background-image: url('view/img/logo-sreach.jpg');
            background-repeat: no-repeat;
            background-position: 10px center;
            padding-left: 35px;
            background-size: 20px;
            min-width: 480px;
            width: 100%;
            box-sizing: border-box;
        }
        .navbar .nav-link { color: black; font-size: 16px; padding: 8px 15px; line-height: 1.5; }
        .navbar .nav-link:hover,.navbar .nav-link:hover p { color: red; }
        .custom-btn {border-color: gray;color: black; background-color: transparent; transition: background-color 0.3s, color 0.3s; }
        .custom-btn:hover{background-color: red; color: white;}
        .nav-link.dropdown-toggle::after {display: none; }
        .navbar { padding: 0 60px; margin-top: 10px; }
        .form-inline .search-input { height: 40px; }
        .dropdown-menu { width: 280px; padding: 15px; }
        .dropdown-menu h5 { font-size: 18px; }
        .btn-social { width: 100%; margin-bottom: 10px; }
        .short-line {
    width: 1px; /* Độ dày giống nhau */
    height: 1em; /* Chiều cao bằng chữ */
    background-color: black; /* Màu sắc */
    display: inline-block; /* Hiển thị trên cùng dòng */
    vertical-align: middle; /* Căn giữa */
    margin: 0; /* Loại bỏ khoảng cách không mong muốn */
}
.put-lines {
    width: 0.5px; /* Độ dày giống nhau */
    height: 1em; /* Chiều cao bằng chữ */
    background-color:black ; /* Màu sắc */
    display: inline-block; /* Hiển thị trên cùng dòng */
    vertical-align: middle; /* Căn giữa */
    margin: 0; /* Loại bỏ khoảng cách không mong muốn */
}


.nav-item .nav-link {
    margin: 0 10px; /* Khoảng cách giữa chữ và gạch */
    display: inline; /* Đảm bảo chữ nằm trên cùng dòng */
}
.nav-item {
    position: relative; /* Giữ dropdown trong phạm vi của nav-item */
    display: inline-block; /* Đảm bảo các mục menu nằm trên cùng một hàng */
}

/* Đặt chung cho menu */
.menu-main {
    list-style-type: none;
    margin: 0;
    padding: 0;
    display: flex; /* Xếp các mục trên một dòng */
    gap: 20px; /* Khoảng cách giữa các mục */
    align-items: center; /* Căn giữa theo chiều dọc */
}

/* Căn chỉnh từng mục menu */
.menu-main .nav-item {
    position: relative; /* Để dropdown không ảnh hưởng */
    display: flex; /* Đảm bảo tất cả các phần tử con nằm trên cùng hàng */
    align-items: center; /* Căn giữa văn bản trong mục */
}

/* Link của menu */
.menu-main .nav-link {
    color: black;
    text-decoration: none; /* Xóa gạch chân */
    font-size: 16px; /* Đảm bảo font đồng đều */
    line-height: 1; /* Đặt chiều cao dòng cố định */
    display: inline-block; /* Đảm bảo văn bản nằm gọn */
    padding: 10px 5px; /* Khoảng cách padding để đồng bộ */
    transition: color 0.2s ease-in-out;
}

/* Đảm bảo dropdown có chiều rộng gần hết màn hình */
.menu-main .dropdown-menu-custom {
    display: none;
    position: absolute;
    top: calc(100% + 10px); /* Dropdown nằm ngay bên dưới chữ */
    left: 0;
    background-color: white;
    border: 1px solid #ddd;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    padding: 100px;
    z-index: 1000;
    width: 1300px; /* Chiều rộng mặc định */
    visibility: hidden;
    opacity: 0;
    transition: all 0.3s ease-in-out;
}

/* Khi hover vào chữ "Nước Hoa Nam", dropdown sẽ mở và có chiều rộng gần hết màn hình */
.menu-main .nav-item:hover .dropdown-menu-custom {
    display: block;
    visibility: visible;
    opacity: 1;
    width: 90vw; /* Dropdown sẽ chiếm 90% chiều rộng màn hình */
    left: 5%; /* Căn giữa dropdown */
}

/* Điều chỉnh ảnh trong dropdown khi hover */
.menu-main .nav-item:hover .dropdown-images img {
    transform: scale(1.2); /* Phóng to ảnh lên 1.2 lần */
    transition: transform 0.3s ease; /* Thêm hiệu ứng phóng to */
}

/* Điều chỉnh ảnh trong dropdown */
.dropdown-images {
    display: flex; /* Dùng flexbox để các ảnh nằm trên cùng một hàng */
    gap: 10px; /* Khoảng cách giữa các ảnh */
    justify-content: center; /* Căn giữa các ảnh */
}

.dropdown-images img {
    width: 120px; /* Điều chỉnh độ rộng của mỗi ảnh */
    height: 120px; /* Đặt chiều cao cố định để giữ tỷ lệ */
    object-fit: cover; /* Đảm bảo ảnh không bị vỡ và vẫn giữ nguyên tỷ lệ */
    transition: transform 0.3s ease; /* Thêm hiệu ứng khi phóng to ảnh */
}
/* Khi hover vào mục "Nước Hoa Nam", dropdown sẽ mở rộng toàn bộ màn hình */
.menu-main .nav-item:hover .dropdown-menu-custom {
    display: block;
    visibility: visible;
    opacity: 1;
    width: 100vw; /* Mở rộng dropdown toàn bộ màn hình */
    left: 0; /* Đảm bảo dropdown căn trái màn hình */
}

/* Điều chỉnh các phần tử trong dropdown để phù hợp với độ rộng mới */
.menu-main .dropdown-menu-custom .dropdown-left,
.menu-main .dropdown-menu-custom .dropdown-right {
    width: 50%; /* Mỗi bên chiếm 50% chiều rộng của dropdown */
}

.menu-main .dropdown-menu-custom .dropdown-images {
    width: 100%; /* Đảm bảo phần ảnh chiếm toàn bộ chiều rộng */
    display: flex;
    justify-content: space-around; /* Căn giữa ảnh */
}
/* Thêm thuộc tính sticky cho navbar */
.navbar {
    position: sticky;
    top: 0; /* Đảm bảo navbar dính vào đầu trang */
    z-index: 1000; /* Đảm bảo navbar luôn nằm trên các phần tử khác */
    background-color: #FFFFFF; /* Màu nền của navbar */
    margin-top: 10px;
}

/* Điều chỉnh navbar để không bị che khuất khi cuộn trang */
.navbar .navbar-toggler {
    z-index: 1001; /* Đảm bảo nút toggle luôn hiển thị trên cùng */
}

/* Các phần tử menu bên trong navbar */
.menu-main {
    list-style-type: none;
    margin: 0;
    padding: 0;
    display: flex; /* Xếp các mục trên một dòng */
    gap: 20px; /* Khoảng cách giữa các mục */
    align-items: center; /* Căn giữa theo chiều dọc */
}

/* Đảm bảo các menu không bị mất khi cuộn */
.menu-main .nav-item {
    position: relative; /* Để dropdown không ảnh hưởng */
    display: flex; /* Đảm bảo tất cả các phần tử con nằm trên cùng hàng */
    align-items: center; /* Căn giữa văn bản trong mục */
}

/* Đảm bảo dropdown hiển thị khi hover */
.menu-main .nav-item:hover .dropdown-menu-custom {
    display: block;
    visibility: visible;
    opacity: 1;
    width: 100vw; /* Mở rộng dropdown chiếm toàn bộ chiều rộng màn hình */
    left: 0; /* Đảm bảo dropdown căn trái màn hình */
}

/* Dropdown mặc định sẽ không hiển thị cho đến khi hover */
.menu-main .dropdown-menu-custom {
    display: none;
    position: absolute;
    top: calc(100% + 10px); /* Dropdown nằm ngay dưới menu */
    left: 0;
    background-color: white;
    border: 1px solid #ddd;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    padding: 10px;
    z-index: 1000;
    width: 90vw; /* Dropdown chiếm 90% chiều rộng màn hình */
    visibility: hidden;
    opacity: 0;
    transition: all 0.3s ease-in-out;
}

/* Khi hover vào mục "Nước Hoa Nam", dropdown sẽ mở rộng */
.menu-main .nav-item:hover .dropdown-menu-custom {
    display: block;
    visibility: visible;
    opacity: 1;
    width: 100vw; /* Dropdown chiếm toàn bộ chiều rộng màn hình */
    left: 0; /* Đảm bảo căn trái dropdown */
}



    </style>
</head>
<body>
<div class="container-fluid mr-0" style="padding: 0;">  
    <div class="d-none d-sm-block" style="background-color: #D72229; margin-top: 0;">  
        <div class="text-center color-white d-flex align-items-center justify-content-center" style="height: 60px; padding: 0;">  
            <h5 style="margin: 0;">Thương hiệu nước hoa được feedback nhiều nhất Việt Nam</h5>  
        </div>  
    </div>  
</div>

        <nav class="navbar navbar-expand-sm" style="background-color: #FFFFFF; margin-top: 10px;">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item"><a class="nav-link color-black mr-4 " href="index.php"><img src="view/img/logo.svg" alt=""></a></li>
                    <li class="nav-item">
                        <form class="form-inline my-2 my-lg-0">
                            <input class="form-control search-input mr-3" type="text" name="kyw" placeholder="Tìm Kiếm">
                        </form>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link color-black" href=""><img src="view/img/icon-shop.svg" alt="" style="width:22px; height:25px; margin-right:5px;">8 Cửa hàng toàn quốc</a>
                    </li>
                    <li class="nav-item">
                    <span class="short-line"></span>
                    <a class="nav-link color-black mx-2" href="">Nmagazine</a>
                    <span class="put-lines"></span>
                    </li>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle color-black" href="#" id="loginDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <img src="view/img/icon-user.svg" alt="" style="width: 25px; height: auto; margin-right: 5px;">
                        Đăng nhập
                    </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="loginDropdown">
                            <h5>Chào bạn,</h5>
                            <p>Đăng nhập đề vào thế giới nước hoa Namperfume</p>
                            <div class="d-flex">
                                <button class="btn btn-outline-secondary custom-btn flex-grow-1 mr-2">Đăng nhập</button>
                                <button class="btn btn-outline-secondary custom-btn flex-grow-1">Đăng ký</button>
                            </div>
                            <hr>
                            <h5>Hoặc Đăng nhập với</h5>
                            <button class="btn btn-outline-danger btn-social"><i class="bi bi-google"></i> Đăng Nhập Với Google</button>
                            <button class="btn btn-outline-primary btn-social"><i class="bi bi-facebook"></i> Đăng Nhập Với Facebook</button>
                        </div>
                    </li>
                    <li class="nav-item mr-1">
                      <a class="nav-link " href="#">
                        <img src="view/img/icon-favorite.svg" alt="">
                      </a>
                    </li>
                    <li class="nav-item mr-1">
                      <a class="nav-link" href="#">
                        <img src="view/img/icon-cart.svg" alt="">
                      </a>
                    </li>
                </ul>
            </div>
        </nav>
        <nav class="navbar navbar-expand-sm" style="background-color: #FFFFFF; margin: 0 50px;">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item"><a class="nav-link color-red"  href="index.php"><h5 class="color-red" style="margin-right:30px;">namperfume Favorites</h5></a></li>
                    <li class="nav-item">
                        <a class="nav-link color-red" href="#"><p class="color-black" style="font-weight:bold;margin-right:30px;">Deal thơm</p></a>
                    </li>
                    <ul class="menu-main">
                            <li class="nav-item">
                                <a class="nav-link" href="#"><p>Nước Hoa Nam</p></a>
                                    <div class="dropdown-menu-custom d-flex" >
                                        <div class="dropdown-left">
                                            <h5>Phân loại</h5>
                                                <ul>
                                                    <li><a href="#"><p>Mới nhất</p></a></li>
                                                    <li><a href="#"><p>Yêu thích nhất</p></a></li>
                                                    <li><a href="#"><p>Nước hoa Niche</p></a></li>
                                                    <li><a href="#"><p>Giftset</p></a></li>
                                                    <li><a href="#"><p>Nước Hoa Unisex</p></a></li>
                                                    <li><a href="#"><p>Nước Hoa Mini</p></a></li>
                                                </ul>
                                     </div>
                                         <div class="dropdown-right">
                                            <h5>Thương hiệu</h5>
                                                 <ul>
                                                    <li><a href="#"><p>GUCCI</p></a></li>
                                                    <li><a href="#"><p>CALVIN KLEIN</p></a></li>
                                                    <li><a href="#"><p>CHANEL</p></a></li>
                                                    <li><a href="#"><p>BURBERRY</p></a></li>
                                                    <li><a href="#"><p>VERSACE</p></a></li>
                                                    <li><a href="#"><p>VALENTINO</p></a></li>
                                                </ul>
                                        </div>
                                             <div class="dropdown-images">
                                                <img src="view/img/menu1.webp"  alt="Image 1">
                                                <img src="view/img/menu_2.webp" alt="Image 2">
                                                <img src="view/img/menu_3.webp" alt="Image 3">
                                            </div>
                                    </div>
                                </li>
                            </ul>



                    <li class="nav-item">
                    <a class="nav-link color-red" href=""><p style="margin-right:30px;">Nước Hoa Nữ</p></a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link color-red" href=""><p style="margin-right:30px;">Nước Hoa Mini</p></a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link color-red" href=""><p style="margin-right:30px;">Gifset</p></a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link color-red" href=""><p style="margin-right:30px;">Nước Hoa Niche</p></a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link color-red" href=""><p style="margin-right:30px;">Thương Hiệu</p></a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
