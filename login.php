<?php
session_start();

//connect to the database
$host = 'localhost'; // Replace with your host name if needed
$db = 'college_db';  // Your database name
$user = 'root';      // Your database username
$pass = '';          // Your database password 

// Create a connection
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$email = $_POST['email'];
$password = $_POST['password'];

// Validate input
if (empty($email) || empty($password)) {
    echo "Please fill in both fields";
    exit();
}

// Prepare and execute query
$stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

// Check if user exists and password matches
if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    
    // Verify password
    if (password_verify($password, $user['password'])) {
        // Successful login
        $_SESSION['user'] = $user['id'];
        header('Location: dashboard.php');  // Redirect to dashboard or another page
        exit();
    } else {
        echo "Invalid password.";
    }
} else {
    echo "User not found.";
}

$stmt->close();
$conn->close();
?>
