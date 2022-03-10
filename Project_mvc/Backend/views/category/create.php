




<h3>Thêm mới danh mục</h3>


<form method="post" action="" enctype="multipart/form-data">

    <div class="form-group">
        <label for="name">Tên sản phẩm</label>
        <input type="text" class="form-control" name="name" id="name">
    </div>
            <div class="form-group">
              <label for="avatar">Avatar</label>
           <input type="file" class="form-control" name="avatar" id="avatar">
    </div>
    <div class="form-group">
        <label for="description">Chi tiết sản phẩm</label>
        <input class="form-control" name="description" id="description">
    </div>
    <div class="form-group">

        <label>Trạng thái</label>
        <select name="status" class="form-control">
            <option value="0" >Active</option>
            <option value="1" >Disabled</option>
        </select>
    </div>
    <input type="submit" name="submit" class="btn btn-primary" value="Save">
    <a href="#" class="btn btn-secondary">Back</a>


</form>

