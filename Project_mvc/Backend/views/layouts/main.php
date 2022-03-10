<!--
views/layouts/main.php
- Cách ghép layout từ giao diện backend tĩnh đã chuẩn bị:
+ Copy toàn bộ cấu trúc html css js từ template tĩnh vào cấu trúc thư mục MVC tương ứng của bạn
+ Copy nội dung file template HTML chính (mockup_html/backend/index.html) paste vào file main.php
+ Kiểm tra lại toàn bộ url tới các file css, js, image cho đúng với cấu trúc MVC hiện tại
+ Gán các thuộc tính động cho layout
-->

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $this->page_title; ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link rel="stylesheet" href="assets/css/AdminLTE.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="assets/css/_all-skins.min.css">
    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <!-- sidebar ->-->
        <!--    </aside>-->
        <?php require_once "views/layouts/header.php";?>
        <!-- Breadcrumd Wrapper. Contains breadcrumb -->
        
<div class="top">
        <?php if (isset($_SESSION['success'])):?>
        <div class="toasts">
            <div class="toasts success">
                <!-- <i class="fa-solid fa-circle-check"></i> -->
                <i class="fa-solid fa-triangle-exclamation"></i>
                <span class="messege">
                    <?php
                echo $_SESSION['success'];
                unset($_SESSION['success']);?>
                </span>
                <span class="countdown"></span>
            </div>
        </div>
        <?php endif ;?>

        <?php if(isset($this->error)):?>
        <div id="toasts">
            <div class="toasts error">
                <!-- <i class="fa-solid fa-circle-check"></i> -->
                <i class="fa-solid fa-triangle-exclamation"></i>
                <span class="messege"><?php echo $this->error ;?></span>
                <span class="countdown"></span>
            </div>
        </div>
        <?php endif;?>
        <?php  if (isset($_SESSION['error'])):?>
        <div id="toasts">
            <div class="toasts error">
                <!-- <i class="fa-solid fa-circle-check"></i> -->
                <i class="fa-solid fa-triangle-exclamation"></i>
                <span class="messege"><?php 
                 echo $_SESSION['error'];
                  unset($_SESSION['error']);?></span>
                <span class="countdown"></span>
            </div>
        </div>
        <?php endif;?>>
        </div>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content">
                <!--            Nội dung hiển thị ở đây-->
                <?php echo $this->content; ?>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 2.4.13-pre
            </div>
            <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE</a>.</strong> All rights
            reserved.
        </footer>
        <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery 3 -->
    <script src="assets/js/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="assets/js/jquery-ui.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- nhúng file CKeditor -->
    <script src="assets/ckeditor/ckeditor.js"></script>
    <!-- AdminLTE App -->
    <script src="assets/js/adminlte.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>