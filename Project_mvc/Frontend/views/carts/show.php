

<div class="main-top">
    <div class="top">
        <ul>
            <li><a href="index.php?controller=product&action=home">Trang chủ</a></li>
            <li><i class="fa-solid fa-angles-right"></i></li>
            <li><span>Đơn hàng</span></li>
        </ul>
    </div>
</div>
<div class="main-cart">
    <div class="main_cart_top">
         <table class="table">
                <thead>
                <tr>
                    <th scope="col">Code</th>
                    <th scope="col">Khách hàng</th>
                    <th scope="col">Địa chỉ</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Tên mặt hàng</th>
                    <th scope="col">Số tiền</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Tổng số tiền</th>
                    <th scope="col">Ngày đặt hàng</th>
                </tr>
                </thead>
           
                <tbody>

                    <?php $cart_total = 0;?>
                    <?php foreach ($carts as $cart):;?>
                    <tr>
                        <th scope="row"><?php echo $cart['code'];?></th>
                        <th scope="row"><?php echo $cart['name'];?></th>
                        <td><?php echo $cart['address'];?></td>
                        <td><?php echo $cart['phone'];?></td>
                        <td><?php echo $cart['title'];?></td>
                        <td><?php echo number_format( $cart['price']);?></td>
                        <td><?php echo $cart['quantity'];?></td>
                        <td><?php $total= $cart['quantity'] * $cart['price'];
                            $cart_total +=$total;
                            echo number_format($total);

                            ?></td>
                         <td><?php echo date('d-m-Y',strtotime($cart['create_at'])) ;?></td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
           
            </table>
            <div> <span>Tổng thanh toán: </span><?php echo number_format($cart_total);?>đ<span>  Cảm ơn bạn đã tin tưởng và sử dụng sản phẩm bên mình</span></div>
           
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

