<?php

class Database{
    public $host_name = "localhost";
    public $user_name = "root";
    public $db_name = "oop_php_crud";
    public $password = "";
    public $con;

    public function __construct()
    {
        $this->con = new mysqli($this->host_name,$this->user_name,$this->password,$this->db_name);
        if ($this->con->connect_error){
            die("Connection fail".mysqli_connect_error());
        }else{
           // echo "Database Connected";
        }
    }
}