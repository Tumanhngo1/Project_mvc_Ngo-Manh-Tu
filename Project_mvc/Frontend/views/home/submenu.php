<div class="sidebars">
    <div class="sidebar">
        <div class="titles">
            <h5 class="title">Giá thành</h5>
        </div>
        <div class="input-title">
            <form method="post" action="">
                <?php if (!empty($categories)):;?>

                    <?php foreach ($categories AS $category):
                        //đổ lại dữ liệu đã check category
                        $category_checked = '';
                        if (isset($_POST['category'])) {
                            if (in_array($category['id'], $_POST['category'])) {
                                $category_checked = 'checked';
                            }
                        }
                        ?>
                        <input type="checkbox" name="category[]"
                               value="<?php echo $category['id']; ?>" <?php echo $category_checked; ?> />
                        <?php echo $category['name']; ?>
                        <br/>
                    <?php endforeach; ?>
                <input type="checkbox" name="category[]"
                       value=""  />



                </div>

                <?php endif; ;?>
                <div class="form-group">
                    <?php

                    $check_price1 ='';
                    $check_price2 ='';
                    $check_price3 ='';

                    if (isset($_POST['price'])){
                        foreach ($_POST['price'] as $price){
                            if ($price == 1){
                                $check_price1 = "checked";
                            }
                            if ($price == 2){
                                $check_price2 = "checked";
                            }
                            if ($price == 3){
                                $check_price3 = "checked";
                            }
                        }
                    }
                    ;?>

                    <input type="checkbox" name="price[]" class="form-group" value="1" <?php echo $check_price1;?>> Dưới 1.000.000đ <br/>
                    <input type="checkbox" name="price[]" class="form-group" value="2"<?php echo $check_price2;?>> 1.000.000đ - 5.000.000đ <br/>
                    <input type="checkbox" name="price[]" class="form-group" value="3"<?php echo $check_price3;?>> Trên 5.000.000đ <br/>
                </div>
                <input type="submit" name="submit" value="Tìm kiếm" class="btn btn-primary">
            </form>
        </div>

    </div>

</div>


<div class="container">
    <div class="row">
        <div class="categories">
            <div class="category">
                san pham
            </div>
            <div class="details">
                <div class="detail">
                    <?php foreach ($products as $product):;?>
                        <div class="product">

                            <div class="products-title">
                                <?php if (!empty($product['avatar'])):;?>
                                    <img src="../backend/assets/uploads/<?php echo $product['avatar'];?>" >
                                <?php endif;?>

                                <a class="product_title" href="#"><?php echo $product['name'];?></a>
                            </div>
                            <div class="products-price">
                                <span><?php echo $product['price'];?></span>
                            </div>
                        </div>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
    </div>
</div>




