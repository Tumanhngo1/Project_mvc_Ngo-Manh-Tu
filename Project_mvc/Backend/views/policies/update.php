<h1>update chính sách</h1>


<form method="post" action="" enctype="multipart/form-data">

    <div class="form-group">
        <label for="name">Tên Sản Phảm</label>
        <input type="text" name="title" class="form-control" id="name" value="<?php echo $product['title'];?>">
    </div>
    <div class="form-group">
        <label for="Description">Thông tin chính sách</label>
        <textarea name="description" class="form-control"
            id="Description"><?php echo $product['description'];?>"</textarea>
    </div>



    <input type="submit" name="submit" value="Cập Nhập" class="btn btn-primary">
    <input type="submit" name="cancel" value="Cancel" class="btn btn-secondary">

</form>