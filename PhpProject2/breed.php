<!DOCTYPE html>
<html>
<head>
    <title>Cat Breeds</title>
    <link rel="stylesheet" type="text/css" href="breeds.css">
</head>
<body>
    <header>
        <h1>Cat Information Website</h1>
    </header>
    <nav>
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="breed.php">Cat Breeds</a></li>
            <li><a href="care.html">Care Tips</a></li>
            <li><a href="behavior.html">Behavior</a></li>
            <li><a href="forum.php">Forum</a></li>
            <?php if (isset($_SESSION["username"])) { ?>
                <li><a href="logout.php">Sign Out</a></li>
            <?php } ?>
        </ul>
    </nav>
    
    <main>
        <h2>List of Cat Breeds</h2>
        <div class="cat-breeds">
            <?php foreach ($breeds as $breed) { ?>
                <div class="cat-breed">
                    <h3><?php echo $breed["name"]; ?></h3>
                    <?php if (isset($breed["image"]["url"])) { ?>
                        <img src="<?php echo $breed["image"]["url"]; ?>" alt="<?php echo $breed["name"]; ?>">
                    <?php } else { ?>
                        <p>No image available</p>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </main>
    
    <footer>
        <p>&copy; <?php echo date("Y"); ?> Cat Information Website. All rights reserved.</p>
    </footer>
</body>
</html>
<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

