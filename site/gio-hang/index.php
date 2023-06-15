<?php
require "../../global.php";
require "../../dao/pdo.php";
require "../../dao/loai_hang.php";
require "../../dao/hang_hoa.php";
require "../../dao/address.php";
require "../../dao/order_detail.php";
require "../../dao/order.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../library/PHPMailer/Exception.php';
require '../../library/PHPMailer/PHPMailer.php';
require '../../library/PHPMailer/SMTP.php';



function sendEmail($email, $total, $carts, $user, $address)
{
    $template = "";
    for ($i = 0; $i < count($carts); $i++) {
        $template  = $template  . "<tr><td>#" . ($i + 1) . "</td><td>" . $carts[$i]["name"] . "</td><td>" . $carts[$i]["price_sale"] . "</td><td>" . $carts[$i]["quantity"] . "</td></tr>";
    }
    $template = "<table><tr><th>STT</th><th>Name</th><th>Price</th><th>Quantity</th></tr>" . $template . "</table><br/>";

    $templateUser = " <br/><ul>
      <li> Ten : " . $user['name'] . "</li>
        <li> Email : " . $user['email'] . "</li>
        <li> SDT : " . $user['phone'] . "</li>
        <li> Ghi chu : " . $user['note'] . "</li>
        <li> Dia chi nhan hang : " . $address . "</li>
    </ul>
   ";

    $mail = new PHPMailer(true);
    try {

        $mail->isSMTP(); // using SMTP protocol                                     
        $mail->Host = 'smtp.gmail.com'; // SMTP host as gmail 
        $mail->SMTPAuth = true;  // enable smtp authentication                             
        $mail->Username = 'tuyetnhung200201@gmail.com';  // sender gmail host              
        $mail->Password = 'pevupqufusoaiatg'; // sender gmail host password                          
        $mail->SMTPSecure = 'tls';  // for encrypted connection                           
        $mail->Port = 587;   // port for SMTP     

        $mail->setFrom('tuyetnhung200201@gmail.com', "Admin"); // sender's email and name
        $mail->addAddress($email, "Don hang");  // receiver's email and name
        $mail->isHTML(true);
        $mail->Subject = 'Chi tiet don hang';
        $mail->Body    = '<h1> Dat hang thanh cong ! </h1><br/>' . $template . 'Tong tien : ' . $total . "VND" . $templateUser;

        $mail->send();
    } catch (Exception $e) { // handle error.
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
}

function addOder($carts, $user)
{
    $idUser = '';
    if (isset($_SESSION["user"])) {
        $idUser = $_SESSION["user"]['ma_kh'];
    }
    $total = 0;
    for ($i = 0; $i < count($carts); $i++) {
        $total = $total + ((int)$carts[$i]['quantity'] * (int)$carts[$i]['price_sale']);
    }
    $dataAddress = address_selectall($user["address_code"]["city"], $user["address_code"]["district"], $user["address_code"]["aware"]);
    $fullAddress = $user["address"] . "," . $dataAddress["aware"] . "," . $dataAddress["district"] . "," . $dataAddress["city"];
    $oderId = order_insert_get_lastId($idUser, 0, 0, $user['note'], $user['name'], $user['phone'],$fullAddress, $total, 6);
    for ($i = 0; $i < count($carts); $i++) {
        order_detail_insert($oderId, $carts[$i]['id'], $carts[$i]['price_sale'] , $carts[$i]['quantity']);
    }
    sendEmail($user['email'], $total, $carts, $user, $fullAddress);
    echo json_encode([
        "status" => 'success',
        'address' => $fullAddress,
        'name' => $user['name'],
        'email' => $user['email']
    ]);
}


$dsloai = loai_selectall();

$dataCity = tinh_selectall();

if (exist_param("district")) {
    $dataItem = huyen_select_by_ma_tinh($_POST['id']);
    echo  json_encode($dataItem);
    die();
} else if (exist_param("different")) {
    $dataItem = xa_select_by_ma_huyen($_POST['id']);
    echo  json_encode($dataItem);
    die();
} else if (exist_param("purchase_confirm")) {
    $userSession = null;
    if (isset($_SESSION["user"])) {
        $userSession = $_SESSION["user"];
    }
    $carts = [];
    if (!empty($_POST)) {
        if (isset($_POST['carts'])) {
            $carts = $_POST['carts'];
        }
        if (isset($_POST['detail_user'])) {
            $detailUser = $_POST['detail_user'];
        }

        if (is_null($userSession)) {
            addOder($carts, $detailUser);
        } else {
            $new = [
                'email' => $userSession['email'],
                'name' => $userSession['ho_ten'],
                'phone' => $detailUser['phone'],
                'note'  => $detailUser['note'],
                'address_code' => $detailUser['address_code'],
                'address'  => $detailUser['address'],
            ];

            addOder($carts, $new);
        }
    }
    die();
}

$VIEW_NAME = 'gio-hang/gio-hang.php';

require "../layout.php";
