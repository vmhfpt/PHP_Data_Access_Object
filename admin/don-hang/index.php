<?php
  
  require "../../global.php";
  require_once "../../dao/khach_hang.php";
  require_once "../../dao/order.php";
  require_once "../../dao/order_detail.php";
  check_login();
  extract($_REQUEST);
 
  if(exist_param("btn_detail")){
    $dataItem = order_select_by_id($_GET['order']);
    $VIEW_NAME = "chi-tiet-don-hang.php";
  }else if(exist_param("btn_list_hh")){
    $dataItem  = get_order_detail_by_order($_GET['order']);
    $nameOrder = order_select_by_id($_GET['order']);
    $VIEW_NAME = "danh-sach-hang-hoa.php";
  }else if(exist_param("btn_change_active")){
    if(!empty($_POST)){
      if(isset($_POST['order_id'])){
         $order_id = $_POST['order_id'];
      }
      if(isset($_POST['active'])){
         $active = (int)$_POST['active'];
      }   
      $dataItem = order_select_by_id($_POST['order_id']);
      $dataItemActive =(int)$dataItem['active'];
      if($dataItemActive != 0 &&  (($active == ($dataItemActive - 1)) || ($active == 0) )  ){
         order_change_active($active, $order_id);
         echo json_encode([
             'status' => 'success'
          ]);
      }else {
         echo json_encode([
             'status' => 'error'
          ]);
      }
    
    }
    die();
  }else if(exist_param("btn_delete_order")){
    order_detail_delete($_POST['id']);
    $total = order_select_by_id($_POST['order_id']);
    order_update_total(($total['total'] -  $_POST['total']), $_POST['order_id']);
    echo json_encode(['status' => 'success']);
    die();
  }else{
    $data =  order_selectall();
    $VIEW_NAME = "don-hang.php";
    
  }
  require "../layout.php";
?>   