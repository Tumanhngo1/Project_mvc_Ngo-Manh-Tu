



</form>
<h2>Danh sách sản phẩm</h2>



<a href="index.php?controller=product&action=create" class="btn btn-success">Thêm mới sản phẩm</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Name</th>

            <th scope="col">Description</th>
           
            <th scope="col">created_at</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($products as $product) :?>
        <tr>
            <th><?php echo $product['id'];?></th>
            <td><?php echo $product['title'];?></td>
            <td><?php echo $product['description'];?></td>
            
            <td><?php echo date('d/m/Y',strtotime($product['created_at']));?> </td>
            <td>
                <style>
               
                </style>
                <div class="icon">
                    <ul>
                        
                        <li><a href="index.php?controller=policy&action=update&id=<?php echo $product['id'];?>"><i
                                    class="fas fa-pen"></i></a></li>
                        <a href="index.php?controller=policy&action=delete&id=<?php echo $product['id'];?>"
                            onclick="return confirm('Are you sure ?')"><i class="fas fa-trash-alt"></i></a></li>
                    </ul>
                </div>

            </td>
            <?php endforeach; ?>

        </tr>
    </tbody>

</table>
