<?php
namespace logics;
session_start();

require_once "../db/connect_db.php";
require_once "check_datas.php";

class add_accounts{
    private $email;
    private $first_name;
    private $last_name;
    private $company_name;
    private $position;
    private $phones = [];
    private $errors = [];
    private $mysqli;

    public function __construct($mysqli){
        $this->email = $_REQUEST["email"];
        $this->last_name = $_REQUEST["last_name"];
        $this->first_name = $_REQUEST["first_name"];
        $this->company_name = $_REQUEST["company_name"];
        $this->position = $_REQUEST["position"];
        $this->phones = [$_REQUEST["phone1"],$_REQUEST["phone2"],$_REQUEST["phone3"]];
        $this->mysqli = $mysqli;
    }

    private function insert_to_users(){
        $sql = "insert into users(first_name,last_name,email,company_name, position) VALUES(?,?,?,?,?)";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param("sssss",$this->first_name,$this->last_name,$this->email,$this->company_name,$this->position);
        $stmt->execute();
    }

    private function insert_to_phones(){
        $sql = "select * from users order by id desc limit 1";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        $user_id = $user['id'];
        foreach ($this->phones as $phone){
            if(strlen($phone) > 0) {
                $sql = "insert into phones(phone, user_id) values(?, ?)";
                $stmt = $this->mysqli->prepare($sql);
                $stmt->bind_param("si", $phone, $user_id);
                $stmt->execute();
            }
        }
    }

    public function check_for_insert(){
        $check_datas = new check_datas($this->mysqli,$this->email,$this->last_name,$this->first_name,$this->company_name,$this->phones,$this->position);
        $this->errors[] = $check_datas->check_email();
        $this->errors[] = $check_datas->check_unique_email();
        $this->errors[] = $check_datas->check_phones();
        $this->errors[] = $check_datas->check_last_name_first_name();
        $this->errors = array_filter($this->errors);
    }

    public function add_account(){
        $this->check_for_insert();
        if(count($this->errors)){
            $_SESSION['errors'] = $this->errors;
            header("Location:../pages/add_users.php");
            return False;
        }
        $this->insert_to_users();
        $this->insert_to_phones();
        header("Location:../pages/list_users.php");
        return True;
    }

}

$add_accounts = new add_accounts($mysqli);
$add_accounts -> add_account();


