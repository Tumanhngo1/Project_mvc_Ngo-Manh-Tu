
        <div class="main-top">
            <div class="top">
                <ul>
                    <li><a href="index.php?controllert=product&action=home">Trang chủ</a></li>
                    <li><i class="fa-solid fa-angles-right"></i></li>
                    <li><span>Chính sách đổi trản hàng</span></li>
                </ul>
            </div>
        </div>
        <div class="container policy">
        <table class="table table-borderless">
            <?php foreach($policies as $policy) :;?>
  <thead>
    <tr>
      <th scope="col"><?php echo  $policy['title']; ?></th>
   
  </thead>
  <tbody>
    <tr>
   
      <td><?php echo  $policy['description']; ?></td>

    </tr>
  </tbody>
  <?php endforeach ;?>
</table>
</div>
<div class="autoplay">
    <div>
        <h6<span><b>Vận chuyển: </b></span><span>hỗ trợ ship COD toàn quốc</span></h5>
    </div>
    <div>
        <h6<span><b>Hàng chính hãng: </b></span><span>cam kết 100% hàng chính hãng</span></h5>
    </div>
    <div>
        <h6<span><b>Hỗ trợ đổi trả: </b></span><span>Trong vòng 7 ngày kể từ thời điểm mua</span></h5>
    </div>
</div>
