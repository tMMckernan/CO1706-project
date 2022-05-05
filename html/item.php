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
    <header>
      <div id="main-header">
        <div class="logo">
          <img
            id="UCLan-logo"
            src="https://commediastore.hkct.edu.hk/UCLan_logo_digital_5+Nov+2020_resize.png"
            alt="UCLan logo"
          />
        </div>
        <nav class="main-nav">
          <ul class="main-nav-list">
            <li class="main-nav-list"><a href="index.php">Home</a></li>
            <li class="main-nav-list"><a href="products.php">Products</a></li>
            <li class="main-nav-list"><a href="cart.php">My Basket</a></li>
          </ul>
        </nav>
        <button class="phone-menu-btn" onclick="togglePhoneMenu()"></button>
      </div>
      <nav id="phone-nav">
        <ul class="phone-nav-list">
          <li class="phone-nav-list">
            <a href="index.php">Home</a>
          </li>
          <li class="phone-nav-list">
            <a href="products.php">Products</a>
          </li>
          <li class="phone-nav-list">
            <a href="cart.php">My Basket</a>
          </li>
        </ul>
      </nav>
      <div class="spacer header-border-img"></div>
    </header>
    <!-- Main body -->
    <main id="product-main-container">
      <div id="product-container">
        <div id="product-image-container">
          <img id="primary-product-image" src="" alt="" />
        </div>
        <div id="product-info-container">
          <div id="selected-product-title-container"></div>
          <div id="selected-product-price-container"></div>
          <div id="selected-product-colour-container"></div>
          <div id="function-container">
            <button class="add-to-basket" onclick="addBasketProduct()">
              Add to basket
            </button>
          </div>
          <div id="selected-product-description-container">
            <h2 id="description-h">Description:</h2>
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
