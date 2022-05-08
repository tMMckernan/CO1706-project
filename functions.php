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

function displayAllProducts($connection, $refine, $sortBy, $search)
{  
    //Search
    if($search != null){
        $searchQuery = " WHERE `product_title` LIKE '%$search%'";
    }
    else{
        $searchQuery = "";
    }
    //Refine
    if($refine != "All" && $search != null){
        $refineQuery = " AND `product_type` = '$refine'";
    }
    else if($refine != "All" && $search == ""){
        $refineQuery = " WHERE `product_type` = '$refine'";
    }
    else{
        $refineQuery = "";
    }
    //Sortby
    if($sortBy != "None"){
        $sortByQuery = " ORDER BY `product_price` $sortBy";
    }
    else{
        $sortByQuery = "";
    }
    
    
    $query = "SELECT * FROM tbl_products" . $searchQuery . $refineQuery . $sortByQuery;
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
        //add message for items not loaded
        echo "error";
    }
}

    function getAverageRating($connection,$productID){
        $productID = $_GET['productID'];
        $query = "SELECT * FROM `tbl_reviews` WHERE `product_id` = '$productID'";
        $result = mysqli_query($connection, $query);
        $counter = 1;
        $totalReviewRating = 0;
        while($review = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $totalReviewRating = $totalReviewRating + $review['review_rating'];
            $counter = $counter + 1;
        }
        return number_format((float)$totalReviewRating / $counter, 2, '.', ''); 
    }
?>