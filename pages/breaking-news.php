<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
// Redirect to the login page if not logged in
    header("Location: ../index.html");
    exit;
}

  $mysqli = require __DIR__ . "/../php/dbcon.php";

  
  if (isset($_GET['action'])) {

    $p_id = $_GET['p_id'];
  
  // Check if the like link is clicked
    if ($_GET['action'] == 'like'){
      // Update the likes in the database
      $updateSql = "UPDATE newsposts SET likes = likes + 1 WHERE id = '$p_id'";
      $mysqli->query($updateSql);
      
      // Check if the update was successful
      if ($mysqli->affected_rows > 0) {
        //updated successfully
        header("Location: breaking-news.php#$p_id");
        exit;
      } else {
        echo "Error updating ratings: " . $mysqli->error;
      }
    }
    
  // Check if the dislike link is clicked
    if ($_GET['action'] == 'dislike'){
      // Update the dislikes in the database*/
      $updateSql = "UPDATE newsposts SET dislikes = dislikes + 1 WHERE id = '$p_id'";
      $mysqli->query($updateSql);
      
      // Check if the update was successful
      if ($mysqli->affected_rows > 0) {
        //updated successfully
        header("Location: breaking-news.php#$p_id");
        exit;
      } else {
        echo "Error updating dislikes: " . $mysqli->error;
      }
    }
  }

  $sql = "select * from newsposts";
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
                <div class='news-box' id='$id'>
                  <div class='user'>
                    <h5 id='news-username'>$p_username</h5>
                    |
                    <h5 id='news-date'>$date</h5>
                  </div>
                  <h3 id='news-title'>$title</h3>
                  <div class='interaction'>
                    <a href='breaking-news.php?p_id=$id&action=like' class='likes'>
                      <img src='../assets/like.png' alt='like'>
                      <p>$likes</p>
                      </a>
                      <a href='breaking-news.php?p_id=$id&action=dislike' class='dislikes'>
                      <p>$dislikes</p>
                      <img src='../assets/dislike.png' alt='like'>
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
