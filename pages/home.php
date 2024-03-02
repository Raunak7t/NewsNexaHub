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
    <title>Home</title>
    <link rel="stylesheet" href="../css/resets.css" />
    <link rel="stylesheet" href="../css/nav.css" />
    <link rel="stylesheet" href="../css/aside.css" />
    <link rel="stylesheet" href="../css/home.css" />
    <script
      src="https://kit.fontawesome.com/4718b98a04.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <nav>
      <div class="main-container">
        <div class="logo" onclick="reload()">
          <h1><span>News</span>Nexa<span>Hub</span></h1>
        </div>

        <div class="nav-links">
          <ul>
            <li class="hover-link active" onclick="reload()">
              <h3>Home</h3>
            </li>
            <li class="hover-link">
              <a href="breaking-news.php">
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
          <input id="search-box" type="text" placeholder="eg. Satish" />
          <button id="search-btn" class="btn"><i class="fa-brands fa-searchengin"></i>&nbsp;&nbsp;Search</button>
        </div>

        <div class="user-name">
          <i>Hey,</i>
          <h3><?php echo $username; ?></h3>
        </div>
      </div>
    </nav>

    <aside>
      <div class="menu">
        <h3 id="trending" onclick="onNavClick('trending')">Trending</h3>
        <h3 id="tech" onclick="onNavClick('tech')">Tech</h3>
        <h3 id="sports" onclick="onNavClick('sports')">sports</h3>
        <h3 id="india-politics" onclick="onNavClick('india-politics')">
          politics
        </h3>
        <h3 id="finance" onclick="onNavClick('finance')">finance</h3>
        <h3 id="jobs" onclick="onNavClick('jobs')">jobs</h3>
        <h3 id="Gaming" onclick="onNavClick('Gaming')">Gaming</h3>
      </div>
    </aside>

    <main>
      <div class="news-boxes" id="news-boxes">
        <h1>Loading...</h1>
      </div>
      <template id="news-template">
        <div class="news-box" id="news-box">
          <img
            src="https://via.placeholder.com/1"
            alt="news image"
            id="news-img"
          />
          <div class="news-content">
            <h3 id="news-title">news title</h3>
            <h5 id="news-src">source</h5>
            <!-- <small id="news-desc">description</small> -->
          </div>
        </div>
      </template>
    </main>

    <script src="../js/home.js"></script>
  </body>
</html>
