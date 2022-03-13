<?php
require_once "models/Model.php";

class Product extends Model{

    public $str_search = '';
    public function __construct()
    {
        parent::__construct();
        if (isset($_GET['title']) && !empty($_GET['title'])) {
            $this->str_search .= " AND products.title LIKE '%{$_GET['title']}%'";
        }
       

    }

    //sản phẩm tương tụ
    public function showData(){
       
        $sql_select = $this->connection->prepare("SELECT * FROM products 
         ORDER BY created_at ASC ");
        $sql_select->execute();
        return $sql_select->fetchAll(PDO::FETCH_ASSOC);
    }

    //hiển thị sản phảm
    public function listData($params = []){
        $limit = $params['limit'];
        $page  = $params['page'];
        $start = ($page - 1)*$limit;
        $sql_select = $this->connection->prepare("SELECT * FROM products where true $this->str_search 
         ORDER BY created_at DESC LIMIT $start,$limit ");
        $sql_select->execute();
        return $sql_select->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAll(){
        $sql_select = "SELECT products.*,categories.name as category_name FROM products 
                inner join categories on categories.id = products.id  ";
        $obj_select = $this->connection->prepare($sql_select);
        $obj_select->execute();
        return $obj_select->fetchAll(PDO::FETCH_ASSOC);
    }

    //fillter
    public function geData($id){

        $sql_select =$this->connection->prepare( "SELECT products.*,categories.name
            FROM products inner join categories on categories.id = products.category_id where products.id=:id");
        $params = [
             ':id' => $id,
         ];
        $sql_select->execute($params);
        return $sql_select->fetch(PDO::FETCH_ASSOC);

    }
    public function getData($id){

        $sql_select =$this->connection->prepare( "SELECT accessories.*,categories.name
            FROM accessories inner join categories on categories.id = accessories.category_id where accessories.id=$id");
     
        $sql_select->execute();
        return $sql_select->fetch(PDO::FETCH_ASSOC);

    }

  

    // ..............................................Phân Trang, lấy sp theo category_id, tìm kiếm.................................
    public function getAllData($params=[]){
     
        $limit = $params['limit'];
        $page = $params['page'];
        $start = ($page - 1) * $limit;
        $sql_select = "SELECT products.*,categories.name
            FROM products inner join categories on categories.id = products.category_id
             where products.category_id=:category_id $this->str_search 
            LIMIT $start,$limit ";
        $obj_select = $this->connection->prepare($sql_select);
        $array_param = [
            ':category_id' => $params['category_id']
        ];
        $obj_select->execute($array_param);
        return $obj_select->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getOne($id){
        $sql_select = "SELECT products.*,categories.*
            FROM products inner join categories on categories.id = products.category_id where products.category_id=:id  ";
        $obj_select = $this->connection->prepare($sql_select);
        $array_param = [
            ':id' => $id
        ];
        $obj_select->execute($array_param);
        return $obj_select->fetch(PDO::FETCH_ASSOC);
    }
    public function getById($id)
    {
        $obj_select = $this->connection
            ->prepare("SELECT products.*, categories.name AS category_name FROM products 
          INNER JOIN categories ON products.category_id = categories.id WHERE products.id =$id");

        $obj_select->execute();
        $product =  $obj_select->fetch(PDO::FETCH_ASSOC);
        return $product;
    }
//......................................................lấy ra sp phân trang sale....................................
  
    public function getPagination($params=[]){
        $limit = $params['limit'];
        $page = $params['page'];
        $start = ($page - 1) * $limit;
        $obj_select = $this->connection
            ->prepare("SELECT products.*, categories.name AS category_name FROM products 
                        INNER JOIN categories ON categories.id = products.category_id
                        ORDER BY products.updated_at DESC, products.created_at DESC
                        LIMIT $start, $limit");
        $arr_select = [];
        $obj_select->execute($arr_select);
        return $obj_select->fetchAll(PDO::FETCH_ASSOC);
    }



    //xóa sp
    public function deleteData($id){
        $sql_delete = $this->connection->prepare("DELETE FROM products where id = :id");
        $delete = [':id' => $id];
        return $is_delete = $sql_delete->execute($delete);
    }

    //.....................................................sale + phân trang+ tìm kiếm...............................................
    public function countId($category_id){
        $sql_select = $this->connection->prepare("SELECT COUNT(id) FROM products
         where products.category_id =:category_id");
        $select = [
            ':category_id'=>$category_id
        ];
        $sql_select->execute($select);
       return $sql_select->fetchColumn();
    }
    //champion
    public function countId_sale(){
        $sql_select = $this->connection->prepare("SELECT COUNT(id) FROM products  WHERE products.price_sale >0");
        
        $sql_select->execute();
       return $sql_select->fetchColumn();
    }
    public function saleOff($params){
        $limit = $params['limit'];
        $page = $params['page'];
        $start = ($page - 1)* $limit;
        $sql_select = $this->connection->prepare("SELECT * FROM products 
        WHERE products.price_sale >0 $this->str_search 
        LIMIT $start, $limit ");
        $sql_select->execute();
        return $sql_select->fetchAll(PDO::FETCH_ASSOC);
    }
        //.............................................................clothing + phân trang  + tìm kiếm.....................
  

    public function listClothing($params = []){
        $limit = $params['limit'];
        $page = $params['page'];
        $start = ($page - 1) * $limit;
        $sql_select = $this->connection->prepare("SELECT * FROM products where products.category_id=:category_id  $this->str_search   limit $start,$limit ");
        $select = [
            'category_id' => $params['category_id']
        ];
        $sql_select->execute($select);
        return $sql_select->fetchAll(PDO::FETCH_ASSOC);
    }
    //  ...............................policy
    public function policy(){
         $sql_select = $this->connection->prepare("SELECT * FROM policies 
          ORDER BY created_at ASC ");
        $sql_select->execute();
        return $sql_select->fetchAll(PDO::FETCH_ASSOC);
        
    }



}