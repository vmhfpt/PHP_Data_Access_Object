<?php
require_once "../../dao/hang_hoa.php";
require_once "../../dao/loai_hang.php";
require "../../global.php";
check_login();
extract($_REQUEST);

if (exist_param("btn_list")) {
  $VIEW_NAME = "list.php";
  $page = 1;
  if(isset($_GET['page'])){
    $page = (int)$_GET['page'];
  }

  $totalItem= hang_hoa_count_total();
  $limitShow = 10;
  $offset = ($page - 1) * $limitShow;
  $items = isset($_GET['key']) ? hang_hoa_select_by_search_name($_GET['key']) : hang_hoa_pagination($limitShow, $offset);
} else if (exist_param("btn_insert") && !empty($_POST)) {
  extract($_POST);
  try {

    $regex = '/^([a-zA-Z0-9ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]{2,})$/i';
    $regexDonGia = '/^[0-9]{2,}$/';
    $regexGiamGia = '/^[0-9\.-]{1,}$/';
    $regexNgayNhap = '/^(0[1-9]|1[0-2])\/(0[1-9]|1\d|2\d|3[01])\/(19|20)\d{2}$/';

    if (!preg_match($regex, $ten_hang_hoa)) {
      $MESSAGE[] = "* Tên hàng hóa phải từ 2 ký tự và không chứa ký tự đặc biệt";
    }
    if (!preg_match($regexDonGia, $don_gia)) {
      $MESSAGE[] = "* Đơn giá không hợp lệ";
    }
    if (hang_hoa_select_by_name($ten_hang_hoa)) {
      $MESSAGE[] = "* Tên hàng hóa đã tồn tại";
    }
    if (!preg_match($regexGiamGia, $giam_gia)) {
      $MESSAGE[] = "* Giảm giá không hợp lệ";
    }
    if (!preg_match($regexNgayNhap, $ngay_nhap)) {
      $MESSAGE[] = "* Ngày nhập không hợp lệ";
    }
    if ($mo_ta == '' || $mo_ta == ' ') {
      $MESSAGE[] = "* Nội dung không hợp lệ";
    }
    if ($_FILES['hinh']['size'] == 0) {
      $MESSAGE[] = "* Cần ít nhất 1 file hình ảnh";
    } else if (count($MESSAGE) == 0) {
      $checkFile = validateUploadFile($_FILES['hinh']);
      if (!$checkFile) {
        $hinh_anh_upload = save_file($_FILES['hinh'], $UPLOAD_URL_PRODUCT);
      } else {
        $MESSAGE[] = $checkFile;
      }
    }

    if (count($MESSAGE) == 0) {
      $date = $ngay_nhap;
      $date = DateTime::createFromFormat("m/d/Y", $date);
      hang_hoa_insert($ten_hang_hoa, $don_gia, floatval(str_replace(',', '.', $giam_gia)), $hinh_anh_upload, $date->format('Y-m-d H:m:s'), $loai_hang, $hang_dac_biet, 0,$mo_ta);
      $MESSAGE = "Thêm sản phẩm " . $ten_hang_hoa . " thành công";
      unset($ten_hang_hoa, $don_gia, $giam_gia, $hinh_anh_upload,$ngay_nhap, $loai_hang, $hang_dac_biet, $mo_ta);
     
      $totalItem= hang_hoa_count_total();
      $limitShow = 10;
      $page = 1;
      $items = hang_hoa_pagination($limitShow , 0);



      $VIEW_NAME = "list.php";
    } else {
      $loai_hang = loai_selectall();
      $VIEW_NAME = "add.php";
    }
  } catch (Exception $exc) {
    $MESSAGE[] = "* Thêm hàng hóa thất bại";
    $loai_hang = loai_selectall();
    $VIEW_NAME = "add.php";
  }

} else if (exist_param("btn_edit")) {
  $item = hang_hoa_select_by_id($_GET['ma_hh']);
  $loai_hang = loai_selectall();
  extract($item);
  $VIEW_NAME = "edit.php";
} else if (exist_param("btn_delete")) {
  if ($_SERVER['REQUEST_METHOD'] == "DELETE") {
    $query_str = file_get_contents("php://input");
    $array = array();
    parse_str($query_str, $array);
    foreach ($array['arr'] as $data) {
      $image = hang_hoa_select_by_id($data);
      unlink($UPLOAD_URL_PRODUCT.$image['hinh']);
      hang_hoa_delete($data);
    }
    echo json_encode(['status' => 'success']);
  }
  die();
} else if (exist_param("btn_update") && !empty($_POST)) {
  extract($_POST);
  try {

    $regex = '/^([a-zA-Z0-9ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]{2,})$/i';
    $regexDonGia = '/^[0-9]{2,}$/';
    $regexGiamGia = '/^[0-9\.-]{1,}$/';
    $regexNgayNhap = '/^(0[1-9]|1[0-2])\/(0[1-9]|1\d|2\d|3[01])\/(19|20)\d{2}$/';

    if (!preg_match($regex, $ten_hang_hoa)) {
      $MESSAGE[] = "* Tên hàng hóa phải từ 2 ký tự và không chứa ký tự đặc biệt";
    }
    if (!preg_match($regexDonGia, $don_gia)) {
      $MESSAGE[] = "* Đơn giá không hợp lệ";
    }
    if (!preg_match($regexGiamGia, $giam_gia)) {
      $MESSAGE[] = "* Giảm giá không hợp lệ";
    }
    if (!preg_match($regexNgayNhap, $ngay_nhap)) {
      $MESSAGE[] = "* Ngày nhập không hợp lệ";
    }
    if ($mo_ta == '' || $mo_ta == ' ') {
      $MESSAGE[] = "* Nội dung không hợp lệ";
    }
    if ($_FILES['hinh']['size'] == 0) {
        $hinh_anh_upload = $hinh_cu;
    } else if (count($MESSAGE) == 0) {
      $checkFile = validateUploadFile($_FILES['hinh']);
      if (!$checkFile) {
        $hinh_anh_upload = save_file($_FILES['hinh'], $UPLOAD_URL_PRODUCT);
        unlink($UPLOAD_URL_PRODUCT.$hinh_cu);
      } else {
        $MESSAGE[] = $checkFile;
      }
    }

    if (count($MESSAGE) == 0) {
      hang_hoa_update($ten_hang_hoa, $don_gia,floatval(str_replace(',', '.', $giam_gia)), $hinh_anh_upload, DateTime::createFromFormat("m/d/Y", $ngay_nhap)->format('Y-m-d H:m:s'), $loai_hang, $hang_dac_biet, $mo_ta, $ma_hh);
      $MESSAGE = "Cập nhật sản phẩm " . $ten_hang_hoa . " thành công";
      unset($ten_hang_hoa, $don_gia, $giam_gia, $hinh_anh_upload,$ngay_nhap, $loai_hang, $hang_dac_biet, $mo_ta);
      

      $totalItem= hang_hoa_count_total();
      $limitShow = 10;
      $page = 1;
      $items = hang_hoa_pagination($limitShow , 0);


      $VIEW_NAME = "list.php";
    } else {
      $item = hang_hoa_select_by_id($ma_hh);
      extract($item);
      $loai_hang = loai_selectall();
      $VIEW_NAME = "edit.php";
    }
  } catch (Exception $exc) {
    $MESSAGE[] = "* Sửa hàng hóa thất bại";
    $item = hang_hoa_select_by_id($ma_hh);
    extract($item);
    $loai_hang = loai_selectall();
    $VIEW_NAME = "edit.php";
  }
  // hang_hoa_update($ten_hang_hoa, $don_gia, $giam_gia, $_FILES['hinh']['name'], DateTime::createFromFormat("m/d/Y", $ngay_nhap)->format('Y-m-d H:m:s'), $loai_hang, $hang_dac_biet,  $mo_ta, $ma_hh);
  // $items = hang_hoa_selectall();
  // $VIEW_NAME = "list.php";
} else {
  $loai_hang = loai_selectall();
  $VIEW_NAME = "add.php";
}
require "../layout.php";
