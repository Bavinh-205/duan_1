<?php 

    class Product {
        public $conn;
    
        public function __construct() {
            $this->conn = connectDB(); // Kết nối tới cơ sở dữ liệu
        }
    
        public function getAllProduct() {
            $sql = "SELECT * FROM `san_pham`"; // Truy vấn lấy tất cả sản phẩm
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC); // Lấy tất cả kết quả trả về dưới dạng mảng
            if (isset($file_img) && $file_img['error'] === UPLOAD_ERR_OK) {
                // Chọn thư mục lưu ảnh
                $target_dir = "uploads/user/";
                // Lấy tên hình ảnh
                $img_name = uniqid() . '_' . $file_img['name'];
                // Tạo đường dẫn đầy đủ để lưu vào CSDL
                $path_image = $target_dir . $img_name;
                // Tạo ảnh
                if (move_uploaded_file($file_img['tmp_name'], $path_image)) {
                    // Nếu mà tạo file ảnh thành công thì xóa ảnh cũ trong thư mục

                    if (file_exists($SanPham['hinh_anh'])) {
                        unlink($SanPham['hinh_anh']);
                    }
                }
            } else {
                $path_image = $SanPham['hinh_anh'];
            }
        }
        
    }
    