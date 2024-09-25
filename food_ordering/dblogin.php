<?php
session_start();

// Retrieve the email and password from the form
$email = $_POST['email'];
$password = $_POST['password'];

// Establish a connection to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "food_ordering";

// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the email and password from the form
$email = $_POST['email'];
$password = $_POST['password'];


// Prepare the SQL query for users table
$sql_users = "SELECT * FROM users WHERE email = ? AND password = ?";
$stmt_users = $conn->prepare($sql_users);
$stmt_users->bind_param("ss", $email, $password);
$stmt_users->execute();
$result_users = $stmt_users->get_result();

try {
    // Check if the login details are correct for users
    if ($result_users->num_rows > 0) {
        // Store user email in session
        $_SESSION['email'] = $email;
        $_SESSION['userloggedin'] = true;

        echo '<script>alert("User is logged in!"); window.location.href="menu.php";</script>';
        exit();
    } else {
        // Redirect to the login page with an error message
        header('Location: login.php?error');
        exit();
    }
} catch (Exception $e) {
    // Handle the error (e.g., log the error)
    header('Location: login.php?error');
    exit();
}

// Close the connection
$conn->close();
