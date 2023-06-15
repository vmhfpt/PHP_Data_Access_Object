<?php
  
  require "../../global.php";
  require_once "../../dao/khach_hang.php";
  require_once "../../dao/order.php";
  require_once "../../dao/order_detail.php";
  require_once "../../dao/binh_luan.php";
  require_once "../../dao/hang_hoa.php";
  require_once "../../dao/thong_ke.php";
  check_login();
  extract($_REQUEST);
 
  if(exist_param("chart")){
    $dataItem = thong_ke_hang_hoa();
    $VIEW_NAME = "chart.php";
  }else{
    $VIEW_NAME = "list.php";
    $dataItem = thong_ke_hang_hoa();
  }
  require "../layout.php";
?>  