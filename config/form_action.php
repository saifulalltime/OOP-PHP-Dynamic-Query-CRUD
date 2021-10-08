<?php
require "DynamicFunctions.php";
$obj = new DynamicFunctions();
/*Insert Data*/
if (isset($_POST['save_user_info'])){
    if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['address'])){
        if (empty($_POST['name'])){
            $nameError = "Name Field is Required";
        }else{ $nameError = "";}
        if ((empty($_POST['email']))){
            $emailError = "Email Field is Required";
        }else{ $emailError ="";}
        if (empty($_POST['address'])){
            $addressError = "Address Field is Required";
        }else{ $addressError = "";}
        $valid = array(
            "nameError" => $nameError,
            "emailError" => $emailError,
            "addressError" => $addressError,
        );
        $valid_url = http_build_query($valid);
        header("location:../index.php?".$valid_url);
    }else{
        $image_source = $_FILES["user_image"]["tmp_name"];
        $image_name = time().rand(200,5000).$_FILES["user_image"]["name"];
        if(isset($_POST["agree_status"])){
            $agree_status = "yes";
        }else{ $agree_status = "no"; }
        $userInfo = array(
            "name" => $_POST["name"],
            "email" => $_POST["email"],
            "address" => $_POST["address"],
            "user_image" => "assets/user_image/".$image_name,
            "agree_status" => $agree_status
        );
        // print_r($userInfo);exit;
        if (move_uploaded_file($image_source, "../assets/user_image/". $image_name)){
            if ($obj->insert_data("user_info",$userInfo)){
                header("location:../index.php?msg=success&message=Saved Successfully");
            }else{
                header("location:../index.php?msg=error&message=Not Saved!");
            }
        }else{
            echo "File Not Uploaded";
        }
    }
}

/*Update Data*/
if (isset($_POST['update_user_info'])){
    $id = $_POST['id'];
    $check_where = array("id" => $id);
    $row = $obj->select_row("user_info",$check_where);
    if(isset($_FILES["user_image"]) && !empty($_FILES["user_image"]["name"])) {
        unlink("../".$row['user_image']);
        //echo "../".$row['user_image'];exit;
        $image_source = $_FILES["user_image"]["tmp_name"];
        $image_name = time().rand(200,5000).$_FILES["user_image"]["name"];
        move_uploaded_file($image_source, "../assets/user_image/". $image_name);
        $image_path = "assets/user_image/".$image_name;
    }else{
        $image_path = $_POST["image_path"];
    }
    if(isset($_POST["agree_status"])){
        $agree_status = "yes";
    }else{ $agree_status = "no"; }
    $userInfoUpdate = array(
        "name" => $_POST["name"],
        "email" => $_POST["email"],
        "address" => $_POST["address"],
        "user_image" => $image_path,
        "agree_status" => $agree_status
    );
    if ($obj->update_data("user_info",$check_where,$userInfoUpdate)){
        header("location:../index.php?msg=success&message=Updated Successfully");
    }else{
        header("location:../index.php?msg=error&message=Not Updated!");
    }
    // print_r($userInfo);exit;
}
/*Delete Data*/
if (isset($_GET['delete'])){
    $id = $_GET['id'] ?? null;
    $check_where = array("id" => $id);
    $row = $obj->select_row("user_info",$check_where);
    unlink("../".$row['user_image']);
    if ($obj->delete_data("user_info",$check_where)){
        header("location:../index.php?msg=success&message=Deleted Successfully");
    }else{
        header("location:../index.php?msg=success&message=Not Deleted");
    }

}