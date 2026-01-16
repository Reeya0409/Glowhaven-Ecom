<?php
include('../include/connect.php');
include('../functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User_registraion</title>
     <!-- bootstrap css link -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- css files -->
    <link href="style.css" rel="stylesheet">

    <link href="../fontawesome-free-6.4.0-web/css/all.css" rel="stylesheet">
    <style>
        body{
            overflow-x:hidden;
        }
        .logo{
         width:7%;
         height:7%;
         }

 </style>
</head>
<body>




   <!-- navbar -->
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="../images/logo.png" alt="" class="logo">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../display_all.php">Products</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="./profile.php">My Account</a>
                        </li> -->
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link" href="../cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item();?></sup></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Total Price: <?php total_cart_price(); ?> /-</a>
                        </li>
                    </ul>
                    <form class="d-flex" action="../search_product.php" method="get">
                        <input class="form-control me-2" type="search" placeholder="Search" name="search_data">
                    <input type="submit" value="search" class="btn btn-outline-light" name="search_data_product">
                    </form>
                </div>
            </div>
        </nav>

<!-- calling cart function -->
 <?php
 cart();
 ?>
        <!-- second child -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <ul class="navbar-nav me-auto">
          
                <?php
                 if(!isset($_SESSION['username'])){
                    echo"        <li class='nav-item'>
                    <a class='nav-link' href='#'>Welcome Guest</a>
                </li>";

                }else{
                    echo"     <li class='nav-item'>
                    <a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a>
                </li>";
                }

                
                if(!isset($_SESSION['username'])){
                    echo"  <a class='nav-link' href='./user_login.php'>Login</a>";

                }else{
                    echo"  <a class='nav-link' href='./user_logout.php'>Logout</a>";
                }
                ?>
            </ul>
        </nav>
















    <div class="container-fluid my-3">
        <h2 class="text-center">New User Registration</h2>
    <div class="row d-flex align-item-center justify-content-center">
        <div class="col-lg-12 col-xl-6">
<form action="" method="post" enctype="multipart/form-data">
    <!-- username -->
    <div class="form-outline mb-4">
        <label for="user_username" class="form-label">Username</label>
        <input type="text" id="user_username" class="form-control" placeholder="Enter your username" autocomplete="off" required="required" name ="user_username">
    </div>
    <!-- email -->
    <div class="form-outline mb-4">
        <label for="user_email" class="form-label">Email</label>
        <input type="email" id="user_email" class="form-control" placeholder="Enter your Email" autocomplete="off" required="required" name ="user_email">
    </div>
    <!-- image -->
    <div class="form-outline mb-4">
        <label for="user_image" class="form-label">Image</label>
        <input type="file" id="user_image" class="form-control" required="required" name ="user_image">
    </div>
     <!-- password -->
     <div class="form-outline mb-4">
        <label for="user_password" class="form-label">Password</label>
        <input type="password" id="user_password" class="form-control" placeholder="Enter your Password" autocomplete="off" required="required" name ="user_password">
    </div>
     <!-- confirm password -->
     <div class="form-outline mb-4">
        <label for="confirm_user_password" class="form-label">Confirm Password</label>
        <input type="password" id="confirm_user_password" class="form-control" placeholder="Confirm Password" autocomplete="off" required="required" name ="confirm_user_password">
    </div>
    <!-- address -->
    <div class="form-outline mb-4">
        <label for="user_address" class="form-label">Address</label>
        <input type="text" id="user_address" class="form-control" placeholder="Enter your Address" autocomplete="off" required="required" name ="user_address">
    </div>
     <!-- contact -->
     <div class="form-outline mb-4">
        <label for="user_contact" class="form-label">Contact</label>
        <input type="text" id="user_contact" class="form-control" placeholder="Enter your Mobile number" autocomplete="off" required="required" name ="user_contact">
    </div>
    <div class="mt-4 pt-2">
        <input type="submit" value="Register"class="bg-info py-2 px-3 border-0" name="user_register">
        <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account ? <a href="user_login.php" class="text-danger"> Login</a></p>
    </div>
</form>
        </div>
    </div>
    </div>
</body>
</html>

<!-- php-->

<?php
if(isset($_POST['user_register'])){
    $user_username=$_POST['user_username'];
    $user_email=$_POST['user_email'];
    $user_password=$_POST['user_password'];
    $hash_password=password_hash($user_password,PASSWORD_DEFAULT);
    $confirm_user_password=$_POST['confirm_user_password'];
    $user_address=$_POST['user_address'];
    $user_contact=$_POST['user_contact'];
    $user_image=$_FILES['user_image']['name'];
    $user_image_tmp=$_FILES['user_image']['tmp_name'];
    $user_ip=getIPAddress();

    // select query
    $select_query="Select * from `user_table` where username='$user_username' or user_email='$user_email'";
    $result=mysqli_query($con,$select_query);
    $rows_count=mysqli_num_rows($result);
    if($rows_count>0){
        echo "<script>alert('Username and Email already exist')</script>";
        }else if($user_password!=$confirm_user_password){
            echo "<script>alert('Passwords do not match')</script>";
        }
        else{
// insert query
move_uploaded_file($user_image_tmp,"./user_images/$user_image");
$insert_query="insert into `user_table` (username,user_email,user_password,user_image,user_ip,user_address,user_mobile) values('$user_username','$user_email','$hash_password','$user_image','$user_ip','$user_address','$user_contact')";
$sql_execute=mysqli_query($con, $insert_query);
if($sql_execute){
echo "<script>alert('Data inserted sucessfully')</script>";
}
else{
die(mysqli_error($con));
}
        }
        // selecting cart items
        $select_cart_items="Select * from `cart_details` where ip_address=' $user_ip'";
        $result_cart=mysqli_query($con,$select_cart_items);
        $rows_count=mysqli_num_rows($result_cart);
        if($rows_count>0){
            $_SESSION['username']=$user_username;
            echo "<script>alert('You have items in your cart')</script>";
            echo "<script>windows.open('checkout.php','_self')</script>";

}else {
    echo "<script>windows.open('.../index.php','_self')</script>";
}
        }
// }


?>