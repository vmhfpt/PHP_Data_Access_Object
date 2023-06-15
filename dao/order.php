<?php
 require_once "pdo.php";
function order_insert_get_lastId($ma_kh, $transport_fee, $discount_code, $note, $name, $phone_number, $address, $total, $active){
    $date = date('Y-m-d H:m:s');
    $sql = "INSERT INTO `order` (`ma_kh`, `transport_fee`, `discount_code`, `note`, `name`, `phone_number`, `address_detail`, `total`, `active`, `created_at`, `updated_at`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ? , ?)";
    return pdo_query_get_lastId($sql,$ma_kh, $transport_fee, $discount_code, $note, $name, $phone_number, $address, $total, $active, $date, $date);
}
function order_select_by_user_id($ma_kh){
   $sql = "SELECT * FROM `order` WHERE `ma_kh` = ? ORDER BY `order`.`id` DESC";
   return pdo_query($sql, $ma_kh);
}
function order_select_by_id($id){
    $sql = "SELECT * FROM `order` WHERE `id` = ? ORDER BY `order`.`id` DESC";
   return pdo_query_one($sql, $id);
}
function order_selectall(){
    $sql = "SELECT * FROM `order`  ORDER BY `order`.`id` DESC";
    return pdo_query($sql);
}
function order_change_active($active, $order_id){
    $sql = "UPDATE `order` SET `active` = ? WHERE `order`.`id` = ?";
    pdo_execute($sql, $active, $order_id);
}
function order_update_total($total, $order_id){
    $sql = "UPDATE `order` SET `total` = ? WHERE `order`.`id` = ?";
    pdo_execute($sql,$total, $order_id);
}
function order_select_suggest(){
    $sql = "SELECT * FROM `order` ORDER BY `order`.`id` DESC LIMIT 13";
    return pdo_query($sql);
}

function order_statistic_get(){
    $sql = "SELECT SUM(`order`.`total`) AS `total_price`, COUNT(*) AS `total`, `order`.`active`  FROM `order` GROUP BY `order`.`active`";
    return pdo_query($sql);
}

?>