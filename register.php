<?php 
   /*
   Notes:
   -Need to add more validation for example name have no numbers or symbols and password length ect
   -can not have repeat emails 
   -Add css and make the page look nicer
   */
   include("conn.php");
   include("functions.php");
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
       $fullName = $_POST['fullName'];
       $email = $_POST['email'];
       $address = $_POST['address'];
       $password = $_POST['password'];
       $passwordConfirm = $_POST['passwordConfirm'];
       
       if(!empty($fullName) && !empty($email) && !empty($password) && !empty($passwordConfirm)){
            if($password == $passwordConfirm){
                //hash password
                $password = hash("sha256", $password);
                //Add user to data base
                $query = "INSERT INTO `tbl_users` (`user_full_name`, `user_address`, `user_email`, `user_pass`, `user_timestamp`) VALUES ('$fullName', '$address', '$email', '$password', CURRENT_TIMESTAMP);";
                if($result = mysqli_query($connection, $query)){
                   //Go to login screen
                   header("Location: login.php");
                   die;
                }
                else{
                    echo '<script>alert("Registered Failed")</script>'; 
                }
            }
            else{
               echo '<script>alert("Passwords do not match")</script>';
            }
       }
       else
       {
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
      <form method = "POST">
        <label for="fullName">Full Name:</label><br>
        <input type="text" id="fullName" name="fullName"><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email"><br>

        <label for="address">Address:</label><br>
        <input type="text" id="address" name="address"><br>

        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br>
        
        <label for="passwordConfirm">Confirm Password:</label><br>
        <input type="password" id="passwordConfirm" name="passwordConfirm"><br>

        <input type="submit" value="Register">
      </form>
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