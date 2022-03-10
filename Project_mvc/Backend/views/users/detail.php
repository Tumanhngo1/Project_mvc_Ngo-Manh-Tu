
<h2>View Record</h2>

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
        <th>Name</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td><?php echo $product['name'];?></td>
    </tr>
    </tbody>
    <thead>
    <tr>
        <th>Avatar</th>
    </tr>
    </thead>
    <tbody>

    <tr>
        <td>
            <?php if (!empty($product['avatar'])):?>
                <img src="assets/uploads/<?php echo $product['avatar'];?>" height="50">
            <?php endif;?>
        </td>

    </tr>

    </tbody>
    <thead>
    <tr>
        <th>Ngày tham gia</th>
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


