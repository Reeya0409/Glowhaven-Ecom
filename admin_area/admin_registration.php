<?php
include('../include/connect.php');
include('../functions/common_function.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- css files -->
    <link href="../style.css" rel="stylesheet">

       <!-- fontawesome link -->
       <link href="../fontawesome-free-6.4.0-web/css/all.css" rel="stylesheet">
       <style>
        body{
            overflow-x:hidden;
        }
        .admin{
            width: 80%;
            height: 80%;
        }
       </style>
 
</head>
<body>
    <div class="container-fluid m-3">
    <h2 class="text-center mb-5">
        Admin Registration
    </h2>
    <div class="row d-flex justify-content-center ">
        <div class="col-lg-6 col-xl-5">
            <img src="../images/admin.jpeg" alt="Admin_reggistration" class="img-fluid admin">
        </div>
         <div class="col-lg-6 col-xl-4">
            <form action="" method="post">
                <div class="form-outline mb-4">
                    <label for="admin_name"class="form-label" >Username</label>
                    <input type="text"id="admin_name" name="admin_name" placeholder="Enter your username" required="required" class="form-control">
                </div>
                <div class="form-outline mb-4">
                    <label for="admin_email"class="form-label" >Email</label>
                    <input type="email"id="admin_email" name="admin_email" placeholder="Enter your email" required="required" class="form-control">
                </div>
                <div class="form-outline mb-4">
                    <label for="admin_password"class="form-label" >Password</label>
                    <input type="password"id="admin_password" name="admin_password" placeholder="Enter your password" required="required" class="form-control">
                </div>
                <div class="form-outline mb-4">
                    <label for="confirm_admin_password"class="form-label" >Confirm Password</label>
                    <input type="password"id="confirm_admin_password" name="confirm_admin_password" placeholder="Enter your Confirm password" required="required" class="form-control">
                </div>
                <div>
                    <input type="submit"  class="bg-info py-2 px-3 border-0" name="admin_registration" value="Register">
                    <p class="small fw-bold mt-2 pt-1">Already have an account? <a href="admin_login.php" class="link-danger">Login</a></p>
                </div>
            </form>

        </div>
    </div>
    </div>
</body>
</html>



<!-- php-->

<?php
if(isset($_POST['admin_registration'])){
    $admin_name=$_POST['admin_name'];
    $admin_email=$_POST['admin_email'];
    $admin_password=$_POST['admin_password'];
    $hash_password=password_hash($admin_password,PASSWORD_DEFAULT);
    $confirm_admin_password=$_POST['confirm_admin_password'];

    // select query
    $select_query="Select * from `admin_table` where admin_name='$admin_name' or admin_email='$admin_email'";
    $result=mysqli_query($con,$select_query);
    $rows_count=mysqli_num_rows($result);
    if($rows_count>0){
        echo "<script>alert('Username and Email already exist')</script>";
        }else if($admin_password!=$confirm_admin_password){
            echo "<script>alert('Passwords do not match')</script>";
        }
        else{
// insert query
$insert_query="insert into `admin_table` (admin_name,admin_email,admin_password) values('$admin_name','$admin_email','$hash_password')";
$sql_execute=mysqli_query($con, $insert_query);
if($sql_execute){
echo "<script>alert('Data inserted sucessfully')</script>";

}
}
}


?>