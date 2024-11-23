<?php
class khuyenMaiController
{
    // hmaf kết nối đến model
    public $modelKhuyenMai;
    public function __construct()
    {
        $this->modelKhuyenMai = new khuyenMai();
    }
    // hàm hiển thị danh sách
    public function index()
    {
        // lấy dữ liệu danh mục
        $khuyenMais = $this->modelKhuyenMai->getAll();
        // var_dump($nguoiDungs);
        require_once './views/khuyenMai/list_khuyen_mai.php';
    }
    // hàm hiển thị from thêm
    public function create()
    {
        require_once './views/khuyenMai/create_khuyen_mai.php';
    }
    // hàm hiển thị thêm vào CSDL
    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ten_khuyen_mai = $_POST['ten_khuyen_mai'];
            $ma_khuyen_mai = $_POST['ma_khuyen_mai'];
            $gia_tri = $_POST['gia_tri'];
            $ngay_bat_dau = $_POST['ngay_bat_dau'];
            $ngay_ket_thuc = $_POST['ngay_ket_thuc'];
            $mo_ta = $_POST['mo_ta'];
            $trang_thai = $_POST['trang_thai'];

              // validate
              $errors = [];
              if(empty($ten_khuyen_mai)){
                  $errors['ten_khuyen_mai'] = 'tên danh mục là bắt buộc';
              }
  
              if(empty($ma_khuyen_mai)){
                  $errors['ma_khuyen_mai'] = 'Mã Khuyến mãi là bắt buộc';
              }

              if(empty($gia_tri)){
                $errors['gia_tri'] = 'Giá Trị là bắt buộc';
            }

            if(empty($ngay_bat_dau)){
                $errors['ngay_bat_dau'] = 'Ngày Bắt Đầu là bắt buộc';
            }


            if(empty($ngay_ket_thuc)){
                $errors['ngay_ket_thuc'] = 'Không đc bỏ trôngs';
            }

            if(empty($mo_ta)){
                $errors['mo_ta'] = 'Mô tả là bắt buộc';
            }

           


            // thêm dữ liệu 
            if (empty($errors)) {
                // ko có lỗi thì thêm dữ liệu
                $this->modelKhuyenMai->postData($ten_khuyen_mai, $ma_khuyen_mai, $gia_tri, $ngay_bat_dau, $ngay_ket_thuc, $mo_ta, $trang_thai);
                unset($_SESSION['errors']);
                header('location:?act=khuyen-mai');
                exit();
            } else {
                $_SESSION['errors'] = $errors;
                header('location:?act=form-them-khuyen-mai');
                exit();
            }
        }
    }
    // hàm hiển thị from sửa
    public function edit()
    {
        // lấy thông tin chi tiết của danh mục
        $id = $_GET['khuyen_mai_id'];
        $khuyenMais = $this->modelKhuyenMai->getDetaiData($id);
        // var_dump($nguoiDungs);
        // đổ dữ liệu ra form
        require_once './views/khuyenMai/edit_khuyen_mai.php';
    }
    // hàm xửa lý thêm vào CSDL
    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $ten_khuyen_mai = $_POST['ten_khuyen_mai'];
            $ma_khuyen_mai = $_POST['ma_khuyen_mai'];
            $gia_tri = $_POST['gia_tri'];
            $ngay_bat_dau = $_POST['ngay_bat_dau'];
            $ngay_ket_thuc = $_POST['ngay_ket_thuc'];
            $mo_ta = $_POST['mo_ta'];
            $trang_thai = $_POST['trang_thai'];

            $errors = [];
            if(empty($ten_khuyen_mai)){
                $errors['ten_khuyen_mai'] = 'tên danh mục là bắt buộc';
            }

            if(empty($ma_khuyen_mai)){
                $errors['ma_khuyen_mai'] = 'Mã Khuyến mãi là bắt buộc';
            }

            if(empty($gia_tri)){
              $errors['gia_tri'] = 'Giá Trị là bắt buộc';
          }

          if(empty($ngay_bat_dau)){
              $errors['ngay_bat_dau'] = 'Ngày Bắt Đầu là bắt buộc';
          }


          if(empty($ngay_ket_thuc)){
              $errors['ngay_ket_thuc'] = 'Không đc bỏ trôngs';
          }

          if(empty($mo_ta)){
              $errors['mo_ta'] = 'Mô tả là bắt buộc';
          }
            // thêm dữ liệu 
            if (empty($errors)) {
                // ko có lỗi thì thêm dữ liệu
                $this->modelKhuyenMai->UpdateData($id, $ten_khuyen_mai, $ma_khuyen_mai, $gia_tri, $ngay_bat_dau, $ngay_ket_thuc, $mo_ta, $trang_thai);
                unset($_SESSION['errors']);
                header('location:?act=khuyen-mai');
                exit();
            } else {
                $_SESSION['errors'] = $errors;
                header('location:?act=form-sua-khuyen-mai');
                exit();
            }
        }
    }
    // hàm xóa dữ liệu
    public function destroy()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['khuyen_mai_id'];
            // var_dump($id);

            // xóa danh mục
            $this->modelKhuyenMai->deleteData($id);
            header('location:?act=khuyen-mai');
            exit();
        }
    }
}
