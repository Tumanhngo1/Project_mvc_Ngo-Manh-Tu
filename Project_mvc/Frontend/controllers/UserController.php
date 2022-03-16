<?php

use function Aws\filter;

require_once "controllers/Controller.php";
require_once "models/Login.php";
require_once "models/Categories.php";
require_once "models/Order.php";



class UserController extends Controller{
    public function register(){
        if (isset($_POST['submit'])){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $password_confirm = $_POST['password-confirm'];
            if (empty($name) || empty($password) || empty($email)){
                $this->error = "Trường này không được để trống";
            }elseif ($password != $password_confirm){
                $this->error = "password không giống nhau";
            }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                $this->error = "Bạn cần điền đúng email";
            }elseif(strlen($name) < 5){
                $this->error = "Tên phải lớn hơn 5 ký tự";
            }
            if (empty($this->error)){
                $user_model = new Login();
                $user_email = $user_model->getUser($email);
                if (!empty($user_email)){
                    $_SESSION['error'] = "Email $email đã được đăng ký";
                    header("location:index.php?controller=user&action=register");
                    exit();
                }
                // mã hóa mật khẩu
                $password = password_hash($password,PASSWORD_BCRYPT);

                $user = $user_model->insertUser($name,$email,$password);
                if ($user){
                    $_SESSION['success'] = "Đăng ký thành công";
                    header("location:index.php?controller=user&action=login");
                    exit();
                }else{
                    $this->error = "Đăng ký không thành công";
                }
            }
        }
        $categories_model = new Categories();
        $categories = $categories_model->getData();
        $this->page_title = "Đăng ký thành viên";
        $this->content = $this->render('views/payment/register.php',['categories'=>$categories]);
        require_once "views/layouts/main_detail.php";
    }

    public function login(){
        if (isset($_POST['submit'])){
            $email = $_POST['email'];
            $password = $_POST['password'];

            if (empty($email) || empty($password)){
                $this->error = "Trường này không được để trống";
            }

            if (empty($this->error)){
                //lay mật khẩu mã hóa trong csdl
                $user_model = new  Login();
                $email = $user_model->getUser($email);
               
         
                



                if (empty($email)){
                    $this->error = "Người dùng không tồn tại";
                }else{
                    // lấy mk mã hóa
                    $password_hash = $email['password'];
                    // so sánh mk mã hóa và mk từ form theo PHP cung cấp
                    $is_login = password_verify($password,$password_hash);
                    if ($is_login){
                       $_SESSION['success'] = "đăng nhập thành công";
                        //tạo session lưu thông tin
                        $_SESSION['email'] = $email;
                        header("location:index.php?controller=user&action=payMent");
                        exit();
                    }
                    $this->error = "Sai tài khoản hoặc mật khẩu";
                }
            }

        }
//        if (!isset($_GET['id']) || !is_numeric($_GET['id'])){
////            $_SESSION['error'] = "không có nhân viên có id này";
//            header("location:index.php?controller=user&action=login");
//            exit();
//        }
        $user_model = new  Login();
//        $name = $_POST['name'];

//        $login = $user_model->getogin($name);
        $categories_model = new Categories();
        $categories = $categories_model->getData();
        $this->page_title = "Đăng nhập";
        $this->content = $this->render('views/payment/login.php',['categories'=>$categories]);
        require_once "views/layouts/main_detail.php";

    }
    public function logout(){
        unset($_SESSION['email']);
        $_SESSION['success'] = "đăng xuất thành công";
        header('Location:index.php?controller=product&action=home');
        exit();
    }



  
    public function payMent(){

        if (isset($_POST['submit'])) {
            $name = $_SESSION['email']['name'];
            $address = $_POST['address'];
            $phone = $_POST['phone'];
            if (empty($address) && empty($phone)) {
                $this->error = "Trường này không được để trống";
            } elseif (strlen($phone) <=8 || strlen($phone) >= 11) {
                $this->error = "Bạn cần nhập đúng số điện thoại";
            }
            
            if (empty($this->error)) {
                $pay_model = new Login();
                    $user_id = $_SESSION['email']['id'];
                    foreach ($_SESSION['cart'] as $cart) {
                        $params = [
                            'user_id' => $user_id,
                            'name' => $name,
                            'address' => $address,
                            'phone' => $phone,
                            'code' => rand(100, 1000),
                            'title' => $cart['title'],
                            'price' => $cart['price'],
                            'quantity' => $cart['quantity'],
                            'total' => $cart['quantity']*$cart['price']
                        ];
                        $pay_cart = $pay_model->payCartAll($params);
                        if ($pay_cart) {
                            $_SESSION['success']= "Đặt hàng thành công";
                            unset($_SESSION['cart']);
                            header("location:index.php?controller=product&action=home");
                            exit();
                        }
                    }
                }
            }
        
    


        $categories_model = new Categories();
        $categories = $categories_model->getData();
        $this->page_title = "Thanh toán";
        $this->content = $this->render('views/payment/pay.php',['categories'=>$categories]);
        require_once "views/layouts/main_detail.php";
    
        }



}