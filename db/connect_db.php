<?php
class connect_db{
    private $DB_HOST = '127.0.0.1';
    private $DB_NAME = 'root';
    private $DB_PASSWORD = '';
    private $DB_SCHEMA = 'for_test_task';

    public function connection(){
        try {
            $mysqli = new mysqli($this->DB_HOST, $this->DB_NAME, $this->DB_PASSWORD, $this->DB_SCHEMA);
        }catch (mysqli_sql_exception){
            echo "Fail connected";
            die;
        }
        return $mysqli;
    }
}

$connect_db = new connect_db();
$mysqli = $connect_db -> connection();



