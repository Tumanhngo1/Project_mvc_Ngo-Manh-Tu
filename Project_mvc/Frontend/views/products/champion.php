<div class="main-top">
    <div class="top">
        <ul>
            <li><a href="index.php?controller=product&action=home">Trang chủ</a></li>
            <li><i class="fa-solid fa-angles-right"></i></li>
            <li><span>Champion</span></li>
        </ul>
    </div>
</div>
<div class="main-center">
    <div class="container">
        <div class="row">
            <div class="main-title">
                <h4>Champion</h4>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 slider_bar">
                <div class="sidebars">
                    <div class="sidebar">
                        <div class="titles">
                            <h5 class="title">Tìm kiếm</h5>
                        </div>
                        <div class="input-title">
                            <form method="GET" action="">
                                <input type="text" name="title" class=" form-control" placeholder="Tìm kiếm"
                                    value="<?php echo isset($_GET['title']) ? $_GET['title'] : '' ?>">
                                <input type="hidden" name="controller" value="product" />
                                <input type="hidden" name="action" value="champion" />

                            </form>
                        </div>
                    </div>
                    <div class="sidebar">
                        <div class="titles">
                            <h5 class="title">Nhãn hàng</h5>
                        </div>
                        <div class="input-title">
                            <?php foreach ($categories as $category):;?>
                            <ul>
                                <li><i class="fa-solid fa-stop"></i></li>
                                <li><a
                                        href="index.php?controll=product&action=index&id=<?php echo $category['id'];?>"><?php echo $category['name'];?></a>
                                </li>
                            </ul>
                            <?php endforeach;?>
                        </div>
                    </div>
                    <div class="sidebar">
                        <div class="titles">
                            <h5 class="title">Liên hệ</h5>
                        </div>
                        <div class="input-title">
                            <ul>
                                <li><i class="fa-solid fa-envelope"></i></li>
                                <li><a href="#">Tublue32@gmail.com</a></li>
                            </ul>
                            <ul>
                                <li><i class="fa-brands fa-facebook"></i></li>
                                <li><a href="#">tu.blue</a></li>
                            </ul>
                            <ul>
                                <li><i class="fa-solid fa-square-phone"></i></li>
                                <li><a href="#">0987418332</a></li>
                            </ul>
                        </div>

                    </div>
                </div>

            </div>
            <div class="col-lg-9">
                <div class="categories">
                    <div class="category">
                        <h2>Danh sách sản phẩm</h2>
                       
                    </div>
                    <div class="details">
                        <div class="detail">
                        <?php foreach($champions as $champion):?>
                        <div class="card col-xs-6 col-md-6 col-sm-3 col-lg-3">
                        
                            <div class="card_img">
                                <?php if(!empty($champion['avatars'])):?>
                                    <img src="../Backend/assets/uploads/<?php echo $champion['avatars']?>">
                                <?php endif;?>
                                <div class="card_action">
                                    <div class="card_left product_title" data_id="<?php echo $champion['id']?>"> <a href="index.php?controller=product&action=detail&id=<?php echo $champion['id'] ;?>"><i class="fa-solid fa-eye"></i></a></div>
                                    <div   class="card_right product_title"  data_id="<?php echo $champion['id']?>" ><a href="index.php?controller=cart&action=index"><i class="fa-solid fa-cart-shopping"></i></a></div>
                                </div>
                            </div>
                            <div class="card_title">
                                <?php echo $champion['title'];?>
                            </div>
                            <div class="card_price">
                                <?php $price = '';
                                if ($champion['price_sale'] > 0) :
                                ?>
                                <div class="price"><?php echo number_format($champion['price_sale']) ;?>đ</div>
                                <div class="sale"><?php echo number_format( $champion['price']);?>đ</div>
                                <?php else:?>
                                    <div class="price"><?php echo number_format($champion['price']);?>đ</div>
                                    <?php endif ;?>
                            </div>

                             </div>
                        <?php endforeach;?>
                        </div>
                    </div>

                </div>
                
                            <div><?php echo $page ;?></div>
                     
            </div>
        </div>
    </div>
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="details">
        <h6 class="pro"><i class="fa-brands fa-creative-commons-nd"></i>Sản phẩm liên quan</h6>
        <div class="slick_slider autolist">
            <?php foreach($shows as $show):?>
            <div class="card col-sm-3 col-lg-3">

                <div class="card_img">
                    <?php if(!empty($show['avatars'])):?>
                    <img  style="height: 170px;" src="../Backend/assets/uploads/<?php echo $show['avatars']?>">
                    <?php endif;?>
                    <div class="card_action">
                     
                    </div>
                </div>
                <div class="card_title">
                <div class="card_left product_title" href="#" data_id="<?php echo $show['id']?>"> <a
                                href="index.php?controller=product&action=detail&id=<?php echo $show['id'] ;?>"> 
                                <?php echo $show['title'];?></a></div>
                   
                </div>
                <div class="card_price">
                    <?php $price = '';
                                if ($show['price_sale'] > 0) :
                                ?>
                    <div class="price"><?php echo number_format($show['price_sale']) ;?>đ</div>
                    <div class="sale"><?php echo number_format( $show['price']);?>đ</div>
                    <?php else:?>
                    <div class="price"><?php echo number_format($show['price']);?>đ</div>
                    <?php endif ;?>
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
<?php
        