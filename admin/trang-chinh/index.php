<?php
  require "../../global.php";
  require_once "../../dao/khach_hang.php";
  require_once "../../dao/binh_luan.php";
  require_once "../../dao/order.php";
  require_once "../../dao/hang_hoa.php";
  require_once "../../dao/thong_ke.php";
  check_login();
 $chartArea = thong_ke_bieu_do_area();
 
 $orderStatistic = order_statistic_get();
 $orderSuggest = order_select_suggest();
 $userSuggest = select_top_new_khach_hang();
 $productSuggest = get_hang_hoa_new_add();
 $commentSuggest = binh_luan_get_top_5();
  $VIEW_NAME="trang-chinh/home.php";
  require "../layout.php";
  //SELECT COUNT(*) AS `total`, `order`.`active`  FROM `order` GROUP BY `order`.`active`;
?>