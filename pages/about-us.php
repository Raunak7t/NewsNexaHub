<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
// Redirect to the login page if not logged in
    header("Location: ../index.html");
    exit;
}

	$username = $_SESSION['username'];
	$email = $_SESSION['email'];

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>About Us</title>
    <link rel="stylesheet" href="../css/resets.css" />
    <link rel="stylesheet" href="../css/nav.css" />
    <link rel="stylesheet" href="../css/aside.css" />
    <link rel="stylesheet" href="../css/about-us.css" />
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
            <h3 class="active">About Us</h3>
        </a>
        <a href="feedback.php">
            <h3>Feedback</h3>
        </a>
        <a href="../php/logout.php">
            <h3>Log out</h3>
        </a>

      </div>
    </aside>

    <main>
    <div class="wrapper">
  <h1>Our Team</h1>
  <div class="team">
    <div class="team_member">
      <div class="team_img">
        <img src="https://i.imgur.com/2pGPLrl.png" alt="Team_image">
      </div>
      <h3>Paul Doe</h3>
      <p class="role">UI developer</p>
      <p>Lorem ipsum dolam blanditiis dignissimos.</p>
    </div>
    <div class="team_member">
      <div class="team_img">
        <img src="https://i.imgur.com/jQj1I8E.png" alt="Team_image">
      </div>
      <h3>Rosie Meg</h3>
      <p class="role">Tester</p>
      <p>Lorem ipsum dolor slanditiis dignissimos.</p></div>
    <div class="team_member">
      <div class="team_img">
        <img src="https://i.imgur.com/2Necikc.png" alt="Team_image">
      </div>
      <h3>Alex Wood</h3>
      <p class="role">Support Lead</p>
      <p>Lorem ipsum io quam blanditiis dignissimos.</p>
    </div>
    <div class="team_member">
      <div class="team_img">
        <img src="https://i.imgur.com/2Necikc.png" alt="Team_image">
      </div>
      <h3>Alex Wood</h3>
      <p class="role">Support Lead</p>
      <p>Lorem ipsum duam blanditiis dignissimos.</p>
    </div>
  </div>
</div>
    </main>

  </body>
</html>
