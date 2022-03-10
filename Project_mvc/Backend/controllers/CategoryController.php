<?php
require_once "controllers/Controller.php";
require_once "models/Category.php";

class CategoryController extends  Controller{
    //create
    public function create(){

        if (isset($_POST['submit'])){
            $name = $_POST['name'];
            $status = $_POST['status'];
            $description = $_POST['description'];
            $avatar = $_FILES['avatar'];
            if (empty($name)){
                $this->error = "Trường này không được để trống";
            }elseif($avatar['error']==0){
                $extension = pathinfo($avatar['name'],PATHINFO_EXTENSION);
                $extension = strtolower($extension);
                $allowed = ['png','jpg','jpeg','gif'];
                if(!in_array($extension,$allowed)){
                    $this->error = "File phải là ảnh";
                }
                $size = round($avatar['size']/1024/1024);
                if($size >2){
                    $this->error = "File không được vượt quá 2MB";
                }
            }
            if (empty($this->error)){
                $filename ='';
                if($avatar['error']==0){
                    $uploads = "assets/uploads";
                    if(!file_exists($uploads)){
                        mkdir($uploads);
                    }
                    $filename = time() .'-'.$avatar['name'];
                    move_uploaded_file($avatar['tmp_name'],"$uploads/$filename");
                }

                $category_model = new Category();
                $datas = [
                    'avatar'=>$filename,
                    'name' => $name,
                    'description' => $description,
                    'status' => $status
                ];
                $category = $category_model->insertData($datas);
                if ($category){
                    $_SESSION['success'] = 'Thêm mới thành công';
                    header("Location:index.php?controller=category&action=index");
                    exit();
                }
            }
        }


        $this->page_title = 'thêm mới danh mục';
        $this->content = $this->render('views/category/create.php');
        require_once "views/layouts/main.php";
    }


    //index
    public function index(){
        $category_model = new Category();
        $categories = $category_model->listData();


        $this->page_title = "Thêm mới danh mục";
        $this->content = $this->render('views/category/index.php',['categories'=>$categories]);
        require_once "views/layouts/main.php";
    }
    //delete
    public function delete(){
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])){
            $_SESSION['error']="id không tồn tại";
            header("Location:index.php?controller=category&action=index");
            exit();
        }
        $id = $_GET['id'];
        $category_model = new Category();
        $data = [
            'id' => $id
        ];
        $dalete = $category_model->deleteData($data);
        if ($dalete){
            $_SESSION['success'] = "xóa thành công danh mục có ID = $id";
            header("Location:index.php?controller=category&action=index");
            exit();
        }
    }
    //detail
    public function detail(){
        if (!isset($_GET['id'])||!is_numeric($_GET['id'])){
            $_SESSION['error'] =" Không có trường ID này";
            header("Location:index.php?controller=category&action=index");
            exit();
        }
        $id = $_GET['id'];
        $categories_model = new Category();
       
        $category = $categories_model->getOne($id);

        if (isset($_POST['submit'])){
//            $_SESSION['success'] = 'ok';
            header("Location:index.php?controller=category&action=index");
            exit();
        }


        $this->page_title = "Chi tiết danh mục";
        $this->content = $this->render("views/category/detail.php",['category'=>$category]);
        require_once "views/layouts/main.php";
    }
    //update
    public function update(){
        if (!isset($_GET['id'])||!is_numeric($_GET['id'])){
            $_SESSION['error'] =" Không có trường ID này";
            header("Location:index.php?controller=category&action=index");
            exit();
        }
        $id = $_GET['id'];
        $categories_model = new Category();
    
        $category = $categories_model->getOne($id);
        

        if (isset($_POST['submit'])){
            $name = $_POST['name'];
            $description = $_POST['description'];
            $status = $_POST['status'];
            $avatar = $_FILES['avatar'];
            if($avatar['error']==0){
                $extension = pathinfo($avatar['name'],PATHINFO_EXTENSION);
                $extension = strtolower($extension);
                $allowed = ['png','jpg','jpeg','gif'];
                if(!in_array($extension,$allowed)){
                    $this->error = "File phải là ảnh";
                }
                $size = round($avatar['size']/1024/1024);
                if($size >2){
                    $this->error = "File không được vượt quá 2MB";
                }
            }

            if (empty($this->error)){
                $filename = $category['avatar'];
                if($avatar['error']==0){
                        $uploads = "assets/uploads";
                        @unlink($uploads.'/'.$filename);
                        if(!file_exists($uploads)){
                            mkdir($uploads);
                        }
                        $filename = time() .'-'.$avatar['name'];
                        move_uploaded_file($avatar['tmp_name'],"$uploads/$filename");
                    
                }
                $category_model = new Category();
                $datas =[
                  'id' => $id,
                    'name'=>$name,
                    'description' =>$description,
                    'status' => $status,
                    'avatar'=>$filename,
                ];
                $categories = $category_model->updateData($datas);
                if ($categories){
                    $_SESSION['success'] = "Update thành công";
                    header("Location:index.php?controller=category&action=index");
                    exit();
                }

            }

        }
        $this->page_title = "update danh mục";
        $this->content = $this->render('views/category/update.php',['category'=>$category]);
        require_once "views/layouts/main.php";
    }
}
