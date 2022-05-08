<?php 
  session_start();
  include("conn.php");
  include("functions.php");
  $refine = "All";
  $sortBy = "None";
  $search = "";
  //Refine
  if(isset($_GET['RefineType'])){
   if($_GET['RefineType']){
       $refine = $_GET['RefineType'];
    }
  }
   //Sort by
  if(isset($_GET['SortBy'])){
   if($_GET['SortBy']){
      $sortBy = $_GET['SortBy'];
    }
  }
  //Search
   if(isset($_GET['ProductSearch'])){
   if($_GET['ProductSearch']){
      $search = $_GET['ProductSearch'];
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
    <link rel="stylesheet" href="css/productsStyle.css" type="text/css" />
    <script src="script.js"></script>
    <title>UCLan- Products</title>
  </head>
  <body>
    <!-- Header -->
    <?php 
      include("header.php"); 
    ?>
    <!-- Main body -->
    <main>
      <!-- refine bar -->
      <div id="refine-row">
        <nav id="refine-nav">
          <h2 id="store-tag">ITEM STORE</h2>
          <form method="get">
              <input type="search" id="ProductSearch" name="ProductSearch">
              <select id="RefineType" name="RefineType">
                <option value="All">Refine</option>
                <option value="UCLan Hoodie">Hoodie</option>
                <option value="UCLan Logo Jumper">Jumper</option> 
                <option value="UCLan Logo Tshirt">TShirt</option>
              </select>
              <select id="SortBy" name="SortBy">
                <option value="None">Sort By</option>
                <option value="DESC">Price: High to low</option>
                <option value="ASC">Price: Low to high</option> 
              </select>
              <input type="submit" value="Search">
            </form>
        </nav>
      </div>
      <!-- main product area -->
      <div id="all-products">
        <?php   
          displayAllProducts($connection, $refine, $sortBy, $search);
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
