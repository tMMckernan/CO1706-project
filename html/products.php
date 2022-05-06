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
                <li><button class="secondary-refine-btn" onClick='location.href="?btnRefineAll=1"'>All</button></li>
                <li><button class="secondary-refine-btn" onClick='location.href="?btnRefineHoodies=1"'>Hoodies</button></li>
                <li><button class="secondary-refine-btn" onClick='location.href="?btnRefineJumpers=1"'>Jumpers</button></li>
                <li><button class="secondary-refine-btn" onClick='location.href="?btnRefineT-shirts=1"'>T-shirts</button></li>
            </li>
            </ul>
            <li class="primary-refine-li">
              <button class="primary-refine-btn">Sort By</button>
              <ul class="secondary-refine-ul">
                 <li><button class="secondary-refine-btn" onClick='location.href="?btnSortByNone=1"'>None</button></li>
                <li><button class="secondary-refine-btn" onClick='location.href="?btnSortByHL=1"'>Price: High to low</button></li>
                <li><button class="secondary-refine-btn" onClick='location.href="?btnSortByLH=1"'>Price: Low to high</button></li>
              </ul>
            </li>
          </ul>
        </nav>
      </div>
      <!-- main product area -->
      <div id="all-products">
        <?php   
          $refine = null;
          $sortBy = null;
          //Refine
          if(isset($_GET['btnRefineHoodies']))
          {
           if($_GET['btnRefineHoodies']){
              $refine =  "UCLan Hoodie";
            }
          }
          else if(isset($_GET['btnRefineJumpers']))
          {
           if($_GET['btnRefineJumpers']){
              $refine = "UCLan Logo Jumper";
            }
          }
          else if(isset($_GET['btnRefineT-shirts']))
          {
            if($_GET['btnRefineT-shirts']){
             $refine =  "UCLan Logo Tshirt";
            }
          }
          else if(isset($_GET['btnSortByNone']))
          {
            if($_GET['btnSortByNone']){
              $refine = null;
            }
          }
           //Sort by
          if(isset($_GET['btnSortByHL'])){
            if($_GET['btnSortByHL']){
              $sortBy = "DESC";
            }
          }
          else if(isset($_GET['btnSortByLH'])){
            if($_GET['btnSortByLH']){
              $sortBy = "ASC";
            }
          }
          else if(isset($_GET['btnRefineAll'])){
            if($_GET['btnRefineAll']){
              $sortBy = null;
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
