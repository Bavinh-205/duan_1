<?php
 class TintucController{
    // hmaf kết nối đến model
    public $modelstintuc;
    public function __construct()
    {
        $this->modelstintuc = new tintuc();
    }
    // hàm hiển thị danh sách
    public function index(){
        // lấy dữ liệu danh mục
        $danhMucs = $this->modelstintuc->getAll();
        // var_dump($danhMucs);
        require_once './views/tintuc/listtintuc.php';
       

    }

     // hàm hiển thị from thêm
     public function create(){
        require_once './views/tintuc/crittintuc.php';
        
     }
      // hàm hiển thị thêm vào CSDL
      public function store(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $tieu_de = $_POST['tieu_de'];
            $noi_dung = $_POST['noi_dung'];
            $ngay_tao = $_POST['ngay_tao'];
            $trang_thai = $_POST['trang_thai'];

            $errors = [];
            if(empty($tieu_de)){
                $errors['tieu_de'] = 'không được bỏ trống';
            }
            if(empty($noi_dung)){
                $errors['noi_dung'] = 'không được bỏ trống';
            }
            if(empty($ngay_tao)){
                $errors['ngay_tao'] = 'không được bỏ trống';
            }
 

            // thêm dữ liệu 
            if(empty($errors)){
                // ko có lỗi thì thêm dữ liệu
                $this->modelstintuc->postData($tieu_de,$noi_dung,$ngay_tao,$trang_thai);
                unset($_SESSION['errors']);
                header('location:?act=tin-tuc');
                exit();
            }else{
                $_SESSION['errors'] = $errors;
                header('location:?act=from-them-tin-tuc');
                exit();
            }
        }
      }
      // hàm hiển thị from sửa
      public function edit(){
        // lấy thông tin chi tiết của danh mục
        $id=$_GET['danh_muc_id'];
        $danhMucs = $this->modelstintuc->getDetaiData($id);
        // var_dump($danhMucs);
        // đổ dữ liệu ra form
        require_once './views/tintuc/edittintuc.php';
      }
      // hàm xửa lý thêm vào CSDL
      public function update(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id=$_POST['id'];
            $tieu_de = $_POST['tieu_de'];
            $noi_dung = $_POST['noi_dung'];
            $ngay_tao = $_POST['ngay_tao'];
            $trang_thai = $_POST['trang_thai'];

            $errors = [];
            if(empty($tieu_de)){
                $errors['tieu_de'] = 'không được bỏ trống';
            }
            if(empty($noi_dung)){
                $errors['noi_dung'] = 'không được bỏ trống';
            }
            if(empty($ngay_tao)){
                $errors['ngay_tao'] = 'không được bỏ trống';
            }

            // thêm dữ liệu 
            if(empty($errors)){
                // ko có lỗi thì thêm dữ liệu
                $this->modelstintuc->UpdateData($id,$tieu_de,$noi_dung,$ngay_tao,$trang_thai);
                unset($_SESSION['errors']);
                header('location:?act=tin-tuc');
                exit();
            }else{
                $_SESSION['errors'] = $errors;
                header('location:?act=form-sua-tin-tuc');
                exit();
            }
        }
      }
      // hàm xóa dữ liệu
      public function destroy(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id = $_POST['danh_muc_id'];
            // var_dump($id);

            // xóa danh mục
            $this->modelstintuc->deleteData($id);
            header('location:?act=tin-tuc');
            exit();
        }
      }
 }


?>