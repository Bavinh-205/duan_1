<style>
    
    .carousel-inner img {  
    max-width: 100%;  
    height: auto; /* Đảm bảo hình ảnh không bị méo */  
}  

.img .d-flex {  
    display: flex;  
    flex-wrap: wrap; /* Cho phép các hình ảnh gãy dòng nếu không đủ không gian */  
}  

.d-flex img {  
    margin: 0; /* Loại bỏ khoảng cách giữa các hình ảnh */  
    padding: 0; /* Loại bỏ khoảng cách trong các hình ảnh */  
    max-width: 165px; /* Giữ nguyên kích thước hình ảnh */  
}  

.carousel {  
    margin-bottom: 0; /* Loại bỏ khoảng cách dưới slideshow */ 
    z-index: 1; 
    position: relative;
} 
.carousel-item {  
    padding: 0; /* Loại bỏ khoảng cách padding giữa các item */  
}
h4{
    margin-left:50px;
}
.container-fluid {
    z-index: 1;  /* Đảm bảo không bị ảnh hưởng khi carousel chuyển động */
}
.container-fluid {  
    padding: 20px;  
}  

.card {  
    border: none;  
    border-radius: 10px; /* Adjust according to your preference */  
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2); /* Optional shadow for depth */  
}  

.color-red {  
    color: red;   
}  
.colo-black{
    color: black;
}

/* Ensuring titles and prices are centered */  
.card-title, .card-text {  
    margin: 0.5rem 0;  
}  

/* Adjust the container for better spacing on different devices */  
@media (max-width: 768px) {  
    .col-md-2 {  
        flex: 0 0 100%; /* Stacks cards on smaller screens */  
        max-width: 100%;  
    }  
}
.card-body {  
    display: flex;  
    flex-direction: column;  
    justify-content: space-between; /* Giúp phân bố khoảng cách đều */  
    height: 100%; /* Tùy thuộc vào chiều cao của khung */  
}  
.card {  
    height: 500px; /* Thay đổi theo kích thước bạn muốn */  
}  
 .card-text {  
    overflow: hidden; /* Ẩn phần nội dung thừa */  
    display: -webkit-box; /* Thiết lập chế độ hiển thị là box */  
    -webkit-box-orient: vertical; /* Thiết lập chiều dọc cho box */  
    -webkit-line-clamp: 2; /* Số dòng tối đa hiển thị */  
} 
.card-text:hover {  
    color: yellow; /* Đổi màu chữ thành vàng khi hover */  
}  
.fixed-height {  
    height: 120px; /* Đặt chiều cao cố định cho thẻ */  
    overflow: hidden; /* Ẩn bất kỳ nội dung nào vượt quá chiều cao */  
    display: flex; /* Dùng flex để căn chỉnh nội dung */  
    flex-direction: column; /* Xếp theo chiều dọc */  
    justify-content: space-between; /* Căn chỉnh nội dung cho evenly spaced */  
}  

/* Thêm chiều cao cho từng phần tử trong card, bạn có thể điều chỉnh lại theo ý muốn */  
.card-title, .card-text, .card-price {  
    height: auto; /* hoặc bạn có thể đặt chiều cao cụ thể nếu cần */  
    margin: 0; /* Xóa margin để tránh ảnh hưởng đến chiều cao */  
} 
.hover-card {  
    position: relative;  
    overflow: hidden;  
}  

.hover-card img {  
    transition: transform 0.3s ease; /* Hiệu ứng hình ảnh */  
}  

.hover-card:hover img {  
    transform: scale(1.1); /* Phóng to hình ảnh khi hover */  
}  

.hover-card::after {  
    content: '';  
    position: absolute;  
    top: 0;  
    left: 0;  
    right: 0;  
    bottom: 0;  
    background: rgba(255, 255, 255, 0.8); /* Lớp phủ sáng */  
    opacity: 0;  
    transition: opacity 0.3s ease; /* Hiệu ứng lớp phủ xuất hiện */  
}  

.hover-card:hover::after {  
    opacity: 1; /* Hiện lớp phủ khi hover */  
}  

.hover-card .card-body {  
    position: relative;  
    z-index: 1; /* Đảm bảo văn bản hiển thị trên lớp phủ */  
}  

.hover-card .quick-view {  
    display: none; /* Ẩn nút khi không hover */  
    margin-top: 10px; /* Khoảng cách trên nút */  
    padding: 10px 20px; /* Padding cho nút */  
    background-color: red; /* Màu nền nút */  
    color: white; /* Màu chữ nút */  
    border: none; /* Không viền */  
    border-radius: 5px; /* Bo tròn góc */  
    cursor: pointer; /* Chuột dạng tay khi hover */  
}  

.hover-card:hover .quick-view {  
    display: block; /* Hiện nút khi hover */  
}
.banner-container {  
    display: flex;  
    justify-content: space-between; /* Để phân bổ không gian giữa các ảnh */  
    gap: 20px; /* Khoảng cách giữa các ảnh */  
}  

.banner-container a {  
    flex: 0 0 440px; /* Đảm bảo mỗi ảnh có chiều rộng cố định */  
}  

.banner-container img {  
    width: 100%; 
    height: 100%;/* Đặt chiều rộng của ảnh bằng 100% để phù hợp với liên kết */  
} 
.icon-container {  
    text-align: center;  
}  

.icon-circle {  
    display: inline-flex;  
    align-items: center;  
    justify-content: center;  
    width: 40px; /* Change size as desired */  
    height: 40px; /* Change size as desired */  
    border-radius: 50%;  
    background-color: #f0f0f0; /* Optional: background color */  
    margin: 0 auto; /* Centers the circle */  
}  

.icon-circle img {  
    width: 40px; /* Adjust image size */  
    height: 40px; /* Adjust image size */  
}
</style>
<div class="container-fluid mt-2">  
    <div id="carouselExampleControls1" class="carousel slide" data-ride="carousel" data-interval="3000">  <!-- Thay đổi thời gian ở đây nếu cần -->  
        <div class="carousel-inner">  
            <div class="carousel-item active">  
                <img src="view/img/slideshow_1.jpg" class="d-block w-100" alt="">  
            </div>  
            <div class="carousel-item">  
                <img src="view/img/slideshow_2.jpg" class="d-block w-100" alt="">  
            </div>  
            <div class="carousel-item">  
                <img src="view/img/slideshow_3.jpg" class="d-block w-100" alt="">  
            </div>  
            <div class="carousel-item">  
                <img src="view/img/slideshow_4.jpg" class="d-block w-100" alt="">  
            </div>  
        </div>  
    </div>  
    <br>  
    <h4 class="d-flex justify-content-between align-items-center mx-4" style="text-transform:none;font-weight:500">  
        Thương hiệu  
        <a href="#" class="mt-10 text-decoration-none"><p class="color-black">Xem thêm</p></a>  
    </h4>   
    <div class="row mt-4 mx-4">  
        <div class="col-md-6">  
            <div id="carouselExampleControls2" class="carousel slide" data-ride="carousel" data-interval="3000">  <!-- Tạo riêng biệt cho slideshow dưới -->  
                <div class="carousel-inner">  
                    <div class="carousel-item active">  
                        <img src="view/img/banner_1.jpg" class="d-block w-100" alt="">  
                    </div>  
                    <div class="carousel-item">  
                        <img src="view/img/banner_2.jpg" class="d-block w-100" alt="">  
                    </div>  
                    <div class="carousel-item">  
                        <img src="view/img/banner_3.jpg" class="d-block w-100" alt="">  
                    </div>    
                </div>  
            </div>  
        </div>  
        <div class="col-md-6">   
            <div class="img d-flex flex-wrap">  
                <img src="view/img/logo-gucci.jpg" alt="GUCCI" class="m-0" style="max-width: 170px;">  
                <img src="view/img/logo-jean.jpg" alt="Jean Paul Gaultier" class="m-0" style="max-width: 170px;">  
                <img src="view/img/logo-rodriguez.jpg" alt="Narciso Rodriguez" class="m-0" style="max-width: 170px;">  
                <img src="view/img/logo-armani.webp" alt="Giorgio Armani" class="m-0" style="max-width: 170px;">  
                <img src="view/img/logo-rabanne.jpg" alt="Paco Rabanne" class="m-0" style="max-width: 170px;">  
                <img src="view/img/logo-calvin.jpg" alt="Calvin Klein" class="m-0" style="max-width: 170px;">  
                <img src="view/img/logo-versace.jpg" alt="Versace" class="m-0" style="max-width: 170px;">  
                <img src="view/img/logo-burberry.jpg" alt="Burberry" class="m-0" style="max-width: 170px;">  
                <img src="view/img/logo-jacobss.jpg" alt="Marc Jacobs" class="m-0" style="max-width: 170px;">  
                <img src="view/img/logo-valentino.png" alt="Valentino" class="m-0" style="max-width: 170px;">  
                <img src="view/img/logo-prada.png" alt="Prada" class="m-0" style="max-width: 170px;">  
                <img src="view/img/logo-lauren.jpg" alt="Ralph Lauren" class="m-0" style="max-width: 170px;">  
                <img src="view/img/logo-carolina.jpg" alt="V&R" class="m-0" style="max-width: 170px;">  
                <img src="view/img/logo-chloe.jpg" alt="Chloé" class="m-0" style="max-width: 170px;"> 
                <img src="view/img/logo-lacoste.jpg" alt="Chloé" class="m-0" style="max-width: 170px;"> 
                <img src="view/img/logo-viktor.webp" alt="Chloé" class="m-0" style="max-width: 170px;">
            </div>   
        </div>  
    </div>  
    <br>
    <h4 class="d-flex justify-content-between align-items-center mx-4" style="font-weight:regular">  
    Deal Thơm 
    <a href="#" class="mt-10 text-decoration-none"><p class="color-black">Xem thêm</p></a>  
    </h4> 
    <div class="container-fluid">    
    <div class="row mx-4">  
        <!-- Card 1 -->  
        <div class="col-md-2 p-1">  
    <div class="card border-0 text-center">  
        <img src="view/img/product1.webp" class="card-img-top" alt="Salvatore Ferragamo Signorina Libera">   
        <div class="card-body">  
            <h6 class="card-title">Salvatore Ferragamo</h6>  
            <a class=" card-text color-black text-decoration-none" href="index.php?act=product-ct"><p class="card-text ">Salvatore Ferragamo Signorina Libera</p></a>
            <p class="card-price color-red">1,980,000đ - 2,150,000₫</p>  
            <p>1 Sizers</p>   
        </div>  
    </div>  
</div>  

        <!-- Card 2 -->  
        <div class="col-md-2 p-1">  
    <div class="card border-0 text-center hover-card">  
        <img src="view/img/product2.webp" class="card-img-top" alt="Salvatore Ferragamo Signorina Libera">  
        <div class="card-body">  
            <h6 class="card-title">Moschino</h6>  
            <p class="card-text">Moschino Toy 2 Bubble Gum</p>  
            <p class="card-price color-red">1,180,000đ - 1,850,000₫</p>  
            <p>1 Sizes</p>  
            <input type="button" value="Xem Nhanh" class="quick-view" /> <!-- Nút "Xem Nhanh" -->  
        </div>  
    </div>  
</div>

        <!-- Card 3 -->  
        <div class="col-md-2 p-1">  
            <div class="card border-0 text-center">  
                <img src="view/img/product3.webp" class="card-img-top" alt="Salvatore Ferragamo Signorina Libera">  
                <div class="card-body">  
                    <h6 class="card-title">Marc Jacobs</h6>  
                    <p class="card-text">Marc Jacobs Daisy Ever So Fresh</p>  
                    <p class="card-price color-red">1,580,000đ - 2,730,000₫</p>  
                    <p>1 Sizers</p>  
                </div>  
            </div>  
        </div>
        <div class="col-md-2 p-1">  
            <div class="card border-0 text-center">  
                <img src="view/img/product4.webp" class="card-img-top" alt="Salvatore Ferragamo Signorina Libera">  
                <div class="card-body">  
                    <h6 class="card-title">Issey Miyake</h6>  
                    <span class="card-text">Issey Miyake L’Eau d’Issey Pour Homme Eau & Cèdre</span>  
                    <p class="card-price color-red">1,870,000đ - 2,560,000₫</p>  
                    <p>1 Sizers</p>  
                </div>  
            </div>  
        </div>  
        <div class="col-md-2 p-1">  
            <div class="card border-0 text-center">  
                <img src="view/img/product5.webp" class="card-img-top" alt="Salvatore Ferragamo Signorina Libera">  
                <div class="card-body">  
                    <h6 class="card-title">Issey Miyake</h6>  
                    <p class="card-text">Issey Miyake L'eau D'Issey for Women</p>  
                    <p class="card-price color-red">1,880,000đ - 2,480,000₫</p>  
                    <p>1 Sizers</p>  
                </div>  
            </div>  
        </div>
        <div class="col-md-2 p-1">  
            <div class="card border-0 text-center">  
                <img src="view/img/product7.webp" class="card-img-top" alt="Salvatore Ferragamo Signorina Libera">  
                <div class="card-body">  
                    <h6 class="card-title">Gucci</h6>  
                    <p class="card-text">Gucci Guilty Black Pour Homme</p>  
                    <p class="card-price color-red">2,200,000đ - 2,680,000₫</p>  
                    <p>1 Sizers</p>  
                </div>  
            </div>  
        </div>
        
    </div>  
    <br>
    <h4 class="d-flex justify-content-between align-items-center mx-4" style="font-weight:regular">  
    New Arrivals
    <a href="#" class="mt-10 text-decoration-none"><p class="color-black">Xem thêm</p></a>  
    </h4> 
    <div class="container-fluid">    
    <div class="row mx-2">  
        <!-- Card 1 -->  
        <div class="col-md-2 p-1">  
            <div class="card border-0 text-center">  
                <img src="view/img/product8.webp" class="card-img-top" alt="Salvatore Ferragamo Signorina Libera">  
                <div class="card-body">  
                    <h6 class="card-title  ">Salvatore Ferragamo</h6>  
                    <p class="card-text">Salvatore Ferragamo Red Leather For Men</p>  
                    <p class="card-price color-red ">1,950,000đ</p>  
                    <p>1 Sizers</p>  
                </div>  
            </div>  
        </div>  

        <!-- Card 2 -->  
        <div class="col-md-2 p-1">  
            <div class="card border-0 text-center">  
                <img src="view/img/product9.webp" class="card-img-top" alt="Salvatore Ferragamo Signorina Libera">  
                <div class="card-body">  
                    <h6 class="card-title">Jean Paul Gaultier</h6>  
                    <p class="card-text">Jean Paul Gaultier Scandal Absolu Pour Homme</p>  
                    <p class="card-price color-red">3,600,000đ</p>  
                    <p>1 Sizers</p>  
                </div>  
            </div>  
        </div>  

        <!-- Card 3 -->  
        <div class="col-md-2 p-1">  
            <div class="card border-0 text-center">  
                <img src="view/img/product10.webp" class="card-img-top" alt="Salvatore Ferragamo Signorina Libera">  
                <div class="card-body">  
                    <h6 class="card-title">Jean Paul Gaultier</h6>  
                    <p class="card-text">Jean Paul Gaultier Scandal Absolu Pour Femme</p>  
                    <p class="card-price color-red">3,880,000đ</p>  
                    <p>1 Sizers</p>  
                </div>  
            </div>  
        </div>
        <div class="col-md-2 p-1">  
            <div class="card border-0 text-center">  
                <img src="view/img/product11.webp" class="card-img-top" alt="Salvatore Ferragamo Signorina Libera">  
                <div class="card-body">  
                    <h6 class="card-title">Hugo Boss</h6>  
                    <span class="card-text">Hugo Boss Bottled Elixir</span>  
                    <p class="card-price color-red">2,880,000đ</p>  
                    <p>1 Sizers</p>  
                </div>  
            </div>  
        </div>  
        <div class="col-md-2 p-1">  
            <div class="card border-0 text-center">  
                <img src="view/img/product12.webp" class="card-img-top" alt="Salvatore Ferragamo Signorina Libera">  
                <div class="card-body">  
                    <h6 class="card-title">Jean Paul Gaultier</h6>  
                    <p class="card-text">Jean Paul Gaultier Le Beau Paradise Garden</p>  
                    <p class="card-price color-red">2,590,000đ - 3,380,000₫</p>  
                    <p>1 Sizers</p>  
                </div>  
            </div>  
        </div>
        <div class="col-md-2 p-1">  
            <div class="card border-0 text-center">  
                <img src="view/img/product14.webp" class="card-img-top" alt="Salvatore Ferragamo Signorina Libera">  
                <div class="card-body">  
                    <h6 class="card-title">Gucci</h6>  
                    <p class="card-text">Gucci Flora Gorgeous Magnolia</p>  
                    <p class="card-price color-red">1,880,000đ - 2,480,000₫</p>
                    <p>1 Sizers</p>  
                </div>  
            </div>  
        </div>
    </div>
<br>
<h4 class="d-flex justify-content-between align-items-center mx-4" style="font-weight:regular">  
    Bestellers
    <a href="#" class="mt-10 text-decoration-none"><p class="color-black">Xem thêm</p></a>  
    </h4>
    <div class="container-fluid">    
    <div class="row mx-6">  
        <!-- Card 1 -->  
        <div class="col-md-2 p-1">  
    <div class="card border-0 text-center">  
        <img src="view/img/product1.webp" class="card-img-top" alt="Salvatore Ferragamo Signorina Libera">   
        <div class="card-body">  
            <h6 class="card-title">Salvatore Ferragamo</h6>  
            <p class="card-text">Salvatore Ferragamo Signorina Libera</p>  
            <p class="card-price color-red">1,980,000đ - 2,150,000₫</p>  
            <p>1 Sizers</p>   
        </div>  
    </div>  
</div>  

        <!-- Card 2 -->  
        <div class="col-md-2 p-1">  
    <div class="card border-0 text-center hover-card">  
        <img src="view/img/product2.webp" class="card-img-top" alt="Salvatore Ferragamo Signorina Libera">  
        <div class="card-body">  
            <h6 class="card-title">Moschino</h6>  
            <p class="card-text">Moschino Toy 2 Bubble Gum</p>  
            <p class="card-price color-red">1,180,000đ - 1,850,000₫</p>  
            <p>1 Sizes</p>  
            <input type="button" value="Xem Nhanh" class="quick-view" /> <!-- Nút "Xem Nhanh" -->  
        </div>  
    </div>  
</div>

        <!-- Card 3 -->  
        <div class="col-md-2 p-1">  
            <div class="card border-0 text-center">  
                <img src="view/img/product3.webp" class="card-img-top" alt="Salvatore Ferragamo Signorina Libera">  
                <div class="card-body">  
                    <h6 class="card-title">Marc Jacobs</h6>  
                    <p class="card-text">Marc Jacobs Daisy Ever So Fresh</p>  
                    <p class="card-price color-red">1,580,000đ - 2,730,000₫</p>  
                    <p>1 Sizers</p>  
                </div>  
            </div>  
        </div>
        <div class="col-md-2 p-1">  
            <div class="card border-0 text-center">  
                <img src="view/img/product4.webp" class="card-img-top" alt="Salvatore Ferragamo Signorina Libera">  
                <div class="card-body">  
                    <h6 class="card-title">Issey Miyake</h6>  
                    <span class="card-text">Issey Miyake L’Eau d’Issey Pour Homme Eau & Cèdre</span>  
                    <p class="card-price color-red">1,870,000đ - 2,560,000₫</p>  
                    <p>1 Sizers</p>  
                </div>  
            </div>  
        </div>  
        <div class="col-md-2 p-1">  
            <div class="card border-0 text-center">  
                <img src="view/img/product5.webp" class="card-img-top" alt="Salvatore Ferragamo Signorina Libera">  
                <div class="card-body">  
                    <h6 class="card-title">Issey Miyake</h6>  
                    <p class="card-text">Issey Miyake L'eau D'Issey for Women</p>  
                    <p class="card-price color-red">1,880,000đ - 2,480,000₫</p>  
                    <p>1 Sizers</p>  
                </div>  
            </div>  
        </div>
        <div class="col-md-2 p-1">  
            <div class="card border-0 text-center">  
                <img src="view/img/product7.webp" class="card-img-top" alt="Salvatore Ferragamo Signorina Libera">  
                <div class="card-body">  
                    <h6 class="card-title">Gucci</h6>  
                    <p class="card-text">Gucci Guilty Black Pour Homme</p>  
                    <p class="card-price color-red">2,200,000đ - 2,680,000₫</p>  
                    <p>1 Sizers</p>  
                </div>  
            </div>  
        </div>
        
    </div>  
    <br>
    <div class="banner-container">  
    <a href=""><img src="view/img/banner-nu.webp" alt=""></a>  
    <a href=""><img src="view/img/banner-nam.webp" alt=""></a>  
    <a href=""><img src="view/img/banner-niche.webp" alt=""></a> 
</div>  
<div class="container-fluid mt-2 " style="padding: 0; background-color: #f4f4f4; ">  
    <div style="background-color: #f4f4f4 margin-top: 10px; padding: 40px 0;">    
    </div>  

    <div class="text-center" style="margin-top: 10px; margin-bottom: 60px; ">  
        <h2 style="font-family: 'Your Font', sans-serif; font-size: 32px; margin: 0;">Về namperfume</h2>  
    </div>  

    <div class="d-flex justify-content-around" style="margin-bottom: 40px;">  
    <div class="icon-container">  
        <div class="icon-circle">  
            <img src="view/img/icon-shop.svg" alt="Cửa hàng" style="width: 40px; height: 40px;">  
        </div>  
        <p style="margin: 10px 0; font-family: 'Your Font', sans-serif;">8 Cửa hàng toàn quốc</p>  
    </div>  
    <div class="icon-container">  
        <div class="icon-circle">  
            <img src="view/img/icon-chat.svg" alt="Tư vấn Online" style="width: 40px; height: 40px;">  
        </div>  
        <p style="margin: 10px 0; font-family: 'Your Font', sans-serif;">Tư vấn Online</p>  
    </div>  
    <div class="icon-container">  
        <div class="icon-circle">  
            <img src="view/img/icon-truck.svg" alt="Freeship" style="width: 40px; height: 40px;">  
        </div>  
        <p style="margin: 10px 0; font-family: 'Your Font', sans-serif;">Freeship toàn quốc</p>  
    </div>  
    <div class="icon-container">  
        <div class="icon-circle">  
            <img src="view/img/gift.svg" alt="Quà tặng" style="width: 40px; height: 40px;">  
        </div>  
        <p style="margin: 10px 0; font-family: 'Your Font', sans-serif;">Dịch Vụ Quà tặng</p>  
    </div>  
    <div class="icon-container">  
        <div class="icon-circle">  
            <img src="view/img/return.svg" alt="Đổi trả" style="width: 40px; height: 40px;">  
        </div>  
        <p style="margin: 10px 0; font-family: 'Your Font', sans-serif;">Đổi trả miễn phí</p>  
    </div>  
</div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>  

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script>
const myCarousel = document.querySelector('#carouselExampleControls1');
const carousel = new bootstrap.Carousel(myCarousel, {
  interval: 3000,
  touch: false, // Tắt chế độ kéo để ngừng ảnh hưởng toàn trang
});
</script> 