


<form method="GET" action="">
    <input type="text" name="title" class=" form-control" placeholder="Tìm kiếm"
        value="<?php echo isset($_GET['title']) ? $_GET['title'] : '' ?>">
    <input type="hidden" name="controller" value="product" />
    <input type="hidden" name="action" value="index" />
    <input type="submit" name="submit" value="Tìm kiếm" class="btn btn-success">

</form>
<h2>Danh sách sản phẩm</h2>



<a href="index.php?controller=product&action=create" class="btn btn-success">Thêm mới sản phẩm</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Danh mục</th>
            <th scope="col">Name</th>

            <th scope="col">Description</th>
            <th scope="col">Avatar</th>
            <th scope="col">Price</th>
            <th scope="col">Price_sale</th>
            <th scope="col">Status</th>
            <th scope="col">created_at</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($products as $product) :?>
        <tr>
            <th><?php echo $product['id'];?></th>
            <th><?php echo $product['category_name'];?></th>
            <td><?php echo $product['title'];?></td>
            <td><?php echo $product['description'];?></td>
            <td>
                <?php if (!empty($product['avatars'])): ?>
                <img height="80" src="assets/uploads/<?php echo $product['avatars']; ?>" />
                <?php endif; ?>
            </td>
            <td><?php echo number_format($product['price'],'0','.','.');?>đ</td>
            <td><?php echo number_format($product['price_sale'],'0','.','.');?>đ</td>
            <td><?php
            $product_text = '';
           if($product['status'] == 0){
              $product_text = 'Active';
        }else{
            $product_text = 'Disable';
        }
        echo $product_text;?>
            </td>
            <td><?php echo date('d/m/Y',strtotime($product['created_at']));?> </td>
            <td>
                <style>
               
                </style>
                <div class="icon">
                    <ul>
                        <li><a href="index.php?controller=product&action=detail&id=<?php echo $product['id'];?>"><i
                                    class="far fa-eye"></i></a></li>
                        <li><a href="index.php?controller=product&action=update&id=<?php echo $product['id'];?>"><i
                                    class="fas fa-pen"></i></a></li>
                        <a href="index.php?controller=product&action=delete&id=<?php echo $product['id'];?>"
                            onclick="return confirm('Are you sure ?')"><i class="fas fa-trash-alt"></i></a></li>
                    </ul>
                </div>

            </td>
            <?php endforeach; ?>

        </tr>
    </tbody>

</table>
<?php echo $page ;?>