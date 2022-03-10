




<h3>Chỉnh sửa danh mục</h3>


<form method="post" action="" enctype="multipart/form-data">

    <div class="form-group">
        <label for="name">Tên sản phẩm</label>
        <input type="text" class="form-control" name="name" id="name" value="<?php echo $category['name'];?>">
    </div>
       <div class="form-group">
        <label for="avatar">Giá sản phẩm</label>
         <input type="file" class="form-control" name="avatar" id="avatar">      
         <?php if (!empty($category['avatars'])) :?>
        <img src="assets/uploads/<?php echo $category['avatars'];?>" height="50px">
        <?php endif;?>
           </div>
    <div class="form-group">
        <label for="description">Chi tiết sản phẩm</label>
        <textarea class="form-control" name="description" id="description"><?php echo $category['description'];?></textarea>
    </div>
    <div class="form-group">

        <label>Trạng thái</label>
        <select name="status" class="form-control">
            <?php
                $category_active ='';
                $category_disable ='';
                if (isset($category['status'])){
                    switch ($category['status']){
                        case 0: $category_active ="selected";break;
                        case 1: $category_disable = "selected";
                    }
                }
            ;?>
            <option value="0"<?php echo $category_active;?> >Active</option>
            <option value="1" <?php echo $category_disable;?> >Disabled</option>
        </select>
    </div>
    <input type="submit" name="submit" class="btn btn-primary" value="Save">
    <a href="index.php?controller=category&action=index" class="btn btn-secondary">Back</a>


</form>

