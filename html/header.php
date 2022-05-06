<body>
    <header>
      <div id="main-header">
        <div class="logo">
          <img
            id="UCLan-logo"
            src="https://commediastore.hkct.edu.hk/UCLan_logo_digital_5+Nov+2020_resize.png"
            alt="UCLan logo"
          />
        </div>
        <div>
            <h4 class = "welcome-message">
                Welcome
            </h4>
                <h4 class = "welcome-message">
                <?php
                    $userData = checkLogin($connection);
                    if($userData != null)
                    {
                        echo $userData['user_full_name'];
                    }
                    else{
                        echo "Guest";
                    }                   
                 ?>
                 </h4>
        </div>
        <nav class="main-nav">
          <ul class="main-nav-list">
            <li class="main-nav-list"><a href="index.php">Home</a></li>
            <li class="main-nav-list"><a href="products.php">Products</a></li>
            <li class="main-nav-list"><a href="cart.php">My Basket</a></li>
            <?php
                if(checkLogin($connection) == null)
                {
                    echo "<li class='main-nav-list'><a href='login.php'>Login</a></li>";
                }
                else{
                    echo "<li class='main-nav-list'><a href='logout.php'>Log out</a></li>";
                }
            ?>
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
</body>