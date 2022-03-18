


<form method="GET" action="">
    <div class="form-group">
    <input type="text" name="title" class=" form-control" placeholder="Tìm kiếm"
        value="<?php echo isset($_GET['title']) ? $_GET['title'] : '' ?>">
    <input type="hidden" name="controller" value="product" />
    <input type="hidden" name="action" value="payMent" />
    </div>
    <input type="submit" name="submit" value="Tìm kiếm" class="btn btn-success">

</form>
<h2>Quản lý đơn hàng</h2>



<table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Address</th>
            <th scope="col">Phone</th>
            <th scope="col">Title</th>
            <th scope="col">Code</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Total</th>
            <th scope="col">Status</th>
            <th scope="col">Update</th>
            <th scope="col">created_at</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($pays as $pay) :?>
        <tr>
            <th><?php echo $pay['id'];?></th>
            <th><?php echo $pay['name'];?></th>
            <th><?php echo $pay['address'];?></th>
            <th><?php echo $pay['phone'];?></th>
            <td><?php echo $pay['title'];?></td>
            <td><?php echo $pay['code'];?></td> 
            <td><?php echo number_format($pay['price'],'0','.','.');?>đ</td>
            <td><?php echo $pay['quantity'] ?></td>
            <td><?php $total = $pay['quantity']*$pay['price'];
             echo number_format($total) ?>đ</td>
            <td>
                <form action="" method="POST">
                <div class="form-group">
            <input type="hidden" name="name" value="<?php echo $pay['name'];?>">
            <input type="hidden" name="address" value="<?php echo $pay['address'];?>">
            <input type="hidden" name="phone" value="<?php echo $pay['phone'];?>">
            <input type="hidden" name="title" value="<?php echo $pay['title'];?>">
            <input type="hidden" name="quantity" value="<?php echo $pay['quantity'];?>">
          
            <input type="hidden" name="total" value="<?php $total = $pay['quantity']*$pay['price'];
             echo $total;?>">
            <?php
    
           $selected_active = '';
           if (isset($_POST['selected']) && $pay['id'] == $_POST['selected']): {
                       $selected_active = 'selected';
           
           }
            ;?>
                    <select name="selected" class="form-control">
                        <option value="0" >Đang giao hàng</option>
                        <option value="<?php echo $pay['id']?>"<?php echo  $selected_active ;?>>Giao hàng thành công</option>
                    </select>
                </div>
                <input type="submit" class="btn btn-success" name="submit" value="cập nhật">
                <a href="index.php?controller=product&action=deletepay&id=<?php echo $pay['id'];?>" class="btn btn-warning" >Chuyển tới Lịch sử mua hàng</a> 
            <?php else: ?>
                <select name="selected" class="form-control">
                        <option value="0" >Đang giao hàng</option>
                        <option value="<?php echo $pay['id']?>"<?php echo  $selected_active ;?>>Giao hàng thành công</option>
                    </select>
                <input type="submit" class="btn btn-success" name="submit" value="cập nhật">
           <?php endif?>
                </form>
            </td>
            <td><?php echo date('d/m/Y',strtotime($pay['updated_at']));?> </td>
            <td>
                <style>
               
                </style>
                <div class="icon">
                    <ul>
                        <li><a href="index.php?controller=product&action=updatepay&id=<?php echo $pay['id'];?>"><i
                                    class="fas fa-pen"></i></a></li>
                        <a href="index.php?controller=product&action=deletepay&id=<?php echo $pay['id'];?>"
                            onclick="return confirm('Are you sure ?')"><i class="fas fa-trash-alt"></i></a></li>
                    </ul>
                </div>

            </td>
            <?php endforeach; ?>

        </tr>
    </tbody>
</table>


<?php echo $pages ;?>