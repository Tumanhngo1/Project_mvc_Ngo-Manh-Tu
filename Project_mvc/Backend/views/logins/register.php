




<h3>Đăng ký user</h3>


<form method="post" action="" enctype="multipart/form-data">

    <div class="form-group">
        <label for="name">tên</label>
        <input type="text" class="form-control" name="username" id="name">
    </div>
    <div class="form-group">
        <label for="avatar">Avatar</label>
        <input type="file" class="form-control" name="avatar" id="avatar">
    </div>
    <div class="form-group">
        <label for="password">mật khẩu</label>
        <input type="password" class="form-control" name="password" id="password">
    </div>
    <div class="form-group">
        <label for="password_1">nhập lại mật khẩu</label>
        <input type="password" class="form-control" name="password_1" id="password_1">
    </div>

    <input type="submit" name="submit" class="btn btn-primary" value="đăng ký">
    <a href="index.php?controller=login&action=login" class="btn btn-secondary">Back</a>


</form>

