<style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        html, body {
            margin: 0;
            padding: 0;
            width: 100%;
            cursor: url('view/img/logo.svg'), auto;
        }
        .footer {
            background-color: #333;
            color: #fff;
            width: 100%;
            padding: 20px 0;
        }
        .container {
            width: 100%;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }
        .footer .column {
            flex: 1;
            min-width: 200px;
            margin: 10px 20px;
        }
        .footer h3 {
            font-size: 18px;
            margin-bottom: 10px;
        }
        .footer ul {
            list-style: none;
        }
        .footer ul li {
            margin: 5px 0;
        }
        .footer ul li a {
            text-decoration: none;
            color: #fff;
            font-size: 14px;
        }
        .footer ul li a:hover {
            text-decoration: underline;
        }
        .footer .payment-icons img {
            height: 30px;
            margin-right: 10px;
        }
        .footer .subscribe input[type="email"] {
            padding: 8px;
            margin-right: 10px;
            border: none;
            border-radius: 5px;
        }
        .footer .subscribe button {
            padding: 8px 15px;
            background-color: #555;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .footer .subscribe button:hover {
            background-color: #777;
        }
        .footer .bottom-text {
            font-size: 12px;
            margin-top: 20px;
            text-align: center;
        }
        .fixed-icons {
            position: fixed;
            bottom: 20px; /* Khoảng cách từ đáy trang */
            right: 20px; /* Khoảng cách từ bên phải */
            z-index: 9999; /* Đảm bảo biểu tượng luôn nằm trên các phần tử khác */
        }

        .fixed-icons a {
            display: block;
            margin-bottom: 10px;
        }

        /* Định dạng icon Messenger */
        .fixed-icons .messenger-icon {
            font-size: 40px;
            color: #0084ff;
        }

        /* Định dạng icon Zalo */

        .fixed-icons .zalo-icon img {
            width: 60px;
            height: 60px;
            animation: bounce 1s infinite; /* Áp dụng hiệu ứng "đập" */
        }
        @keyframes bounce {
            0% {
                transform: scale(1); /* Kích thước ban đầu */
            }
            50% {
                transform: scale(1.2); /* Phóng to */
            }
            100% {
                transform: scale(1); /* Quay lại kích thước ban đầu */
            }
        }
        #scrollToTopBtn {  
    position: fixed;  
    bottom: 20px;  
    left: 3px; /* Giữ vị trí ở góc dưới bên trái */  
    display: none;  
    background-color: #ff0000; /* Màu nền đỏ */  
    color: white;  
    border: none;  
    border-radius: 10px; /* Bo góc lớn hơn */  
    width: 70px; /* Chiều rộng */  
    height: 70px; /* Chiều cao để đủ chỗ cho chữ */  
    cursor: pointer;  
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.3);  
    font-size: 16px; /* Kích thước chữ */  
    text-align: center;  
    line-height: 1.2; /* Căn giữa chữ theo chiều dọc */  
    z-index: 1000;  
}  

.arrow-up {  
    display: inline-block;  
    width: 0; /* Chiều rộng */  
    height: 0; /* Chiều cao */  
    border-left: 0.35em solid transparent;  
    border-right: 0.35em solid transparent;  
    border-bottom: 0.6em solid white; /* Màu của mũi tên */  
    margin-bottom: 5px; /* Khoảng cách dưới mũi tên */  
}  

#scrollToTopBtn:hover {  
    background-color: #ff8fab; /* Màu nền khi hover */  
}

    </style>
    <footer class="footer">
        <div class="container">
            <div class="column">
                <h3>Namperfume</h3>
                <ul>
                    <li><a href="#">Giới Thiệu</a></li>
                    <li><a href="#">Liên Hệ</a></li>
                    <li><a href="#">Tuyển Dụng</a></li>
                </ul>
            </div>
            <div class="column">
                <h3>Hỗ Trợ</h3>
                <ul>
                    <li><a href="#">Các câu hỏi thường gặp</a></li>
                    <li><a href="#">Hướng dẫn đặt hàng</a></li>
                    <li><a href="#">Phương thức vận chuyển</a></li>
                    <li><a href="#">Phương thức thanh toán</a></li>
                    <li><a href="#">Theo dõi đơn hàng</a></li>
                </ul>
            </div>
            <div class="column">
                <h3>Phương thức thanh toán</h3>
                <div class="payment-icons">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/a/a4/Visa_2021.svg" alt="Visa">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/b/bc/Apple_Pay_logo.svg" alt="Apple Pay">
                </div>
            </div>
            <div class="column">
                <h3>Theo dõi chúng tôi</h3>
                <ul>
                    <li><a href="#">Instagram</a></li>
                    <li><a href="#">Facebook</a></li>
                    <li><a href="#">Youtube</a></li>
                    <li><a href="#">Tiktok</a></li>
                </ul>
                <div class="subscribe">
                    <p>Đăng ký thông báo và nhận tin:</p>
                    <input type="email" placeholder="Nhập email của bạn">
                    <button>Gửi</button>
                </div>
            </div>
        </div>
        <div class="bottom-text">
            <p>Copyright 2013-2024 © namperfume. All Rights Reserved.</p>
            <p>Địa chỉ: Tầng 7, 19A Cộng Hòa, Tòa Nhà Scetpa, Quận Tân Bình, TP. Hồ Chí Minh</p>
        </div>
    </footer>
    <div class="fixed-icons">
        <!-- Messenger Icon -->
        <a href="https://m.me/yourprofile" target="_blank">
            <i class="fab fa-facebook-messenger messenger-icon"></i>
        </a>

        <!-- Zalo Icon -->
        <a href="https://zalo.me/yourzaloid" target="_blank" class="zalo-icon">
            <img src="view/img/chat-new.webp" alt="Zalo Logo">
        </a>
        <a href="https://zalo.me/yourzaloid" target="_blank" class="zalo-icon">
            <img src="view/img/icon_zalo1.webp" alt="Zalo Logo">
        </a>
    </div>
    <button class="mx-2" id="scrollToTopBtn">  
    <span class="arrow-up"></span> <br>Lên đầu  
</button>   
</div>
    <script>
        const scrollToTopBtn = document.getElementById("scrollToTopBtn");

window.onscroll = () => {
    // Hiển thị nút khi cuộn xuống
    if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) {
        scrollToTopBtn.style.display = "block";
    } else {
        scrollToTopBtn.style.display = "none";
    }
};

scrollToTopBtn.onclick = () => {
    // Cuộn mượt về đầu trang
    window.scrollTo({
        top: 0,
        behavior: "smooth"
    });
};
    </script>
</body>
</html>