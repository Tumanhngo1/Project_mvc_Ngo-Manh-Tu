<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title><?php echo  $this->page_title ;?></title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" href="css/all.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/> -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css"
        integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

    <link rel="stylesheet" href="assets/css/reponsive.css">

    <!--    <link rel="stylesheet" type="text/css" href="assets/css/style.css">-->
</head>

<body>

    <div class="header">
        <div class="container">
            <div class="row">
                <div class="col-xs-hideden col-sm-12 col-md-12 col-lg-12 header_top">
                    <div class="header_1">
                        <div class="header_left">
                            <div class="left_1">
                                <span>SẢN PHẨM CHÍNH HÃNG 100%</span>
                            </div>
                            <div class="left_2">
                                <span>Hotline :<a href="tel:0987418332"> 0987 418 332</a></span>
                            </div>
                        </div>
                        <div class="header_right">
                         
                            <div class="login"><span><a href="index.php?controller=user&action=login"><?php
                                $login = '';
                                if (!empty($_SESSION['email'])){
                                    $login = $_SESSION['email']['name'];
                                }else{
                                    $login = "Đăng nhập";
                                }
                                echo $login;
                                ;?></a></span></div>
                            <div class="logout"><span><a href="index.php?controller=user&action=register"><?php
                                 $login = '';
                                if (!empty($_SESSION['email'])){
                                    $login = "<a href='index.php?controller=user&action=logout' >Đăng xuất</a>" ;
                                }else{
                                    $login = "Đăng ký";
                                }
                                echo $login;
                                ;?>
                                    </a></span>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="header-2">
        <nav>
            <div class="container">
                <div class="row header_small">
                    <div class="col-md-2 col-lg-2 logo_top">
                        <a href="#" class="logo"><img src="assets/img/logo.jpg"></a>
                    </div>
                    <div class=" col-md-8 col-lg-8 header_menu">
                        <div class="toggie">
                            <i class="fa-solid fa-bars"></i>
                        </div>
                        <ul class="menu">
                            <li class="head_menu">

                                <a id="small" href="index.php?controller=product&action=champion">SNEACKERS</a>
                                <div id="big">
                                    <a  href="">SNEACKERS</a>
                                    <ul class="sub-menu">
                                        <?php foreach ($categories as $category):?>
                                        <li><a
                                                href="index.php?controll=product&action=index&id=<?php echo $category['id'];?>"><?php echo $category['name'];?></a>
                                        </li>
                                        <?php endforeach;?>
                                    </ul>
                                </div>
                                <!-- <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3"> -->
                            </li>
                            <li><a href="index.php?controller=product&action=champion">CHAMPION</a></li>
                            <li><a style="color: red;" href="index.php?controller=product&action=sale">SALE OFF</a></li>
                            <li><a href="index.php?controller=product&action=clothing">CLOTHING</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-12 col-md-2 col-lg-2 search_menu">
                        <ul class="search-menu">
                            <div class="search">
                                <?php
                                 $cart = '';
                                 $pro = '';
                                if (isset($_SESSION['email'])){
                                    $cart = "<a class='card_head' href='index.php?controller=cart&action=index' ><i class='fas fa-shopping-cart'></i></a>" ;
                                    $pro =  "<a class='card_head' href='index.php?controller=cart&action=show' ><i class='fa-brands fa-pushed'></i></a>" ;
                                }else{
                                    $cart = "<a class='card_head'  href='index.php?controller=cart&action=index' ><i class='fas fa-shopping-cart'></i></a>";
                                    $pro = "<a class='card_head'  href='index.php?controller=user&action=login' ><i class='fa-brands fa-pushed'></i></a>";
                                }
                                echo $cart;
                                echo $pro;
                                ;?>
                                </a>
                            </div>
                            <div class="list">
                                <ul>

                                </ul>
                            </div>

                        </ul>
                    </div>

                </div>

            </div>
        </nav>
    </div>
    </div>
    <div class="main">
        <div class="backtop">
            <i class="fa-solid fa-angle-up"></i>
        </div>
       

        <?php if(isset($this->error)):?>
        <div id="toasts">
            <div class="toasts error">
                <i class="fa-solid fa-triangle-exclamation"></i>
                <span class="messege"><?php echo $this->error ;?></span>
                <span class="countdown"></span>
            </div>
        </div>
        <?php elseif(isset($_SESSION['error'])) :?>
            <div id="toasts">
            <div class="toasts error">
                <i class="fa-solid fa-triangle-exclamation"></i>
                <span class="messege">
                    <?php echo $_SESSION['error'];
                            unset($_SESSION['error'])
                    ;?>
                </span>
              
            </div>
        </div>
        <?php endif ;?>
        <?php if(isset($_SESSION['success'])): ;?>
        <div id="adimation">
            <div class="adimation success">
            <i class="fa-solid fa-circle-check"></i>
                <span class="">
                <?php echo $_SESSION['success'];
                            unset($_SESSION['success'])
                    ;?>
                </span>
             
            </div>
        </div>
            <?php endif; ?>
        <?php echo $this->content;?>

    </div>
    <section class="contact_form">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-12 col-sm-12 col-lg-12">
                    <div class="footer-top">
                        <div class="col-xs-4 col-md-4 col-sm-4 col-lg-6 footer__top">
                            <a href="#" title="The Plues">
                                <img class="img-responsive" alt="the-plus" src="assets/img/logo.jpg">
                            </a>
                        </div>
                        <div class="col-xs-12 col-md-8 col-sm-12 col-lg-6">
                            <div class="footer-top__info">
                                <h4 class="footer-title">
                                    <span>
                                        <h6>SNEACKER PlUS - 100% AUTHENTIC</h6>
                                    </span>
                                </h4>
                                <ul>
                                    <li>
                                        Địa chỉ: Quốc Oai – Hà Nội
                                    </li>
                                    <li>
                                        Hotline: <a href="tel:0987418332">0987 418 332</a>
                                    </li>
                                    <li>
                                        Email: <a href="mailto:Tublue32@gmail.com">TFM3017@gmail.com</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footers_end">
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-sm-12 col-lg-12 footer_end">
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 ends">
                            <div class="footer_main">
                                <span>
                                    <h6>Giới thiệu</h6>
                                </span>
                                <ul class="information">
                                    <li><a href="index.php?controller=product&action=champion">Sneacker</a></li>
                                    <li><a href="index.php?controller=product&action=sale">Giảm giá</a></li>
                                    <li><a href="index.php?controller=product&action=clothing">Clothing</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 ends">
                            <div class="footer_main2">
                                <span>
                                    <h6><b>Chính sách</b></h6>
                                </span>
                                <ul class="information">
                                    <li><a href="index.php?controll=product&action=chinhsach">chính sách đổi trả</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 ends">
                            <div class="footer_main3">
                                <Span>
                                    <h6>Kết nối chúng tôi</h6>
                                </Span>
                                <ul class="footer__end">
                                    <li><a href=""><i class="fa-brands fa-facebook"></i></a></li>
                                    <li><a href=""><i class="fa-brands fa-instagram-square"></i></a></li>
                                    <li><a href=""><i class="fa-regular fa-envelope"></i></a></li>
                                    <li><a href=""><i class="fa-brands fa-twitter-square"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <footer>
            <div class="col-xs-12 col-md-12 col-sm-12 col-lg-12">
                <p>
                    Copyright &copy; 2022 by TuBlue
                </p>
            </div>
        </footer>

        </div>


        <script src="assets/js/jquery-3.6.0.js"></script>
        <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
        <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.12.0.min.js"></script>
        <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
        <script src="assets/js/main.js"></script>

        <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <script type="text/javascript" src="slick/slick.min.js"></script>
        <script>
        $('.autoplay').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 5000,
        });
        </script>
        <script>
        $('.autolist').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3000,
        });
        </script>

</body>

</html>