<?php 

include('../includes/connect.php');
include('../functions/common_function.php')

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>

     <!-- bootstrap css link -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


<!-- font awesome link-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
    body{
        overflow: hidden;
    }
</style>

</head>
<body>
    <div class="container-fluid m-3">
        <h2 class="text-center mb-5">Admin Registration</h2>
        <div class="row d-flex justify-content-center ">
            <div class="col-lg-6 col-xl-5 ">
                <img src="../images/icons/Login-page.PNG" alt="Admin REG" class="img-fluid">
            </div>
            <div class="col-lg-6 col-xl-4 mt-3">
               <form action="" method="post">
                <div class="form-outline mb-4">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" id="username" name="username" placeholder="enter Username" required="required"
                    class="form-control">
                </div>
                <div class="form-outline mb-4">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" placeholder="enter Email" required="required"
                    class="form-control">
                </div>
                <div class="form-outline mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" placeholder="enter Password" required="required"
                    class="form-control">
                </div>
                <div class="form-outline mb-4">
                    <label for="confirm_password" class="form-label">Confirm Password</label>
                    <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required="required"
                    class="form-control">
                </div>
                <div>
                    <input type="submit" class="bg-warning py-2 px-3 border-0" name="admin_registration" value="Register">
                    <p class="small fw-bold mt-2 pt-1"> Already have an account? <a class="link-danger" href="admin_login.php">Login</a></p>
                </div>
               </form>
            </div>
        </div>

    </div>
</body>
</html>

<?php

if(isset($_POST['admin_registration'])){
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $hash_password=password_hash($password,PASSWORD_DEFAULT);
    $confirm_password=$_POST['confirm_password'];


    //select query

    $select_query="select * from `admin_table` where admin_name='$username' or admin_email='$email'";
    $result=mysqli_query($con,$select_query);
    $rows_count=mysqli_num_rows($result);
    if($rows_count>0){
        echo "<script>alert('Username or email not available')</script>";
    }else if($password!=$confirm_password){
        echo "<script>alert('passwords do not match')</script>";
    }
    
    else{

         //insert_query

        $insert_query="insert into `admin_table` (admin_name,admin_email,admin_password) 
        values ('$username','$email','$hash_password')";
        $sql_execute=mysqli_query($con,$insert_query);
    
        if($sql_execute){
            echo "<script>alert('Admin Registered successfully')</script>";
        }else{
            die(mysqli_error($con));
        }
    }


}


?>