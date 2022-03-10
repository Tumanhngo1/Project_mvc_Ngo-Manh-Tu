




    <h3>Thêm mới sản phẩm</h3>


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
        <label for="title">Tên sản phẩm</label>
        <input type="text" class="form-control" name="title" id="title">
    </div>
    <div class="form-group">
        <label for="avatars">Avatar</label>
        <input type="file" class="form-control" name="avatars" id="avatars">
        <img src="#" id="img-preview" style="display: none" width="100px" height="100px">
    </div>
    <div class="form-group">
        <label for="price">Giá sản phẩm</label>
        <input class="form-control" name="price" id="price">
    </div>
    <div class="form-group">
        <label for="price_sale">Giá sale</label>
        <input class="form-control" name="price_sale" id="price">
    </div>
    <div class="form-group">
        <label for="description">Chi tiết sản phẩm</label>
        <textarea name="description" id="description" class="form-control"></textarea>
      
    </div>
    <div class="form-group">
        <label>Trạng thái sản phẩm</label>
    <select name="status" class="form-control">
        <option value="0" >Active</option>
        <option value="1" >Disabled</option>
    </select>
    </div>
    <input type="submit" name="submit" class="btn btn-primary" value="Save">
    <a href="#" class="btn btn-secondary">Back</a>


</form>

