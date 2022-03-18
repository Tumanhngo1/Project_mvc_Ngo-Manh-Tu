<?php

$username = '';
$avatar = '';
$year = '';
$id= '';
if (isset($_SESSION['user'])){
    $id = $_SESSION['user']['id'];
    $username = $_SESSION['user']['name'];
    $avatar = $_SESSION['user']['avatar'];
    $year = date('Y',strtotime($_SESSION['user']['created_at']));
}
//var_dump($_SESSION['user']);




?>



<style>
    aside.main-sidebar {
        box-sizing: border-box;
        padding-top: 75px;
    }
</style>
<header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>Tu</b>Blue</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Shop</b>TuBlue</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <i class="fa fa-bars"></i>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <?php if (!empty($avatar)):?>
                        <img src="assets/uploads/<?php echo $avatar;?>" class="user-image" alt="User Image">
                        <?php endif;?>
                        <span class="hidden-xs"><?php echo $username;?></span>
                    </a>
                    <style>
                        .login {
                            margin: 0 10px;
                        }

                    </style>

                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <?php if (!empty($avatar)):?>
                                <img src="assets/uploads/<?php echo $avatar;?>" class="user-image" alt="User Image">
                            <?php endif;?>

                            <p>
                                <?php echo $username;?> - Web Bán Hàng
                                <small>Thành viên từ năm <?php echo $year;?></small>
                            </p>
                        </li>

                        <div class="login">
                            <div class="pull-left">
                                <a href="index.php?controller=user&action=detail&id=<?php echo $id;?>" class="btn btn-default btn-flat btn-sm">Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="index.php?controller=login&action=logout" class="btn btn-default btn-flat btn-sm">Sign
                                    out</a>
                            </div>
                        </div>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <?php if (!empty($avatar)):?>
                    <img src="assets/uploads/<?php echo $avatar;?>" class="img-circle" alt="User Image">
                <?php endif;?>
            </div>
            <div class="pull-left info">
                <p><?php echo $username;?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">LAOYOUT ADMIN</li>

            <li>
                <a href="index.php?controller=category&action=index">
                 <i class="fa fa-code"></i> <span>Quản lý danh mục</span>
                    <span class="pull-right-container">
              <!--<small class="label pull-right bg-green">new</small>-->
            </span>
                </a>
            </li>
            <li>
                <a href="index.php?controller=product&action=index">
                <i class="fa fa-code"></i> <span>Quản lý sản phẩm</span>
                    <span class="pull-right-container">
              <!--<small class="label pull-right bg-green">new</small>-->
            </span>
                </a>
            </li>
            
            <li>
                <a href="index.php?controller=user&action=index">
                    <i class="fa fa-code"></i> <span>Quản lý Admin</span>
                    <span class="pull-right-container">
              <!--<small class="label pull-right bg-green">new</small>-->
            </span>
                </a>
            </li>
            <li>
                <a href="index.php?controller=policy&action=index">
                    <i class="fa fa-code"></i> <span>Quản lý Chính sách</span>
                    <span class="pull-right-container">
              <!--<small class="label pull-right bg-green">new</small>-->
            </span>
                </a>
            </li>
            <li>
                <a href="index.php?controller=product&action=payMent">
                    <i class="fa fa-code"></i> <span>Quản lý Đơn hàng</span>
                    <span class="pull-right-container">
              <!--<small class="label pull-right bg-green">new</small>-->
            </span>
                </a>
            </li>
            <li>
                <a href="index.php?controller=product&action=historyindex">
                    <i class="fa fa-code"></i> <span>Vận chuyển thành công</span>
                    <span class="pull-right-container">
              <!--<small class="label pull-right bg-green">new</small>-->
            </span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

