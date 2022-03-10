<div class="main-top">
    <div class=" top">
        <ul>
            <li><a href="index.php?controller=product&action=home">Trang chủ</a></li>
            <li><i class="fa-solid fa-angles-right"></i></li>
            <li>Chi tiết sản phẩm</li>
        </ul>
    </div>
</div>
<div class="main-center">
    <div class="container">
        <div class="row">
            <div class=".col-xs-12 col-sm-12 col-md-12 col-lg-12 details-product">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
                        <div class="main_center_img">
                            <?php if (!empty($product['avatars'])):;?>
                            <img src="../Backend/assets/uploads/<?php echo $product['avatars'];?>">
                            <?php endif;?>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 detail_product">

                        <th>
                            <h2><?php echo $product['title'];?></h2>
                        </th>

                        <table class="table table-hove">
                            <tbody>
                                <tr>
                                    <th scope="row">Hãng:</th>
                                    <td><?php echo $product['name'] ;?></td>

                                </tr>
                                <tr>
                                    <th scope="row">Giá sản phẩm</th>
                                    <td><?php echo number_format($product['price']) . "đ" ;?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Tình trạng</th>
                                    <td><?php
                                $values = '';
                                if ($product['status'] ==0){
                                    echo $values = "Còn hàng";
                                } elseif ($product['status'] ==1){
                                    echo  $values= 'Hết hàng';
                                }
                                ?></span></td>
                                </tr>
                                <tr>
                                    <th scope="row">Thêm số lượng</th>
                                    <td>
                                        <div class="detail_check">
                                            <a class="delete" delete="<?php echo $product['id']?>" href="#"><i
                                                    class="fa-solid fa-angles-left"></i></a>
                                            <?php
                                            $amount = '';
                                            if($_SESSION['cart']){
                                                $amount = '1';
                                            }else{
                                                $amount = '0';
                                            } ;?>
                                            <span class="cart-amount"><?php echo $amount ;?></span>

                                            <a class="product_title" href="#" data_id="<?php echo $product['id']?>"><i
                                                    class="fa-solid fa-angles-right"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>


                        <div>
                            <a href="index.php?controller=cart&action=index" class="btn btn-success product_title">Mua
                                ngay</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="details">
        <h6><i class="fa-brands fa-creative-commons-nd"></i>Chi tiết sản phẩm</h6>
        <div class="slider_1 col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <p><?php echo $product['description'] ;?></p>
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
                    <img style="height: 170px;" src="../Backend/assets/uploads/<?php echo $show['avatars']?>">
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
                    <div class="price"><?php echo number_format($show['price_sale']) ;?></div>
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