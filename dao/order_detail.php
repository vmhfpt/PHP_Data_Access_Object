<?php
 require_once "pdo.php";
function order_detail_insert($order_id, $ma_hh, $total, $quantity){
    $date = date('Y-m-d H:m:s');
    $sql = "INSERT INTO `order_detail` ( `order_id`, `ma_hh`, `total`, `quantity`, `created_at`, `updated_at`) VALUES ( ?, ?, ?, ?, ?, ?)";
    pdo_execute($sql, $order_id, $ma_hh, $total, $quantity, $date, $date);
}
function get_order_detail_by_order($order_detail){
    $sql = "SELECT `order_detail`.*, `hang_hoa`.`ten_hh` AS `name_product`, `hang_hoa`.`don_gia` - (`hang_hoa`.`don_gia` * `hang_hoa`.`giam_gia`) AS `price_sale` , `hang_hoa`.`hinh` FROM `order_detail` JOIN `hang_hoa` WHERE `hang_hoa`.`ma_hh` = `order_detail`.`ma_hh` AND `order_detail`.`order_id` = ?";
    
    return pdo_query($sql, $order_detail);
}
function order_detail_delete($id){
    $sql = "DELETE FROM `order_detail` WHERE `id` = ?";
    pdo_execute($sql, $id);
}

?>