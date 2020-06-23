<?php
session_start();
include_once "common.php";
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>OBC Web</title>

    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicons -->
    <link href="./img/icon/shortcut.JPG" rel="icon">
    <link href="./img/icon/shortcut.JPG" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700|Open+Sans:300,300i,400,400i,700,700i" rel="stylesheet">

    <!-- Bootstrap CSS File -->
    <link href="./lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Libraries CSS Files -->
    <link href="./lib/animate/animate.min.css" rel="stylesheet">
    <link href="./lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="./lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="./lib/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Main Stylesheet File -->
    <link href="./css/style.css" rel="stylesheet">
    <link href="./css/obc_style.css" rel="stylesheet">

    <!-- JavaScript Libraries -->
    <script src="./js/main.js"></script>
    <script src="./lib/jquery/jquery.min.js"></script>
    <script src="./lib/jquery/jquery-migrate.min.js"></script>
    <script src="./lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="./lib/easing/easing.min.js"></script>
    <script src="./lib/wow/wow.min.js"></script>
    <script src="./lib/superfish/hoverIntent.js"></script>
    <script src="./lib/superfish/superfish.min.js"></script>
    <script src="./lib/magnific-popup/magnific-popup.min.js"></script>

    <!-- Contact Form JavaScript File -->
    <script src="./contactform/contactform.js"></script>

    <!-- Template Main Javascript File -->
    <script src="./js/main.js"></script>
</head>
<body>
<header>
    <!--==============================================================================
                    타이틀 영역
        ================================================================================-->
    <div id="obc_title"></div>
</header>
<!--==============================================================================
                입력 영역
    ================================================================================-->
<div style="height: 70vh">
    <!--==========================
          Text
        ============================-->
    <div class="center">
        <h1>输入窗管理</h1>
    </div>
    <!--==========================
          Input
        ============================-->
    <div id="input_form_datalist">
    </div>
    <!--==========================
          Button
        ============================-->
    <div class="center">
        <input class="btn-get-started btn-info scrollto"
               id="updateButton"
               type="button"
               name="save"
               style="outline: none; font-size: 16pt"
               onclick="submit_basic(this)"
               value="保存">
        <input class="btn-get-started btn-success"
               id="searchButton"
               type="button"
               name="search"
               style="outline: none; font-size: 16pt"
               onclick="submit_basic(this)"
               value="检索">
    </div>
    <!--==========================
          Table
        ============================-->
    <div id="table_root" class="table-area center" style="margin-bottom: 10%">
    </div>
</div>
<div id="common_part"></div>
<div class="footer" id="home_button"></div>
</body>
</html>
<script src="common.js"></script>