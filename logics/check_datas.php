<?php

namespace logics;

class check_datas{
    private $email;
    private $first_name;
    private $last_name;
    private $company_name;
    private $position;
    private $phones = [];
    private $mysqli;

    public function __construct($mysqli,$email,$last_name,$first_name,$company_name,$phones,$position){
        $this->email = $email;
        $this->last_name = $last_name;
        $this->first_name = $first_name;
        $this->company_name = $company_name;
        $this->position = $position;
        $this->phones = $phones;
        $this->mysqli = $mysqli;
    }

    public function check_email(){
        $p = "/(^[a-zA-Z]+)[a-zA-Z0-9_-]+@[a-zA-Z]+\.[a-z]{2,3}/";
        if(!preg_match($p, $this -> email,$m)){
            return "Incorrect email";
        }
        return True;
    }

    public function check_unique_email(){
        $stmt = $this->mysqli->prepare("select count(*) as count_email from users where email = ?");
        $stmt -> bind_param("s", $this->email);
        $stmt -> execute();
        $result = $stmt -> get_result();
        $email = $result -> fetch_assoc();
        if($email['count_email'] > 0){
            return "Email already exist";
        }
        return True;
    }

    public function check_last_name_first_name(){
        $error = "";
        if(strlen($this->first_name) < 2){
            $error .= "Incorrect first name";
        }
        if(strlen($this->last_name) < 2){
            $error .= " Incorrect last name";
        }
        if(strlen($error) > 0) return $error;
        return True;
    }

    public function check_position(){

    }

    public function check_phones(){
        foreach ($this->phones as $phone){
            if(strlen($phone) > 0){
                $p = "/^(\+7|8)/";
                if(!preg_match($p, $phone)){
                    return "Incorrect phone number";
                }
            }
        }
        return True;
    }
}




