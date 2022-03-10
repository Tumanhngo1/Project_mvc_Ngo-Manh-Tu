



        <div class="main-top">
            <div class="top">
                <ul>
                    <li><a href="index.php?controller=product&action=home">Trang chủ</a></li>
                    <li><i class="fa-solid fa-angles-right"></i></li>
                    <li><span>Đăng nhập</span></li>
                </ul>
            </div>
        </div>
       
        <div class="main-login">
            <?php if (!isset($_SESSION['email'])):;?>
            <h5>Nếu chưa là thành viên hãy đăng ký để thanh toán <a class="btn btn-outline" href="index.php?controller=user&action=register">Đăng ký</a></h5>
            

            <form action="" class="form" method="post">
                <div class="form-group">
                    <label for="inputUsernameEmail">Email</label>
                    <input type="text" name="email" class="form-control" id="inputUsernameEmail">
                </div>
                <div class="form-group">
                    <label for="inputPassword">Password</label>
                    <input type="password" name="password" class="form-control" id="inputPasswprd">
                </div>
                <div class="checkbox pull-right">
                    <label for="">

                </div>
                <input type="submit" name="submit" class="btn btn-primary" value="Đăng nhập">
            </form>
            <?php else: ?>
           Chuyển đến<a href="index.php?controller=cart&action=show" class="btn btn-outline">Đơn hàng</a>của bạn
            <?php endif;?>
        </div>
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
