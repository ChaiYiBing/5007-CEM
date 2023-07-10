<?php
session_start();

// Establish database connection
$conn = mysqli_connect("localhost", "Username", "Password", "cat.db");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Fetch form data
    $username = $_POST["Username"];
    $password = $_POST["Password"];

    // Fetch user data from the database
    $query = "SELECT * FROM user WHERE Username = '$username'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    // Verify the password
    if ($user && password_verify($password, $user["Password"])) {
        // Login successful
        // Set session variables or authentication token
        $_SESSION["user_id"] = $user["id"];
        $_SESSION["username"] = $user["username"];

        // Redirect to the forum or dashboard page
        header("Location: forum.php");
        exit;
    } else {
        // Invalid username or password
        echo "Invalid username or password. Please try again.";
    }
}

// TheCatAPI request
$apiKey = "live_BrkqoY8AT8SsZaaQdqmSY5jF4kXMloz02qZImszuog5qbRi0oTyta5NVapRwLI1c";
$apiUrl = "https://api.thecatapi.com/v1/images/search";

$curl = curl_init($apiUrl);
curl_setopt($curl, CURLOPT_HTTPHEADER, ["x-api-key: $apiKey"]);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($curl);
curl_close($curl);

if ($response) {
    $data = json_decode($response, true);
    $imageUrl = $data[0]["url"]; // Get the URL of the random cat image
}
?>

<!-- HTML code -->

<img src="<?php echo $imageUrl; ?>" alt="Random Cat Image">
