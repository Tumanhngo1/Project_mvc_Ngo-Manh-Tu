<h1>update sản phẩm</h1>


<form method="post" action="" enctype="multipart/form-data">
<div class="form-group">
        <label for="category_id">Chọn danh mục</label>

        <select class="form-control" name="category_id" id="category_id">
            <?php foreach ($categories as $category): ?>

            <?php
            $selected = '';
            if (isset($_POST['category_id']) && $category['id']== $_POST['category_id']){
                $selected = 'selected';
            }

            ;?>
            <option value="<?php echo $category['id'];?>" <?php echo $selected;?>><?php echo $category['name'];?></option>
            <?php endforeach;?>
        </select>

    </div>
    <div class="form-group">
        <label for="name">Tên Sản Phảm</label>
        <input type="text" name="title" class="form-control" id="name" value="<?php echo $product['title'];?>">
    </div>
    <div class="form-group">
        <label for="Description">Thông tin sản phẩm</label>
        <textarea name="description" class="form-control" id="Description"><?php echo $product['description'];?>"</textarea>
        </div>
    <div class="form-group">
        <label for="avatar">Avatar</label>
        <input type="file" class="form-control" name="avatar" id="avatar">
        <?php if (!empty($product['avatars'])) :?>
        <img src="assets/uploads/<?php echo $product['avatars'];?>" height="50px">
        <?php endif;?>
    </div>
    <div class="form-group">
        <label for="price">Giá sản phẩm</label>
        <input type="text" name="price" class="form-control" id="price" value="<?php echo $product['price'];?>">
    </div>
    <div class="form-group">
        <label for="price_sale">Giá sale</label>
        <input type="text" name="price_sale" class="form-control" id="price_sale" value="<?php echo $product['price_sale'] ;?>">
    </div>
    <div class="form-group">
        <?php  
         $activeSelected = '';
         $disableSelected = '';
         if($product['status']==0){
             $activeSelected = "selected";
         }else{
             $disableSelected = "selected";
         }
         if(isset($_POST['status'])){
             switch($_POST['status']){
                 case 0: $activeSelected = "selected";break;
                 case 1: $disableSelected = "selected";
             }
         }
        ;?>
        <label for="status">Status</label>
    <select type="text" name="status" class="form-control" id="status" >
    <option  value="0" <?php echo $activeSelected ;?>> Active</option>
    <option  value="1" <?php echo $disableSelected ;?>> Disable</option>
    </select>

    <input type="submit" name="submit" value="Cập Nhập" class="btn btn-primary">
    <input type="submit" name="cancel" value="Cancel" class="btn btn-secondary">






</form>
