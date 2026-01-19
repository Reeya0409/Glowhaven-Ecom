<?php
include("../include/connect.php");


if (isset($_POST['insert_product'])) {
    $product_title = $_POST['product_title'];
    $description = $_POST['description'];
    $product_keywords = $_POST['product_keywords'];
    $product_catgory = $_POST['product_catgory'];
    $product_brand = $_POST['product_brand'];
    // accessing images

    $product_image1 = $_FILES['product_image1']['name'];
    // $product_image2 = $_FILES['product_image2']['name'];
    // $product_image3 = $_FILES['product_image3']['name'];
    // accessing image temp name
    $temp_image1 = $_FILES['product_image1']['tmp_name'];
    // $temp_image2 = $_FILES['product_image2']['tmp_name'];
    // $temp_image3 = $_FILES['product_image3']['tmp_name'];

    $product_price = $_POST['product_price'];
    $product_status = 'true';
    // checking empty condition
    if ($product_title == '' or $description == '' or $product_keywords == '' or $product_catgory == '' or $product_brand == '' or $product_price == '' or $product_image1 == '') {
        echo "<script>alert('Please fill all the available fields')</script>";
        exit();
    } else {
        move_uploaded_file($temp_image1, "./product_images/$product_image1");
        // move_uploaded_file($temp_image2, "./product_images/$product_image2");
        // move_uploaded_file($temp_image3, "./product_images/$product_image3");

        // insert query
        $insert_products = "insert into `products` (product_title,product_description,product_keywords,category_id,brand_id,product_image1,product_price,date,status) values('$product_title','$description','$product_keywords','$product_catgory','$product_brand','$product_image1','$product_price',NOW(),'$product_status')";
        $result_query=mysqli_query($con,$insert_products);
        if($result_query){
            echo"<script>alert('Successfully inserted the products')</script>";
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products-Admin Dashboard</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- css files -->
    <link href="../style.css" rel="stylesheet">
    <!-- fontawesome link -->
    <link href="../fontawesome-free-6.4.0-web/css/all.css" rel="stylesheet">

</head>

<body class="bg-light">

<!-- navbar -->
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="../images/logo.png" alt="logo" class="logo">
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="#" class="nav-link">Welcome Guest</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>







    <div class="container mt-3">
        <h1 class="text-center ">Insert Products</h1>
        <!-- form -->
        <form action="" method="post" enctype="multipart/form-data">
            <!-- title -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label">
                    Product title</label>
                <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter product title" autocomplete="off" require="required">
            </div>
            <!-- description -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="description" class="form-label">
                    Product description</label>
                <input type="text" name="description" id="description" class="form-control" placeholder="Enter product description" autocomplete="off" require="required">
            </div>
            <!-- keywords -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_keywords" class="form-label">
                    Product keywords</label>
                <input type="text" name="product_keywords" id="product_keywords" class="form-control" placeholder="Enter product keywords" autocomplete="off" require="required">
            </div>
            <!-- category -->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_catgory" id="" class="form-select">
                    <option value="">Select a Category</option>
                    <?php
                    $select_query = "Select * from `categories`";
                    $result_query = mysqli_query($con, $select_query);
                    while ($row = mysqli_fetch_assoc($result_query)) {
                        $category_title = $row['category_title'];
                        $category_id = $row['category_id'];
                        echo "<option value='$category_id'>$category_title</option>";
                    }
                    ?>

                </select>
            </div>
            <!-- brands -->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_brand" id="" class="form-select">
                    <option value="">Select a brand</option>
                    <?php
                    $select_query = "Select * from `brands`";
                    $result_query = mysqli_query($con, $select_query);
                    while ($row = mysqli_fetch_assoc($result_query)) {
                        $brand_title = $row['brand_title'];
                        $brand_id = $row['brand_id'];
                        echo "<option value='$brand_id'>$brand_title</option>";
                    }
                    ?>


                </select>
            </div>
            <!-- image 1 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image1" class="form-label">
                    Product image 1</label>
                <input type="file" name="product_image1" id="product_image1" class="form-control" require="required">
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-label">
                    Product price</label>
                <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter product price" autocomplete="off" require="required">
            </div>
            <!-- submit -->
            <div class="form-outline mb-4 w-50 m-auto d-flex">
                <input type="submit" name="insert_product" class="btn btn-info mb-3 px-3" value="Insert Products">
                <button class="mb-3 px-3 mx-5  border-0 btn btn-info "><a href="index.php?view_products" class="nav-link text-dark bg-info p-1">View Products</a></button>

            </div>

            
        </form>
    </div>
</body>

</html>
<?php
if(isset($_GET['view_products'])){
        include('view_products.php');
    }

    ?>