<?php
namespace logics;
require_once "../db/connect_db.php";
class paginations{
    private $mysqli;

    public function __construct($mysqli){
        $this->mysqli = $mysqli;
    }

    public function get_numbers_pagination(){
        $stmt = $this->mysqli->prepare("SELECT count(*) as amount FROM users");
        $stmt -> execute();
        $result = $stmt -> get_result();
        $amount_users = $result -> fetch_assoc();
        $amount_pages = ceil($amount_users['amount'] / 10);
        return $amount_pages;
    }

    public function get_users_from_pagination(){

    }

}
$pagination = new paginations($mysqli);




