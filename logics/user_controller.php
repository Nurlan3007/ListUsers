<?php

namespace logics;
require_once "../db/connect_db.php";
class userController{
    private $mysqli;
    private $user_id;
    public function __construct($mysqli,$user_id){
        $this->mysqli = $mysqli;
        $this->user_id = $user_id;
    }

    public function delete_phone(){
        $stmt = $this->mysqli->prepare("DELETE FROM phones WHERE user_id = ?");
        $stmt -> bind_param("i",$this->user_id);
        $stmt -> execute();
    }

    public function delete_user(){
        $stmt = $this->mysqli->prepare("DELETE FROM users WHERE id = ?");
        $stmt -> bind_param("i",$this->user_id);
        $stmt -> execute();
    }
}
$user_id = $_GET['userId'];
$userController = new userController($mysqli,$user_id);
$userController -> delete_phone();
$userController -> delete_user();
header("Location:../pages/list_users.php");
