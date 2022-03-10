
<h2>Chi tiết sản phẩm</h2>

<table class="table table-bordered" >
    <thead>
    <tr>
        <th>ID</th>
    </tr>
    </thead>
    <tbody>
   
    <tr>
        <td><?php echo $product['id'];?></td>
    </tr>
    </tbody><thead>
    <tr>
        <th>Tên sản phẩm</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td><?php echo $product['title'];?></td>
    </tr>
    </tbody><thead>
    <tr>
        <th>Thông tin</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td><?php echo $product['description'];?></td>
    </tr>

    </tbody><thead>
    <tr>
        <th>Avatar</th>
    </tr>
    </thead>
    <tbody>

    <tr>
        <td>
       <?php if (!empty($product['avatars'])):?>
        <img src="assets/uploads/<?php echo $product['avatars'];?>" height="50">
        <?php endif;?>
        </td>

    </tr>

    </tbody>
    <thead>
    <tr>
        <th>Giá sản phẩm</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td><?php echo number_format($product['price'],'0','.','.') ;?></td>
    </tr>
    </tbody>
    <thead>
    <tr>
        <th>Giá sale</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td><?php echo number_format($product['price_sale'],'0','.','.') ;?></td>
    </tr>
    </tbody>
    <thead>
    <tr>
        <th>Ngày khởi tạo</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td><?php echo date('d-m-Y',strtotime($product['created_at']));?></td>
    </tr>
    </tbody>
    
</table>
<form method="post" action="">
    <input type="submit" name="submit" value="back" class="btn btn-primary">
</form>

