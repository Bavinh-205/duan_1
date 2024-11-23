<?php
class DonHangController
{
  // hmaf kết nối đến model
  public $modleDonHang;
  public $modelTrangThai;
  public $modelNguoiDung;
  public function __construct()
  {
    $this->modleDonHang = new DonHang();
    $this->modelTrangThai = new trangThai();
    $this->modelNguoiDung = new nguoiDung();
  }
  // hàm hiển thị danh sách
  public function index()
  {
    // lấy dữ liệu danh mục
    $DonHangs = $this->modleDonHang->getAll();
    $nguoiDungs = $this->modelNguoiDung->getAllNguoiDung();
    // var_dump($DonHangs);
    require_once './views/donHang/list_don_hang.php';
  }
  public function chitiet()
  {
    // Hàm này dùng để hiển thị form nhập
    // Lấy ra thông tin của sản phẩm cần sửa
    $don_hang_id = $_GET['id_don_hang'];
    // var_dump($don_hang_id);die;

    // Lấy ra thông tin đơn hàng ở bảng don_hangs
    $donHang = $this->modleDonHang->getDetailDonHang($don_hang_id);

    // var_dump($donHang);die;

    // Lấy danh sách sản phẩm đã đặt của đơn hàng ở bảng chi_tiet_don_hangs
    $sanPhamDonHang = $this->modleDonHang->getListSpDonHang($don_hang_id);
    // var_dump($sanPhamDonHang);die;

    $listTrangThaiDonHang = $this->modleDonHang->getAllTrangThaiDonHang();

    require_once './views/donHang/chi-tiet-don-hang.php';
  }

  // hàm hiển thị from thêm
  //  public function create(){
  //     $trangThais = $this->modelTrangThai->getAlltrangThai();
  //     // var_dump($trangThais); die();
  //     require_once './views/DonHangs/create_san_pham.php';


  //  }
  // hàm hiển thị thêm vào CSDL
  //   public function store(){
  //     if($_SERVER['REQUEST_METHOD'] == 'POST'){
  //         $ma_san_pham = $_POST['ma_san_pham'];
  //         $ten_san_pham = $_POST['ten_san_pham'];
  //         $file_img = $_FILES['hinh_anh'];
  //         $gia_nhap = $_POST['gia_nhap'];
  //         $gia_ban = $_POST['gia_ban'];
  //         $gia_khuyen_mai = $_POST['gia_khuyen_mai'];
  //         $ngay_nhap = $_POST['ngay_nhap'];
  //         $so_luong = $_POST['so_luong'];
  //         $luot_xem = $_POST['luot_xem'];
  //         $mo_ta = $_POST['mo_ta'];

  //         $mo_ta_chi_tiet = $_POST['mo_ta_chi_tiet'];
  //         $danh_muc_id = $_POST['danh_muc_id'];
  //         $trang_thai = $_POST['trang_thai'];

  //         // validate
  //         $errors = [];
  //         if(empty($ma_san_pham)){
  //             $errors['ma_san_pham'] = 'không được bỏ trống';
  //         }


  //           if(empty($ten_san_pham)){
  //               $errors['ten_san_pham'] = 'không được bỏ trống';
  //           }



  //         if(empty($gia_nhap)){
  //             $errors['gia_nhap'] = 'không được bỏ trống';
  //         }



  //         if(empty($gia_ban)){
  //             $errors['gia_ban'] = 'không được bỏ trống';
  //         }else if($gia_ban > $gia_nhap){
  //             $errors['gia_ban'] = 'Giá bán Không Đc lớn HƠn gIÁ Nhập';
  //         }


  //           if(empty($gia_khuyen_mai)){
  //             $errors['gia_khuyen_mai'] = 'không được bỏ trống';
  //         }else if($gia_khuyen_mai > $gia_ban){
  //             $errors['gia_khuyen_mai'] = 'Giá Khuyến Mãi Không Được Lớn Hơn Giá Bán';
  //         }

  //         if(empty($ngay_nhap)){
  //             $errors['ngay_nhap'] = 'không được bỏ trống';
  //         }

  //         if(empty($so_luong)){
  //             $errors['so_luong'] = 'không được bỏ trống';
  //         }else if($so_luong < 0){
  //             $errors['so_luong'] = 'không được bé hơn 0';
  //         }

  //         if(empty($mo_ta)){
  //             $errors['mo_ta'] = 'không được bỏ trống';
  //         }


  //         if(empty($mo_ta_chi_tiet)){
  //             $errors['mo_ta_chi_tiet'] = 'không được bỏ trống';
  //         }



  //                     // Xử lý hình ảnh
  //                     if (isset($file_img)) {
  //                         // Chọn thư mục lưu ảnh
  //                         $target_dir = "uploads/user/";
  //                         // Lấy tên hình ảnh
  //                         $img_name = uniqid() . '_' . $file_img['name'];
  //                         // Tạo đường dẫn đầy đủ để lưu vào CSDL
  //                         $path_image = $target_dir . $img_name;
  //                         // Tạo ảnh
  //                         move_uploaded_file($file_img['tmp_name'], $path_image);
  //                     }

  //         // thêm dữ liệu 
  //         if(empty($errors)){
  //             // ko có lỗi thì thêm dữ liệu
  //             $this->modleDonHang->postData($ma_san_pham,$ten_san_pham,$path_image,$gia_nhap,$gia_ban,$gia_khuyen_mai,$ngay_nhap,$so_luong,$luot_xem,$mo_ta,$mo_ta_chi_tiet,$danh_muc_id,$trang_thai);
  //             unset($_SESSION['errors']);
  //             header('location:?act=san-pham');
  //             exit();
  //         }else{
  //             $_SESSION['errors'] = $errors;
  //             header('location:?act=from-them-san-pham');
  //             exit();
  //         }
  //     }
  //   }
  // hàm hiển thị from sửa
  public function edit()
  {
    // lấy thông tin chi tiết của danh mục
    $id = $_GET['id_don_hang'];
    $DonHangs = $this->modleDonHang->getDetaiData($id);
    $trangThais = $this->modelTrangThai->getAlltrangThai();

    // đổ dữ liệu ra form
    require_once './views/donHang/edit_don_hang.php';
  }
  // hàm xửa lý thêm vào CSDL
  public function update()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $id = $_POST['id'];
      $trang_thai_id = $_POST['trang_thai_id'];

      $DonHangs = $this->modleDonHang->getDetaiData($id);

      if (empty($errors)) {
        // ko có lỗi thì thêm dữ liệu
        $this->modleDonHang->UpdateData($id, $trang_thai_id);
        unset($_SESSION['errors']);
        header('location:?act=don-hang');
        exit();
      } else {
        $_SESSION['errors'] = $errors;
        header('location:?act=form-sua-don-hang');
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
      $this->modleDonHang->deleteData($id);
      header('location:?act=san-pham');
      exit();
    }
  }

  // public function chitiet(){
  //   $DonHangs = $this->modleDonHang->getAll();
  //   require_once './views/donHang/chi-tiet-don-hang.php';
  // }
}
