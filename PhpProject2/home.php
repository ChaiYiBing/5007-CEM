<?php
session_start();
$catImageUrl = "";

// Check if the user is logged in and a cat image URL is available in the session
if (isset($_SESSION["username"]) && isset($_SESSION["cat_image_url"])) {
    $catImageUrl = $_SESSION["cat_image_url"];
}

// Handle sign out
if (isset($_GET["logout"])) {
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Cat Discussion Forum</title>
  <link rel="stylesheet" type="text/css" href="homepagecss.css">
  <style>
    .sign-out {
      position: absolute;
      top: 10px;
      right: 10px;
    }
  </style>
</head>
<body>
  <header>
    <h1>Cat Information Website</h1>
    <?php if (isset($_SESSION["username"])) { ?>
      <a class="sign-out" href="?logout=true">Sign Out</a>
    <?php } ?>
  </header>
  <nav>
    <ul>
      <li><a href="home.php">Home</a></li>
      <li><a href="breed.html">Cat Breeds</a></li>
      <li><a href="care.html">Care Tips</a></li>
      <li><a href="behaviour.html">Behavior</a></li>
      <li><a href="Forum.php">Forum</a></li>
      <?php if (isset($_SESSION["username"])) { ?>
        <li><a href="logout.php">Sign Out</a></li>
      <?php } ?>
    </ul>
  </nav>
  <main>
    <h2>Welcome to our Cat Information Website!</h2>
    <p>Explore various aspects of cats, from different breeds to care tips and behavior.</p>
    
    <?php if (!empty($catImageUrl)) { ?>
      <img src="<?php echo $catImageUrl; ?>" alt="Random Cat Image">
    <?php } ?>
  </main>
  <footer>
    <p>&copy; <?php echo date("Y"); ?> Cat Information Website. All rights reserved.</p>
  </footer>
</body>
</html>
