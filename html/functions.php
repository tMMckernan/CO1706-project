<?php

function checkLogin($connection)
{
    if(isset($_SESSION['userID']))
    {
        //check if user is in the database
        $userID = $_SESSION['userID'];
        $query = "SELECT * FROM `tbl_users` WHERE `user_id` = '$userID' limit 1";
        $result = mysqli_query($connection, $query);
        if($result && mysqli_num_rows($result) > 0)
        {
            $userData = mysqli_fetch_assoc($result);
            return $userData;
        }
    }

    return null;
    die;
}

function displayAllProducts($connection,$refine, $sortBy)
{  
    if($refine != null){
        $refineQuery = " WHERE `product_type` = '$refine'";
    }
    else{
        $refineQuery = "";
    }
    if($sortBy != null){
        $sortByQuery = " ORDER BY `product_price` $sortBy";
    }
    else{
        $sortByQuery = "";
    }
    $query = "SELECT * FROM tbl_products" . $refineQuery ;
    $result = mysqli_query($connection, $query);
    if($result){
        // success! check results
        while($product = mysqli_fetch_assoc($result)){
        echo "<div class='product' id='". $product['product_id'] ."' onClick='location.href=\"item.php?productID=". $product['product_id'] ."\"'>
        <img class='secondary-product-img' src='". $product['product_image'] ."'>
        <p class='secondary-product-title'>". $product['product_title'] ."</p>
        <p class='secondary-product-price'>". $product['product_price'] ."</p>
        </div>";
        }
    }
    else{
        echo "error";
    }
}

/*
Notes:
-make sorting/refining products work
-Make product page work correctly using php session storage
-make add to basket work

*/
//openItemPage
//<div class="product" id="UCLan Hoodie- Light Blue"><img class="secondary-product-img" src="images/items/hoodies/hoodie (2).jpg"><p class="secondary-product-title">UCLan Hoodie- Light Blue</p><p class="secondary-product-price">£39.99</p></div>
?>