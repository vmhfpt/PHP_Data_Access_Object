<?php
  require_once "../../dao/khach_hang.php";
  require "../../global.php";
  check_login();
  extract($_REQUEST);

  if(exist_param("btn_list")){
    $items = isset($_GET['key']) ? khach_hang_search($_GET['key']) : khach_hang_selectall();;
    $VIEW_NAME = "list.php";
  }else if(exist_param("btn_insert") && !empty($_POST)){
    extract($_POST);
    try {
      $regex = '/^([a-zA-Z0-9ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]{2,})$/i';
      $regexEmail = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
      $regexPassword = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/';
      $regexFirst = '/^[a-zA-Z0-9]{2,}$/';
      if (!preg_match($regexFirst, $ma_khach_hang)) {
        $MESSAGE[] = "* Mã khách hàng phải từ 2 ký tự và không chứa ký tự đặc biệt";
      }
      if (!preg_match($regexPassword, $mat_khau)) {
        $MESSAGE[] = "* Mật khẩu phải từ 8 kí tự và bao gồm chữ cái in hoa, thường và số";
      }
      if($mat_khau != $xac_nhan_mat_khau){
        $MESSAGE[] = "* Mật khẩu nhập lại không khớp";
      }
      if(khach_hang_select_by_id($ma_khach_hang)){
        $MESSAGE[] = "* Mã khách hàng đã tồn tại";
      }
      if (!preg_match($regexPassword, $xac_nhan_mat_khau)) {
        $MESSAGE[] = "* Mật khẩu phải từ 8 kí tự và bao gồm chữ cái in hoa, thường và số";
      }
      if (!preg_match($regex,  $ten_khach_hang)) {
        $MESSAGE[] = "* Tên khách hàng phải từ 2 đến 27 ký tự trở lên và không chứa ký tự đặc biệt";
      }
      if (!preg_match($regexEmail,  $email)) {
        $MESSAGE[] = "* Email không hợp lệ";
      }
      if($_FILES['hinh']['size'] == 0) {
        $hinh_anh_upload = '';
      }else if(count($MESSAGE) == 0){
        $checkFile = validateUploadFile($_FILES['hinh']);
        if(!$checkFile){
          $hinh_anh_upload = save_file($_FILES['hinh'], $UPLOAD_URL_USER);
        }else {
          $MESSAGE[] = $checkFile;
        }
      }

      if(count($MESSAGE) == 0){
        isset($kich_hoat) ? $kich_hoat = 0 :  $kich_hoat = 1;
        khach_hang_insert($ma_khach_hang, md5($mat_khau), $ten_khach_hang, $kich_hoat, $hinh_anh_upload, $email, $vai_tro);
        $items = khach_hang_selectall();
        $MESSAGE = "Thêm người dùng" . $ten_khach_hang . "thành công";
        unset($ma_khach_hang, $mat_khau, $ten_khach_hang, $kich_hoat, $email, $vai_tro);
        $VIEW_NAME = "list.php";
      }else {
        $VIEW_NAME = "add.php";
      }
      
    }catch(Exception $exc){
      $MESSAGE[] = "* Thêm người dùng thất bại";
      $VIEW_NAME = "add.php";
    }
    

  }else if(exist_param("btn_edit")){
    $item = khach_hang_select_by_id($_GET['ma_kh']);
    extract($item);
    $VIEW_NAME = "edit.php";
  }else if(exist_param("btn_delete")){
    if ($_SERVER['REQUEST_METHOD'] == "DELETE") {
      $query_str = file_get_contents("php://input");
      $array = array();
      parse_str($query_str, $array);
      foreach ($array['arr'] as $data) {
        $image = khach_hang_select_by_id($data);
        if($image['hinh'])  unlink($UPLOAD_URL_USER.$image['hinh']);
        khach_hang_delete($data);
      }
      echo json_encode(['status' => 'success']);
    }
    die();
  }else if(exist_param("btn_update") && !empty($_POST)){
    extract($_POST);
   
    try {
      $regex = '/^([a-zA-Z0-9ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]{2,})$/i';
      $regexEmail = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
      $regexPassword = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/';
      if (!preg_match($regexPassword, $mat_khau)) {
        $MESSAGE[] = "* Mật khẩu phải từ 8 kí tự và bao gồm chữ cái in hoa, thường và số";
      }
      if($mat_khau != $xac_nhan_mat_khau){
        $MESSAGE[] = "* Mật khẩu nhập lại không khớp";
      }
      if (!preg_match($regexPassword, $xac_nhan_mat_khau)) {
        $MESSAGE[] = "* Mật khẩu phải từ 8 kí tự và bao gồm chữ cái in hoa, thường và số";
      }
      if (!preg_match($regex,  $ten_khach_hang)) {
        $MESSAGE[] = "* Tên khách hàng phải từ 2 ký tự trở lên và không chứa ký tự đặc biệt";
      }
      if (!preg_match($regexEmail,  $email)) {
        $MESSAGE[] = "* Email không hợp lệ";
      }
      if($_FILES['hinh']['size'] == 0) {
        $hinh_anh_upload = $hinh_cu;
      }else if(count($MESSAGE) == 0){
        $checkFile = validateUploadFile($_FILES['hinh']);
        if(!$checkFile){
          $hinh_anh_upload = save_file($_FILES['hinh'], $UPLOAD_URL_USER);
          if($hinh_cu){
            unlink($UPLOAD_URL_USER.$hinh_cu);
          }
        }else {
          $MESSAGE[] = $checkFile;
        }
      }

      if(count($MESSAGE) == 0){
        isset($kich_hoat) ? $kich_hoat = 0 :  $kich_hoat = 1;
        khach_hang_update($ma_kh, md5($mat_khau), $ten_khach_hang, $kich_hoat, $hinh_anh_upload , $email, $vai_tro);
        $items = khach_hang_selectall();
        $MESSAGE = "Sửa người dùng" . $ten_khach_hang . " thành công";
        unset($ma_khach_hang, $mat_khau, $ten_khach_hang, $kich_hoat, $email, $vai_tro);
        $VIEW_NAME = "list.php";
      }else {
        $item = khach_hang_select_by_id($ma_kh);
        extract($item);
        $VIEW_NAME = "edit.php";
      }
      
    }catch(Exception $exc){
      $MESSAGE[] = "* Cập nhật thất bại";
      $item = khach_hang_select_by_id($ma_kh);
      extract($item);
      $VIEW_NAME = "edit.php";
    }

   
  }else {
    $VIEW_NAME = "add.php";
  }
  require "../layout.php";
?>