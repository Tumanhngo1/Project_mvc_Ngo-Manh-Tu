<div class="main-top">
    <div class="top">
        <ul>
            <li><a href="index.php?controller=product&action=home">Trang chủ</a></li>
            <li><i class="fa-solid fa-angles-right"></i></li>
            <li><span>Giỏ hàng</span></li>
        </ul>
    </div>
</div>
<div class="main-cart">
    <div class="main_cart_top">

    <?php if(isset($_SESSION['cart'])):;?>
        <table class="table table-bordered" id="cartx">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Sản phẩm</th>
                    <th scope="col">Thông tin</th>
                    <th scope="col">Đơn giá</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Thành tiền</th>
                    <th scope="col">Xóa</th>
                </tr>
            </thead>

            <tbody>
                
                <?php
                $total_cart = 0;
                foreach ($_SESSION['cart'] as $product_id => $cart):;?>
                <tr>
                    <th scope="row"><?php echo $product_id;?></th>
                    <td>
                        <?php if (!empty($cart['avatars'])):;?>
                        <img src="../Backend/assets/uploads/<?php echo $cart['avatars'];?>" height="50px">
                        <?php endif;?>
                    </td>
                    <td><?php echo $cart['title'];?></td>
                    <td><?php echo number_format($cart['price']);?></td>
                    <td>
                        <div>
                            <input id="qty<?php echo $product_id ;?>" type="number" min="0"
                                value="<?php echo $cart['quantity'];?>">
                            <a class="update" data="<?php echo $product_id ;?>" href="#"><i
                                    class="fa-solid fa-rotate"></i></a>
                        </div>
                    </td>
                    <td>
                        <?php
                            $cart_items = $cart['price'] * $cart['quantity'];
                            $total_cart += $cart_items;
                            echo number_format($cart_items);
                            ;?>đ
                    </td>
                    <td>
                        <a href="#" class="delete"     delete=<?php echo $product_id;?>
                            onclick="return confirm('Bạn chắc chắn xóa sản phẩm này')" class="btn btn-adn"><i
                                class="fa-solid fa-trash-can"></i></a>

                    </td>
                </tr>
                <?php endforeach;?>
                <tr>
                    <td colspan="6">
                    </td>
                    <td>
                        <div class="text_price"><strong>Tổng tiền:</strong></div>
                        <div class="price_number"><?php echo number_format($total_cart) ;?>đ</div>
                    </td>
                </tr>
            </tbody>
        </table>

        <?php endif;?>


        <div class="main_cart_footer">
            <a href="index.php?controller=product&action=home" class="btn btn-primary">Tiếp tục mua hàng</a>
            <a href="index.php?controller=user&action=payMent" class="btn btn-success " id="orders">Tiến hành đặt
                hàng</a>
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
