<?php
require_once "models/Model.php";

class Product extends Model {

    public $str_search = '';
    public $str_search1 = '';
    public function __construct(){
        parent::__construct();
        if (isset($_GET['title']) && !empty($_GET['title'])) {
            $this->str_search .= " AND products.title LIKE '%{$_GET['title']}%'";
        }
    
        if (isset($_GET['title']) && !empty($_GET['title'])) {
            $this->str_search1 .= " AND user_customer.title LIKE '%{$_GET['title']}%'";
        }
    }
    

    //list 
    public function insertData($datas=[]){
        $sql_insert = "INSERT INTO products(category_id,title,price,price_sale,description,avatars,status)values (:category_id, :title, :price,:price_sale,:description, :avatars,:status)";
        $obj_insert = $this->connection->prepare($sql_insert);
        $inserts = [
            ':category_id' => $datas['category_id'],
            ':status' => $datas['status'],
            ':title' => $datas['title'],
            ':price' => $datas['price'],
            ':price_sale'=>$datas['price_sale'],
            ':description' => $datas['description'],
            ':avatars' => $datas['avatars'],
        ];
        $is_insert = $obj_insert->execute($inserts);
        return $is_insert;
    }
  
    //listData
    public function listData(){
        $sql_select_all = "SELECT * FROM products ORDER BY created_at desc ";
        $obj_select = $this->connection->prepare($sql_select_all);
        $obj_select->execute();
        $is_selects = $obj_select->fetchAll(PDO::FETCH_ASSOC);
        return $is_selects;
    }

    //detail
    public function getOne($id){
        $sql_select_one = "SELECT * FROM products where id=:id";
        $obj_select_one = $this->connection->prepare($sql_select_one);
        $select = [
            ':id' => $id
        ];
        $obj_select_one->execute($select);
        $is_select_one = $obj_select_one->fetch(PDO::FETCH_ASSOC);
        return $is_select_one;

    }

    //update
    public function updateData($datas = []){
        $sql_update = "UPDATE products SET title=:title,category_id=:category_id,status=:status, description=:description, price=:price,price_sale=:price_sale, avatars=:avatars 
                            where id=:id";
        $obj_update = $this->connection->prepare($sql_update);
        $updates = [
            ':category_id' => $datas['category_id'],
            ':id' => $datas['id'],
            ':title' => $datas['title'],
            ':description' => $datas['description'],
            ':price' => $datas['price'],
            ':price_sale'=>$datas['price_sale'],
            ':avatars' => $datas['avatars'],
            ':status'=> $datas['status']
        ];
        $is_update = $obj_update->execute($updates);
        return $is_update;

    }

    //delete
    public function deleteData($id){
        $sql_delete = "DELETE FROM products where id=:id";
        $obj_delete = $this->connection->prepare($sql_delete);
        $delete =[
            ':id' => $id
        ];
        $is_delete = $obj_delete->execute($delete);
        return $is_delete;
    }

    //lấy thông tin sản phẩm đang có trên hện thống
    public function listAll($params=[]){
        $limit = $params['limit'];
        $page = $params['page'];
        $start = ($page - 1)*$limit;

        $obj_select = $this->connection->prepare("SELECT products.*, categories.name AS category_name FROM products 
                        INNER JOIN categories ON categories.id = products.category_id WHERE TRUE $this->str_search
                        ORDER BY products.created_at DESC limit $start, $limit
                        ");

        $obj_select->execute();
        $products = $obj_select->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }
    // count id
   
        public function countId(){
            $sql_select = $this->connection->prepare("SELECT COUNT(id) FROM products");
            $sql_select->execute();
           return $sql_select->fetchColumn();
    }
    //.........................payment.......................................
    public function payment($params=[]){
        $limit = $params['limit'];
        $page = $params['page'];
        $start = ($page - 1)*$limit;
        $sql_select = $this->connection->prepare("SELECT *
         FROM user_customer where true $this->str_search1 order by create_at desc
          limit $start, $limit ");
        $sql_select->execute();
        return $sql_select->fetchAll(PDO::FETCH_ASSOC);
    }
    
    
    public function count_Id(){
        $sql_select = $this->connection->prepare("SELECT COUNT(id) FROM user_customer");
        $sql_select->execute();
       return $sql_select->fetchColumn();
    }

    public function payOne($id){
     
        $sql_select = $this->connection->prepare("SELECT *
         FROM user_customer
         where id = $id ");
        $sql_select->execute();
        return $sql_select->fetch(PDO::FETCH_ASSOC);
    }
    public function updatePay($datas = []){
        $sql_update = "UPDATE user_customer SET name=:name,title=:title,
        address=:address,code=:code, phone=:phone,price=:price,total=:total, quantity=:quantity
                            where id=:id";
        $obj_update = $this->connection->prepare($sql_update);
        $updates = [
            ':id' => $datas['id'],
            ':address' => $datas['address'],
            ':name' => $datas['name'],
            ':title' => $datas['title'],
            ':phone' => $datas['phone'],
            ':price' => $datas['price'],
            ':quantity'=>$datas['quantity'],
            ':total' => $datas['total'],
            ':code' =>$datas['code']
        ];
        $is_update = $obj_update->execute($updates);
        return $is_update;

    }
    public function deletepay($id){
        $sql_delete= $this->connection->prepare("DELETE FROM user_customer where id=$id");
        return $sql_delete->execute();
    }
   //INSERT HISTORY
   public function insertHistory($datas=[]){
       $is_insert = $this->connection->prepare("INSERT INTO historypay(title,quantity,price,name,address,phone)
        values(:title,:quantity,:price,:name,:adrress,:phone)");
        $inserts = [
            ':title'=> $datas['title'],
            ':quantity'=>$datas['quantity'],
            ':price'=>$datas['price'],
            ':name'=>$datas['name'],
            ':adrress'=>$datas['address'],
            ':phone'=>$datas['phone']
        ];
        return $is_insert->execute($inserts);
   }
   public function updateHistory($datas=[]){
       $is_update = $this->connection->prepare("UPDATE user_customer SET status =:status where id = :id ");
       $update = [
           ':status' => $datas['status'],
           ':id'=>$datas['id']
       ];
       return $is_update->execute($update);
   }
   public function history(){
       $is_select = $this->connection->prepare("SELECT * FROM historypay order by created_at DESC");
       $is_select->execute();
       return $is_select->fetchAll(PDO::FETCH_ASSOC);
   }
}
