<?php
require "../../global.php";
require "../../dao/pdo.php";
require "../../dao/loai_hang.php";
require "../../dao/hang_hoa.php";


if (exist_param("keywords")) {
    $dataItems = hang_hoa_select_by_search_name($_GET['keywords']);
} else if (exist_param("ma-loai")) {
   $dataItems = hang_hoa_select_by_id_loai_hang_page_liet_ke($_GET['ma-loai']);
} else {
   $dataItems = hang_hoa_selectall();
}
$VIEW_NAME = 'hang-hoa/liet-ke-ui.php';
$dsloai = loai_selectall();
require "../layout.php";
