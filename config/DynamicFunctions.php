<?php
include "Database.php";
class DynamicFunctions extends Database{

    public function insert_data($table_name,$fields_value){
        /*INSERT INTO table_name ( field_name, field_name) VALUES('field_value','field_value'); */
        $sql = "";
        $sql .= "INSERT INTO ".$table_name;
        $sql .= " (".implode(",",array_keys($fields_value)).") VALUES ";
        $sql .= " ('".implode("','",array_values($fields_value))."')";
        /*echo $sql;  exit;*/
        $query = mysqli_query($this->con,$sql);
        if ($query){
            return true;
        }else{
            return false;
        }
    }
    public function fetch_data_all($table){
        $sql = "SELECT * FROM ".$table;
        $query = mysqli_query($this->con,$sql);
        $array = array();
        while ($row = mysqli_fetch_assoc($query)){
            $array[] = $row;
        }
        return $array;
    }
    public function select_row($table,$check_where){
        $sql = "";
        $where_condition = "";
        foreach ($check_where as $key => $value){
            $where_condition .= $key . "=" .$value. "'AND'"; // check id=1 and name=Jhon
        }
        $where_condition = substr($where_condition,0,-5); // remove 'AND'
        //echo $where_condition;
        $sql .="SELECT * FROM ". $table. " WHERE ". $where_condition;
        $query = mysqli_query($this->con,$sql);
        $row = mysqli_fetch_array($query);
        return $row;
    }

    public function update_data($table,$check_where,$fields_value){
        $sql = "";
        $where_condition = "";
        foreach ($check_where as $key => $value){
            $where_condition .= $key . "=" .$value. "'AND'"; // check id=1 and name=Jhon
        }
        $where_condition = substr($where_condition,0,-5);
        //echo $where_condition;exit;
        foreach ($fields_value as $key=>$value){
            $sql .= $key . "='".$value."', "; // name = 'Saiful', email = 'saifulalltime@gmail.com'
        }
        $sql = substr($sql,0,-2);
        $sql ="UPDATE ". $table. " SET ". $sql. " WHERE ".$where_condition;
        // echo $sql1;
        $query = mysqli_query($this->con,$sql);
        if ($query){
            return true;
        }else{
            return false;
        }
    }

    public function delete_data($table,$check_where){
        $sql = "";
        $where_condition = "";
        foreach ($check_where as $key => $value){
            $where_condition .= $key . "=" .$value. "'AND'"; // check id=1 and name=Jhon
        }
        $where_condition = substr($where_condition,0,-5);
        $sql = "DELETE FROM ".$table. " WHERE ".$where_condition;
       // echo $sql;
        if (mysqli_query($this->con,$sql)){
            return true;
        }else{
            return false;
        }
    }

}
