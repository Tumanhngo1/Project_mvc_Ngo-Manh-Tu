<div class="main-top">
    <div class="top">
        <ul>
            <li><a href="index.php?controllert=product&action=home">Trang chủ</a></li>
            <li><i class="fa-solid fa-angles-right"></i></li>
            <li><span>Thanh toán</span></li>
        </ul>
    </div>
</div>

         
<div class="main-center">
    <div class="container">
        <!-- <?php echo "<pre>";
        print_r($_SESSION['email']); ;?> -->
        <?php if (isset($_SESSION['email'])) :?>
        <form method="post" action="" class="form_pay">
            <div class="row">

                <div class="col-xs-12 col-md-6 col-lg-6 col-sm-12">

                    <div class="form-group">
                        <label>Tên của bạn là</label>
                        <input type="text" name="name" class="form-control"
                            value="<?php echo $_SESSION['email']['name'];?>">
                    </div>
                    <div class="form-group">
                        <label for="address">Địa chỉ</label>
                        <input type="text" id="address" name="address" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Số điện thoại đặt hàng</label>
                        <input type="number" name="phone" class="form-control">
                    </div>


                </div>
                <?php if (isset($_SESSION['cart'])):?>
                <div class="col-xs-12 col-md-6 col-lg-6 col-sm-12">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">Ảnh sản phẩm</th>
                                <th scope="col">Thông tin</th>
                                <th scope="col">Thành tiền</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $total_cart = 0;
                            foreach ($_SESSION['cart'] as $product_id => $cart):
                            ;?>
                            <tr>
                                <th scope="row"><?php echo $product_id;?></th>
                                <td>
                                    <?php if (!empty($cart['avatars'])):;?>
                                    <img src="../Backend/assets/uploads/<?php echo $cart['avatars'];?>" height="50px">
                                    <?php endif;?>
                                </td>
                                <td><?php echo $cart['title'];?></td>
                                <td>
                                    <?php
                                    $cart_items = $cart['price'] * $cart['quantity'];
                                    $total_cart += $cart_items;
                                    echo number_format($cart_items);
                                    ;?>
                                    <input type="hidden" name="total" value="<?php echo $cart_items;?>">
                                </td>
                            </tr>
                        </tbody>
                        <?php endforeach;?>


                    </table>
                  
                        <span>Tổng đơn hàng: <?php echo number_format($total_cart);?>đ</span>
                    <input type="hidden" name="order_id" value="<?php $_SESSION['email']['id'];?>">
                    <input type="submit" name="submit" class="btn btn-success" value="mua ngay">
                </div>
                <?php else :?>
                  
                <?php endif?>


            </div>
        </form>
        <?php  else:;?>
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
            <strong>Vui lòng<a class="btn btn-link" href="index.php?controller=user&action=login">Đăng nhập</a>để sử
                dụng dịch vụ !!!</strong>
        </div>
        <?php endif;?>

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