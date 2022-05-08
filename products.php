<?php 
   session_start();
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
          <ul id="refine-ul">
            <li class="primary-refine-li">
              <button class="primary-refine-btn">Products</button>
              <ul class="secondary-refine-ul">
                <?php  
                  if(isset($_GET['SortBy'])){
                    if($_GET['SortBy']){
                      $sortByGET = "&SortBy=" . $_GET['SortBy'];
                    }
                  }
                  else{
                    $sortByGET = "";
                  }
                  echo "<li><button class='secondary-refine-btn' onClick='location.href=\"?RefineType=All". $sortByGET ." \" '>All</button></li>";
                  echo "<li><button class='secondary-refine-btn' onClick='location.href=\"?RefineType=UCLan Hoodie". $sortByGET ." \" '>UCLan Hoodie</button></li>";
                  echo "<li><button class='secondary-refine-btn' onClick='location.href=\"?RefineType=UCLan Logo Jumper". $sortByGET ." \" '>UCLan Logo Jumper</button></li>";
                  echo "<li><button class='secondary-refine-btn' onClick='location.href=\"?RefineType=UCLan Logo Tshirt". $sortByGET ." \" '>UCLan Logo Tshirt</button></li>";
                 
                ?>
            </li>
            </ul>
            <li class="primary-refine-li">
              <button class="primary-refine-btn">Sort By</button>
              <ul class="secondary-refine-ul">
                <?php 
                  if(isset($_GET['RefineType'])){
                    if($_GET['RefineType']){
                      $refineGET = "&RefineType=" . $_GET['RefineType'];
                    }
                  }
                  else{
                    $refineGET = "";
                  }
                  echo "<li><button class='secondary-refine-btn' onClick='location.href=\"?SortBy=None". $refineGET ." \" '>None</button></li>";
                  echo "<li><button class='secondary-refine-btn' onClick='location.href=\"?SortBy=DESC". $refineGET ." \" '>Price: High to low</button></li>";
                  echo "<li><button class='secondary-refine-btn' onClick='location.href=\"?SortBy=ASC". $refineGET ." \" '>Price: Low to high</button></li>";
                ?>
              </ul>
            </li>
          </ul>
        </nav>
      </div>
      <!-- main product area -->
      <div id="all-products">
        <?php   
          $refine = "All";
          $sortBy = "None";
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

          displayAllProducts($connection, $refine, $sortBy);
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
