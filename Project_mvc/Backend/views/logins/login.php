




<h3>Đăng nhập user</h3>


<form method="post" action="" enctype="multipart/form-data">

    <div class="form-group">
        <label for="name">tên</label>
        <input type="text" class="form-control" name="username" id="name">
    </div>
    <div class="form-group" hidden>
        <label for="avatar">Avatar</label>
        <input type="file" class="form-control" name="avatar" id="avatar">
    </div>
    <div class="form-group">
        <label for="password">mật khẩu</label>
        <input type="password" class="form-control" name="password" id="password">
    </div>

    <input type="submit" name="submit" class="btn btn-primary" value="Đăng nhập">
    <a href="index.php?controller=login&action=register" class="btn btn-success">Đăng ký</a>


</form>

