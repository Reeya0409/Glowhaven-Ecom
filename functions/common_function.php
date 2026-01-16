<?php

// include coonect file
// include('./include/connect.php');

// getting products
function getproducts(){
global $con;
// condition to check isset or not 
if(!isset($_GET['category'])){
if(!isset($_GET['brand'])){
    $select_query="Select * from `products` order by rand() limit 0,9";
$result_query=mysqli_query($con,$select_query);
while($row=mysqli_fetch_assoc($result_query)){
$product_id=$row['product_id'];
$product_title=$row['product_title'];
$product_description=$row['product_description'];
// $product_keywords=$row['product_keywords'];
$category_id=$row['category_id'];
$brand_id=$row['brand_id'];
$product_image1=$row['product_image1'];
$product_price=$row['product_price'];
echo "<div class='col-md-4 mb-2'>
                        <div class='card'>
                            <img src='./admin_area/product_images/$product_image1' alt='$product_title' height='250px' width='100%' style='object-fit:contain'>
                            <div class='card-body'>
                                <h5 class='card-title'>$product_title</h5>
                                <p class='card-text'>$product_description</p>
                                <p class='card-text'>Price : $product_price/-</p>
                                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                            </div>
                        </div>
                    </div>";
}
}
}}


// getting all products
// getting products
function get_all_products(){
    global $con;
    // condition to check isset or not 
    if(!isset($_GET['category'])){
    if(!isset($_GET['brand'])){
        $select_query="Select * from `products` order by rand()";
    $result_query=mysqli_query($con,$select_query);
    while($row=mysqli_fetch_assoc($result_query)){
    $product_id=$row['product_id'];
    $product_title=$row['product_title'];
    $product_description=$row['product_description'];
    // $product_keywords=$row['product_keywords'];
    $category_id=$row['category_id'];
    $brand_id=$row['brand_id'];
    $product_image1=$row['product_image1'];
    $product_price=$row['product_price'];
    echo "<div class='col-md-4 mb-2'>
                            <div class='card'>
                                <img src='./admin_area/product_images/$product_image1' alt='$product_title' height='250px' width='100%' style='object-fit:contain'>
                                <div class='card-body'>
                                    <h5 class='card-title'>$product_title</h5>
                                    <p class='card-text'>$product_description</p>
                                                                    <p class='card-text'>Price : $product_price/-</p>

                                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                                </div>
                            </div>
                        </div>";
    }
    }
    }}


// getting unique categories
function get_unique_categories(){
    global $con;
    // condition to check isset or not 
    if(isset($_GET['category'])){
    $category_id=$_GET['category'];
        $select_query="Select * from `products` where category_id=$category_id ";
    $result_query=mysqli_query($con,$select_query);
    $num_of_rows=mysqli_num_rows($result_query);
if($num_of_rows==0){
    echo"<h2 class='text-center text-danger'> No Stock for this category</h2>";
}
    while($row=mysqli_fetch_assoc($result_query)){
    $product_id=$row['product_id'];
    $product_title=$row['product_title'];
    $product_description=$row['product_description'];
    // $product_keywords=$row['product_keywords'];
    $category_id=$row['category_id'];
    $brand_id=$row['brand_id'];
    $product_image1=$row['product_image1'];
    $product_price=$row['product_price'];
    echo "<div class='col-md-4 mb-2'>
                            <div class='card'>
                                <img src='./admin_area/product_images/$product_image1' alt='$product_title' height='250px' width='100%' style='object-fit:contain'>
                                <div class='card-body'>
                                    <h5 class='card-title'>$product_title</h5>
                                    <p class='card-text'>$product_description</p>
                                                                    <p class='card-text'>Price : $product_price/-</p>

                                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                                </div>
                            </div>
                        </div>";
    }
    }
    }
    



// getting unique brands
function get_unique_brands(){
    global $con;
    // condition to check isset or not 
    if(isset($_GET['brand'])){
    $brand_id=$_GET['brand'];
        $select_query="Select * from `products` where brand_id=$brand_id ";
    $result_query=mysqli_query($con,$select_query);
    $num_of_rows=mysqli_num_rows($result_query);
if($num_of_rows==0){
    echo"<h2 class='text-center text-danger'> This brand is not available for service</h2>";
}
    while($row=mysqli_fetch_assoc($result_query)){
    $product_id=$row['product_id'];
    $product_title=$row['product_title'];
    $product_description=$row['product_description'];
    // $product_keywords=$row['product_keywords'];
    $category_id=$row['category_id'];
    $brand_id=$row['brand_id'];
    $product_image1=$row['product_image1'];
    $product_price=$row['product_price'];
    echo "<div class='col-md-4 mb-2'>
                            <div class='card'>
                                <img src='./admin_area/product_images/$product_image1' alt='$product_title' height='250px' width='100%' style='object-fit:contain'>
                                <div class='card-body'>
                                    <h5 class='card-title'>$product_title</h5>
                                    <p class='card-text'>$product_description</p>
                                                                    <p class='card-text'>Price : $product_price/-</p>

                                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                                </div>
                            </div>
                        </div>";
    }
    }
    }
    



// displaying brands in sidenav
function getbrands(){
global $con;
    $select_brands = "Select * from `brands`";
    $result_brands = mysqli_query($con, $select_brands);
    while ($row_data = mysqli_fetch_assoc($result_brands)) {
        $brand_title = $row_data['brand_title'];
        $brand_id = $row_data['brand_id'];
        echo "<li class='nav-item'>
    <a href='index.php?brand=$brand_id' class='nav-link text-light'>$brand_title</a>
</li>";
    }
}

// displaying categories in sidenav
function getcategories(){
global $con;
    $select_categories = "Select * from `categories`";
    $result_categories = mysqli_query($con, $select_categories);
    while ($row_data = mysqli_fetch_assoc($result_categories)) {
        $category_title = $row_data['category_title'];
        $category_id = $row_data['category_id'];
        echo "<li class='nav-item'>
    <a href='index.php?category=$category_id' class='nav-link text-light'>$category_title</a>
</li>";
    }
}


// searching products function
function search_product(){
    global $con;
    if(isset($_GET['search_data_product'])){
        $search_data_value=$_GET['search_data'];
        $search_query="Select * from `products` where product_keywords like '%$search_data_value%' ";
    $result_query=mysqli_query($con,$search_query);
    $num_of_rows=mysqli_num_rows($result_query);
    if($num_of_rows==0){
        echo"<h2 class='text-center text-danger'> No result match. No product found on this category! </h2>";
    }
    while($row=mysqli_fetch_assoc($result_query)){
    $product_id=$row['product_id'];
    $product_title=$row['product_title'];
    $product_description=$row['product_description'];
    // $product_keywords=$row['product_keywords'];
    $category_id=$row['category_id'];
    $brand_id=$row['brand_id'];
    $product_image1=$row['product_image1'];
    $product_price=$row['product_price'];
    echo "<div class='col-md-4 mb-2'>
                            <div class='card'>
                                <img src='./admin_area/product_images/$product_image1' alt='$product_title' height='250px' width='100%' style='object-fit:contain'>
                                <div class='card-body'>
                                    <h5 class='card-title'>$product_title</h5>
                                    <p class='card-text'>$product_description</p>
                                    <p class='card-text'>Price : $product_price/-</p>

                                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                                </div>
                            </div>
                        </div>";
    }
    }    
}
    


// view details function

function view_details()
{
    global $con;
    // condition to check isset or not 
    if(isset($_GET['product_id'])){
    if(!isset($_GET['category'])){
    if(!isset($_GET['brand'])){
        $product_id=$_GET['product_id'];
        $select_query="Select * from `products` where product_id=$product_id";
    $result_query=mysqli_query($con,$select_query);
    while($row=mysqli_fetch_assoc($result_query)){
    $product_id=$row['product_id'];
    $product_title=$row['product_title'];
    $product_description=$row['product_description'];
    // $product_keywords=$row['product_keywords'];
    $category_id=$row['category_id'];
    $brand_id=$row['brand_id'];
    $product_image1=$row['product_image1'];
    $product_price=$row['product_price'];
    echo "
    <div class='col-md-10'>
                <!-- products -->
                <div class='row'>
                            <div class='col-md-5'>
                        <!-- card -->

                        <h2 class='text-center text-info mb-5'>
                            Product
                        </h2>
                        <div class='row'>
                            <div class='col-2'>

                            </div>
                            <div class='col-8'>
                                <img src='./admin_area/product_images/$product_image1' alt='$product_title' height='250px' width='100%' style='object-fit:contain' class='border border-3 border-dark'>

                            </div>
                        </div>

                    </div>
                    <div class='col-md-7'>
                        <div class='row'>
                            <div class='col-md-12'>
                                <h2 class='text-center text-info mb-5'>
                                    Description
                                </h2>
                                <div class='card1 text-center border-top border-bottom border-dark border-3'>
                                    <p class='card-text my-2'><b>Product Title : </b> $product_title</p><br>
                                    <p class='card-text my-2'><b> Product Description : </b> $product_description</p><br>
                                    <p class='card-text my-2'><strong>Product Price : </strong> $product_price/-</p><br>
                                    <p class='card-text my-2'><sub><strong>&#x2605;Free Delivery Available &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#x2605;10 Days Return Available</strong> </sub></p>

                                <a href='index.php?add_to_cart=$product_id' class='btn btn-info my-2 mx-3'>Add to cart</a>
                                 <a href='index.php' class='btn btn-secondary my-2'>Go Home</a>

                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                        </div>";
    }
    }
    }   }
}
//get ip address function 
function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip;  


// cart function 
function cart(){
if (isset($_GET['add_to_cart'])){
    global $con;
    $get_ip_address = getIPAddress();  
$get_product_id=$_GET['add_to_cart'];
$select_query="Select *from cart_details where ip_address = '$get_ip_address' and product_id= $get_product_id";
    $result_query=mysqli_query($con,$select_query);
    $num_of_rows=mysqli_num_rows($result_query);
    if($num_of_rows>0){
        echo "<script>alert('This item is already present in cart')</script>";
        echo "<script>windows.open{'index.php','_self')</script>";
    }else{
        $insert_query="insert into cart_details (product_id,ip_address,quantity) values ($get_product_id,'$get_ip_address',0)";
        $result_query=mysqli_query($con,$insert_query);
        echo "<script>alert('This item is added to  cart')</script>";
        echo "<script>windows.open{'index.php','_self')</script>";
        
    }

}
}

// function to get cart item nubers 
function cart_item(){
    if (isset($_GET['add_to_cart'])){
        global $con;
        $get_ip_address = getIPAddress();  
    $select_query="Select *from cart_details where ip_address = '$get_ip_address' ";
        $result_query=mysqli_query($con,$select_query);
        $count_cart_items=mysqli_num_rows($result_query);
      }else{
        global $con;
        $get_ip_address = getIPAddress();  
    $select_query="Select *from cart_details where ip_address = '$get_ip_address' ";
        $result_query=mysqli_query($con,$select_query);
        $count_cart_items=mysqli_num_rows($result_query);
        }
        echo $count_cart_items;
    }

    // total_Price function
    function total_cart_price(){
        global $con;
        $get_ip_address = getIPAddress(); 
        // $total_price = 0;
        $total_price= 0;
        $cart_query="Select * from cart_details where ip_address ='$get_ip_address' ";
        $result=mysqli_query($con,$cart_query);
    //     while($row=mysqli_fetch_array($result)){
    //         $product_id=$row['product_id'];

    //         $select_products="Select * from products where product_id ='$product_id' ";
    //         $result_products=mysqli_query($con,$select_products);
    //         while($row_product_price=mysqli_fetch_array($result_products)){
    //             $product_price=array($row_product_price['product_price']);
    //             $product_values=array_sum($product_price);
    //             $total_price+=$product_values;
    //     }
    // }
    // echo $total_price;
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
}
}
echo $total_price;
    }


// get user order detail

function get_user_order_detaill(){
       global $con;
       $username=$_SESSION['username'];
       $get_details="Select * from `user_table` where username='$username'";
       $result_query=mysqli_query($con,$get_details);
       while($row_query=mysqli_fetch_array($result_query)){
        $user_id=$row_query['user_id'];
        if(!isset($_GET['edit_profile'])){
            if(!isset($_GET['my_orders'])){
                if(!isset($_GET['delete_account'])){
                    $get_orders="Select * from `user_orders` where user_id=$user_id and order_status='pending'";
                    $result_order_query=mysqli_query($con,$get_orders);
                    $row_count=mysqli_num_rows($result_order_query);
                    if($row_count>0){
                        echo"<h3 class='text-center text-success mt-4 mb-3'>You have <span class ='text-danger'>$row_count</span> Pending orders</h3>
                        <p class='text-center'><a href='profile.php?my_orders' class='text-dark'>Order Details</a></p>";
                    }else{
                        echo"<h3 class='text-center text-success mt-4 mb-3'>You have zero Pending orders</h3>
                        <p class='text-center'><a href='../index.php' class='text-dark'>Explore Products</a></p>";
                    }
                
                }
            }
        }
       }
}

    ?>
