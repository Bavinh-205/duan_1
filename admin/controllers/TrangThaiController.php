<?php
class trangThaiController
{
    // hmaf kết nối đến model
    public $modelTrangThai;
    public function __construct()
    {
        $this->modelTrangThai = new trangThai();
    }
    // hàm hiển thị danh sách
    public function index()
    {
        // lấy dữ liệu danh mục
        $trangThais = $this->modelTrangThai->getAlltrangThai();
        // var_dump($nguoiDungs);
        require_once './views/trangThaiDonHang/list_trang_thai.php';
    }
    // hàm hiển thị from thêm
    public function create()
    {
        require_once './views/trangThaiDonHang/create_trang_thai.php';
    }
    // hàm hiển thị thêm vào CSDL
    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ten_trang_thai = $_POST['ten_trang_thai'];

            $errors = [];
            if(empty($ten_trang_thai)){
                $errors['ten_trang_thai'] = 'không được bỏ trống';
            }
          

            // thêm dữ liệu 
            if (empty($errors)) {
                // ko có lỗi thì thêm dữ liệu
                $this->modelTrangThai->postData($ten_trang_thai);
                unset($_SESSION['errors']);
                header('location:?act=trang-thai');
                exit();
            } else {
                $_SESSION['errors'] = $errors;
                header('location:?act=form-them-trang-thai');
                exit();
            }
        }
    }
    // hàm hiển thị from sửa
    public function edit()
    {
        // lấy thông tin chi tiết của danh mục
        $id = $_GET['trang_thai_id'];
        $trangThais = $this->modelTrangThai->getDetaiData($id);
        // var_dump($nguoiDungs);
        // đổ dữ liệu ra form
        require_once './views/trangThaiDonHang/edit_trang_thai.php';
    }
    // hàm xửa lý thêm vào CSDL
    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $ten_trang_thai = $_POST['ten_trang_thai'];

            $errors = [];
            if(empty($ten_trang_thai)){
                $errors['ten_trang_thai'] = 'không được bỏ trống';
            }
            // thêm dữ liệu 
            if (empty($errors)) {
                // ko có lỗi thì thêm dữ liệu
                $this->modelTrangThai->UpdateData($id, $ten_trang_thai);
                unset($_SESSION['errors']);
                header('location:?act=trang-thai');
                exit();
            } else {
                $_SESSION['errors'] = $errors;
                header('location:?act=form-sua-trang-thai');
                exit();
            }
        }
    }
    // hàm xóa dữ liệu
    public function destroy()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['trang_thai_id'];
            // var_dump($id);

            // xóa danh mục
            $this->modelTrangThai->deleteData($id);
            header('location:?act=trang-thai');
            exit();
        }
    }
}
