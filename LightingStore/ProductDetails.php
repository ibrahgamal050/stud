<?php
// Include database connection code
include_once "admin/config/dbconnect.php";

// Check if product ID is provided in the URL
if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    // Fetch product details from the database based on the product ID
    $query = "SELECT * FROM product WHERE product_id = $product_id";
    $result = $conn->query($query);

    // Check if product exists
    if ($result && $result->num_rows > 0) {
        $product = $result->fetch_assoc();
        // Display product details
?>
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
      
      <!-- fevicon -->
      <link rel="icon" href="layout/images/fevicon.png" type="image/gif" />
      
      <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .container {
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
        }

        .col-md-6 {
            width: 50%;
            padding: 10px;
            box-sizing: border-box;
        }

        /* Product Details Styles */
        h2 {
            color: #333;
            margin-top: 0;
        }

        p {
            color: #666;
        }

        img {
            max-width: 100%;
            height: auto;
            display: block;
            margin-bottom: 20px;
        }
    </style>
   </head>
   <!-- body -->
   <?php
   include "./userHeader.php"
   ?>
  
      <div class="himabody">
         <!-- Display product details -->
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="admin/<?php echo $product['product_image']; ?>" alt="<?php echo $product['product_name']; ?>">
            </div>
            <div class="col-md-6">
                <h2><?php echo $product['product_name']; ?></h2>
                <p><?php echo $product['product_desc']; ?></p>
                <h3>Price: $<?php echo $product['price']; ?></h3>
                <button class="btn btn-primary mt-auto" onclick="addToCart(' . $product["product_id"] . ')">Add to Cart</button>';

                <!-- Add other product details as needed -->
            </div>
        </div>
    </div>
     





      <?php
   include "./userFooter.php"
   ?>
     
<!DOCTYPE html>

<?php
    } else {
        // Product not found
        echo "Product not found.";
    }
} else {
    // Redirect if product ID is not provided
    header("Location: index.php");
    exit();
}
?>
