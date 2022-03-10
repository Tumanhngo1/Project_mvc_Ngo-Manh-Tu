<?php
require_once "models/Model.php";

class Order extends Model{
    public function getAll($id){
        $sql_select = $this->connection->prepare("SELECT * FROM user_customer WHERE user_id = :id ");
        $select = [
            ':id'=> $id
        ];
        $sql_select->execute($select);
        return $sql_select->fetchAll(PDO::FETCH_ASSOC);
    }
}