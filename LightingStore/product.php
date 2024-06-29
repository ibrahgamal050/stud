<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>lighten</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="layout/css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="layout/css/style.css">
     
      
      
   </head>
   <!-- body -->
   <?php
   include "./userHeader.php"
   ?>

   
<!-- end header -->
<div class="himabody">
      <!-- end header -->
       <div class="brand_color">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2>our product</h2>
                    </div>
                </div>
            </div>
        </div>

    </div>
      <!-- our product -->
      
      <div class="product">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="title">
                     
                     <span>We package the products with best services to make you a happy customer.</span>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <?php
include_once "admin/config/dbconnect.php";

// Fetch all categories
$categories = $conn->query("SELECT * FROM category");

// Loop through categories
while ($category = $categories->fetch_assoc()) {
    echo '<div class="product">';
    echo '<div class="container">';
    echo '<div class="row">';
    echo '<div class="col-md-12">';
    echo '<div class="titlepage">';
    echo '<h1>' . $category["category_name"] . '</h1>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';

    echo '<div class="product-bg">';
    echo '<div class="product-bg-white">';
    echo '<div class="container">';
    echo '<div class="row">';

    // Fetch and display products for this category
    $products = $conn->query("SELECT * FROM product WHERE category_id = " . $category["category_id"]);

    while ($product = $products->fetch_assoc()) {
        echo '<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">';
        echo '<div class="product-box">';
        echo '<i><img src="admin/' . $product["product_image"] . '"/></i>';
        echo '<h3>' . $product["product_name"] . '</h3>';
        $description = $product["product_desc"];
        $truncatedDescription = implode(' ', array_slice(explode(' ', $description), 0, 5)); // Adjust the number of words as needed
        echo '<p>' . $truncatedDescription . '</p>';
            echo '<span>$' . $product["price"] . '</span>';
            echo '<button class="btn btn-primary mt-auto" onclick="addToCart(' . $product["product_id"] . ')">Add to Cart</button>';
            echo '</div>';
        echo '</div>';
    }
    

    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
}
?>

<!-- Include footer -->
<?php include "./userFooter.php"; ?>
for ()