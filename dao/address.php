<?php
 require_once "pdo.php";
function tinh_selectall(){
   $sql = "SELECT * FROM `devvn_tinhthanhpho`";
   return pdo_query($sql);
}
function huyen_select_by_ma_tinh($ma_tp){
   $sql = "SELECT * FROM `devvn_quanhuyen` WHERE `matp` = ?";
   return pdo_query($sql, $ma_tp);
}
function xa_select_by_ma_huyen($ma_huyen){
   $sql = "SELECT * FROM `devvn_xaphuongthitran` WHERE `maqh` = ?";
   return pdo_query($sql, $ma_huyen);
}
function address_selectall($ma_tp, $ma_qh, $ma_xa){
    $sql= "SELECT `devvn_tinhthanhpho`.`name` as `city`, `devvn_quanhuyen`.`name` as `district`, `devvn_xaphuongthitran`.`name` as `aware` FROM `devvn_tinhthanhpho`, `devvn_quanhuyen`, `devvn_xaphuongthitran` WHERE `devvn_tinhthanhpho`.`matp` =  ? AND `devvn_quanhuyen`.`maqh` = ? AND `devvn_xaphuongthitran`.`xaid` = ?";
    return (pdo_query_one($sql, $ma_tp, $ma_qh, $ma_xa));
}


?>