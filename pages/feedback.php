<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
// Redirect to the login page if not logged in
    header("Location: ../index.html");
    exit;
}

  $mysqli = require __DIR__ . '/../php/dbcon.php';
  $sql = "select * from feedback";
  $result = $mysqli->query($sql);
  $mysqli->close();

	$username = $_SESSION['username'];
	$email = $_SESSION['email'];

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Feedback</title>
    <link rel="stylesheet" href="../css/resets.css" />
    <link rel="stylesheet" href="../css/nav.css" />
    <link rel="stylesheet" href="../css/aside.css" />
    <link rel="stylesheet" href="../css/feedback.css" />
    <script
      src="https://kit.fontawesome.com/4718b98a04.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <nav>
      <div class="main-container">
        <div class="logo">
          <h1><span>News</span>Nexa<span>Hub</span></h1>
        </div>

        <div class="nav-links">
          <ul>
            <li class="hover-link">
              <a href="home.php">
                <h3>Home</h3>
              </a>
            </li>
            <li class="hover-link active">
              <a href="#">
                <h3>More</h3>
              </a>
            </li>
            <li class="hover-link">
              <a href="../php/logout.php">
                <h3>Log out</h3>
              </a>
            </li>
          </ul>
        </div>

        <div class="search-bar">
          <a href="home.php">
            <button id="search-btn" class="btn"><i class="fa-brands fa-searchengin"></i>&nbsp;&nbsp;Search</button>
          </a>
        </div>

        <div class="user-name">
          <i>Hey,</i>
          <h3><?php echo $username; ?></h3>
        </div>
      </div>
    </nav>

    <aside>
      <div class="menu">
        <a href="more.php">
            <h3>Breaking News</h3>
        </a>
        <a href="add-news.php">
            <h3>Add News</h3>
        </a>
        <a href="about-us.php">
            <h3>About Us</h3>
        </a>
        <a href="feedback.php">
            <h3  class="active">Feedback</h3>
        </a>
        <a href="../php/logout.php">
            <h3>Log out</h3>
        </a>

      </div>
    </aside>

    <main>
    <div class="star-area">
      <form action="../php/process-feedback.php" method="post">
        <div class="container">
          <div class="star-widget">
            <input type="radio" name="rate" id="rate-5" value="5">
            <label for="rate-5" class="fas fa-star"></label>
            <input type="radio" name="rate" id="rate-4" value="4">
            <label for="rate-4" class="fas fa-star"></label>
            <input type="radio" name="rate" id="rate-3" value="3">
            <label for="rate-3" class="fas fa-star"></label>
            <input type="radio" name="rate" id="rate-2" value="2">
            <label for="rate-2" class="fas fa-star"></label>
            <input type="radio" name="rate" id="rate-1" value="1">
            <label for="rate-1" class="fas fa-star"></label>
            <div class="innerform">
            <div class="textarea">
              <textarea cols="30" placeholder="Describe your experience.." name="feedback"></textarea>
            </div>
            <div>
              <button type="submit" class="btn">Post</button>
            </div>
            </div>
          </div>
        </div>
      </form>
    </div>
    <div class="feedback-area">
      <h1 class="fb-head">User Feedbacks</h1>
      <?php
        while($row = $result->fetch_assoc()) {
        $fusername = $row['username'];
        $feedback = $row['feedback'];
        $stars = $row['stars'];
        
        echo "<div class='feedback-box'>
        <h2>$fusername</h2>
        <br>
        <h3>Rated: $stars <span class='fas fa-star show-star'</span></h3>
        <br>
        <p>$feedback</p>
        </div>";
        }
      ?>
    </div>
    </main>
  </body>
</html>
