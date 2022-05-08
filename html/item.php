<?php 
   session_start();
   include("conn.php");
   include("functions.php");

   //get selected item from session
   $productID = $_GET['productID'];
   $query = "SELECT * FROM `tbl_products` WHERE `product_id` = $productID LIMIT 1";
   $result = mysqli_query($connection, $query);
   if($result && mysqli_num_rows($result) > 0 ){
      $productData = mysqli_fetch_assoc($result);
   }

   if($_SERVER['REQUEST_METHOD'] == "POST"){
       $userID = $_SESSION['userID'];
       $productID = $_GET['productID'];
       $reviewTitle = $_POST['reviewTitle'];
       $reviewDesc = $_POST['reviewDesc'];
       $reviewRating = $_POST['reviewRating'];
       
       if(!empty($reviewTitle) && !empty($reviewDesc)){
            $query = "INSERT INTO `tbl_reviews` (`user_id`, `product_id`, `review_title`, `review_desc`, `review_rating`, `review_timestamp`) VALUES ('$userID', '$productID', '$reviewTitle', '$reviewDesc', '$reviewRating', CURRENT_TIMESTAMP);";
            if($result = mysqli_query($connection, $query)){
            }
            else{
                echo '<script>alert("Error writing the review")</script>'; 
            }
        }
        else{
            echo '<script>alert("Please fill in all information")</script>';
        }
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
          <div id="selected-product-title-container">
            <?php 
              echo "<h2>Rating: ". getAverageRating($connection, $_GET['productID']) ."*</h2>";
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
          <div>
            <?php
              echo "<button class='add-to-basket' onClick='location.href=\"reviews.php?productID=". $_GET['productID'] ."\"'>Reviews</button>";
            ?>
          </div>
          <div id="selected-product-description-container">
            <h2 id="description-h">Description:</h2>
            <?php 
              echo "<p id='product-description'>". $productData['product_desc'] ."</p>";
            ?>
          </div>
        </div>
      </div>
      <div id="create-review-container">
          <form method = "POST">
          <label for="reviewTitle">Review Title:</label><br>
          <input type="text" id="reviewTitle" name="reviewTitle"><br>
          <label for="reviewDesc">Review comment:</label><br>
          <textarea id="reviewDesc" name="reviewDesc" rows="5" cols="50"></textarea><br>
          <label for="reviewRating">Choose a rating:</label>
          <select id="reviewRating" name="reviewRating" >
              <option value="1">1 Star</option>
              <option value="2">2 Star</option>
              <option value="3">3 Star</option>
              <option value="4">4 Star</option>
              <option value="5">5 Star</option>
          </select><br><br>
        <input type="submit" value="Sumbit Review">
        </form>
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
