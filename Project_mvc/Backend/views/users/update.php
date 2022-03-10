<h1>update sản phẩm</h1>


<form method="post" action="" enctype="multipart/form-data">
    <div class="form-group">
        <label for="name">Tên người dùng</label>
        <input type="text" name="name" class="form-control" id="name" value="<?php echo $product['name'];?>">
    </div>
    <div class="form-group">
        <label for="avatar">Avatar</label>
        <input type="file" class="form-control" name="avatar" id="avatar">
        <?php if (!empty($product['avatar'])) :?>
            <img src="assets/uploads/<?php echo $product['avatar'];?>" height="50px">
        <?php endif;?>
    </div>

    <input type="submit" name="submit" value="Cập Nhập" class="btn btn-primary">
    <input type="submit" name="cancel" value="Cancel" class="btn btn-secondary">
</form>

