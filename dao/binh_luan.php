<?php
 require_once "pdo.php";
function binh_luan_selectall(){
   $sql = "SELECT * FROM binh_luan";
   return pdo_query($sql);
}
function binh_luan_insert($noi_dung, $ma_kh, $ma_hh){
    $ngay_bl = date('Y-m-d H:m:s');
    $sql = "INSERT INTO `binh_luan` (`noi_dung`, `ma_kh`, `ma_hh`, `ngay_bl`) VALUES (?, ?, ? , ?);";
    pdo_execute($sql, $noi_dung, $ma_kh, $ma_hh, $ngay_bl);
}
function binh_luan_delete($ma_bl){
    $sql = "DELETE FROM `binh_luan` WHERE `ma_bl` = ?";
    pdo_execute($sql, $ma_bl);
}
function binh_luan_getinfor($ma_bl){
    $sql = "SELECT `binh_luan`.*, `khach_hang`.`ho_ten` FROM `binh_luan` JOIN `khach_hang` WHERE `binh_luan`.`ma_kh` = `khach_hang`.`ma_kh` AND `binh_luan`.`ma_bl` = ?";
    return (pdo_query_one($sql, $ma_bl));
}
function binh_luan_update($noi_dung, $ma_kh, $ma_hh, $ma_bl){
    $sql = "UPDATE `binh_luan` SET `noi_dung` = ?, `ma_kh` = ?, `ma_hh` = ? WHERE `binh_luan`.`ma_bl` = ?";
    pdo_execute($sql, $noi_dung, $ma_kh, $ma_hh, $ma_bl);
}
function binh_luan_select_by_hang_hoa($ma_hh){
  $sql = "SELECT `binh_luan`.*, `khach_hang`.`ho_ten` FROM `binh_luan` JOIN `khach_hang` WHERE `binh_luan`.`ma_kh` = `khach_hang`.`ma_kh` AND `binh_luan`.`ma_hh` = ? ORDER BY `binh_luan`.`ma_bl` DESC";
  return pdo_query($sql, $ma_hh);
}
function binh_luan_get_lastId($noi_dung, $ma_kh, $ma_hh, $vote){
    $ngay_bl = date('Y-m-d H:m:s');
    $sql = "INSERT INTO `binh_luan` (`noi_dung`, `ma_kh`, `ma_hh`, `ngay_bl`, `vote`) VALUES (?, ?, ? , ?, ?);";
   return  pdo_query_get_lastId($sql, $noi_dung, $ma_kh, $ma_hh, $ngay_bl, $vote);
}
function binh_luan_get_list_hang_hoa(){
    $sql = "SELECT `hang_hoa`.`ma_hh`, `loai`.`ten_loai`, `hang_hoa`.`hinh`, `hang_hoa`.`ten_hh`, COUNT(`binh_luan`.`ma_hh`) AS `total`, MAX(`binh_luan`.`ngay_bl`) AS `moi_nhat`, MIN(`binh_luan`.`ngay_bl`) AS `cu_nhat` FROM `hang_hoa` JOIN `binh_luan` JOIN `loai` WHERE `binh_luan`.`ma_hh` = `hang_hoa`.`ma_hh` AND  `hang_hoa`.`ma_loai` = `loai`.`ma_loai`  GROUP BY `binh_luan`.`ma_hh`, `hang_hoa`.`ten_hh` HAVING `total` > 0 ORDER BY `hang_hoa`.`ma_hh` DESC" ;
    return pdo_query($sql);
}
function binh_luan_get_top_5(){
    $sql = "SELECT `binh_luan`.`noi_dung`, `binh_luan`.`ngay_bl`, `hang_hoa`.`ten_hh`, `khach_hang`.`ho_ten` FROM `binh_luan` JOIN `hang_hoa` JOIN `khach_hang` WHERE `binh_luan`.`ma_kh` = `khach_hang`.`ma_kh` AND `binh_luan`.`ma_hh` = `hang_hoa`.`ma_hh` ORDER BY `binh_luan`.`ngay_bl` DESC LIMIT 5 OFFSET 0";
    return pdo_query($sql);
}
//var_dump(loai_search('1'));
//var_dump(loai_selectall());
//loai_insert('vai ca lon');
//loai_delete(1);
//var_dump(loai_getinfor(2)); name must contain lest one character special and number 
//loai_update(2, "name update");

?>