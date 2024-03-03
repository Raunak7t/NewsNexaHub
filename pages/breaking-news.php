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

  $mysqli = require __DIR__ . "/../php/dbcon.php";
  $sql = "select * from newsposts";
  $result = $mysqli->query($sql);
  $mysqli->close();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Breaking News</title>
    <link rel="stylesheet" href="../css/resets.css" />
    <link rel="stylesheet" href="../css/nav.css" />
    <link rel="stylesheet" href="../css/aside.css" />
    <link rel="stylesheet" href="../css/breaking-news.css" />
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
        <a href="breaking-news.php">
            <h3 class="active">Breaking News</h3>
        </a>
        <a href="add-news.php">
            <h3>Add News</h3>
        </a>
        <a href="about-us.php">
            <h3>About Us</h3>
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
      <div class='news-boxes'>
        <?php
          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              $p_username = $row['username'];
              $id = $row['id'];
              $title = $row['title'];
              $descr = $row['descr'];
              $date = $row['date'];
              $src = $row['src'];
              $likes = $row['likes'];
              $dislikes = $row['dislikes'];

              echo "
                <div class='news-box' id='news-box' id='$id'>
                  <div class='user'>
                    <h5 id='news-username'>$p_username</h5>
                    |
                    <h5 id='news-date'>$date</h5>
                  </div>
                  <h3 id='news-title'>$title</h3>
                  <div class='interaction'>
                    <a href='breaking-news.php?p_id=$id&action=like' class='likes'>
                      <i class='fa fa-thumbs-up icon'></i>
                      <p>$likes</p>
                    </a>
                    <a href='breaking-news.php?p_id=$id&action=dislike' class='dislikes'>
                      <i class='fa fa-thumbs-down icon'></i>
                      <p>$dislikes</p>
                    </a>
                  </div>
                  <a href='' id='news-src'>Source: $src</a>
                  <small id='news-desc'>$descr</small>
                </div>
              ";
            }
          }
        ?>
      </div>
    </main>
  </body>
</html>
