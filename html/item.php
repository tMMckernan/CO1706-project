<?php 
   session_start();
   include("conn.php");
   include("functions.php");

   //get selected item from session
   $product = $_GET['productID'];
   $query = "SELECT * FROM `tbl_products` WHERE `product_id` = $product LIMIT 1";
   $result = mysqli_query($connection, $query);
   if($result && mysqli_num_rows($result) > 0 ){
      $productData = mysqli_fetch_assoc($result);
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/generalStyle.css" type="text/css" />
    <link rel="stylesheet" href="css/itemStyle.css" type="text/css" />
    <script src="script.js"></script>
    <title>UCLan- Item</title>
  </head>
  <body onload="loadItemPage()" onunload="test()">
    <!-- Header -->
    <?php 
      include("header.php"); 
    ?>
    <!-- Main body -->
    <main id="product-main-container">
      <div id="product-container">
        <div id="product-image-container">
          <?php 
            echo "<img id='primary-product-image' src='". $productData['product_image'] ."' alt='Image of a ". $productData['product_title'] ."' />";
          ?>
        </div>
        <div id="product-info-container">
          <div id="selected-product-title-container">
            <?php 
              echo "<h2 class='primary-product-title'>". $productData['product_title'] ."</h2>";
            ?>
          </div>
          <div id="selected-product-price-container">
            <?php 
              echo "<h2 class='primary-product-price'>£". $productData['product_price'] ."</h2>";
            ?>
          </div>
          <div id="selected-product-colour-container">
            <?php 
              echo $productData['product_title'];
            ?>
          </div>
          <div id="function-container">
            <button class="add-to-basket" onclick="addBasketProduct()">
              Add to basket
            </button>
          </div>
          <div id="selected-product-description-container">
            <h2 id="description-h">Description:</h2>
            <?php 
              echo "<p id='product-description'>". $productData['product_desc'] ."</p>";
              
            ?>
          </div>
        </div>
      </div>
    </main>
    <!-- Footer -->
    <footer>
      <div id="main-footer">
        <div class="info-container">
          <h2>Location</h2>
          <ul class="info-list">
            <li class="contact-info">Preston,</li>
            <li class="contact-info">Lancashire, UK</li>
            <li class="contact-info">PR1 2HE</li>
            <li class="contact-info">+44 1772 201 201</li>
            <li class="contact-info">uadmissions@uclan.ac.uk</li>
          </ul>
        </div>
        <div class="info-container">
          <h2>Extra</h2>
          <ul class="info-list">
            <li><a href=""></a>filler</li>
            <li><a href=""></a>filler</li>
            <li><a href=""></a>filler</li>
            <li><a href=""></a>filler</li>
            <li><a href=""></a>filler</li>
          </ul>
        </div>
        <div class="info-container">
          <h2>Social</h2>
          <ul class="info-list">
            <li><a href=""></a>filler</li>
            <li><a href=""></a>filler</li>
            <li><a href=""></a>filler</li>
          </ul>
        </div>
      </div>
    </footer>
  </body>
</html>
