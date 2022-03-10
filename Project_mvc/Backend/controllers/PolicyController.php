<?php
require_once "controllers/Controller.php";
require_once "models/policy.php";

class PolicyController extends Controller{

    public function policy(){
        if(isset($_POST['submit'])){
            if(empty($_POST['title']) || empty($_POST['description'])){
                $this->error = "Trường này không được để trống";
            }
            if(empty($this->error)){
                $policies = new Policy();
                $datas=[
                    'title'=> $_POST['title'],
                    'description' =>$_POST['description'],
                ];
                $policy = $policies->insertData($datas);

                if($policy){
                    $_SESSION['success'] = "thêm mới thành công";
                    header("location:index.php?controller=policy&action=index");
                    exit();
                }
            }
        }
     
        $this->page_title = "Thêm mới chinh sách";
        $this->content = $this->render('views/policies/create.php');
        require_once "views/layouts/main.php";
    }
    public function index(){
        $product_model = new Policy();
        $products = $product_model->listData();
        $this->page_title = "Chinh sách";
        $this->content = $this->render('views/policies/index.php',['products'=>$products]);
        require_once "views/layouts/main.php";
    }
    public function update(){
        if (!isset($_GET['id'])||!is_numeric($_GET['id'])){
            $_SESSION['error'] = "id không hợp lệ";
            header("location:index.php?controller=policy&action=index");
            exit();
        }
        $product_model = new Policy();
        $id = $_GET['id'];
        $product = $product_model->getOne($id);
        if(isset($_POST['submit'])){
            if(empty($_POST['title']) || empty($_POST['description'])){
                $this->error = "Trường này không được để trống";
            }
            if(empty($this->error)){
                $policies = new Policy();
                $datas=[
                    'id' => $id,
                    'title'=> $_POST['title'],
                    'description' =>$_POST['description'],
                ];
                $policy = $policies->insertData($datas);

                if($policy){
                    $_SESSION['success'] = "thêm mới thành công";
                    header("location:index.php?controller=policy&action=index");
                    exit();
                }
            }
        }
        if (isset($_POST['cancel'])){

            header("Location:index.php?controller=policy&action=index");
            exit();
        }

        $this->page_title = "Chỉnh sửa Chinh sách";
        $this->content = $this->render('views/policies/update.php',['product'=>$product]);
        require_once "views/layouts/main.php";
    }
    public function delete(){
        if (!isset($_GET['id'])||!is_numeric($_GET['id'])){
            $_SESSION['error'] = "id không hợp lệ";
            header("location:index.php?controller=policy&action=index");
            exit();
        }
        $id = $_GET['id'];
        $product_model = new Policy();
        $is_delete = $product_model->deleteData($id);

        if ($is_delete){
            $_SESSION['success'] = "xóa sản phẩm có id = $id thành công";
        }else{
            $_SESSION['error'] = "xóa sp có id = $id thất bại";
        }
        header("Location:index.php?controller=policy&action=index");
        exit();



        $this->page_title = "Chi tiết sản phẩm";
        $this->content = $this->render('views/policies/delete.php');
        require_once "views/layouts/main.php";
    }
}