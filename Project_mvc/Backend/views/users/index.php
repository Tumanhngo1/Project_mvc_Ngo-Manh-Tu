

<h2>Danh sách sản phẩm</h2>



<table class="table table-bordered" >
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Avatar</th>
        <th scope="col">created_at</th>
        <th scope="col"></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($products as $product) :?>
        <tr>
            <th ><?php echo $product['id'];?></th>
            <td><?php echo $product['name'];?></td>
            <td>
                <?php if (!empty($product['avatar'])): ?>
                    <img height="80" src="assets/uploads/<?php echo $product['avatar']; ?>"/>
                <?php endif; ?>
            </td>
            <td><?php echo date('d/m/Y',strtotime($product['created_at']));?> </td>
            <td>
                <style>
                    .icon ul{
                        list-style: none;
                        display: flex;

                    }
                    .icon ul li{
                        margin: 0 10px;
                    }
                </style>
                <div class="icon">
                    <ul>
                        <li><a  href="index.php?controller=user&action=detail&id=<?php echo $product['id'];?>" ><i class="far fa-eye"></i></a></li>
                        <li><a  href="index.php?controller=user&action=update&id=<?php echo $product['id'];?>"><i class="fas fa-pen"></i></a></li>
                        <a  href="index.php?controller=user&action=delete&id=<?php echo $product['id'];?>" onclick="return confirm('Are you sure ?')"><i class="fas fa-trash-alt"></i></a></li>
                    </ul>
                </div>

            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>