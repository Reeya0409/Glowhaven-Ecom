<?php
include('include/connect.php');
include('functions/common_function.php');
session_start();

// update cart
  if(isset($_POST['update_cart'])){
   $get_ip_address = getIPAddress(); 
     foreach($_POST['qty'] as $product_id => $quantity){
  // $quantities=$_POST['qty'];
    $update_cart=" Update cart_details set quantity= '$quantity' where ip_address= '$get_ip_address' AND product_id='$product_id'";
    $result_products_quantity=mysqli_query($con,$update_cart);
                           
     }
     }

// remove selected item
     if(isset($_POST['remove_cart'])){
        if(!empty($_POST['removeitem'])){
            foreach( $_POST['removeitem'] as $remove_id){
                $delete_query="Delete from `cart_details` where product_id=$remove_id";
                $run_delete=mysqli_query($con,$delete_query);
            }
    if($run_delete){
        echo"<script>window.open('cart.php','_self')</script>";
    }
}else{
    echo "<script>alert('Please select at least one item to remove')</script>";
}

 }

?>

<!doctype html>

<head>
    <title>
        Cart details
    </title>
    <link rel="icon" href="images/logo1.png" type="image/icon">
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- fontawesome link -->
    <link href="fontawesome-free-6.4.0-web/css/all.css" rel="stylesheet">
    <!-- css files -->
    <link href="style.css" rel="stylesheet">
<style>
.cart_image{
    height: 80px;
    width: 80px;
    object-fit: contain;
 }
 </style>
</head>


<body>
    <!-- navbar -->
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="images/logo.png" alt="" class="logo">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="display_all.php">Products</a>
                        </li>
                                                <?php
if(isset($_SESSION['username'])){
    echo" <li class='nav-item'>
                            <a class='nav-link' href='./users_area/profile.php'>My Account</a>
                        </li>";
}else{
    echo"<li class='nav-item'>
                            <a class='nav-link' href='./users_area/user_registration.php'>Register</a>
                        </li>";
}
?>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.php">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item();?></sup></a>
                        </li>  
                    </ul>
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
                    echo"  <a class='nav-link' href='./users_area/user_login.php'>Login</a>";

                }else{
                    echo"  <a class='nav-link' href='./users_area/user_logout.php'>Logout</a>";
                }
                ?>
            </ul>
        </nav>
        <!-- third child -->
        <div class="bg-light">
            <h3 class="text-center mt-3">Glowhaven</h3>
            <p class="text-center">Communication is at the heart of e-commerce and community</p>
        </div>


      <!-- fourth child -->

      <div class="container">
        <div class ="row">
            <form action="" method="post"> 
            <table class="table table-bordered text-center">
                
                    <!-- php code for dynamic data -->
                     <?php
   $get_ip_address = getIPAddress(); 
   $total_price= 0;
   $cart_query="Select * from cart_details where ip_address ='$get_ip_address' ";
   $result=mysqli_query($con,$cart_query);
   $result_count=mysqli_num_rows($result);
   if($result_count>0){
    echo "<thead>
                    <tr>
                        <th>Product Title</th>
                        <th>Product Image</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Remove</th>
                        <th colspan='2'>Operations</th>
                    </tr>
                </thead>
                <tbody>";
   while($row=mysqli_fetch_array($result)){
       $product_id=$row['product_id'];
       $quantity=$row['quantity'];
        if(empty($quantity) || $quantity < 1){
        $quantity = 1; // default to 1 if not set
    }
       $select_products="Select * from products where product_id ='$product_id' ";
       $result_products=mysqli_query($con,$select_products);
       while($row_product_price=mysqli_fetch_array($result_products)){
           $product_price=array($row_product_price['product_price']);
           $price_table=$row_product_price['product_price'];
           $product_title=$row_product_price['product_title'];
           $product_image1=$row_product_price['product_image1'];
        $product_price = (float)$row_product_price['product_price'];

        $subtotal = $product_price * $quantity;
        $total_price += $subtotal;
        //    $product_values=array_sum($product_price);
        //    $total_price+=$product_values;
      
                     ?>
                    <tr>
                        <td><?php echo $product_title; ?></td>
                        <td><img src="./admin_area/product_images/<?php echo $product_image1; ?>" class="cart_image"></td>
                        <td><input type="number" min="1" name="qty[<?php echo $product_id; ?>]" id="" class="form-input w-50" value="<?php echo $quantity; ?>"></td>
                        <?php
                        // if(isset($_POST['update_cart'])){
                        //    $get_ip_address = getIPAddress(); 
                        //     foreach($_POST['qty'] as $product_id => $quantity){
                        //         // $quantities=$_POST['qty'];
                        //         $update_cart=" Update cart_details set quantity= '$quantity' where ip_address= '$get_ip_address' AND product_id='$product_id'";
                        //         $result_products_quantity=mysqli_query($con,$update_cart);
                           
                        //     }
                        // }
                        // $total_price += ((float)$price_table * ((int)$quantity));



                        ?>
                        <td><?php echo $subtotal; ?>/-</td>
                        <td><input type ="checkbox" name="removeitem[]" value="<?php echo $product_id ?>" ></td>
                        <td>
                            <!-- <button class="bg-info px-3 py-2 border-0 mx-3">Update</button> -->
                             <input class="bg-info px-3 py-2 border-0 mx-3" type="submit" name ="update_cart" value="Update Cart">
                            <!-- <button class="bg-info px-3 py-2 border-0 mx-3">Remove</button> -->
                            <input class="bg-info px-3 py-2 border-0 mx-3" type="submit" name ="remove_cart" value="Remove Cart">
                        </td>
                    </tr>
                    <?php
                    }
                }
            }
            else{
                echo"<h2 class='text-center text-danger'>Cart is empty</h2>";
            }
                    ?>
                </tbody>
            </table>
            <!-- subtotal -->
             <div class="d-flex mb-3">
                <?php

$get_ip_address = getIPAddress(); 
$cart_query="Select * from cart_details where ip_address ='$get_ip_address' ";
$result=mysqli_query($con,$cart_query);
$result_count=mysqli_num_rows($result);
if($result_count>0){
   echo"<h4 class='px-3'>Subtotal: <strong class='text-info'>  $total_price/-</strong></h4>

 <button class='bg-info px-3 py-2 border-0 mx-3'><a href='index.php'class =' bg-seconday text-dark text-decoration-none '>Continue Shopping</a></button>
                <button class='bg-seconday px-3 py-2 border-0 '><a href='./users_area/checkout.php'class ='text-decoration-none text-dark'>Checkout</a></button>
             ";
}else{
    echo" <button class='bg-info px-3 py-2 border-0 mx-3'><a href='index.php'class ='text-dark text-decoration-none '>Continue Shopping</a></button>";
}
// if(isset($_POST['continue_shopping'])){
//     echo"<script>window.open('index.php','_self' </script>";
// }
?>
                
            </div>

        </div>
      </div>
      </form>
<!--  function to remove item  -->
<!-- <?php
//  function remove_cart_item(){
//  global $con;
// //  if(isset($_POST['remove_cart'])){
// //     foreach( $_POST['removeitem'] as $remove_id){
// //     echo $remove_id;
// //     $delete_query="Delete from `cart_details` where product_id=$remove_id";
// //     $run_delete=mysqli_query($con,$delete_query);
// //     if($run_delete){
// //         echo"<script>window.open('cart.php','_self')</script>";
// //     }
// // }

// //  }
//  }
//  echo$remove_item=remove_cart_item();

?>  -->
 
        <!-- last child -->
                <!-- include footer -->
                <?php
include("./include/footer.php");
         ?>
    </div>
</body>
<!-- bootstrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</html>




<!--    165       <input class='bg-info px-3 py-2 border-0 mx-3' type='submit' name ='continue_shopping' value='Continue Shopping'> -->