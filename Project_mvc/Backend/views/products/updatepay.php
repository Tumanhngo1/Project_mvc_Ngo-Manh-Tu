




    <h3>Chỉnh sửa</h3>


<form method="post" action="" enctype="multipart/form-data">
   
    <div class="form-group">
        <label for="name">Tên Khách Hàng</label>
        <input type="text" class="form-control" name="name" id="name" value="<?php echo $pay['name'] ;?>">
    </div>
    <div class="form-group">
        <label for="address">Địa chỉ</label>
        <input type="text" class="form-control" name="address" id="address" value="<?php echo $pay['address'];?>">
        
    </div>
    <div class="form-group">
        <label for="phone">Số điện thoại</label>
        <input type="text" class="form-control" name="phone" id="phone" value="<?php echo $pay['phone'] ;?>">
        
    </div>
    <div class="form-group">
        <label for="code">Mã code sản phẩm</label>
        <input class="form-control" name="code" id="code" value="<?php echo $pay['code'] ;?>">
    </div>
    <div class="form-group">
        <label for="title">Tên sản phẩm</label>
        <input class="form-control" name="title" id="title" value="<?php echo $pay['title'] ;?>">
    </div>
    <div class="form-group">
        <label for="price">Giá Sản phẩm</label>
        <input class="form-control" name="price" id="price" value="<?php echo $pay['price'];?>">
    </div>
    <div class="form-group">
        <label for="quantity">Số lượng</label>
        <input class="form-control" name="quantity" id="quantity" value="<?php echo $pay['quantity'];?>">
    </div>
    <div class="form-group">
        <label for="total">Số lượng</label>
        <input class="form-control" name="total" id="total" value="<?php echo $pay['total_gate'];?>">
    </div>
  
   
    <input type="submit" name="submit" class="btn btn-primary" value="Save">
    <input type="submit" name="cancel" class="btn btn-secondary" value="Back">


</form>

