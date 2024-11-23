<?php
class LienHeController
{
    // hmaf kết nối đến model
    public $modleLienHe;
    public function __construct()
    {
        $this->modleLienHe = new lienHe();
    }
    // hàm hiển thị danh sách
    public function index()
    {
        // lấy dữ liệu danh mục
        $danhMucs = $this->modleLienHe->getAll();
        // var_dump($danhMucs);
        require_once './views/lienHe/list_lien_he.php';
    }


    // hàm hiển thị from sửa
    public function edit()
    {
        // lấy thông tin chi tiết của danh mục
        $id = $_GET['danh_muc_id'];
        $danhMucs = $this->modleLienHe->getDetaiData($id);
        // var_dump($danhMucs);
        // đổ dữ liệu ra form
        require_once './views/lienHe/edit_lien_he.php';
    }
    // hàm xửa lý thêm vào CSDL
    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $email = $_POST['email'];
            $noi_dung = $_POST['noi_dung'];
            $trang_thai = $_POST['trang_thai'];
            $ngay_tao = $_POST['ngay_tao'];

            // var_dump($noi_dung);
            // validate

            $errors = [];
            if (empty($email)) {
                $errors['email'] = 'Email ko đc bỏ trống';
            } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = "Nhập sai định dạng email";
            }


            if (empty($noi_dung)) {
                $errors['noi_dung'] = 'trạng thái là bắt buộc';
            }

            if (empty($ngay_tao)) {
                $errors['ngay_tao'] = 'trạng thái là bắt buộc';
            }


            // thêm dữ liệu 
            if (empty($errors)) {
                // ko có lỗi thì thêm dữ liệu
                $this->modleLienHe->UpdateData($id, $email, $noi_dung, $ngay_tao, $trang_thai);
                unset($_SESSION['errors']);
                header('location:?act=lien-he');
                exit();
            } else {
                $_SESSION['errors'] = $errors;
                header('location:?act=form-sua-lien-he');
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
            $this->modleLienHe->deleteData($id);
            header('location:?act=lien-he');
            exit();
        }
    }
}
