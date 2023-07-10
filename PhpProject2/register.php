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

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert user data into the database
    $query = "INSERT INTO user (username, password) VALUES ('$username', '$hashedPassword')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Registration successful
        // Set session variables or authentication token
        $_SESSION["user_id"] = mysqli_insert_id($conn);
        $_SESSION["username"] = $username;

        // Redirect to the desired page after registration
        header("Location: login.php");
        exit;
    } else {
        // Registration failed
        $error = "Registration failed. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
</head>
<body>
    <h2>Registration</h2>
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
        <button type="submit">Register</button>
    </form>
</body>
</html>
