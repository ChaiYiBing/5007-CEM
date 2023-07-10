<!DOCTYPE html>
<html>
<head>
  <title>Discussion Forum</title>
  <link rel="stylesheet" type="text/css" href="fcss.css">
</head>
<body>
  <header>
    <h1>Discussion Forum</h1>
  </header>
  <nav>
    <ul>
      <li><a href="home.php">Home</a></li>
      <li><a href="breed.php">Cat Breeds</a></li>
      <li><a href="care.html">Care Tips</a></li>
      <li><a href="behaviour.html">Behavior</a></li>
      <li><a href="forum.php">Discussion Forum</a></li>
    </ul>
  </nav>
  <main>
    <h2>Welcome to the Discussion Forum</h2>
    <form id="post-form">
      <input type="text" id="post-title" placeholder="Enter Post Title" required>
      <textarea id="post-content" placeholder="Enter Post Content" required></textarea>
      <button type="submit">Create Post</button>
    </form>
    <div id="post-list"></div>
  </main>
  <footer>
    <p>&copy; 2023 Discussion Forum. All rights reserved.</p>
  </footer>

  <script src="app.js"></script>
</body>
</html>
