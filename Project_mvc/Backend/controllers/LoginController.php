<?php
require_once "controllers/Controller.php";
require_once "models/User.php";
class LoginController extends Controller{

    public function register(){
        //- xử lý submit form
        if (isset($_POST['submit'])){
            $username = $_POST['username'];
            $avatar = $_FILES['avatar'];
            $password = $_POST['password'];
            $password_comfirm = $_POST['password_1'];
            if (empty($username)|| empty($password)|| empty($password_comfirm)){
                $this->error = "Trường này k được để trống";
            }elseif ($password != $password_comfirm){
                $this->error = "Password nhập lại chưa đúng";
            }elseif ($avatar['error']==0){
                $extension = pathinfo($avatar['name'],PATHINFO_EXTENSION);
                $extension = strtolower($extension);
                $alowed = ['png','jpg','jpeg','gif'];
                if (!in_array($extension,$alowed)){
                    $this->error = "file phải là ảnh";
                }
                $size_m = $avatar['size'];
                $size_b = $size_m/1024/1024;
                $size_b = round($size_b);
                if ($size_b > 2){
                    $this->error = "dung lượng không được vượt quá 2MB";
                }

            }
            // đăng ký user
            if (empty($this->error)){
                $filename = '';
                if ($avatar['error'] == 0){
                    $upload = "assets/uploads";
                    if(!file_exists($upload)){
                        mkdir($upload);
                    }
                }
                $filename = time() .'-'.$avatar['name'];
                move_uploaded_file($avatar['tmp_name'],"$upload/$filename");

                $user_model = new User();
                // k cho phép user name đăng ký đã tồn tại
                $user = $user_model->getUserByUsername($username);
                if (!empty($user)){
                    $_SESSION['error'] ="Username $username đã tồn tại";
                    header("Location=index.php?controller=login&action=register");
                    exit();
                }
                $filenameAvatar = [
                    'avatar' => $filename
                ];
                //mã hóa maatk khẩu
                $password = password_hash($password,PASSWORD_BCRYPT);
                $is_insert = $user_model->registerUser($username,$password,$filenameAvatar);
                if ($is_insert){
                    $_SESSION['success']= "Đăng ký thành công";
                }else{
                    $_SESSION['error'] = "Đăng ký thất bại";
                }
                header("Location:index.php?controller=login&action=login");
                exit();

            }
        }



        // gọi views hienr thị form đằng ký
        $this->page_title = "đăng ký user";
        $this->content = $this->render("views/logins/register.php");
        require_once "views/layouts/main_login.php";
    }

    public function login(){
        if (isset($_POST['submit'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            if (empty($username) || empty($password)) {
                $this->error = "Trường này k được để trống";
            }
            // đăng ký user
            if (empty($this->error)){
                //lấy ra mât khẩu đã mã hóa tương ứng csdl
                $user_model = new User();
                $user = $user_model->getUserByUsername($username);
                if (empty($user)){
                   $this->error = "Username $username không tồn tại";
                }else{
                    //lấy ra mật khẩu đã mã hóa
                    $password_hash = $user['password'];
                    // so sánh mã hóa vs mật khẩu từ form
                    $is_login = password_verify($password,$password_hash);
                    if ($is_login){
                        $_SESSION['success'] = "đăng nhập thành công";
                        //tạo session lưu lại thông tin user hiện taik
                        $_SESSION['user'] = $user;
                        header("Location:index.php?controller=product&action=index");
                        exit();
                    }
                }
                $this->error ="sai tài khoản hoặc mật khẩu không đúng";
            }

        }


        $this->page_title = "đăng ký user";
        $this->content = $this->render("views/logins/login.php");
        require_once "views/layouts/main_login.php";
    }
    public function logout(){
        unset($_SESSION['user']);
        $_SESSION['success'] = "đăng xuất thành công";
        header('Location:index.php?controller=login&action=login');
        exit();
    }


}
