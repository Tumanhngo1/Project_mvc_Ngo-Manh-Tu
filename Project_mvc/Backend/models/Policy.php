<?php
require_once "models/Model.php";
class Policy extends Model{
    public function insertData($datas=[]){
        $obj_insert = $this->connection->prepare("INSERT INTO policies(title,description) values (:title,:description)");
        $inserts = [
            ':title' => $datas['title'],
            ':description' => $datas['description'],
       
        ];
        return $obj_insert->execute($inserts);
    }
    public function listData(){
        $sql_select_all = "SELECT * FROM policies ORDER BY created_at desc ";
        $obj_select = $this->connection->prepare($sql_select_all);
        $obj_select->execute();
        $is_selects = $obj_select->fetchAll(PDO::FETCH_ASSOC);
        return $is_selects;
    }
    public function getOne($id){
        $sql_select_one = "SELECT * FROM policies where id=:id";
        $obj_select_one = $this->connection->prepare($sql_select_one);
        $select = [
            ':id' => $id
        ];
        $obj_select_one->execute($select);
        $is_select_one = $obj_select_one->fetch(PDO::FETCH_ASSOC);
        return $is_select_one;

    }
    public function updateData($datas = []){
        $sql_update = "UPDATE products SET title=:title, description=:description
                            where id=:id";
        $obj_update = $this->connection->prepare($sql_update);
        $updates = [
         
            ':id' => $datas['id'],
            ':title' => $datas['title'],
            ':description' => $datas['description'],
            
        ];
        $is_update = $obj_update->execute($updates);
        return $is_update;

    }
    public function deleteData($id){
        $sql_delete = "DELETE FROM policies where id=:id";
        $obj_delete = $this->connection->prepare($sql_delete);
        $delete =[
            ':id' => $id
        ];
        $is_delete = $obj_delete->execute($delete);
        return $is_delete;
    }
}