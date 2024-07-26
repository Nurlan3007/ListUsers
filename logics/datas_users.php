<?php
namespace logics;
require_once "../db/connect_db.php";
class datas_users{
    private $mysqli;
    public function __construct($mysqli){
        $this->mysqli = $mysqli;
    }

    public function get_users_with_phones(){
        $sql = "
            select * from users 
            inner join phones on phones.user_id = users.id
        ";
        $stmt = $this->mysqli->prepare($sql);
        $stmt -> execute();
        $result = $stmt->get_result();
        $users_with_phones = $result->fetch_all(MYSQLI_ASSOC);
        return $users_with_phones;

    }

    public function get_users($which_page = 1, $reversed=False){
        $sql = "select * from users limit ? offset ?";
        if($reversed) $sql = "select * from users order by id desc limit ? offset ?";

        $limit = 10;
        $offset = 10 * ($which_page - 1);
        $stmt = $this->mysqli->prepare($sql);
        $stmt -> bind_param("ii", $limit, $offset);
        $stmt -> execute();
        $result = $stmt->get_result();
        $users = $result->fetch_all(MYSQLI_ASSOC);

        return $users;
    }

    public function get_phones(){
        $sql = "select user_id, GROUP_CONCAT(phone SEPARATOR ', ') as phoness from phones 
                GROUP BY user_id;";
        $stmt = $this->mysqli->prepare($sql);
        $stmt -> execute();
        $result = $stmt->get_result();
        $phones = $result->fetch_all(MYSQLI_ASSOC);
        return $phones;
    }

    public function which_user($user_id){
        $stmt = $this->mysqli->prepare("select * from users where id = ?");
        $stmt -> bind_param("i", $user_id);
        $stmt -> execute();
        $result = $stmt->get_result();
        $user = $result->fetch_all(MYSQLI_ASSOC);
        return $user;
    }

    public function which_phone($user_id){
        $stmt = $this->mysqli->prepare("select * from phones where user_id = ?");
        $stmt -> bind_param("i", $user_id);
        $stmt -> execute();
        $result = $stmt->get_result();
        $phones = $result->fetch_all(MYSQLI_ASSOC);
        return $phones;
    }

}

$datas_users = new datas_users($mysqli);


echo "<pre>";


echo "</pre>";
