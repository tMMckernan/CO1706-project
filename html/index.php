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
    <link rel="stylesheet" href="css/indexStyle.css" type="text/css" />
    <script src="script.js"></script>
    <title>UCLan- Home Page</title>
  </head>
  <body>
    <?php 
      include("header.php"); 
    ?>
    <!-- Main body -->
    <main>
      <!-- Info images -->
      <div class="flex-row-left">
        <div class="info-img left-sided-info-img">
          <div class="filter">
            <h4>Take the next step with a postgraduate degree</h4>
            <button
              class="info-button"
              onclick="window.location.href='https://www.uclan.ac.uk/postgraduate';"
            >
              Discover the postgraduate courses
            </button>
          </div>
        </div>
      </div>
      <div class="flex-row-middle">
        <div class="info-img middle-info-img">
          <div class="filter">
            <h4>Attend a University Open Day</h4>
            <button
              class="info-button"
              onclick="window.location.href='https://www.uclan.ac.uk/open-days';"
            >
              Register to show your intrest
            </button>
          </div>
        </div>
      </div>
      <div class="flex-row-right">
        <div class="info-img right-sided-info-img">
          <div class="filter">
            <h4>Considering Returning to Study as a mature student?</h4>
            <button
              class="info-button"
              onclick="window.location.href='https://www.uclan.ac.uk/study/return-to-study';"
            >
              Join us now
            </button>
          </div>
        </div>
      </div>
      <!-- Quote containers -->
      <div class="quote-row">
        <div class="quote-container">
          <h3>We see opportunity</h3>
        </div>
        <div class="quote-container">
          <h3>We see potential</h3>
        </div>
        <div class="quote-container">
          <h3>We see you</h3>
        </div>
      </div>
      <!-- Info containers -->
      <div class="intro-container">
        <iframe
          class="intro-video"
          src="https://www.youtube.com/embed/nh3-dJjO-7I"
          title="UCLan tour"
          frameborder="0"
          allow="accelerometer; encrypted-media; gyroscope; picture-in-picture"
        ></iframe>
      </div>
      <div id = "live-offers-container">
        <?php 
          $query = "SELECT * FROM `tbl_offers`";
          $result = mysqli_query($connection, $query);
          while($offer = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            echo "<div class='live-offer-info-conatiner'>";
            echo "<h1 class = 'offer-title'>" . $offer['offer_title'] . " </h1>";
            echo "<p class = 'offer-description'>" . $offer['offer_dec'] . "</p>";
            echo "</div>";
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
