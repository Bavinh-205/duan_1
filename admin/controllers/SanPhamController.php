<?php
class SanPhamController
{
    // hmaf kết nối đến model
    public $modelSanPham;
    public $modeleDanhMuc;
    public function __construct()
    {
        $this->modelSanPham = new SanPham();
        $this->modeleDanhMuc = new danhMuc();
    }
    // hàm hiển thị danh sách
    public function index()
    {
        // lấy dữ liệu danh mục
        $SanPham = $this->modelSanPham->getAll();
        require_once './views/sanPham/list_san_pham.php';
    }

    // hàm hiển thị from thêm
    public function create()
    {
        $danhMucs = $this->modeleDanhMuc->getAllDanhMuc();
        // var_dump($danhMucs); die();
        require_once './views/sanPham/create_san_pham.php';
    }
    // hàm hiển thị thêm vào CSDL
    // hàm hiển thị thêm vào CSDL
    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ma_san_pham = $_POST['ma_san_pham'];
            $ten_san_pham = $_POST['ten_san_pham'];
            $file_img = $_FILES['hinh_anh'];
            $gia_nhap = $_POST['gia_nhap'];
            $gia_ban = $_POST['gia_ban'];
            $gia_khuyen_mai = $_POST['gia_khuyen_mai'];
            $ngay_nhap = $_POST['ngay_nhap'];
            $so_luong = $_POST['so_luong'];
            $luot_xem = $_POST['luot_xem'];
            $mo_ta = $_POST['mo_ta'];

            $mo_ta_chi_tiet = $_POST['mo_ta_chi_tiet'];
            $danh_muc_id = $_POST['danh_muc_id'];
            $trang_thai = $_POST['trang_thai'];

            // validate
            $errors = [];
            if (empty($ma_san_pham)) {
                $errors['ma_san_pham'] = 'không được bỏ trống';
            }


            if (empty($ten_san_pham)) {
                $errors['ten_san_pham'] = 'không được bỏ trống';
            }



            if (empty($gia_nhap)) {
                $errors['gia_nhap'] = 'không được bỏ trống';
            }



            if (empty($gia_ban)) {
                $errors['gia_ban'] = 'không được bỏ trống';
            } else if ($gia_ban < $gia_nhap) {
                $errors['gia_ban'] = 'Giá bán Không Đc lớn HƠn gIÁ Nhập';
            }


            if (empty($gia_khuyen_mai)) {
                $errors['gia_khuyen_mai'] = 'không được bỏ trống';
            } else if ($gia_khuyen_mai > $gia_ban) {
                $errors['gia_khuyen_mai'] = 'Giá Khuyến Mãi Không Được Lớn Hơn Giá Bán';
            }

            if (empty($ngay_nhap)) {
                $errors['ngay_nhap'] = 'không được bỏ trống';
            }

            if (empty($so_luong)) {
                $errors['so_luong'] = 'không được bỏ trống';
            } else if ($so_luong < 0) {
                $errors['so_luong'] = 'không được bé hơn 0';
            }

            if (empty($mo_ta)) {
                $errors['mo_ta'] = 'không được bỏ trống';
            }


            if (empty($mo_ta_chi_tiet)) {
                $errors['mo_ta_chi_tiet'] = 'không được bỏ trống';
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
                $this->modelSanPham->postData($ma_san_pham, $ten_san_pham, $path_image, $gia_nhap, $gia_ban, $gia_khuyen_mai, $ngay_nhap, $so_luong, $luot_xem, $mo_ta, $mo_ta_chi_tiet, $danh_muc_id, $trang_thai);
                // var_dump($ma_san_pham, $ten_san_pham, $path_image, $gia_nhap, $gia_ban, $gia_khuyen_mai, $luot_xem, $mo_ta, $mo_ta_chi_tiet, $trang_thai);
                // die();

                unset($_SESSION['errors']);
                header('location:?act=san-pham');
                exit();
            } else {
                $_SESSION['errors'] = $errors;
                header('location:?act=from-them-san-pham');
                exit();
            }
        }
    }
    // hàm hiển thị from sửa
    public function edit()
    {
        // lấy thông tin chi tiết của danh mục
        $id = $_GET['danh_muc_id'];
        $SanPham = $this->modelSanPham->getDetaiData($id);
        $danhMucs = $this->modeleDanhMuc->getAllDanhMuc();
        // var_dump($SanPham);
        // đổ dữ liệu ra form
        require_once './views/sanPham/edit_san_pham.php';
    }
    // hàm xửa lý thêm vào CSDL
    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $ma_san_pham = $_POST['ma_san_pham'];
            $ten_san_pham = $_POST['ten_san_pham'];
            $file_img = $_FILES['hinh_anh'];
            $gia_nhap = $_POST['gia_nhap'];
            $gia_ban = $_POST['gia_ban'];
            $gia_khuyen_mai = $_POST['gia_khuyen_mai'];
            $ngay_nhap = $_POST['ngay_nhap'];
            $so_luong = $_POST['so_luong'];
            $luot_xem = $_POST['luot_xem'];
            $mo_ta = $_POST['mo_ta'];

            $mo_ta_chi_tiet = $_POST['mo_ta_chi_tiet'];
            $danh_muc_id = $_POST['danh_muc_id'];
            $trang_thai = $_POST['trang_thai'];

            // validate
            $errors = [];
            if (empty($ma_san_pham)) {
                $errors['ma_san_pham'] = 'không được bỏ trống';
            }


            if (empty($ten_san_pham)) {
                $errors['ten_san_pham'] = 'không được bỏ trống';
            }



            if (empty($gia_nhap)) {
                $errors['gia_nhap'] = 'không được bỏ trống';
            }



            if (empty($gia_ban)) {
                $errors['gia_ban'] = 'không được bỏ trống';
            } else if ($gia_ban < $gia_nhap) {
                $errors['gia_ban'] = 'Giá bán Không Đc lớn HƠn gIÁ Nhập';
            }


            if (empty($gia_khuyen_mai)) {
                $errors['gia_khuyen_mai'] = 'không được bỏ trống';
            } else if ($gia_khuyen_mai > $gia_ban) {
                $errors['gia_khuyen_mai'] = 'Giá Khuyến Mãi Không Được Lớn Hơn Giá Bán';
            }

            if (empty($ngay_nhap)) {
                $errors['ngay_nhap'] = 'không được bỏ trống';
            }

            if (empty($so_luong)) {
                $errors['so_luong'] = 'không được bỏ trống';
            } else if ($so_luong < 0) {
                $errors['so_luong'] = 'không được bé hơn 0';
            }

            if (empty($mo_ta)) {
                $errors['mo_ta'] = 'không được bỏ trống';
            }


            if (empty($mo_ta_chi_tiet)) {
                $errors['mo_ta_chi_tiet'] = 'không được bỏ trống';
            }




            $SanPham = $this->modelSanPham->getDetaiData($id);


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
            // thêm dữ liệu 
            if (empty($errors)) {
                // ko có lỗi thì thêm dữ liệu
                $this->modelSanPham->UpdateData($id, $ma_san_pham, $ten_san_pham, $path_image, $gia_nhap, $gia_ban, $gia_khuyen_mai, $ngay_nhap, $so_luong, $luot_xem, $mo_ta, $mo_ta_chi_tiet, $danh_muc_id, $trang_thai);
                unset($_SESSION['errors']);
                header('location:?act=san-pham');
                exit();
            } else {
                $_SESSION['errors'] = $errors;
                header('location:?act=form-sua-san-pham');
                exit();
            }
        }
    }

    public function chitiet()
    {
        $id = $_GET['danh_muc_id'];
        $sanPhams = $this->modelSanPham->getChitiet($id);
        $danhMucs = $this->modelSanPham->getChitietDanhMuc($id);
        $binhLuans = $this->modelSanPham->getBinhLuanFromSanPham($id);
        $danhgia = $this->modelSanPham->getdanhGia($id);
        // var_dump($danhMucs);die();
        require_once './views/sanPham/chi-tiet-san-pham.php';
    }
    // hàm xóa dữ liệu
    public function destroy()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['danh_muc_id'];
            // var_dump($id);

            // xóa danh mục
            $this->modelSanPham->deleteData($id);
            header('location:?act=san-pham');
            exit();
        }
    }
}
