<?php
require_once "controllers/Controller.php";
require_once "controllers/CategoryController.php";
require_once  "models/Product.php";
require_once "models/Pagination.php";


class ProductController extends  Controller{

    
    // ...........................................create.........................................
    public function create(){

        if (isset($_POST['submit'])){
            $category_id = $_POST['category_id'];
            $title = $_POST['title'];
            $status = $_POST['status'];
            $price = $_POST['price'];
            $price_sale = $_POST['price_sale'];
            $description = $_POST['description'];
            $avatars = $_FILES['avatars'];
            if (empty($title) || empty($price)){
                $this->error = "Trường này không được để trống";
            }elseif (!is_numeric($price)){
                $this->error = "Giá trị sản phẩm phải là số";
            }elseif ($avatars['error']==0){
                // Chắc chắn có file tải lên
                // + Validate file upload phải là ảnh:
                // Lấy đuôi file upload:
                $extension = pathinfo($avatars['name'],PATHINFO_EXTENSION);
               // chuyển về chữ thường
                $extension = strtolower($extension);
                // tạo mảng chứa file hợp lệ
                $allowed = ['jpg','png','jpeg','gif'];
                if (!in_array($extension, $allowed)){
                    $this->error = "file ảnh không hợp lệ";
                }
                // validate dung lượng
                $size_b = $avatars['size'];
                $size_m = $size_b / 1024 / 1024;
                $size_m = round($size_m,2);
                if ($size_m > 2){
                    $this->error = "dung lượng không vượt quá 2 MB";
                }
            }

            if (empty($this->error)){

                $filename = '';
                if ($avatars['error']==0){
                    // khai báo thư mục file tải lên
                    $dir_uploads = 'assets/uploads';
                    // Tạo thư mục trên bằng code, chứ ko tạo bằng tay, chú ý là chỉ tạo thư mục
                    // khi chưa tồn tại -> file đang tồn tại bị xóa
                    if (!file_exists($dir_uploads)){
                        mkdir($dir_uploads);
                    }

                    // Tạo tên file upload mang tính duy nhất -> tránh file bị ghi đè khi trùng tên
                    $filename = time() . '-' . $avatars['name'];
                    // Chuyển file từ thư mục tạm mà XAMPP đang lưu về thư mục đích
                    move_uploaded_file($avatars['tmp_name'],"$dir_uploads/$filename");
                }
                $product_model = new Product();
                $datas = [

                    'status' => $status,
                      'title' => $title,
                      'price' => $price,
                      'price_sale'=>$price_sale,
                      'price_sale'=> $price_sale,
                      'description' => $description,
                      'avatars' => $filename,
                    'category_id' => $category_id,

                ];
                $is_insert = $product_model->insertData($datas);

                if ($is_insert){
                    $_SESSION['success'] = "Thêm sản phẩm thành công";
                }else{
                    $_SESSION['error'] = "thêm mới thất bại";
                }
                header("Location:index.php?controller=product&action=index");
                exit();
            }
        }
        $categories_model = new Category();
        $categories = $categories_model->listData();

//        echo "<pre>";
//        print_r($categories);
//        echo "</pre>";


        $this->page_title = "Thêm sản phầm";
        $this->content = $this->render("views/products/create.php",['categories'=>$categories]);
        require_once "views/layouts/main.php";
    }
// .......................................................index.........................................
    public function index(){
        $product_model = new Product();
        $query_str = '';
        if(isset($_GET['title'])){
            $query_str .= '&title='.$_GET['title'];
        }
        $countId = $product_model->countId();
        $params = [
            'limit' => 1,
            'total' => $countId,
            'controller' =>'product',
            'action'=>'index',
            'query_string'=> 'page',
            'query_additional' => $query_str,
            'page'=> isset($_GET['page'])?$_GET['page']:1,
            'full_mode'=> false
        ];
        $products = $product_model->listAll($params);
        $paginations = new Pagination2($params);
        $pagination = $paginations->getPagination($params);



        $this->page_title = "Quản lý sản phầm";
        $this->content = $this->render("views/products/index.php",[
            'products'=> $products,
            'page' => $pagination
  
            ]);
        require_once "views/layouts/main.php";
    }
// .................................................detail.....................................
    public function detail(){
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])){
            $_SESSION['error'] = "không có nhân viên có id này";
            header("location:index.php?controller=product&action=index");
              exit();
        }

        $id = $_GET['id'];
        $product_model = new Product();
        $product = $product_model->getOne($id);

        if (isset($_POST['submit'])){
            $_SESSION['success'] = "oke";
            header("Location:index.php?controller=product&action=index");
            exit();
        }




        $this->page_title = "Chi tiết sản phẩm";
        $this->content = $this->render('views/products/detail.php',['product'=>$product]);
        require_once "views/layouts/main.php";
    }




    //....................................................update........................................................
    public function update(){
        if (!isset($_GET['id'])||!is_numeric($_GET['id'])){
            $_SESSION['error'] = "id không tồn tại";
            header("Location:index.php?controller&action=index");
            exit();
        }
        $id = $_GET['id'];
        $product_model = new Product();
        $product = $product_model->getOne($id);

        if (isset($_POST['submit'])){
            $category_id = $_POST['category_id'];
            $id = $_GET['id'];
            $title = $_POST['title'];
            $avatar = $_FILES['avatar'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $price_sale = $_POST['price_sale'];
            $status = $_POST['status'];

            if ($avatar['error']==0){
                $extension = pathinfo($avatar['name'],PATHINFO_EXTENSION);
                $extension = strtolower($extension);
                $allowed = ['jpg','png','jpeg','gif'];
                if (!in_array($extension,$allowed)){
                    $this->error = "file phải là ảnh";
                }
                $size_b = $avatar['size'];
                $size_m = $size_b / 1024 /1024;
                $size_m = round($size_m,2);
                if ($size_m > 2){
                    $this->error = "Dung lượng không quá 2MB";
                }

            }

            if (empty($this->error)){
                $filename = $product['avatars'];
                if ($avatar['error'] == 0){
                    $dir_uploads = "assets/uploads";
                    @unlink($dir_uploads . '/' . $filename);
                    if (!file_exists($dir_uploads)){
                        mkdir($dir_uploads);
                    }
                    $filename = time() . '-' .$avatar['name'];
                    move_uploaded_file($avatar['tmp_name'],"$dir_uploads/$filename");
                }

                $datas = [
                    'category_id' => $category_id,
                    'id' => $id,
                    'title' => $title,
                    'description' => $description,
                    'avatars' => $filename,
                    'price' => $price,
                    'price_sale' => $price_sale,
                    'status' => $status
                ];
                $is_update = $product_model->updateData($datas);


                if ($is_update){
                    $_SESSION['success'] = "Update thành công";
                    header("Location:index.php?controller=product&action=index");
                    exit();
                }
                $this->error = "Thêm mới thất bại";

            }



        }
        if (isset($_POST['cancel'])){

            header("Location:index.php?controller=product&action=index");
            exit();
        }
        $categories_model = new Category();
        $categories = $categories_model->listData();

        $this->page_title = "Chi tiết sản phẩm";
        $this->content = $this->render('views/products/update.php',['product'=>$product,'categories'=>$categories]);
        require_once "views/layouts/main.php";
    }



    // xóa sp
    public function delete(){
        if (!isset($_GET['id'])||!is_numeric($_GET['id'])){
            $_SESSION['error'] = "id không hợp lệ";
            header("location:index.php?controller=product&action=index");
            exit();
        }

        $id = $_GET['id'];
        $product_model = new Product();
        $is_delete = $product_model->deleteData($id);

        if ($is_delete){
            $_SESSION['success'] = "xóa sản phẩm có id = $id thành công";
        }else{
            $_SESSION['error'] = "xóa sp có id = $id thất bại";
        }
        header("Location:index.php?controller=product&action=index");
        exit();



        $this->page_title = "Chi tiết sản phẩm";
        $this->content = $this->render('views/products/delete.php');
        require_once "views/layouts/main.php";
    }



    // ......................quản lý đơn hàng......................
    public function payMent(){
        $payments = new Product();
        $query_str = '';
        if(isset($_GET['title'])){
            $query_str .= '&title='.$_GET['title'];
        }
        $countId = $payments->count_Id();
        $params = [
            'limit' => 2,
            'total' => $countId,
            'controller' =>'product',
            'action'=>'payMent',
            'query_string'=> 'page',
            'query_additional' => $query_str,
            'page'=> isset($_GET['page'])?$_GET['page']:1,
            'full_mode'=> false
        ];
        $pays = $payments->payment($params);
        $paginations = new Pagination2($params);
        $pagination = $paginations->getPagination($params);
        
     foreach($pays as $pay){
       if(isset($_POST['submit'])){
           $name = $_POST['name'];
           $address = $_POST['address'];
           $phone = $_POST['phone'];
           $selected =$_POST['selected'];
           $price = $_POST['total'];
           $quantity = $_POST['quantity'];
           $title = $_POST['title'];
           if($selected == $pay['id']){
               $products = new Product();
          
                    $datas = [
                        'id' => $pay['id'],
                        'name' => $name,
                        'address'=>$address,
                        'phone'=>$phone,
                        'title'=>$title,
                        'quantity'=>$quantity,
                        'price'=>$price,
                        'status'=>$selected,

                    ];
                    $is_update = $products->updateHistory($datas);
                    $is_insert = $products->insertHistory($datas);
                
           }

       }
    }
        $this->page_title = "Quản lý đơn hàng";
        $this->content = $this->render('views/products/payment.php',
        ['pays'=>$pays, 'pages'=>$pagination]);
        require_once "views/layouts/main.php";
    }
    public function updatepay(){
        if (!isset($_GET['id'])||!is_numeric($_GET['id'])){
            $_SESSION['error'] = "id không hợp lệ";
            header("location:index.php?controller=product&action=index");
            exit();
        }
        $payments = new Product();
      
        $id = $_GET['id'];
        $payone = $payments->payOne($id);
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $address = $_POST['address'];
            $phone = $_POST['phone'];
            $title = $_POST['title'];
            $price = $_POST['price'];
            $total = $_POST['total'];
            $code = $_POST['code'];
            $quantity = $_POST['quantity'];
            if (empty($address) && empty($phone)) {
                $this->error = "Trường này không được để trống";
            } elseif (strlen($phone) == 10) {
                $this->error = "Bạn cần nhập đúng số điện thoại";
            }
            
            if (empty($this->error)) {
                $pay_model = new Product();
  
                $datas = [
                    'id'=> $id,
                    'address' => $address,
                    'name' => $name,
                    'title' => $title,
                    'phone' => $phone,
                    'price' => $price,
                    'quantity'=>$quantity,
                    'total' => $total,
                    'code' =>$code
                ];
                $update = $pay_model->updatePay($datas);
                if($update){
                    $_SESSION['success'] = "Chỉnh sửa đơn hàng thành công";
                    header("location:index.php?controller=product&action=payMent");
                    exit();
                }
               
            }
        }
      
     
        if (isset($_POST['cancel'])){

            header("Location:index.php?controller=product&action=payMent");
            exit();
        }
        $this->page_title = "Chi tiết đơn hàng";
        $this->content = $this->render('views/products/updatepay.php',
        ['pay'=>$payone]);
        require_once "views/layouts/main.php";
    }
    public function deletepay(){
        if (!isset($_GET['id'])||!is_numeric($_GET['id'])){
            $_SESSION['error'] = "id không hợp lệ";
            header("location:index.php?controller=product&action=index");
            exit();
        }

        $id = $_GET['id'];
        $product_model = new Product();
        $is_delete = $product_model->deletepay($id);

        if ($is_delete){
            // $_SESSION['success'] = "xóa sản phẩm có id = $id thành công";
        }else{
            $_SESSION['error'] = "xóa sp có id = $id thất bại";
        }
        header("Location:index.php?controller=product&action=payMent");
        exit();



        $this->page_title = "Chi tiết sản phẩm";
        $this->content = $this->render('views/products/delete.php');
        require_once "views/layouts/main.php";
    }
    //history
    public function historyindex(){
        $products = new Product();
        $historys = $products->history();
        
        $this->page_title = "Chi tiết sản phẩm";
        $this->content = $this->render('views/products/history.php',['historys'=>$historys]);
        require_once "views/layouts/main.php";
    }

    
}