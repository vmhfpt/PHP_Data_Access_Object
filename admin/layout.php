<?php

 if(!isset($_SESSION['user'])) die();
 $user = $_SESSION['user'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Legacy User Menu</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="<?=$CONTENT_URL?>/admin/dist/css/adminlte.min.css?v=3.2.0">



    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
<link rel="stylesheet" href="<?=$CONTENT_URL?>/admin/plugins/fontawesome-free/css/all.min.css">


<link rel="stylesheet" href="<?=$CONTENT_URL?>/admin/plugins/daterangepicker/daterangepicker.css">

<link rel="stylesheet" href="<?=$CONTENT_URL?>/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

<link rel="stylesheet" href="<?=$CONTENT_URL?>/admin/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">

<link rel="stylesheet" href="<?=$CONTENT_URL?>/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

<link rel="stylesheet" href="<?=$CONTENT_URL?>/admin/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="<?=$CONTENT_URL?>/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

<link rel="stylesheet" href="<?=$CONTENT_URL?>/admin/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">

<link rel="stylesheet" href="<?=$CONTENT_URL?>/admin/plugins/bs-stepper/css/bs-stepper.min.css">

<link rel="stylesheet" href="<?=$CONTENT_URL?>/admin/plugins/dropzone/min/dropzone.min.css">

<link rel="stylesheet" href="<?=$CONTENT_URL?>/admin/dist/css/adminlte.min.css?v=3.2.0">

<script src="<?=$CONTENT_URL?>/admin/plugins/jquery/jquery.min.js"></script>
<link rel="stylesheet" href="<?=$CONTENT_URL?>/admin/plugins/summernote/summernote-bs4.min.css">
<script type="text/javascript" src="https://cdn.canvasjs.com/jquery.canvasjs.min.js"></script> 
<script src="https://cdn.socket.io/4.6.0/socket.io.min.js" integrity="sha384-c79GN5VsunZvi+Q/WObgk2in0CbZsHnjEqvFxC5DxHn9lTfNce2WW6h2pH6u/kF+" crossorigin="anonymous"></script>




</head>

<body class="hold-transition sidebar-mini">

    <div class="wrapper">

        <?php
          require "menu.php";
        ?>

        <div class="content-wrapper">

            

      <?php
        include $VIEW_NAME;
      ?>

     <!-- **************************************************************************-->




     <!-- **************************************************************************-->

        </div>

        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.2.0
            </div>
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
        </footer>

        <aside class="control-sidebar control-sidebar-dark">

        </aside>

    </div>


    <script src="<?=$CONTENT_URL?>/admin/plugins/jquery/jquery.min.js"></script>

    <script src="<?=$CONTENT_URL?>/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="<?=$CONTENT_URL?>/admin/dist/js/adminlte.min.js?v=3.2.0"></script>

    <script src="<?=$CONTENT_URL?>/admin/dist/js/demo.js"></script>

<script src="<?=$CONTENT_URL?>/admin/plugins/select2/js/select2.full.min.js"></script>

<script src="<?=$CONTENT_URL?>/admin/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>

<script src="<?=$CONTENT_URL?>/admin/plugins/moment/moment.min.js"></script>
<script src="<?=$CONTENT_URL?>/admin/plugins/inputmask/jquery.inputmask.min.js"></script>

<script src="<?=$CONTENT_URL?>/admin/plugins/daterangepicker/daterangepicker.js"></script>

<script src="<?=$CONTENT_URL?>/admin/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>

<script src="<?=$CONTENT_URL?>/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

<script src="<?=$CONTENT_URL?>/admin/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>

<script src="<?=$CONTENT_URL?>/admin/plugins/bs-stepper/js/bs-stepper.min.js"></script>

<script src="<?=$CONTENT_URL?>/admin/plugins/dropzone/min/dropzone.min.js"></script>


<script src="<?=$CONTENT_URL?>/admin/plugins/flot/jquery.flot.js"></script>

<script src="<?=$CONTENT_URL?>/admin/plugins/flot/plugins/jquery.flot.resize.js"></script>

<script src="<?=$CONTENT_URL?>/admin/plugins/flot/plugins/jquery.flot.pie.js"></script>


</body>

</html>