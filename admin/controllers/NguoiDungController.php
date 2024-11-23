<?php
class nguoiDungController
{
    // hmaf kết nối đến model
    public $modelNguoiDung;
    public function __construct()
    {
        $this->modelNguoiDung = new nguoiDung();
    }
    // hàm hiển thị danh sách
    public function index()
    {
        // lấy dữ liệu danh mục
        $nguoiDungs = $this->modelNguoiDung->getAllNguoiDung();
        // var_dump($nguoiDungs);
        require_once './views/nguoiDung/list_nguoi_dung.php';
    }

    // hàm hiển thị from thêm
    public function create()
    {
        require_once './views/nguoiDung/create_nguou_dung.php';
    }
    // hàm hiển thị thêm vào CSDL
    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ten_nguoi_dung = $_POST['ten_nguoi_dung'];
            $email = $_POST['email'];
            $sdt = $_POST['sdt'];
            $dia_chi = $_POST['dia_chi'];
            $pass = $_POST['pass'];
            $ngay_sinh = $_POST['ngay_sinh'];
            $gioi_tinh = $_POST['gioi_tinh'];
            $file_img = $_FILES['avatar'];
            $vai_tro = $_POST['vai_tro'];
            $trang_thai = $_POST['trang_thai'];
            // validate

            $errors = [];
            if (empty($ten_nguoi_dung)) {
                $errors['ten_nguoi_dung'] = 'không được bỏ trống';
            }


            if (empty($email)) {
                $errors['email'] = 'Email ko đc bỏ trống';
            } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = "Nhập sai định dạng email";
            }

            $regex = '/^(84|0[3|5|7|8|9])[0-9]{8}$/';

            //    if (empty($sdt)) {
            //     $error['sdt'] = "không được bỏ trống";
            // } else if (!preg_match($regex, $sdt)) {
            //     $error['sdt'] = "Nhập sai định dạng số điện thoại";
            // }

            if (empty($sdt)) {
                $errors['sdt'] = 'không được bỏ trống';
            } else if (!preg_match($regex, $sdt)) {
                $errors['sdt'] = 'Số Điện Thoại Sai Định Dạng';
            }


            if (empty($dia_chi)) {
                $errors['dia_chi'] = 'không được bỏ trống';
            }

            if (empty($pass)) {
                $errors['pass'] = 'không được bỏ trống';
            }
            $dayHienTai = date("Y-m-d"); // Lấy ngày hiện tại theo định dạng 'Y-m-d'

            if (empty($ngay_sinh)) {
                $errors['ngay_sinh'] = 'Ngày sinh không được bỏ trống';
            } else {
                // Kiểm tra nếu ngày sinh không đúng định dạng (Y-m-d)
                $dateRegex = '/^\d{4}-\d{2}-\d{2}$/';
                if (!preg_match($dateRegex, $ngay_sinh)) {
                    $errors['ngay_sinh'] = 'Ngày sinh phải đúng định dạng YYYY-MM-DD';
                } else if ($ngay_sinh > $dayHienTai) {
                    // Kiểm tra nếu ngày sinh là ngày trong tương lai
                    $errors['ngay_sinh'] = 'Ngày sinh không được là ngày trong tương lai';
                }
            }






            // Xử lý hình ảnh
            if (isset($file_img)) {
                // Chọn thư mục lưu ảnh
                $target_dir = "uploads/user/";
                // Lấy tên hình ảnh
                $img_name = uniqid() . '_' . $file_img['name'];
                // Tạo đường dẫn đầy đủ để lưu vào CSDL
                $path_image = $target_dir . $img_name;
                // Tạo ảnh
                move_uploaded_file($file_img['tmp_name'], $path_image);
            }

            // thêm dữ liệu 
            if (empty($errors)) {
                // ko có lỗi thì thêm dữ liệu
                $this->modelNguoiDung->postData($ten_nguoi_dung, $email, $sdt, $dia_chi, $pass, $ngay_sinh, $gioi_tinh, $path_image, $vai_tro, $trang_thai);
                unset($_SESSION['errors']);
                header('location:?act=nguoi-dung');
                exit();
            } else {
                $_SESSION['errors'] = $errors;
                header('location:?act=from-them-nguoi-dung');
                exit();
            }
        }
    }
    // hàm hiển thị from sửa
    public function edit()
    {
        // lấy thông tin chi tiết của danh mục
        $id = $_GET['danh_muc_id'];
        $nguoiDungs = $this->modelNguoiDung->getDetaiData($id);
        // var_dump($nguoiDungs);
        // đổ dữ liệu ra form
        require_once './views/nguoiDung/edit_nguoi_dung.php';
    }
    // hàm xửa lý thêm vào CSDL
    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $ten_nguoi_dung = $_POST['ten_nguoi_dung'];
            $email = $_POST['email'];
            $sdt = $_POST['sdt'];
            $dia_chi = $_POST['dia_chi'];
            $pass = $_POST['pass'];
            $ngay_sinh = $_POST['ngay_sinh'];
            $gioi_tinh = $_POST['gioi_tinh'];
            // var_dump($gioi_tinh);die();
            $file_img = $_FILES['avatar'];
            $vai_tro = $_POST['vai_tro'];
            $trang_thai = $_POST['trang_thai'];

            // validate
            $errors = [];
            if (empty($ten_nguoi_dung)) {
                $errors['ten_nguoi_dung'] = 'không được bỏ trống';
            }


            if (empty($email)) {
                $errors['email'] = 'Email ko đc bỏ trống';
            } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = "Nhập sai định dạng email";
            }

            $regex = '/^(84|0[3|5|7|8|9])[0-9]{8}$/';

            //    if (empty($sdt)) {
            //     $error['sdt'] = "không được bỏ trống";
            // } else if (!preg_match($regex, $sdt)) {
            //     $error['sdt'] = "Nhập sai định dạng số điện thoại";
            // }

            if (empty($sdt)) {
                $errors['sdt'] = 'không được bỏ trống';
            } else if (!preg_match($regex, $sdt)) {
                $errors['sdt'] = 'Số Điện Thoại Sai Định Dạng';
            }


            if (empty($dia_chi)) {
                $errors['dia_chi'] = 'không được bỏ trống';
            }

            if (empty($pass)) {
                $errors['pass'] = 'không được bỏ trống';
            }
            $dayHienTai = date("Y-m-d"); // Lấy ngày hiện tại theo định dạng 'Y-m-d'

            if (empty($ngay_sinh)) {
                $errors['ngay_sinh'] = 'Ngày sinh không được bỏ trống';
            } else {
                // Kiểm tra nếu ngày sinh không đúng định dạng (Y-m-d)
                $dateRegex = '/^\d{4}-\d{2}-\d{2}$/';
                if (!preg_match($dateRegex, $ngay_sinh)) {
                    $errors['ngay_sinh'] = 'Ngày sinh phải đúng định dạng YYYY-MM-DD';
                } else if ($ngay_sinh > $dayHienTai) {
                    // Kiểm tra nếu ngày sinh là ngày trong tương lai
                    $errors['ngay_sinh'] = 'Ngày sinh không được là ngày trong tương lai';
                }
            }


            $nguoiDungs = $this->modelNguoiDung->getDetaiData($id);


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

                    if (file_exists($nguoiDungs['avatar'])) {
                        unlink($nguoiDungs['avatar']);
                    }
                }
            } else {
                $path_image = $nguoiDungs['avatar'];
            }
            // thêm dữ liệu 
            if (empty($errors)) {
                // ko có lỗi thì thêm dữ liệu
                $this->modelNguoiDung->UpdateData($id, $ten_nguoi_dung, $email, $sdt, $dia_chi, $pass, $ngay_sinh, $gioi_tinh, $path_image, $vai_tro, $trang_thai);
                unset($_SESSION['errors']);
                header('location:?act=nguoi-dung');
                exit();
            } else {
                $_SESSION['errors'] = $errors;
                header('location:?act=form-sua-nguoi-dung');
                exit();
            }
        }
    }
    // hàm xóa dữ liệu
    public function destroy()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['danh_muc_id'];
            // var_dump($id);

            // xóa danh mục
            $this->modelNguoiDung->deleteData($id);
            header('location:?act=nguoi-dung');
            exit();
        }
    }
}
