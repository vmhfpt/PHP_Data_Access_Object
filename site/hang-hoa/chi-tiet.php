

<?php
require "../../global.php";
require "../../dao/pdo.php";
require "../../dao/loai_hang.php";
require "../../dao/hang_hoa.php";
require "../../dao/binh_luan.php";
// get product by id
if(isset($_GET['hang_hoa'])){
    $item = hang_hoa_select_by_id($_GET['hang_hoa']);
    if($item){
        auto_increase_view_hang_hoa($item['ma_hh']);
        $productSuggest = hang_hoa_select_suggest_by_the_same_loai_hang($item['ma_loai']);
        $comments = binh_luan_select_by_hang_hoa($item['ma_hh']);
    }
}


// auto incredient view number for product

// select products suggest in the same category or price

// select all comments of this product through id primary
if (exist_param("insert-comment")) {
   // var_dump('handle insert to database comment here');
    extract($_POST);
    if(isset($_SESSION["user"])){
        $iDNew =  binh_luan_get_lastId($content, $_SESSION["user"]["ma_kh"], $id);
        $data = binh_luan_getinfor($iDNew);
        echo  json_encode($data);
    }else {
       echo  json_encode(["status" => "Người dùng chưa đăng nhập"]);
    }
    die();
} 


$VIEW_NAME = 'hang-hoa/chi-tiet-ui.php';
$dsloai = loai_selectall();
require "../layout.php";