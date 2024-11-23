<?php

class BannerController {
    // Model instance
    public $modelBanner;

    public function __construct() {
        $this->modelBanner = new Banner();
    }

    // Display the list of banners
    public function index() {
        // Fetch banner data
        $banners = $this->modelBanner->getAll();
        // var_dump($banners);die();
        require_once './views/banner/list_banner.php';
    }

    // Display form for adding a new banner
    public function create() {
        require_once './views/banner/them_banner.php';
    }

    // Process the addition of a new banner to the database
    public function store() {
    
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $tieu_de = $_POST['tieu_de'];
            $hinh_anh = $_FILES['hinh_anh'];
            $trang_thai = $_POST['trang_thai'];
    
            // Validation
            $errors = [];
            if (empty($tieu_de)) {
                $errors['tieu_de'] = 'Title is required';
            }
            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Status is required';
            }
            if (empty($hinh_anh['name'])) {
                $errors['hinh_anh'] = 'Image is required';
            }
    
            // Xử lý hình ảnh
            $path_image = null;
            if ($hinh_anh['error'] == 0) {
                $target_dir = "uploads/user/";
                $img_name = uniqid() . '_' . basename($hinh_anh['name']);
                $path_image = $target_dir . $img_name;
    
                if (!move_uploaded_file($hinh_anh['tmp_name'], $path_image)) {
                    $errors['hinh_anh'] = 'Failed to upload image';
                }
            }
    
            // Add data if no errors
            if (empty($errors)) {
                $this->modelBanner->postData($tieu_de, $path_image, $trang_thai);
                unset($_SESSION['errors']);
                header('location:?act=banner');
                exit();
            } else {
                $_SESSION['errors'] = $errors;
                header('location:?act=form-add-banner');
                exit();
            }
        }
    }
    

    // Display form for editing a banner
    public function edit(){
        
        $id=$_GET['banner_id'];
        $banner = $this->modelBanner->getDetaiData($id);
       
        // đổ dữ liệu ra form
        require_once './views/banner/editBanner.php';
      }

    // Process banner update in the database
    public function update() {
    
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'] ?? '';
            $bannerOld = $this->modelBanner->getDetaiData($id);
            $old_file = $bannerOld['hinh_anh'];
    
            $tieu_de = $_POST['tieu_de'] ?? '';
            $hinh_anh = $_FILES['hinh_anh'] ?? null;
            $trang_thai = $_POST['trang_thai'] ?? '';
    
            // Validation
            $errors = [];
            if (empty($tieu_de)) {
                $errors['tieu_de'] = 'Title is required';
            }
            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Status is required';
            }
    
            // Xử lý hình ảnh
            $path_image = $old_file; // Mặc định là ảnh cũ
            if ($hinh_anh && $hinh_anh['error'] === UPLOAD_ERR_OK) {
                $target_dir = "uploads/user/";
                $img_name = uniqid() . '_' . basename($hinh_anh['name']);
                $path_image = $target_dir . $img_name;
    
                if (move_uploaded_file($hinh_anh['tmp_name'], $path_image)) {
                    // Xóa file ảnh cũ nếu có
                    if (file_exists($old_file)) {
                        unlink($old_file);
                    }
                } else {
                    $errors['hinh_anh'] = 'Failed to upload new image';
                }
            }
    
            // Update data if no errors
            if (empty($errors)) {
                $this->modelBanner->updateData($id, $tieu_de, $path_image, $trang_thai);
                unset($_SESSION['errors']);
                header('location:?act=banner');
                exit();
            } else {
                $_SESSION['errors'] = $errors;
                header("location:?act=form-sua-banner&banner_id=$id");
                exit();
            }
        }
    }
    

    // Delete a banner
    public function destroy() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['banner_id'];
            $this->modelBanner->deleteData($id);
            header('location:?act=banner');
            exit();
        }
    }
    // public function destroy() {
    //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //         $id = $_POST['banner_id'];
           
    
          
    //         // Thực hiện xóa và kiểm tra
    //         $deleteSuccess = $this->modelBanner->deleteData($id); // Giả định hàm deleteData trả về true nếu xóa thành công
            
    //         if ($deleteSuccess) {
    //             header('location:?act=banner'); // Chuyển hướng về danh sách banner sau khi xóa thành công
    //             exit();
    //         } else {
    //             echo "Có lỗi xảy ra trong quá trình xóa.";
    //             exit();
    //         }
    //     }
    // }
}
?>
