<div class="main-top">
    <div class="top">
        <ul>
            <li><a href="index.php?controllert=product&action=home">Trang chủ</a></li>
            <li><i class="fa-solid fa-angles-right"></i></li>
            <li><span>Lịch sử mua hàng</span></li>
        </ul>
    </div>
</div>
<div class="container policy">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tên khách hàng</th>
                <th scope="col">Địa chỉ</th>
                <th scope="col">Số điện thoại</th>
                <th scope="col">Sản phảm</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Tổng giá trị</th>
                <th scope="col">Ngày đặt hàng</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($historys as $history) :?>
            <tr>
                <th><?php echo $history['id'];?></th>
                <td><?php echo $history['name'];?></td>
                <td><?php echo $history['address'];?></td>
                <td><?php echo $history['phone'];?></td>
                <td><?php echo $history['title'];?></td>
                <td><?php echo $history['quantity'];?></td>

                <td><?php echo number_format($history['price'],'0','.','.');?>đ</td>
                <td><?php echo date('d/m/Y',strtotime($history['created_at']));?> </td>
                <?php endforeach; ?>
            </tr>
        </tbody>

    </table>
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