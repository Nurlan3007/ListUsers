<?php

namespace logics;
require_once "../db/connect_db.php";
//require_once "add_accounts.php";

class edit_account{
    private $email;
    private $first_name;
    private $last_name;
    private $company_name;
    private $position;
    private $user_id;
    private $phones = [];
    private $errors = [];
    private $insert;

    private $mysqli;

    public function __construct($mysqli){
        $this->user_id = intval($_REQUEST["user_id"]);
        $this->email = $_REQUEST["email"];
        $this->last_name = $_REQUEST["last_name"];
        $this->first_name = $_REQUEST["first_name"];
        $this->company_name = $_REQUEST["company_name"];
        $this->position = $_REQUEST["position"];
        $this->phones = [$_REQUEST["phone1"],$_REQUEST["phone2"],$_REQUEST["phone3"]];
        $this->mysqli = $mysqli;
    }

    private function edit_phones_or_insert(){
        $insert_or_edit = explode("_",$_REQUEST['insert_or_edit']);
        $ids = explode("_", $_REQUEST['ids']);
        for($i = 0; $i < 3; $i++){
            $phone = $this->phones[$i];
            if($insert_or_edit[$i] == "edit"){
                $id = $ids[$i];
                $stmt = $this->mysqli->prepare("update phones set `phone` = ? where id = ?");
                $stmt->bind_param("si", $phone, $id);
                $stmt->execute();
            }else{
                if(strlen($phone) > 0) {
                    $stmt = $this->mysqli->prepare("insert into phones(phone, user_id) values(?, ?)");
                    $stmt->bind_param("si", $phone, $this->user_id);
                    $stmt->execute();
                }
            }
        }
    }

    private function edit_last_and_first_name(){
        $stmt = $this->mysqli->prepare("update users set `first_name` = ?, last_name = ? where id = ?");
        $stmt->bind_param("ssi", $this->first_name,$this->last_name, $this->user_id);
        $stmt->execute();
    }
    private function edit_email(){
        $stmt = $this->mysqli->prepare("update users set `email` = ? where id = ?");
        $stmt->bind_param("si", $this->email, $this->user_id);
        $stmt->execute();
    }
    private function edit_position(){
        $stmt = $this->mysqli->prepare("update users set `position` = ? where id = ?");
        $stmt->bind_param("si", $this->position, $this->user_id);
        $stmt->execute();
    }
    private function edit_company_name(){
        $stmt = $this->mysqli->prepare("update users set `company_name` = ? where id = ?");
        $stmt->bind_param("si", $this->company_name, $this->user_id);
        $stmt->execute();
    }

    public function edit(){
        $this->edit_phones_or_insert();
        $this->edit_last_and_first_name();
        $this->edit_email();
        $this->edit_position();
        $this->edit_company_name();
        header("Location:../pages/edit.php?userId=$this->user_id");
    }
}

$edit_account = new edit_account($mysqli);
$edit_account -> edit();

