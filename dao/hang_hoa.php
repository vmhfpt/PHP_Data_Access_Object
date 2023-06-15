<?php
require_once "pdo.php";
function hang_hoa_selectall(){
  $sql = "SELECT * FROM `hang_hoa`";
  return pdo_query($sql);
}
function hang_hoa_insert($ten_hang_hoa, $don_gia, $giam_gia, $hinh, $ngay_nhap, $ma_loai, $dac_biet, $so_luot_xem, $mo_ta){
   $sql = "INSERT INTO `hang_hoa` (`ten_hh`, `don_gia`, `giam_gia`, `hinh`, `ngay_nhap`, `ma_loai`, `dac_biet`, `so_luot_xem`, `mo_ta`) VALUES (?, ?, ?, ?, ?, ?, b?, ?, ?)";
   pdo_execute($sql, $ten_hang_hoa, $don_gia, $giam_gia, $hinh, $ngay_nhap, $ma_loai, $dac_biet, $so_luot_xem, $mo_ta);
}
function hang_hoa_delete($ma_hh){
   $sql = "DELETE FROM `hang_hoa` WHERE `ma_hh` = ?";
   pdo_execute($sql, $ma_hh);
}
function hang_hoa_select_by_id($ma_hh){
   $sql = "SELECT * FROM `hang_hoa` WHERE `ma_hh`=?";
   return (pdo_query_one($sql, $ma_hh));
}
function hang_hoa_select_by_name($ten_hh){
   $sql = "SELECT * FROM `hang_hoa` WHERE `ten_hh`=?";
   return pdo_query($sql, $ten_hh);
}
function hang_hoa_update($ten_hang_hoa, $don_gia, $giam_gia, $hinh, $ngay_nhap, $ma_loai, $dac_biet, $mo_ta, $ma_hang_hoa){
   $sql = "UPDATE `hang_hoa` SET `ten_hh` = ?, `don_gia` = ?, `giam_gia` = ?, `hinh` = ?, `ngay_nhap` = ?, `dac_biet` = b?,  `mo_ta` = ?, `ma_loai` = ? WHERE `hang_hoa`.`ma_hh` = ?";
   pdo_execute($sql, $ten_hang_hoa, $don_gia, $giam_gia, $hinh, $ngay_nhap, $dac_biet, $mo_ta, $ma_loai, $ma_hang_hoa);
}
function hang_hoa_select_by_id_loai_hang($ma_loai_hang){
   $sql = "SELECT `hang_hoa`.`ma_hh`, `hang_hoa`.`ten_hh`, `hang_hoa`.`don_gia`, `hang_hoa`.`giam_gia`, `hang_hoa`.`hinh` FROM `hang_hoa` JOIN `loai` WHERE `loai`.`ma_loai` = `hang_hoa`.`ma_loai` AND `loai`.`ma_loai` = ? ORDER BY `hang_hoa`.`ma_hh` DESC;";
   return pdo_query($sql, $ma_loai_hang);
}
function hang_hoa_select_by_id_loai_hang_page_liet_ke($ma_loai_hang){
   $sql = "SELECT `hang_hoa`.`ma_hh`, `hang_hoa`.`ten_hh`, `hang_hoa`.`don_gia`, `hang_hoa`.`giam_gia`, `hang_hoa`.`hinh` FROM `hang_hoa` JOIN `loai` WHERE `loai`.`ma_loai` = `hang_hoa`.`ma_loai` AND `loai`.`ma_loai` = ? ORDER BY `hang_hoa`.`ma_hh` DESC;";
   return pdo_query($sql, $ma_loai_hang);
}
function hang_hoa_select_top_16(){
   $sql = "SELECT `hang_hoa`.`ten_hh`, `hang_hoa`.`ma_hh` FROM `hang_hoa` ORDER BY `hang_hoa`.`ma_hh` DESC LIMIT 16 OFFSET 0";
   return pdo_query($sql);
}
function hang_hoa_select_by_search_name($name){
   $sql = "SELECT * FROM `hang_hoa` WHERE `ten_hh` LIKE ? ";
   return pdo_query($sql, "%$name%");
}

function hang_hoa_select_suggest_by_the_same_loai_hang($ma_loai){
    $sql = "SELECT * FROM `hang_hoa` WHERE `ma_loai` = ? ORDER BY `hang_hoa`.`ma_hh` DESC LIMIT 10 OFFSET 0";
    return pdo_query($sql, $ma_loai);
}
function auto_increase_view_hang_hoa($ma_hh){
   $sql = "UPDATE `hang_hoa` SET `so_luot_xem` = so_luot_xem + 1 WHERE `hang_hoa`.`ma_hh` = ?";
   pdo_execute($sql,$ma_hh);
}
function get_hang_hoa_new_add(){
   $sql = "SELECT `hang_hoa`.`ma_hh`,`loai`.`ten_loai`,`hang_hoa`.`don_gia`,`hang_hoa`.`hinh`, `hang_hoa`.`ten_hh` FROM `hang_hoa` JOIN `loai` WHERE `loai`.`ma_loai` =`hang_hoa`.`ma_loai` ORDER BY `hang_hoa`.`ma_hh` DESC LIMIT 4";
   return pdo_query($sql);
}
function hang_hoa_pagination($limit, $offset){
   $sql = "SELECT * FROM `hang_hoa` ORDER BY `hang_hoa`.`ma_hh` DESC LIMIT ".$limit." OFFSET ".$offset."";
   return pdo_query($sql);
}
function hang_hoa_count_total(){
   $sql = "SELECT `hang_hoa`.`ma_hh` FROM `hang_hoa`";
   return pdo_query_get_total($sql);
}
//var_dump(hang_hoa_count_total());
//var_dump(hang_hoa_selectall());
//hang_hoa_insert("3","3","3","3","2023-05-17 16:04:45","3",1,"3","3");
//hang_hoa_delete(1);
//hang_hoa_update("5","5","5","5","2023-05-17 16:04:45","2",0,"5","5", 2);
//var_dump(hang_hoa_select_by_id(2));
?>