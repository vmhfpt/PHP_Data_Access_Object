<?php
require "../../global.php";
require "../../dao/pdo.php";
require "../../dao/loai_hang.php";
require "../../dao/hang_hoa.php";

if (exist_param("gioi-thieu")) {
    $VIEW_NAME = "trang-chinh/gioi-thieu.php";
} else if (exist_param("cua-hang")) {
    $VIEW_NAME = "trang-chinh/cua-hang.php";
}else {
    $firstItem = hang_hoa_select_by_id_loai_hang(35);
    $secondItem = hang_hoa_select_by_id_loai_hang(37);
    $thirdthItem = hang_hoa_select_by_id_loai_hang(33);
    $fourthItem = hang_hoa_select_by_id_loai_hang(38);
    $fivethItem = hang_hoa_select_by_id_loai_hang(39);
    $sixthItem = hang_hoa_select_by_id_loai_hang(40);
    $VIEW_NAME = "trang-chinh/trang-chu.php";
}

$dsloai = loai_selectall();
require "../layout.php";
