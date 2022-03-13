<?php
require_once "controllers/Controller.php";
require_once "models/Product.php";
require_once "models/Categories.php";
require_once "models/Pagination.php";
require_once "models/Pagination2.php";


class ProductController extends  Controller{
    //home
    public function home(){
        $product_model = new Product();
        
    
        $shows = $product_model->showData();
        $categories_model = new Categories();
        $categories = $categories_model->getData();

        $this->content =$this->render('views/home/table.php',['categories'=>$categories,'shows'=>$shows]);
        require_once "views/layouts/main.php";
    }

    
    //show
    public function index(){

        $product_model = new Product();
        $id = $_GET['id'];
        $product = $product_model->getOne($id);
        $category_id = $product['id'];
        $shows = $product_model->showData();

        $categories_model = new Categories();
        $categories = $categories_model->getData();
        //khoảng giá
        $prices = $product_model->price();
        $rangeprice = '';
        if(isset($_GET['price'])){
            $price = preg_split('[\s]',$_GET['price']);
            $from = 0;
            $to = 0;
            if($price[0]=='trên'){
                $from = $price[1];
            }else{
                $price1 = preg_split('[\-]',$price[0]);
                $from = $price1[0];
                $to = $price1[1];
            }
            if($to == 0){
                $rangeprice = "and products.price > $from";
            }else{
                $rangeprice = "and products.price >= $from and products.price <= $to";
            }
        }

        // phân trang
      
        $query_additional = '';
        if (isset($_GET['title'])) {
          $query_additional .= '&title=' . $_GET['title'];
      }
        $count_total =$product_model->countId($category_id);
        $params = [
            'price' => $rangeprice,
            'id' => $id,
            'category_id'=>  $category_id ,
            'total' => $count_total,
            'limit' => 12,
            'controller' => 'product',
            'query_string' => 'page',
            'action' => 'index',
            'query_additional'=> $query_additional,
            'full_mode' => false,
            'page' => isset($_GET['page'])?$_GET['page']:1
        ];
        

        $products = $product_model->getAllData($params );


        $pagination_model = new Pagination($params);
        $pagination = $pagination_model->getPagination($params);




        $this->page_title = "danh sách sản phẩm ";
        $this->content = $this->render('views/products/index.php',[
            'pages'=>$pagination,
            'product'=>$product,
            'products'=>$products,
            'categories'=>$categories,
            'shows' => $shows,
            'prices'=>$prices
        ]);
        require_once "views/layouts/main_detail.php";
    }



   
    //detaij
    public function detail(){
        $product_model = new Product();
        $id = $_GET['id'];
        
        $product = $product_model -> geData($id);
        $shows = $product_model->showData();

        $categories_model = new Categories();
        $categories = $categories_model->getData();
        $this->content=$this->render("views/products/detail.php",[
            'product' => $product,
            'categories' =>$categories,
            'shows'=>$shows,

            ]);
        require_once "views/layouts/main_detail.php";
    }
    public function detail2(){
        $product_model = new Product();
        $id = $_GET['id'];
        
        $product = $product_model -> geData($id);
        $shows = $product_model->showData();


        $categories_model = new Categories();
        $categories = $categories_model->getData();
        $this->content=$this->render("views/products/detail.php",[
            'product' => $product,
            'categories' =>$categories,
            'shows'=>$shows,
            ]);
        require_once "views/layouts/main_detail.php";
    }

    // ...............................................sale-off...........................................
    public function sale(){

        $products = new Product();
        $shows = $products->showData();
        $query_additional = '';
        if(isset($_GET['title'])){
            $query_additional .= '&title='.$_GET['title'];
        }
          //khoảng giá
          $prices = $products->price();
          $rangeprice = '';
          if(isset($_GET['price'])){
              $price = preg_split('[\s]',$_GET['price']);
              $from = 0;
              $to = 0;
              if($price[0]=='trên'){
                  $from = $price[1];
              }else{
                  $price1 = preg_split('[\-]',$price[0]);
                  $from = $price1[0];
                  $to = $price1[1];
              }
              if($to == 0){
                  $rangeprice = "and products.price > $from";
              }else{
                  $rangeprice = "and products.price >= $from and products.price <= $to";
              }
          }
        $coutID = $products->countId_sale();

        $params=[
            'price' => $rangeprice,
            'total' => $coutID,
            'limit' => 12,
            'controller' => 'product',
            'query_string' => 'page',
            'action' => 'sale',
            'query_additional'=> $query_additional,
            'full_mode' => false,
            'page' => isset($_GET['page'])?$_GET['page']:1
        ];
        $paginations = new Pagination2($params);
        $pagination = $paginations->getPagination($params);
        $sale = $products->saleOff($params);
        $categories_model = new Categories();
        $categories = $categories_model->getData();
        $this->page_title = "Sản phẩm sale";
        $this->content = $this->render("views/products/sale.php",[
            'sales'=>$sale,
              'categories' => $categories,
              'page'=>$pagination,
              'shows' => $shows,
              'prices'=>$prices

    ]);
        require_once "views/layouts/main_detail.php";
    }
    
    // ..............................clothing..................................

  public function clothing(){

    
      $listClothing = new Product();
      $shows = $listClothing->showData();
      $category_id = 8;

    $str_search = '';
    if(isset($_GET['title'])){
        $str_search .='$title='.$_GET['title'];
    }
      //khoảng giá
      $prices = $listClothing->price();
      $rangeprice = '';
      if(isset($_GET['price'])){
          $price = preg_split('[\s]',$_GET['price']);
          $from = 0;
          $to = 0;
          if($price[0]=='trên'){
              $from = $price[1];
          }else{
              $price1 = preg_split('[\-]',$price[0]);
              $from = $price1[0];
              $to = $price1[1];
          }
          if($to == 0){
              $rangeprice = "and products.price > $from";
          }else{
              $rangeprice = "and products.price >= $from and products.price <= $to";
          }
      }
    $total = $listClothing->countId($category_id);
    
    $params = [
        'price'=>$rangeprice,
        'category_id'=>8,
        'limit' => 12,
        'total' => $total,
        'controller' => 'product',
        'query_string' => 'page',
        'action'=>'clothing',
        'query_additional'=>  $str_search,
        'full_mode' => false,
        'page' => isset($_GET['page'])?$_GET['page']:1 ,
    ];
    $paginations= new Pagination2($params);
    $pagination = $paginations->getPagination($params);
    $clothings = $listClothing->listClothing($params);
    $categories_model = new Categories();
    $categories = $categories_model->getData();
    $this->page_title="Sản phẩm phụ kiện";
    $this->content = $this->render('views/products/clothing.php',[
        'categories'=>$categories,
        'clothings' => $clothings,
        'page' => $pagination,
        'shows'=>$shows,
        'prices'=>$prices
    ]);
    require_once "views/layouts/main_detail.php";
  }
    //   .............................................champion.................................
    public function champion(){
        $products = new Product();
        $shows = $products->showData();


        $str_search = '';
        if (isset($_GET['title'])) {
            $str_search .= '&title'. $_GET['title'];
        }
          //khoảng giá
          $prices = $products->price();
          $rangeprice = '';
          if(isset($_GET['price'])){
              $price = preg_split('[\s]',$_GET['price']);
              $from = 0;
              $to = 0;
              if($price[0]=='trên'){
                  $from = $price[1];
              }else{
                  $price1 = preg_split('[\-]',$price[0]);
                  $from = $price1[0];
                  $to = $price1[1];
              }
              if($to == 0){
                  $rangeprice = "and products.price > $from";
              }else{
                  $rangeprice = "and products.price >= $from and products.price <= $to";
              }
          }
        $count = $products->count_Id();
        $params = [
            'price' =>$rangeprice,
            'total' => $count,
            'limit' => 12   ,
            'query_string' => 'page',
            'controller' => 'product',
            'action' => 'champion',
            'query_additional'=>  $str_search,
            'full_mode' => false,
            'page' => isset($_GET['page'])?$_GET['page']:1,
        ];



        $champion = $products->listData($params);
        $paginations = new Pagination2($params);
        $pagination = $paginations->getPagination($params);

        $categories_model = new Categories();
        $categories = $categories_model->getData();
        $this->page_title="Sản phẩm phụ kiện";
    $this->content = $this->render('views/products/champion.php',[
        'categories'=>$categories,
        'champions' => $champion,
        'page' => $pagination,
        'shows' => $shows,
        'prices'=>$prices
    ]);
    require_once "views/layouts/main_detail.php";
  
    }

    // ...........chinh sách..................
    public function chinhsach(){
        $getpolicy = new Product();
        $policies = $getpolicy->policy();
        $categories_model = new Categories();
        $categories = $categories_model->getData();
        $this->page_title = "Chính sách đổi trả của Shop";
        $this->content = $this->render('views/products/chinhsach.php',['categories'=>$categories,'policies'=> $policies]);
        require_once "views/layouts/main_detail.php";
    }
    

}