<?php
 require_once "pdo.php";
function loai_selectall(){
   $sql = "SELECT * FROM loai";
   return pdo_query($sql);
}
function loai_insert($ten_loai){
    $sql = "INSERT INTO `loai` (`ten_loai`) VALUES (?)";
    pdo_execute($sql, $ten_loai);
}
function loai_delete($ma_loai){
    $sql = "DELETE FROM `loai` WHERE `ma_loai` = ?";
    pdo_execute($sql, $ma_loai);
}
function loai_getinfor($ma_loai){
    $sql = "SELECT * FROM `loai` WHERE `ma_loai`=?";
    return (pdo_query_one($sql, $ma_loai));
}
function loai_update($ma_loai, $ten_loai){
    $sql = "UPDATE `loai` SET `ten_loai` = ? WHERE `ma_loai` = ?";
    pdo_execute($sql, $ten_loai, $ma_loai);
}
function loai_search($ten_loai){
    $sql = "SELECT * FROM `loai` WHERE `ten_loai` LIKE ? ";
    return pdo_query($sql, "%$ten_loai%");
}
//var_dump(loai_search('1'));
//var_dump(loai_selectall());
//loai_insert('vai ca lon');
//loai_delete(1);
//var_dump(loai_getinfor(2)); name must contain lest one character special and number 
//loai_update(2, "name update");
?>