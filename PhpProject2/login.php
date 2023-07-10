<?php
session_start();

// Establish database connection
$host = "localhost";
$db_name = "cat";
$username = "root";
$password = "";
$conn = mysqli_connect($host, $username, $password, $db_name);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Fetch form data
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Fetch user data from the database
    $query = "SELECT * FROM user WHERE username='$username' && password='$password'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        // Login successful
        $user = mysqli_fetch_assoc($result);

        // Set session variables
        $_SESSION["user_id"] = $user["id"];
        $_SESSION["username"] = $user["username"];

        // Get a random cat image from the Cat API
        $catApiUrl = "https://api.thecatapi.com/v1/images/search";
        $catApiResponse = file_get_contents($catApiUrl);
        $catData = json_decode($catApiResponse);

        if (is_array($catData) && count($catData) > 0) {
            $randomCatImageUrl = $catData[0]->url;
            $_SESSION["cat_image_url"] = $randomCatImageUrl;
        }

        // Redirect to the desired page after login
        header("Location: home.php");
        exit;
    } else {
        // Login failed
        echo "<script>alert('Invalid username or password.');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="logincss.css">
</head>
<body>
    <h2>Login</h2>
    <?php if (isset($error)) { ?>
        <p><?php echo $error; ?></p>
    <?php } ?>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit">Login</button>
    </form>
    <p>Don't have an account? <a href="register.php">Register</a></p>
</body>
</html>
