
<?php 
  session_start();
  include'./ketnoi2/ketnoi.php';
  date_default_timezone_set('Asia/Ho_Chi_Minh');
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>

    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <title>ADMIN</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/styleadmin.css">
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
   
  </head>
  <body class="app sidebar-mini rtl">

      <?php  
        include_once'temp/header.php';
      ?>
      <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
      <?php include_once"temp/sidebar.php"; ?>
       <main class="app-content" id="back">
        <?php
               if (isset($_GET['page_layout'])) {
                    switch ($_GET['page_layout']) {
                        case 'loaihang':
                        include_once './layout/loaihang.php';
                        break;
                        case 'themloaihang':
                        include_once 'layout/themloaihang.php';
                        break;
                        case 'sualoaihang':
                        include_once 'layout/sualoaihang.php';
                        break;
                         case 'xoaloaihang':
                        include_once 'layout/xoaloaihang.php';
                        break;
                        case 'xoahh':
                        include_once 'layout/xoahh.php';
                        break;
                        case 'hanghoa':
                        include_once 'layout/hanghoa.php';
                        break;
                        case 'khachhang':
                        include_once 'layout/khachhang.php';
                        break;
                        case 'themkhachhang':
                        include_once 'layout/themkhachhang.php';
                        break;
                        case 'xoakhachhang':
                        include_once 'layout/xoakhachhang.php';
                        break;
                        case 'suakhachhang':
                        include_once 'layout/suakhachhang.php';
                        break;
                        case 'themhh':
                        include_once 'layout/themhh.php';
                        break;
                        case 'suahh':
                        include_once 'layout/suahh.php';
                        break;
                        case 'themkh':
                        include_once 'layout/themkh.php';
                        break;
                        case 'suakh':
                        include_once 'layout/suakh.php';
                        break;
                         case 'cmt':
                        include_once 'layout/cmt.php';
                        break;
                        case 'chitietcmt':
                        include_once 'layout/chitietcmt.php';
                        break;
                        

                    }
                } 
                else{

                        include_once 'layout/thongke.php';
                    
                }
                ?>
            </main>




    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/plugins/pace.min.js"></script>
    <script type="text/javascript" src="js/plugins/chart.js"></script>
 
  </body>
</html>
<?php 
  include"./../ketnoi/endketnoi.php";
 ?>