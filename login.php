<?php 
    session_start();
    include("conn.php");
    include("functions.php");

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $email = $_POST['email'];
        $password = $_POST['password'];
        if(!empty($email) && !empty($password)){
            //ADD Salt
            $password = hash("sha256", $password);
            //find user in database
            $query = "SELECT * FROM `tbl_users` WHERE `user_email` = '$email' limit 1";
            $result = mysqli_query($connection, $query);
            if($result && mysqli_num_rows($result) > 0 )
            {
                $userData = mysqli_fetch_assoc($result);
                if($userData['user_pass'] == $password)
                {
                    $_SESSION['userID'] = $userData['user_id'];
                    header("Location: index.php");
                    die;
                }
                else{
                    echo '<script>alert("Username or Password is wrong")</script>';
                }
            }
            else{
                 echo '<script>alert("No user found")</script>';
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
    <link rel="stylesheet" href="css/cartStyle.css" type="text/css" />
    <script src="script.js"></script>
    <title>UCLan- My Basket</title>
  </head>
  <body>   
    <?php 
      include("header.php"); 
    ?>
    <!-- Main body -->
    <main>
      <form method = "POST">
          <label for="email">Email:</label><br>
          <input type="email" id="email" name="email"><br>
          <label for="password">Password:</label><br>
          <input type="password" id="password" name="password"><br><br>
          <input type="submit" value="Login">
          <a href="register.php">Register</a>
         
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