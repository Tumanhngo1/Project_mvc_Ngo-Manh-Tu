<?php
require_once "models/Model.php";

class Category extends Model{
    public function insertData($datas=[]){
        $obj_insert = $this->connection->prepare("INSERT INTO categories(name,description,avatar,status) values (:name,:description,:avatar,:status)");
        $inserts = [
            ':avatar'=> $datas['name'],
            ':name' => $datas['name'],
            ':description' => $datas['description'],
            ':status' => $datas['status']
        ];
        return $obj_insert->execute($inserts);
    }
    //index
    public function listData(){
        $obj_select = $this->connection->prepare("SELECT * FROM categories order by created_at ASC ");
        $obj_select->execute();
        return $obj_select->fetchAll(PDO::FETCH_ASSOC);
    }

    //detai
    public function getOne($id){
        $obj_select_one = $this->connection->prepare("SELECT * FROM categories where id= :id");
        $selet = [
            ':id'=> $id
        ];
        $obj_select_one->execute($selet);
        return $obj_select_one->fetch(PDO::FETCH_ASSOC);
    }
    //UPDATE
    public function updateData($datas=[]){
        $obj_update = $this->connection->prepare("UPDATE categories SET avatar=:avatar, name=:name,description=:description,status=:status 
        where id=:id");
        $updates = [
            ':name' => $datas['name'],
            ':description' =>$datas['description'],
            ':status' => $datas['status'],
            ':id' => $datas['id'],
            ':avatar'=>$datas['avatar']
            ];
        return $obj_update->execute($updates);
    }
    //delete
    public function deleteData($data=[]){
        $sql_delete = $this->connection->prepare("DELETE FROM categories WHERE id=:id");
        $detete= [
            ':id' => $data['id']
        ];
        return $sql_delete->execute($detete);
    }
}