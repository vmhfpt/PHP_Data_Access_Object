<?php
require "../../global.php";
require "../../dao/pdo.php";
require "../../dao/loai_hang.php";
require "../../dao/hang_hoa.php";
require "../../dao/khach_hang.php";
require "../../dao/order.php";
require "../../dao/order_detail.php";

check_login();
if (!session_id()) {
  session_start();
}
$user = $_SESSION["user"];
if (exist_param("don-hang")) {
  $dataItem = order_select_by_user_id($user['ma_kh']);
  
  $VIEW_DASHBOARD = "don-hang.php";
} else if(exist_param("btn_update")) {
  extract($_POST);
   
  try {
    $regex = '/^([a-zA-Z0-9ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]{2,})$/i';
    $regexEmail = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
    $regexPassword = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/';
    if (!preg_match($regexPassword, $password)) {
      $MESSAGE[] = "* Mật khẩu phải từ 8 kí tự và bao gồm chữ cái in hoa, thường và số";
    }
    if (!preg_match($regex,  $name)) {
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
     
      khach_hang_update_by_use( md5($password), $name, $hinh_anh_upload, $email, $ma_kh);
      $data = khach_hang_select_by_id($ma_kh);
      unset($_SESSION["user"]);
      $_SESSION["user"] = $data;
      $MESSAGE = "Cập nhật thành công";
      unset($password, $name, $hinh_anh_upload, $email, $data);
      
      header('Location: '.$SITE_URL.'/dashboard'.'');
    }else {
      $VIEW_DASHBOARD = "thong-tin.php";
    }
    
  }catch(Exception $exc){
    $MESSAGE[] = "* Cập nhật thất bại";
    $item = khach_hang_select_by_id($ma_kh);
    extract($item);
    $VIEW_NAME = "edit.php";
  }
} else if(exist_param("btn_show_order")) {
  $dataItem = get_order_detail_by_order($_POST['id']);
  $data = order_select_by_id($_POST['id']);
  echo json_encode([
    "order_detail" => $dataItem,
    "order_bill" => $data
  ]);
  die();
} else if(exist_param("btn_delete_order_detail")){
  try{
    $total = order_select_by_id($_POST['order_id']);
    order_update_total(($total['total'] -  $_POST['price']), $_POST['order_id']);

    order_detail_delete($_POST['id']);
    echo json_encode(
      [
       'state' => 'success'
      ]
  );
  }catch(Exception $exc){
    echo json_encode(
      [
       'state' => 'error',
       'message' => 'delete fail'
      ]
  );
  }
  //
 // echo $_POST['id'];

  die();
}else {
    $VIEW_DASHBOARD = "thong-tin.php";
}

$VIEW_NAME = "dashboard/layout.php";
$dsloai = loai_selectall();
require "../layout.php";
