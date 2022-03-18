


<div class="form-group">
<h2>Đơn hàng vận chuyển thành công</h2>
</div>



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
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($historys as $history) :?>
        <tr>
            <th><?php echo $history['id'];?></th>
            <!-- <th><?php echo $history['category_name'];?></th> -->
            <td><?php echo $history['name'];?></td>
            <td><?php echo $history['address'];?></td>
            <td><?php echo $history['phone'];?></td>
            <td><?php echo $history['title'];?></td>
            <td><?php echo $history['quantity'];?></td>
           
            <td><?php echo number_format($history['price'],'0','.','.');?>đ</td>
            <!-- <td><?php echo number_format($history['price_sale'],'0','.','.');?>đ</td> -->
           
            <td><?php echo date('d/m/Y',strtotime($history['created_at']));?> </td>
            
            <?php endforeach; ?>

        </tr>
    </tbody>

</table>
