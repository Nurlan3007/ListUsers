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

    private function insert_to_db(){

    }

    public function check_for_insert(){
        $check_datas = new check_datas($this->mysqli,$this->email,$this->last_name,$this->first_name,$this->company_name,$this->phones,$this->position);
        $errors[] = $check_datas->check_email();
        $errors[] = $check_datas->check_unique_email();
        $errors[] = $check_datas->check_phones();
        $errors[] = $check_datas->check_last_name_first_name();
//        $errors[] = $check_datas->check_position();
        print_r($errors);
    }

    public function add_account(){
        $this->check_for_insert();
    }

}

$add_accounts = new add_accounts($mysqli);
$add_accounts -> add_account();