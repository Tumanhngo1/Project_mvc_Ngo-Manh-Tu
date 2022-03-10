
<h2>View Record</h2>

<table class="table table-bordered" >
<!--    --><?php //foreach ($categories as $category):?>
    <thead>
    <tr>
        <th>ID</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td><?php echo $category['id'];?></td>
    </tr>
    </tbody>
    <thead>
    <tr>
        <th>Name</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td><?php echo $category['name'];?></td>
    </tr>
    </tbody>
    <thead>
    <tr>
        <th>Avatar</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td><?php echo $category['avatar'];?></td>
    </tr>
    </tbody>
    <thead>
    <tr>
        <th>Description</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td><?php echo $category['description'];?></td>
    </tr>

    </tbody>

    <thead>
    <tr>
        <th>Status</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>
            <?php
                $category_text = 'Active';
                if ($category['status']==0){
                    $category_text = 'Disable';
                }
                echo $category_text;
            ;?>
        </td>
    </tr>
<?php //endforeach;?>
</table>
<form method="post" action="">
    <input type="submit" name="submit" value="back" class="btn btn-primary">
</form>

