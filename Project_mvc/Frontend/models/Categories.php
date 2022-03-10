<?php
require_once "models/Model.php";


class Categories extends Model{
    public function getData(){
        $sql_select = $this->connection->prepare("SELECT * FROM categories order by created_at asc");
        $sql_select->execute();
        return $sql_select->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getOne($id){
        $sql_select = "SELECT products.*,categories.*
            FROM products inner join categories on categories.id = products.category_id where id=:id 
            order by created_at desc ";
        $obj_select = $this->connection->prepare($sql_select);
        $array_param = [
            ':id' => $id
        ];
        $obj_select->execute($array_param);
        return $obj_select->fetch(PDO::FETCH_ASSOC);
    }
}