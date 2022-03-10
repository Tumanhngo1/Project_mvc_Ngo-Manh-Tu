<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Tú Shoes</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css"
        integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css"
        integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/reponsive.css">
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
                         
                            <div class="login"><span><a href="index.php?controller=user&action=login">
                                <?php
                                $login = '';
                                if (isset($_SESSION['email'])){
                                    $login = $_SESSION['email']['name'];
                                }else{
                                    $login = "Đăng nhập";
                                }
                                echo $login;
                                ;?></a></span></div>
                            <div class="logout"><span><a href="index.php?controller=user&action=register"><?php
                                 $login = '';
                                if (isset($_SESSION['email'])){
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
    </div>
    <div class="header-2">
        <nav>
            <div class="container">
                <div class="row ">
                    <div class="col-md-2 col-lg-2 logo_top">
                        <a href="#" class="logo"><img src="assets/img/logo.jpg"></a>
                    </div>
                    <div class=" col-md-8 col-lg-8 header_menu">
                        <div class="toggie">
                            <i class="fa-solid fa-bars"></i>
                        </div>
                        <ul class="menu">
                            <li class="head_menu"><a href="">SNEACKERS</a>
                                <ul class="sub-menu">
                                    <?php foreach ($categories as $category):?>
                                    <li><a
                                            href="index.php?controll=product&action=index&id=<?php echo $category['id'];?>"><?php echo $category['name'];?></a>
                                    </li>
                                    <?php endforeach;?>
                                </ul>
                                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">

                            </li>
                            <li><a href="index.php?controller=product&action=champion">CHAMPION</a></li>
                            <li><a style="color: red;" href="index.php?controller=product&action=sale">SALE OFF</a></li>
                            <li><a href="index.php?controller=product&action=clothing">CLOTHING</a></li>
                        </ul>
                    </div>
                    <div class="col-md-2 col-lg-2 search_menu">
                        <ul class="search-menu">
                            <div class="search">
                                <?php
                                 $cart = '';
                                 $pro = '';
                                if (isset($_SESSION['email'])){
                                    $cart = "<a class='card_head' href='index.php?controller=cart&action=index' ><i class='fas fa-shopping-cart'></i></a>" ;
                                    $pro =  "<a class='card_head' href='index.php?controller=cart&action=show' ><i class='fa-brands fa-pushed'></i></a>" ;
                                }else{
                                    $cart = "<a class='card_head'  href='#' ><i class='fas fa-shopping-cart'></i></a>";
                                    $pro = "<a class='card_head'  href='#' ><i class='fa-brands fa-pushed'></i></a>";
                                }
                                echo $cart;
                                echo $pro;
                                ;?>
                                </a>
                            </div>

                        </ul>
                    </div>

                </div>

            </div>
        </nav>
    </div>


    <div class="main">
        <div class="backtop">
            <i class="fa-solid fa-angle-up"></i>
        </div>
        
        <div class="main-center">
         <?php if (isset($_SESSION['success'])):?>
        <div class="toasts">
            <div class="toasts success">
            
                <i class="fa-solid fa-triangle-exclamation"></i>
                <span class="messege">
                    <?php
                 echo $_SESSION['success'];
                 unset($_SESSION['success']);?>
                </span>
                <span class="countdown"></span>
            </div>
        </div>
        <!-- <?php endif;?> -->

        
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="img-main">
                            <a href="index.php?controller=product&action=champion" class="img-h" title="Hàng Mới Về">
                                <img src="https://bizweb.dktcdn.net/100/334/022/themes/704891/assets/banner_product_noibat.jpg?1617672303198"
                                    alt="Hàng Mới Về">
                                <i class="fa-solid fa-square-plus"></i>
                            </a>
                        </div>
                    </div>
                    <div class="img-main2">
                        <a href="index.php?controller=product&action=sale" class="img-h2" title="Flash Sale">
                            <img src="https://voucherbox.vn/wp-content/uploads/2021/08/ma-giam-gia-adidas.jpg"
                                alt="img-sale">
                            <i class="fa-solid fa-square-plus"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="container">
                <!-- <div class="row"> -->
                <section id="sub-main-1">
                    <div class="row main">
                        <!-- <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> -->
                        <!-- <div class="main_end"> -->
                        <div class=" end col-sm-6 col-md-6 col-lg-6">
                            <a href="index.php?controller=product&action=clothing"><img
                                    src="data:image/jpeg;base64,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"
                                    alt="" title="t-shirt">
                                <i class="fa-solid fa-square-plus"></i>
                            </a>
                        </div>
                        <div class="end col-sm-6 col-md-6 col-lg-6">
                            <a href="index.php?controller=product&action=champion"><img
                                    src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRo-8CPpHyhndv_xrN1fvDGRwghKWXSBXRLhJHBRGppNWUe8P71X-3ruUHLKT60yXVSPQg&usqp=CAU"
                                    alt="" title="nike">
                                <i class="fa-solid fa-square-plus"></i></a>
                            </a>
                        </div>
                        <!-- </div> -->
                        <!-- </div> -->
                    </div>
                </section>
                <!-- </div> -->
            </div>

            <div class="slick_slider autolist">
                <?php foreach($categories as $category):?>
                <div class="card col-sm-3 col-lg-3">

                    <div class="card_img">
                        <?php if(!empty($category['avatar'])):?>
                        <img src="../Backend/assets/uploads/<?php echo $category['avatar']?>">
                        <?php endif;?>
                        
                    </div>
                    

                </div>
                <?php endforeach;?>

            </div>

        </div>

    </div>
    </div>
    </div>
    </div>

    </div>
    <div class="autoplay">
        <div>
            <h6<span><b>Vận chuyển: </b></span><span>hỗ trợ ship COD toàn quốc</span></h5>
        </div>
        <div>
            <h6<span><b>Hàng chính hãng: </b></span><span>cam kết 100% hàng chính hãng</span></h5>
        </div>
        <div>
            <h6<span><b>Hỗ trợ đổi trả: </b></span><span>Trong vòng 7 ngày kể từ thời điểm mua</span></h5>
        </div>
    </div>
    </div>
    </div>
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
    </section>

    </div>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.12.0.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"
        integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js"
        integrity="sha512-eP8DK17a+MOcKHXC5Yrqzd8WI5WKh6F1TIk5QZ/8Lbv+8ssblcz7oGC8ZmQ/ZSAPa7ZmsCU4e/hcovqR8jfJqA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script> -->
    <script src="assets/js/jquery-3.6.0.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="assets/js/main.js"></script>

    <script type="text/javascript">
    $('.autoplay').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 5000,
    });
    $('.autolist').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1000,
    });
    </script>

</body>

</html>