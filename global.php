<?php
if(!session_id()){
    session_start();
    
  }
 


    $ROOT_URL = "/DuAnMau";
    $CONTENT_URL = "$ROOT_URL/content";
    $ADMIN_URL = "$ROOT_URL/admin";
    $SITE_URL = "$ROOT_URL/site";
    $SL_PER_PAGE = 10;

    $IMAGE_DIR = $_SERVER['DOCUMENT_ROOT'] . "$ROOT_URL/content/images";
    $VIEW_NAME = "index.php";
    $MESSAGE = [];
    $UPLOAD_URL_USER = __DIR__ . "/uploaded/user/";
    $UPLOAD_URL_PRODUCT = __DIR__ . "/uploaded/product/";
    $IMAGE_DIR_USER = $ROOT_URL."/uploaded/user/" ;
    $IMAGE_DIR_PRODUCT = $ROOT_URL."/uploaded/product/" ;

    function exist_param($fieldname){
        return array_key_exists($fieldname, $_REQUEST);
    }
    function save_file($file, $path){
        $random =  mt_rand(100000, 999999);
        $name = $random.$file["name"] ;
        move_uploaded_file($file["tmp_name"],$path.$random.$file["name"]);
        return($name);
    }
    function add_cookie($name, $value, $day){
        setcookie($name, json_encode($value), time() + (86400 * $day), "/");
    }
    function delete_cookie($name){
        add_cookie($name, "", -1);
    }
    function get_cookie($name){
        
        if(isset($_COOKIE[$name])){
            return json_decode($_COOKIE[$name]);
        }
        return false;
    }
    function check_login(){
       global $SITE_URL;
       if(isset($_SESSION['user'])){
            if(strpos($_SERVER["REQUEST_URI"], '/admin/') == FALSE && ($_SESSION['user']['vai_tro'] == 0 || $_SESSION['user']['vai_tro'] == 1)){
               return;
            }
            if(strpos($_SERVER["REQUEST_URI"], '/admin/') != FALSE && $_SESSION['user']['vai_tro'] == 1){
                return;
             }
             $_SESSION['request_uri'] = $_SERVER['REQUEST_URI'];
             header('Location: '.$SITE_URL."/tai-khoan/?dang-nhap");
             die();
       }else {
        $_SESSION['request_uri'] = $_SERVER['REQUEST_URI'];
        header('Location: '.$SITE_URL."/tai-khoan/?dang-nhap");
        die();
       }
      
    }
    function validateUploadFile($file) {
          if ($file['size'] > 15 * 1024 * 1024) { // 2Mb = 2 * 1024kb * 1024 bite 
              return ("* File vượt quá 15Mb");
          }
          $validTypes = array('jpg', 'jpeg', 'png', 'bmp');
          $fileType = substr($file['name'], strrpos($file['name'], ".") + 1) ;
          if (!in_array($fileType, $validTypes)) {
             return ('* File chỉ hỗ trợ định dạng jpg, jpeg, png, bmp') ;
          }
         return (false) ;
      }
      function currency_format($number, $suffix = 'đ') {
        if (!empty($number)) {
            return number_format($number, 0, ',', '.') . "{$suffix}";
        }
    }