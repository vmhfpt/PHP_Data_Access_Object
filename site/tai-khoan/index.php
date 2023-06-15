<?php
require "../../global.php";
require "../../dao/pdo.php";
require "../../dao/loai_hang.php";
require "../../dao/hang_hoa.php";
require "../../dao/khach_hang.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../library/PHPMailer/Exception.php';
require '../../library/PHPMailer/PHPMailer.php';
require '../../library/PHPMailer/SMTP.php';


if (!session_id()) {
  session_start();
}
if (exist_param("dang-ky")) {
  $VIEW_NAME = "tai-khoan/dang-ky.php";
} else if (exist_param("btn_register") && !empty($_POST)) {
  extract($_POST);

  try {
    $regex = '/^([a-zA-Z0-9ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]{2,})$/i';
    $regexEmail = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
    $regexPassword = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/';
    $regexFirst = '/^[a-zA-Z0-9]{2,}$/';
    if (!preg_match($regexFirst, $ma_khach_hang)) {
      $MESSAGE[] = "* Mã khách hàng phải từ 2 ký tự và không chứa ký tự đặc biệt";
    }
    if (!preg_match($regexPassword, $mat_khau)) {
      $MESSAGE[] = "* Mật khẩu phải từ 8 kí tự và bao gồm chữ cái in hoa, thường và số";
    }
    if (khach_hang_exist($ma_khach_hang)) {
      $MESSAGE[] = "* Tên đăng nhập đã đăng ký";
    }
    if (!preg_match($regex,  $ten_khach_hang)) {
      $MESSAGE[] = "* Tên khách hàng phải từ 2 đến 27 ký tự trở lên và không chứa ký tự đặc biệt";
    }
    if (!preg_match($regexEmail,  $email)) {
      $MESSAGE[] = "* Email không hợp lệ";
    }


    if (count($MESSAGE) == 0) {
      khach_hang_insert($ma_khach_hang, md5($mat_khau), $ten_khach_hang, 0, '', $email, 0);
      $MESSAGE = "Vui lòng đăng nhập lại";
      unset($ma_khach_hang, $mat_khau, $ten_khach_hang,  $email);
      $VIEW_NAME = "tai-khoan/dang-nhap.php";
    } else {
      $VIEW_NAME = "tai-khoan/dang-ky.php";
    }
  } catch (Exception $exc) {
    $MESSAGE[] = "* Đăng ký thất bại";
    $VIEW_NAME = "tai-khoan/dang-ky.php";
  }
} else if (exist_param("btn_login") && !empty($_POST)) {
  extract($_POST);
 

  try {
    $regexPassword = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/';
    $regexUsername = '/^[a-zA-Z0-9]{2,}$/';
    if (!preg_match($regexUsername, $username)) {
      $MESSAGE[] = "* Username phải từ 2 ký tự và không chứa ký tự đặc biệt";
    }
    if (!preg_match($regexPassword, $password)) {
      $MESSAGE[] = "* Mật khẩu phải từ 8 kí tự và bao gồm chữ cái in hoa, thường và số";
    }

    if (count($MESSAGE) == 0) {
      $user = khach_hang_login($username, md5($password));
      if (!$user) {
        $MESSAGE[] = "* Tài khoản hoặc mật khẩu không chính xác";
        $VIEW_NAME = "tai-khoan/dang-nhap.php";
      } else {
        if(isset($remember)){
          add_cookie("user", ["username" => $username, "password" => $password], 3);
        }else {
          delete_cookie("user");
        }
        $_SESSION["user"] = $user;
        unset($username, $passowrd);
        header('Location: '.$SITE_URL.'/dashboard'.'');
        die();
      }
    } else {
      $VIEW_NAME = "tai-khoan/dang-nhap.php";
    }
  } catch (Exception $exc) {
    $MESSAGE[] = "* Đăng nhập thất bại";
    $VIEW_NAME = "tai-khoan/dang-nhap.php";
  }
} else if (exist_param("dang-nhap")) {
  $VIEW_NAME = "tai-khoan/dang-nhap.php";
} else if (exist_param("btn_logout")) {
  unset($_SESSION["user"]);
  $VIEW_NAME = "tai-khoan/dang-nhap.php";
} else if (exist_param("authentication")) {

  if (isset($_POST['type']) && $_POST['type'] == "authentication") {
    if (isset($_POST['email'])) {
      $email = $_POST['email'];
      $data = khach_hang_exist_by_email($email);
      $dataItem = khach_hang_select_by_email($email);
      if ($data) {
        $mail = new PHPMailer(true);
        try {
          $otp =  mt_rand(100000, 999999);
          $mail->isSMTP(); // using SMTP protocol                                     
          $mail->Host = 'smtp.gmail.com'; // SMTP host as gmail 
          $mail->SMTPAuth = true;  // enable smtp authentication                             
          $mail->Username = 'tuyetnhung200201@gmail.com';  // sender gmail host              
          $mail->Password = 'pevupqufusoaiatg'; // sender gmail host password                          
          $mail->SMTPSecure = 'tls';  // for encrypted connection                           
          $mail->Port = 587;   // port for SMTP     

          $mail->setFrom('tuyetnhung200201@gmail.com', "Admin"); // sender's email and name
          $mail->addAddress($email, "Xác thực OTP!");  // receiver's email and name

          $mail->Subject = 'Forget Password';
          $mail->Body    = 'Mã OTP khôi phục mật khẩu cho ' . $email . ': ' . $otp;

          $mail->send();
          $_SESSION["force_user"] =  [
            'id' => $dataItem['ma_kh'],
            'otp' =>  $otp,
            'email' => $email
          ];
          echo json_encode([
            'status' => 'success',
            'message' => 'send OTP  success'
          ]);
        } catch (Exception $e) { // handle error.
          echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
      } else {
        echo json_encode([
          'status' => 'error',
          'message' => '* Địa chỉ email chưa được đăng ký'
        ]);
      }
    }
  }
  die();
} else if (exist_param("send-otp")) {
  if (isset($_POST['type'])  && $_POST['type'] == "send-otp") {
    if ($_SESSION["force_user"]["otp"] == $_POST['otp'] && $_SESSION["force_user"]["email"] == $_POST['email']) {
      khach_hang_update_password($_POST['password'], $_SESSION["force_user"]["id"],$_SESSION["force_user"]["email"] );
      unset($_SESSION["force_user"]);
      echo json_encode([
        'status' => 'success',
        'message' => '* Đổi mật khẩu thành công'
      ]);
    } else {
      echo json_encode([
        'status' => 'error',
        'message' => '* Mã OTP không khớp'
      ]);
    }
  }
  die();
} else {
  $VIEW_NAME = "tai-khoan/dang-nhap.php";
}
$dsloai = loai_selectall();
require "../layout.php";
