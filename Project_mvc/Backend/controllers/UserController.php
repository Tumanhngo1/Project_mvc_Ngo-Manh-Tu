<?php
require_once "controllers/Controller.php";
require_once "models/User.php";
class UserController extends Controller {

    public function index(){

        $user_model = new User();
        $products = $user_model->listData();


        $this->page_title = "Trang quản lý người dùng";
        $this->content = $this->render("views/users/index.php",['products'=>$products]);
        require_once "views/layouts/main.php";
    }

    //delete
    public function delete(){
        $id = $_GET['id'];
        $user_model = new User();

        $is_delete = $user_model->deleteData($id);
        if ($is_delete){
            $_SESSION['success'] = "xóa người dùng thành công";
            header("Location:index.php?controller=user&action=index");
            exit();
        }

        $this->content = $this->render("views/users/delete.php");
        require_once "views/layouts/main.php";
    }

    //chi tiết
    public function detail(){
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])){
            $_SESSION['error'] = "không tồn tại người dùng id này";
            header("Location:index.php?controller=user&action=index");
            exit();
        }
        $id = $_GET['id'];
        $user_model = new User();
        $product = $user_model->getOne($id);

        if (isset($_POST['submit'])){
            $_SESSION['success'] = "oke";
            header("Location:index.php?controller=user&action=index");
            exit();
        }

        $this->page_title = "Chi tiết người dùng";
        $this->content = $this->render("views/users/detail.php",['product'=>$product]);
        require_once "views/layouts/main.php";
    }


    //update
    public function update(){
        if (!isset($_GET['id'])|| !is_numeric($_GET['id'])){
            $_SESSION['error'] = "id không hợp lệ";
            header("Location:index.php?controller=user&action=index");
            exit();
        }
        $id = $_GET['id'];
        $user_model = new User();
        $product = $user_model->getOne($id);

        if (isset($_POST['submit'])){
            $name = $_POST['name'];
            $avatar = $_FILES['avatar'];
//            $id = $_GET['id'];
            if ($avatar['error'] ==0){
                $extension = pathinfo($avatar['name'],PATHINFO_EXTENSION);
                $extension = strtolower($extension);
                $allow = ['png','jpg','jpag','gif'];
                if (!in_array($extension,$allow)){
                    $this->error = "file phải là ảnh";
                }
                $size = round($avatar['size']/1024/1024,2);
                if ($size >2){
                    $this->error = "File ảnh không vượt quá 2MB";
                }
            }
            if (empty($this->error)){
                $filename = $product['avatar'];
                if ($avatar['error']==0) {
                    $updates = "assets/uploads";
                    @unlink($updates . '/' . $filename);
                    if (!file_exists($updates)) {
                        mkdir($updates);
                    }
                    $filename = time() . "-" . $avatar['name'];
                    move_uploaded_file($avatar['tmp_name'], "$updates/$filename");
                }
                    $update = new User();
                    $data=[
                        'id'=> $id,
                        'avatar' => $filename,
                        'name' => $name
                    ];
                    $is_update = $update->updateData($data);

                    if ($is_update){
                        $_SESSION['success'] = "update thành công";
                        header("Location:index.php?controller=user&action=index");
                        exit();
                    }
                    $this->error = "update không thành công";

            }

        }
        if (isset($_POST['cancel'])){
            header("Location:index.php?controller=user&action=index");
            exit();
        }

        $this->page_title = "Chỉnh sửa người dùng";
        $this->content = $this->render('views/users/update.php',['product'=>$product]);
//        $this->content = $this->render('views/layouts/header.php',['product'=>$product]);
        require_once "views/layouts/main.php";
    }


}
