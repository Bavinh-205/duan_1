<?php
 class DanhMucController{
    // hmaf kết nối đến model
    public $modeleDanhMuc;
    public function __construct()
    {
        $this->modeleDanhMuc = new danhMuc();
    }
    // hàm hiển thị danh sách
    public function index(){
      
        // lấy dữ liệu danh mục
        $danhMucs = $this->modeleDanhMuc->getAllDanhMuc();
        // var_dump($danhMucs);
        require_once './views/danhMuc/list_danh_muc.php';
       

    }

     // hàm hiển thị from thêm
     public function create(){
        require_once './views/danhMuc/create_danh_muc.php';
        
     }
      // hàm hiển thị thêm vào CSDL
      public function store(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $ten_danh_muc = $_POST['ten_danh_muc'];
            $trang_thai = $_POST['trang_thai'];

            // var_dump($trang_thai);
            // validate
            $errors = [];
            if(empty($ten_danh_muc)){
                $errors['ten_danh_muc'] = 'tên danh mục là bắt buộc';
            }

            if(empty($trang_thai)){
                $errors['trang_thai'] = 'trạng thái là bắt buộc';
            }

            // thêm dữ liệu 
            if(empty($errors)){
                // ko có lỗi thì thêm dữ liệu
                $this->modeleDanhMuc->postData($ten_danh_muc,$trang_thai);
                unset($_SESSION['errors']);
                header('location:?act=danh-mucs');
                exit();
            }else{
                $_SESSION['errors'] = $errors;
                header('location:?act=from-them-danh-muc');
                exit();
            }
        }
      }
      // hàm hiển thị from sửa
      public function edit(){
        // lấy thông tin chi tiết của danh mục
        $id=$_GET['danh_muc_id'];
        $danhMucs = $this->modeleDanhMuc->getDetaiData($id);
        // var_dump($danhMucs);
        // đổ dữ liệu ra form
        require_once './views/danhMuc/edit_danh_muc.php';
      }
      // hàm xửa lý thêm vào CSDL
      public function update(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id=$_POST['id'];
            $ten_danh_muc = $_POST['ten_danh_muc'];
            $trang_thai = $_POST['trang_thai'];

            // var_dump($trang_thai);
            // validate
            $errors = [];
            if(empty($ten_danh_muc)){
                $errors['ten_danh_muc'] = 'tên danh mục là bắt buộc';
            }

            if(empty($trang_thai)){
                $errors['trang_thai'] = 'trạng thái là bắt buộc';
            }

            // thêm dữ liệu 
            if(empty($errors)){
                // ko có lỗi thì thêm dữ liệu
                $this->modeleDanhMuc->UpdateData($id,$ten_danh_muc,$trang_thai);
                unset($_SESSION['errors']);
                header('location:?act=danh-mucs');
                exit();
            }else{
                $_SESSION['errors'] = $errors;
                header('location:?act=form-sua-danh-muc');
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
            $this->modeleDanhMuc->deleteData($id);
            header('location:?act=danh-mucs');
            exit();
        }
      }

     
 }

 /// timf kieems
       


?>