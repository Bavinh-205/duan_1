<style>
  .product-title {
            font-size: 24px;
            font-weight: bold;
            margin-left:390px; 
        }

        .rating {
            color: #ffcc00;
            font-size: 18px;
        }
        .btn-size-group {
    display: flex; /* Đặt các nút trong hàng ngang */
    gap: 10px; /* Khoảng cách giữa các nút */
}
        .btn-size {
    margin: 0; /* Xóa margin mặc định */
    padding: 8px 12px; /* Điều chỉnh kích thước */
    font-size: 14px; /* Giảm kích thước chữ */
    width: auto; /* Tự động điều chỉnh chiều rộng */
    text-align: center;
}

        .btn-size.active {
    border-color: red;
    color: white;
    background-color: red;
}

        .price-section {
    background-color: #fff5f5; /* Màu nền nhạt */
    border: 1px solid #f8d7da; /* Đường viền đỏ nhạt */
    padding: 20px; /* Khoảng cách bên trong */
    text-align: center; /* Canh giữa nội dung */
    font-size: 18px; /* Tăng kích thước chữ */
    border-radius: 8px; /* Bo góc */
    max-width: 600px; /* Giới hạn chiều rộng */
    margin: 0 auto; /* Canh giữa */
        }
        .img-product {
    border: 1px solid #f8d7da;
    border-radius: 2px;
    margin-right: 5px; /* Thêm khoảng cách giữa các ảnh nhỏ */
}

.product-images {
    display: flex;
    gap: 10px; /* Khoảng cách giữa các ảnh nhỏ */
    flex-wrap: wrap; /* Cho phép các ảnh nhỏ xuống dòng khi hết chỗ */
}
.deal-info {
    flex: 1; /* Chiếm toàn bộ chiều rộng còn lại nếu cần */
    max-width: 60%; /* Đặt giới hạn chiều rộng */
}
.button-actions {
    display: flex; /* Giữ các nút nằm trong một hàng hoặc cột */
    flex-direction: column; /* Đặt các nút theo chiều dọc */
    gap: 10px; /* Khoảng cách giữa các nút */
}
.price-section p {
    font-weight: bold;
    color: #e60000; /* Màu đỏ đậm */
}


.price {
    font-size: 25px; 
    font-weight: bold;
    color: red;
    margin-top: 5px 10px;
    text-algin: center;
}

.old-price {
    font-size: 20px; /* Tăng kích thước giá cũ */
    text-decoration: line-through;
    color: #888;
    margin-left: 10px;
}

        .discount {
    font-size: 16px; /* Tăng kích thước chữ giảm giá */
    color: #28a745;
    margin-top: 10px;
}

        .order-info {
            margin-top: 20px;
        }

        .order-info p {
            margin: 0;
            font-size: 14px;
        }

        .btn-buy {
    width: 100%;
    margin-bottom: 10px;
    padding: 15px;
    font-size: 18px;
}

        .btn-add-to-cart {
    background-color: #28a745;
    color: white;
    border: none;
    border-radius: 5px;
}
        .btn-add-to-cart:hover {
    background-color: #218838;
}
        .btn-buy-now {
    background-color: #ffc107;
    color: black;
    border: none;
    border-radius: 5px;
}
        .btn-buy-now:hover {
    background-color: #e0a800;
}

.product-details {
  display: grid;
  grid-template-columns: 1fr 5fr; /* 1 phần cho text và 2 phần cho giá trị */
  gap: 10px; /* Khoảng cách giữa các phần tử */
}

.product-details p {
  display: contents; /* Các phần tử <p> không chiếm không gian riêng biệt */
}

.product-details span {
  text-align: left; /* Đảm bảo các span được căn trái */
}
.procut-text p {
  margin: 0; /* Loại bỏ margin mặc định của p */
}
.rating-container {  
    font-family: Arial, sans-serif;  
    width: 300px;  
    margin: 20px;  
}  

.rating-container {  
    font-family: Arial, sans-serif;  
    width: 600px; /* Đặt chiều rộng cho 2 cột */  
    display: flex;  
    align-items: flex-start;  
    margin-left:100px;  
}  

.rating {  
    flex: 1; /* Cột đầu tiên chiếm không gian */  
    text-align: center;  
}  

.stars {  
    display: flex;  
    justify-content: center;  
    margin-bottom: 10px;  
}  

.star {  
    width: 20px;  
    height: 20px;  
    background-color: #e0e0e0;  
    clip-path: polygon(50% 0%, 63% 35%, 98% 35%, 72% 57%, 79% 91%, 50% 70%, 21% 91%, 28% 57%, 2% 35%, 37% 35%);  
    margin: 0 2px;  
}  

.star.filled {  
    background-color: #ffc107; /* Màu vàng cho sao đã đánh giá */  
}  

.average {  
    font-size: 24px;  
    font-weight: bold;  
}  

.reviews {  
    font-size: 14px;  
    color: #666;  
}  

.divider {  
    width: 1px; /* Chiều rộng của gạch dọc */  
    background-color: #ccc; /* Màu sắc của gạch dọc */  
    height: auto; /* Chiều cao tự động để phù hợp với nội dung */  
    margin: 0 20px; /* Khoảng cách giữa 2 cột */  
}  

.percentage {  
    flex: 1; /* Cột thứ hai chiếm không gian */  
    margin-left: 20px; /* Khoảng cách bên trái để không dính vào gạch dọc */  
}  

.rate {  
    display: flex;  
    align-items: center;  
    margin-bottom: 5px;  
}  

.number {  
    width: 20px;  
}  

.bar {  
    flex-grow: 1;  
    background-color: #e0e0e0;  
    height: 10px;  
    border-radius: 5px;  
    margin: 0 10px;  
}  

.filled {  
    background-color: #4caf50; /* Màu xanh cho tỷ lệ */  
    height: 100%;  
    border-radius: 5px;  
}  

.percent {  
    width: 40px; /* Đảm bảo chiều rộng cho phần trăm */  
    text-align: left;  
}
    </style>
    <p style="margin-left:80px;">Trang Chủ | Nước Hoa Nữ | Salvatore Ferragamo Signorina Libera</p>
    <div class="container my-4">
        <div class="product-title">Salvatore Ferragamo Signorina Libera</div>
        <div class="row mt-4">
            <!-- Hình ảnh sản phẩm -->
            <div class="col-md-6">
                <img style="width:390px;height:390px" src="view/img/product1.webp" alt="Salvatore Ferragamo Signorina Libera" class="img-fluid">
                <div class="product-images">
                    <img style="width:100px;height:100px" src="view/img/product-ct-1.webp" alt="" class="img-product">
                    <img style="width:100px;height:100px" src="view/img/product-ct-2.webp" alt="" class="img-product">
                    <img style="width:100px;height:100px" src="view/img/product-ct-3.webp" alt="" class="img-product">
                </div>
        </div>


            <!-- Thông tin sản phẩm -->
            <div class="col-md-6 my-2">
                <div>
                    <span class="rating">⭐⭐⭐⭐☆</span> <span>(54 đánh giá)</span>
                </div>
                <p><strong>Thương hiệu:</strong> Salvatore Ferragamo</p>
                <p><strong>Loại sản phẩm:</strong> Eau de Parfum 100ml</p>
                <p><strong>Tình trạng:</strong> Sản phẩm mới</p>

                <h5 class="mt-3">Standard Size:</h5>
                    <div class="btn-size-group">
                        <button class="btn btn-size active">Eau de Parfum 100ml</button>
                        <button class="btn btn-size">Eau de Parfum 30ml</button>
                    </div>
                <h5 class="mt-3">Mini Size:</h5>
                <button class="btn btn-size">Eau de Parfum 5ml</button>
            </div>
        </div>

        <!-- Giá sản phẩm -->
        <div class="row mt-4">
    <div class="col-md-12 ml-4">
        <div class="price-section">
            <div class="deal-info">
                <p>DEAL THƠM:</p>
                <div class="my-2 mx-2">
                    <span class="price">1,935,000đ</span>
                </div>
                <div class="discount mx-2">
                    <hr>
                    <p>Giảm thêm 10%</p>
<p style="white-space: nowrap;">
  Nhập mã: <strong>DEALTHOM10</strong>
</p>
                </div>
            </div>
            <div class="button-actions">
                <button class="btn btn-buy btn-add-to-cart">Thêm vào giỏ hàng</button>
                <button class="btn btn-buy btn-buy-now">Mua ngay</button>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt-2">
    <h4>Chi tiết sản phẩm</h4>
    <hr>
    <div class="product-details">
  <p>Mã hàng <span>110100204068</span></p>
  <p>Thương Hiệu <span class="text-primary">Salvatore Ferragamo</span></p>
  <p>Xuất Xứ <span class="text-danger">Italia</span></p>
  <p>Nhóm hương <span>
  Hương cam bergamot, Ambroxan, Quả lê</span></p>
  <p>Phong cách <span>Nhẹ nhàng, Nữ tính, Thanh lịch</span></p>
</div>
<div class="procut-text mt-4">
    <p>Hương đầu: Cam bergamot, Quả lê, Nhựa cây</p>
    <p>Hương giữa: Rễ cây diên vĩ, Quả mận, Hoa hồng</p>
    <p>Hương đầu: Cam bergamot, Quả lê, Nhựa cây</p>
</div>
<div class="product-text1 mt-4">
    <p>Salvatore Ferragamo Signorina Libera là một thứ hương có thể làm một ngày của bạn trôi qua dễ dàng hơn. 
        Vì sao tôi lại nói thế? Trước khi miêu tả rõ ràng hơn hương thơm của Signorina Libera, 
        tôi phải nói với bạn rằng tính cách của cô nàng cũng rực sáng như màu sắc mà cô mang vậy!</p>
</div>
<div class="product-text1 mt-4">
    <p>
    Ngay từ giây phút đầu, thật khó để chỉ mặt điểm tên rõ ràng từng nốt hương. 
    Tôi chỉ biết khi ấy Signorina Libera có cái thanh ngọt, tươi mới của Quả lê. 
    Dù nét hương ấy không ngọt ngào như Quả vải hay Mâm xôi, thế nhưng lại mọng nước không kém cạnh, 
    và chắc chắn rằng nếu có ai vô tình ngửi thấy mùi hương ấy cũng sẽ xiêu lòng không ít.
    </p>
</div>
<div class="product-text1 mt-4">
    <p>
    Mãi về sau khi đã yên vị trên làn da, Signorina Libera mới trầm mình xuống, 
    nét hương đỏng đảnh của Lê ban đầu giờ hóa dày dặn hơn với Quả mận với chút chua thanh và giòn ngọt đáng yêu. 
    Và chỉ khi bạn kiên nhẫn chờ đến cuối cùng, Signorina Libera mới ngát một hương Hoa hồng, tươi tắn và đầy đam mê. 
    Nhìn chung, Signorina Libera mang mùi hương y hệt một cô gái tuổi đôi mươi, lúc nào cũng rạng rỡ mà lại không hề kém phần sâu sắc.
    </p>
</div>
</div>
<div class="container-fluid mt-4">
    <h4>Sản Phẩm Liên Quan</h4>
</div>
<div class="container-fluid mt-4">
    <h4>Bình Luận</h4>
    <hr>
    <p class="text-primary">Đặt câu hỏi</p>
    <div class="product-details">
    <p>Hỏi: <span>có mẫu thử ko shop ơi ? nhìn chai đẹp quá ạ</span></p>
    <p>Đáp: <span class="text-primary">Chào bạn nhé, Hiện tại hệ thống namperfume chưa có mẫu thử của sản phẩm Zaharoff Signature Seraphim Blue bạn nè</span></p>
     <p>Hỏi:<span">mình muốn mua chai nắp màu cam như ảnh luôn đc ko shop chứ của mình màu trắng nhìn đơn giản quá à</span></p>
     <p>Xem Thêm</p>
    </div>
</div>
<div class="container-fluid mt-4">
    <h4>Đánh giá và nhận xét (54)</h4>
    <p class="text-success">Viết đánh giá</p>
    <div class="rating-container mx-4">  
    <div class="rating">  
        <div class="stars">  
            <div class="star filled"></div>  
            <div class="star filled"></div>  
            <div class="star filled"></div>  
            <div class="star filled"></div>  
            <div class="star filled"></div>  
        </div>  
        <div class="average">4.9</div>  
        <div class="reviews">54 lượt đánh giá</div>  
    </div>  
    <div class="divider"></div>  
    <div class="percentage">  
        <div class="rate">  
            <span class="number">5</span>  
            <div class="bar">  
                <div class="filled" style="width: 91%;"></div>  
            </div>  
            <span class="percent">91%</span>  
        </div>  
        <div class="rate">  
            <span class="number">4</span>  
            <div class="bar">  
                <div class="filled" style="width: 9%;"></div>  
            </div>  
            <span class="percent">9%</span>  
        </div>  
        <div class="rate">  
            <span class="number">3</span>  
            <div class="bar">  
                <div class="filled" style="width: 0%;"></div>  
            </div>  
            <span class="percent">0%</span>  
        </div>  
        <div class="rate">  
            <span class="number">2</span>  
            <div class="bar">  
                <div class="filled" style="width: 0%;"></div>  
            </div>  
            <span class="percent">0%</span>  
        </div>  
        <div class="rate">  
            <span class="number">1</span>  
            <div class="bar">  
                <div class="filled" style="width: 0%;"></div>  
            </div>  
            <span class="percent">0%</span>  
        </div>  
    </div>  
</div>
</div>
</div>