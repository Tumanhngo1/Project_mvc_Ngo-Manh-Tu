<?php
require_once "models/Model.php";

class User extends Model{
    public function registerUser($username,$password,$filenameAvatar=[]){
        $sql_insert = "INSERT INTO users(name,password,avatar) values (:username,:password,:avatar,)";
        $obj_insert = $this->connection->prepare($sql_insert);
        $inserts = [
            ':username' => $username,
            ':password' => $password,
            ':avatar'=>$filenameAvatar['avatar'],
       
        ];
        $is_insert = $obj_insert->execute($inserts);
        return $is_insert;
    }
    public function getUserByUsername($username){
        $sql_select_one = "SELECT * FROM users where name = :username";
        $obj_select_one = $this->connection->prepare($sql_select_one);
        $select = [
            ':username' => $username
        ];
        $obj_select_one->execute($select);
        $is_select_one = $obj_select_one->fetch( PDO::FETCH_ASSOC);
        return $is_select_one;
    }

    public function listData(){
        $sql_select_all = "SELECT * FROM users ORDER BY created_at DESC ";
        $obj_select_all = $this->connection->prepare($sql_select_all);
        $obj_select_all->execute();
        return $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
    }

    //xóa
    public function deleteData($id){
        $sql_delete = $this->connection->prepare("DELETE FROM users where id=:id");
        $delete = [
            ':id' => $id
        ];
        $sql_delete->execute($delete);
        return $sql_delete->fetch(PDO::FETCH_ASSOC);
    }
    public function getOne($id){
        $sql_delete = $this->connection->prepare("SELECT * FROM users where id=:id");
        $delete = [
            ':id' => $id
        ];
        $sql_delete->execute($delete);
        return $sql_delete->fetch(PDO::FETCH_ASSOC);
    }
    //update
    public function updateData($data=[]){
        $obj_update = $this->connection->prepare("UPDATE users SET name=:name, avatar=:avatar where id=:id");
        $updates=[
            ':id'=>$data['id'],
            ':avatar'=>$data['avatar'],
            ':name'=>$data['name']

        ];
        return $obj_update->execute($updates);
    }

}
