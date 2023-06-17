<?php
require "../../global.php";
require_once "../../dao/loai_hang.php";
check_login();
extract($_REQUEST);

if (exist_param("btn_list")) {
  $items = isset($_GET['key']) ? loai_search($_GET['key']) : loai_selectall();
  
  $VIEW_NAME = "list.php";
} else if (exist_param("btn_insert") && !empty($_POST)) {

  extract($_POST);
  try {
    $regex = '/^([a-zA-Z0-9ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]{2,})$/i';

    if (!preg_match($regex, $ten_loai_hang)) {
      $VIEW_NAME = "add.php";
      $MESSAGE[] = ("* Tên loại hàng phải từ 2 ký tự trở lên và không chứa ký tự đặc biệt");
    } else {
      loai_insert($ten_loai_hang);
      $items = loai_selectall();
      $VIEW_NAME = "list.php";
      $MESSAGE = "Thêm mới " . $ten_loai_hang . " thành công!";
      unset($ten_loai_hang);
    }
  } catch (Exception $exc) {
    $MESSAGE[] = "* Tên loại hàng đã tồn tại";
    $VIEW_NAME = "add.php";
  }
} else if (exist_param("btn_edit") ) {
  $item = loai_getinfor($_GET['ma_lh']);
  extract($item);
  $VIEW_NAME = "edit.php";
} else if (exist_param("btn_delete")) {
  if ($_SERVER['REQUEST_METHOD'] == "DELETE") {
    $query_str = file_get_contents("php://input");
    $array = array();
    parse_str($query_str, $array);

    try {
      foreach ($array['arr'] as $data) {
        loai_delete($data);
      }
      echo json_encode(['status' => 'success']);
    } catch (Exception $th) {
      echo json_encode(['status' => 'error']);
    }
    
  }
  die();
} else if (exist_param("btn_update") && !empty($_POST)) {

  extract($_POST);
  try {
    $regex = '/^([a-zA-Z0-9ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]{2,})$/i';

    if (!preg_match($regex, $ten_loai_hang)) {
      $item = loai_getinfor($ma_loai);
      extract($item);
      $VIEW_NAME = "edit.php";
      $MESSAGE[] = ("* Tên loại hàng phải từ 2 ký tự trở lên và không chứa ký tự đặc biệt");
    } else {
      loai_update($ma_loai, $ten_loai_hang);
      $items = loai_selectall();
      $VIEW_NAME = "list.php";
      $MESSAGE = "Cập nhật " . $ten_loai_hang . " thành công!";
      unset($ten_loai_hang);
    }
  } catch (Exception $exc) {
    $item = loai_getinfor($ma_loai);
    extract($item);
    $MESSAGE[] = "* Tên loại hàng đã tồn tại";
    $VIEW_NAME = "edit.php";
  }
  /*extract($_POST);
  loai_update($ma_loai, $ten_loai_hang);
  $items = loai_selectall();
  $VIEW_NAME = "list.php"; */
} else {
  $VIEW_NAME = "add.php";
}
require "../layout.php";
