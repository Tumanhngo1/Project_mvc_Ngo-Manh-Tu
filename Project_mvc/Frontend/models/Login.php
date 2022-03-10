<?php
require_once "models/Model.php";


class Login extends Model{
    public function insertUser($name,$email,$password){
        $sql_insert = $this->connection->prepare("INSERT INTO orders(name,email,password) values (:name,:email,:password)");
        $inserts = [
            ':name' => $name,
            ':email' => $email,
            ':password'=>$password
        ];
        return $sql_insert->execute($inserts);
    }
    public function getUser($email){
        $sql_select = $this->connection->prepare("SELECT * FROM orders WHERE email = :email");
        $select = [
            ':email' => $email
        ];
        $sql_select->execute($select);
        return $sql_select->fetch(PDO::FETCH_ASSOC);
    }
  
    public function payCartAll($params=[]){
        $sql_insert = $this->connection->prepare("INSERT INTO user_customer(user_id,name,address,phone,code,title,price,quantity,total) 
                            values (:user_id,:name,:address,:phone,:code,:title,:price,:quantity,:total)");
        $inserts = [
            ':user_id' => $params['user_id'],
            ':name'=>$params['name'],
            ':address' =>$params['address'],
            ':phone'=>$params['phone'],
            ':code'=> $params['code'],
            ':title' =>$params['title'],
            ':price' => $params['price'],
            ':quantity' =>$params['quantity'],
            ':total' => $params['total']
        ];
        return $sql_insert->execute($inserts);
    }


}