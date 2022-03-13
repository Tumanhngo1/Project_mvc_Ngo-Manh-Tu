<?php
require_once "controllers/Controller.php";
require_once "models/Product.php";
require_once "models/Categories.php";
require_once  "models/Order.php";

class CartController extends Controller{
    public function add(){
//         // xử lý thêm sp vào giỏ hàng bằng session

        $product_id = $_GET['product_id'];



        $product_model = new Product();
        $product = $product_model->getById($product_id);

      
// ////die();
// //        // lưu tên giá file ảnh vào sp và giỏ hàng
        $product_cart=[
            'title' => $product['title'],
            'price' =>  ($product['price_sale']>0)?$product['price_sale'] :$product['price'],
            'avatars' => $product['avatars'],
            'quantity' => 1,
        ];
       
//
//        //+ sp đã tồn tại: k thêm mới chỉ update thêm 1
//        //- cơ chế thêm sản phẩm vào giỏ hàng: có 2 case
//        //+ sp chưa tồn tại: thêm phần tử mảng mới vào session vào giỏ hàng
//        // nếu sp chưa tòn tại thì thêm vào giỏ

        if (!isset($_SESSION['cart'])){
            $_SESSION['cart'][$product_id] = $product_cart;
        }else {
            if(array_key_exists($product_id,$_SESSION['cart'])){
               $_SESSION['cart'][$product_id]['quantity']++;
            }else{
                $_SESSION['cart'][$product_id] = $product_cart;
            }
        }
    
        
    }


  
// .................................................update....................................
    public function update(){
      
        $qty_id = $_GET['qty_id'];
        $quantity = $_GET['quantity'];


        $product_model = new Product();
        $product = $product_model->getById($qty_id);

      

//        // lưu tên giá file ảnh vào sp và giỏ hàng
        $update_cart=[
            'title' => $product['title'],
            'price' => $product['price'],
            'avatars' => $product['avatars'],
            'quantity' => floor($quantity),
        ];


        //    update
           if ( $quantity > 0 ){
                $_SESSION['cart'][$qty_id] = $update_cart;  
           }
           else{
            unset($_SESSION['cart'][$qty_id]);
           }
   
    }
    public function deleteData(){

        $product_id = $_GET['product_id'];
        $product_model = new Product();
        $product = $product_model->getById($product_id);
        $update_cart=[
            'title' => $product['title'],
            'price' => $product['price'],
            'avatars' => $product['avatars'],
            'quantity' =>0 ,
        ];
        if (   $_SESSION['cart']['quantity'] == 0){
            unset($_SESSION['cart'][$product_id]); 
       }
    }
    // ............................delete........................................
    public function delete(){
        $productId =$_GET['id'] ?? null;
        unset($_SESSION['cart'][$productId]);
        header("location:index.php?controller=cart&action=index");
        exit();

    }
    


    public function index(){

        $categories_model = new Categories();
        $categories = $categories_model->getData();
        $this->page_title = "giỏ hàng của ban";
        $this->content =$this->render("views/carts/cart.php",['categories'=>$categories]);
        require_once "views/layouts/main_detail.php";
    }

    // ...................................bill..............................
    public function show(){
        $cart_model = new Order();
        $id = $_SESSION['email']['id'];
        $carts = $cart_model->getAll($id);

        $categories_model = new Categories();
        $categories = $categories_model->getData();
        $this->page_title= "Hóa đơn khách hàng";
        $this->content = $this->render("views/carts/show.php",[
            'carts'=>$carts,
            'categories'=>$categories]);
        require_once "views/layouts/main_detail.php";
    }
}