<?php
  
  require "../../global.php";
  require_once "../../dao/khach_hang.php";
  require_once "../../dao/order.php";
  require_once "../../dao/order_detail.php";
  require_once "../../dao/binh_luan.php";
  require_once "../../dao/hang_hoa.php";
  check_login();
  extract($_REQUEST);
 
  if(exist_param("btn_detail")){
    $voteRank = get_rank_product($_GET['ma_hh']);
    $data = hang_hoa_select_by_id($_GET['ma_hh']);
    $dataItem = binh_luan_select_by_hang_hoa($_GET['ma_hh']);
    $VIEW_NAME = "chi-tiet.php";
    
  }else if(exist_param("btn_delete")) {
    try{
        binh_luan_delete($_POST['id']);
        echo json_encode(['status' => 'success']);
    }catch(Exception $exc){
        echo json_encode(['status' => 'error']);
    }
    die();
  }else{
    $dataItem = binh_luan_get_list_hang_hoa();

    $VIEW_NAME = "danh-sach.php";
  }
  require "../layout.php";
?>   