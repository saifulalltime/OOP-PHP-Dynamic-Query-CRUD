<?php
include "config/DynamicFunctions.php";
$home_obj = new DynamicFunctions();
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>OOP PHP CRUD</title>
</head>
<style>
    .error{
        color:red;
    }
</style>
<body>
<div class="m-2"></div>
<div class="container">
    <div class="">
       <div class="row">
           <div class="col-md-2"></div>
           <div class="col-md-8"><h3 class="badge-success text-center p-1">OOP PHP CRUD | Saiful The Dream Maker</h3></div>
           <div class="col-md-2"></div>
       </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card panel-primary">
                <div class="card-body">
                    <p>
                        <?php
                        if (!empty($_GET["msg"])){
                            if ($_GET['msg'] == "success"){
                                echo "<span class='text-primary'>". $_GET['message'] ."</span>";
                            }else{ echo "<span class='text-danger'>". $_GET['message'] ."</span>"; }
                        }
                        if (!empty($_GET['data_update'])){
                            if ($_GET['data_update'] == "1"){
                                $id = $_GET['id'] ?? null;
                                $check_where = array("id"=>$id,);
                                $row_data = $home_obj->select_row("user_info",$check_where);
                            }
                        }
                        ?>
                    </p>
                    <div class="card-heading text-left"><h3 class="p-1 badge-success"><a class="text-white" href="index.php">Click Here Create New Info</a> </h3></div>
                    <form action="config/form_action.php" method="post" enctype="multipart/form-data">
                       <input type="hidden" value="<?php if(!empty($_GET['id'])){ echo $_GET['id'];}?>" name="id">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name">Name</label>
                                <input type="text" name="name" value="<?php if(!empty($row_data['name'])){ echo $row_data['name'];}?>" class="form-control" id="name" placeholder="Enter Name">
                                <span class="error"><?php if (!empty($_GET['nameError'])){ echo $_GET['nameError'];} ?></span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="Email">Email</label>
                                <input type="email" name="email" value="<?php if(!empty($row_data['email'])){ echo $row_data['email'];}?>" class="form-control" id="Email" placeholder="Email">
                                <span class="error"><?php if (!empty($_GET['emailError'])){ echo $_GET['emailError'];} ?></span>
                            </div>
                            <div class="form-group">
                                <label for="Address">Address</label>
                                <textarea class="form-control" name="address" id="Address" rows="2" cols="100"><?php if(!empty($row_data['address'])){ echo $row_data['address'];}?></textarea>
                                <span class="error"><?php if (!empty($_GET['addressError'])){ echo $_GET['addressError'];} ?></span>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="custom-file">
                                    <input type="file" name="user_image" class="form-control">
                                    <?php if(!empty($row_data['user_image'])){ ?>
                                        <input type="hidden" value="<?php echo $row_data['user_image']; ?>" name="image_path">
                                        <img src="<?php echo $row_data['user_image']; ?>" width="120" height="50" class="m-2 float-right">
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="form-check">
                                    <input type="checkbox" name="agree_status" class="form-check-input" <?php if(!empty($row_data['agree_status'])){ if ($row_data['agree_status']=="yes"){echo"checked";}else{ echo ""; } } ?> id="checkbox">
                                    <label for="checkbox">Agree to terms and conditions</label>
                                </div>
                            </div>
                        </div>

                            <?php if (isset($_GET['data_update'])){ ?>
                                <button type="submit" name="update_user_info" class="btn btn-primary">Update Info</button>
                           <?php }else{ ?>
                                <button type="submit" name="save_user_info" class="btn btn-success">Save Info</button>
                        <?php } ?>
                    </form>

                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
<div class="m-3"></div>
<div class="container">
    <div class="row">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">SN</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Address</th>
                <th scope="col">Agree</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $i = 1;
                $row_data = $home_obj->fetch_data_all("user_info");
                foreach ($row_data as $row){
                ?>
            <tr>
                <th scope="row"><?php echo $i; ?></th>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['address']; ?></td>
                <td><img src="<?php echo $row['user_image']; ?>" width="100" height="50"></td>
                <td>
                    <a href="index.php?data_update=1&id=<?php echo $row['id']?>">Edit</a> |
                    <a href="config/form_action.php?delete=1&id=<?php echo $row['id']?>">Delete</a> |
                </td>
            </tr>
            <?php $i++; } ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="assets/js/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="assets/js/pfffopper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="assets/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>