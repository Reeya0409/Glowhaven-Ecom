<?php

if(isset($_GET['delete_brands'])){
    $delete_brands=$_GET['delete_brands'];
    // echo $delete_brands;

    $delete_query="Delete from `brands` where brand_id=$delete_brands";
    $result=mysqli_query($con,$delete_query);
    if($result){
           echo"<script>alert('Brands is Deleted Successfully'</script>";
        echo"<script>window.open('./index.php?view_brands','_self'</script>";
    }

}


?>

