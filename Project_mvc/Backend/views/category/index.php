

<h2>Danh sách danh mục</h2>



<a href="index.php?controller=category&action=create" class="btn btn-success">Thêm mới danh mục</a>
<table class="table table-bordered" >
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Avatar</th>
        <th scope="col">Description</th>
        <th scope="col">created_at</th>
        <th scope="col">status</th>
        <th scope="col"></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($categories as $category) :?>
        <tr>
            <th ><?php echo $category['id'];?></th>
            <td><?php echo $category['name'];?></td>
            <td>
                <?php if (!empty($category['avatar'])): ?>
                <img height="80" src="assets/uploads/<?php echo $category['avatar']; ?>" />
                <?php endif; ?>
            </td>
            <td><?php echo $category['description'];?></td>
            <td><?php echo date('d/m/Y',strtotime($category['created_at']));?> </td>

            <td>
                <?php
                $category_text = 'Disable';
                if ($category['status'] == 0){
                    $category_text = 'Active';
                }
                echo $category_text;
                ;?>
            </td>

            <td>
                
                <div class="icon">
                    <ul>
                        <li><a  href="index.php?controller=category&action=detail&id=<?php echo $category['id'];?>" ><i class="far fa-eye"></i></a></li>
                        <li><a  href="index.php?controller=category&action=update&id=<?php echo $category['id'];?>"><i class="fas fa-pen"></i></a></li>
                        <a  href="index.php?controller=category&action=delete&id=<?php echo $category['id'];?>" onclick="return confirm('Are you sure ?')"><i class="fas fa-trash-alt"></i></a></li>
                    </ul>
                </div>

            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>