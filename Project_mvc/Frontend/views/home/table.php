
            <ul class="sub-menu">
                <?php foreach ($categories as $category):?>
                    <li><a href="index.php?controll=product&action=index&id=<?php echo $category['id'];?>">
                            <?php echo $category['name'];?></a></li>
                <?php endforeach;?>

            </ul>

