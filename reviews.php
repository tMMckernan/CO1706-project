<?php 
    include("conn.php");
    include("functions.php");    
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/generalStyle.css" type="text/css" />
    <link rel="stylesheet" href="css/cartStyle.css" type="text/css" />
    <script src="script.js"></script>
    <title>UCLan- Register</title>
  </head>
  <body>
    <?php
      include("header.php");
    ?>
    <!-- Main body -->
    <main>
      <div id = "review-title-container">
            <h1 id = 'reviews-main-title'>Reviews</h1>
      </div>
      <div id = "all-reviews-container">
            <?php
                $productID = $_GET['productID'];
                $query = "SELECT * FROM `tbl_reviews` WHERE `product_id` = '$productID'";
                $result = mysqli_query($connection, $query);
                $counter = 1;
                while($review = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    echo "<div id='$counter' class='single-review-container'>";
                    echo "<h1 class = 'review-title'>" . $review['review_title'] . " </h1>";
                    echo "<p class = 'review-rating'>Rating: " . $review['review_rating'] . "</p>";
                    echo "<p class = 'review-description'>" . $review['review_desc'] . "</p>";
                    echo "<p class = 'review-time'>Date: " . $review['review_timestamp'] . "</p>";
                    echo "</div>";
                    $counter = $counter + 1;
                }
            ?>
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