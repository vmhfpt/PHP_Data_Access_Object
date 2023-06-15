<?php
 require_once "pdo.php";
function khach_hang_selectall(){
   $sql = "SELECT * FROM `khach_hang`";
   return pdo_query($sql);
}
function khach_hang_insert($ma_kh, $mat_khau, $ho_ten, $kich_hoat, $hinh, $email, $vai_tro){
    $sql = "INSERT INTO `khach_hang` (`ma_kh`, `mat_khau`, `ho_ten`, `kich_hoat`, `hinh`, `email`, `vai_tro`) VALUES ( ?, ?, ?, b?, ?, ?, b?)";
    pdo_execute($sql,$ma_kh, $mat_khau, $ho_ten, $kich_hoat, $hinh, $email, $vai_tro);
}
function khach_hang_delete($ma_kh){
    $sql = "DELETE FROM `khach_hang` WHERE `ma_kh` = ?";
    pdo_execute($sql, $ma_kh);
}
function khach_hang_select_by_id($ma_kh){
    $sql = "SELECT * FROM `khach_hang` WHERE `ma_kh`=?";
    return (pdo_query_one($sql, $ma_kh));
}
function khach_hang_update($ma_kh, $mat_khau, $ho_ten, $kich_hoat, $hinh, $email, $vai_tro){
    $sql = "UPDATE `khach_hang` SET `mat_khau` = ?, `ho_ten` = ?, `kich_hoat` = b?, `hinh` = ?, `email` = ?, `vai_tro` = b? WHERE `khach_hang`.`ma_kh` = ?";
    pdo_execute($sql, $mat_khau, $ho_ten, $kich_hoat, $hinh, $email, $vai_tro, $ma_kh);
}
function khach_hang_update_by_use( $mat_khau, $ho_ten,  $hinh, $email, $ma_kh){
    $sql = "UPDATE `khach_hang` SET `mat_khau` = ?, `ho_ten` = ?, `hinh` = ?, `email` = ? WHERE `khach_hang`.`ma_kh` = ?";
    pdo_execute($sql, $mat_khau, $ho_ten,  $hinh, $email, $ma_kh);
}
function khach_hang_search($ma_kh){
    $sql = "SELECT * FROM `khach_hang` WHERE `ma_kh` LIKE ? ";
    return pdo_query($sql, "%$ma_kh%");
}
function khach_hang_exist($ma_kh){
    $sql = "SELECT count(*) FROM `khach_hang` WHERE `ma_kh` = ?";
    return pdo_query_value($sql, $ma_kh) > 0;
}
function khach_hang_exist_by_email($email){
    $sql = "SELECT count(*) FROM `khach_hang` WHERE `email` = ?";
    return pdo_query_value($sql, $email) > 0;
}
function khach_hang_login($username, $password){
   $sql = "SELECT * FROM `khach_hang` WHERE `ma_kh` = ? AND `mat_khau` = ?";
   return (pdo_query_one($sql, $username, $password));
}
function khach_hang_select_by_email($email){
    $sql = "SELECT * FROM `khach_hang` WHERE `email`=?";
    return (pdo_query_one($sql, $email));
}
function khach_hang_update_password($password, $ma_kh, $email){
    $sql = "UPDATE `khach_hang` SET `mat_khau` = ? WHERE `khach_hang`.`ma_kh` = ? AND `khach_hang`.`email` = ?";
    pdo_execute($sql, md5($password), $ma_kh, $email);
}
function select_top_new_khach_hang(){
    $sql = "SELECT * FROM `khach_hang` ORDER BY `khach_hang`.`id` DESC LIMIT 8";
    return pdo_query($sql);
}
//var_dump(khach_hang_selectall());
//khach_hang_insert('cc', 'hucc', 1, 'ima4edf', 'vumfffdinh', 0);
//khach_hang_delete(4);
//khach_hang_update(5, "password update", "name edit", "0", "edit image", "edit email", 1);
//var_dump(khach_hang_select_by_id(4));
?>