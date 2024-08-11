<?php
// Database connection parameters
$hostname = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "wipro";

// Create a connection to the database
$conn=mysqli_connect(hostname: $hostname,
               username: $username,
               password: $password,
               database: $database);

// Check connection
if(mysqli_connect_errno())
{
    die("connection error".mysqli_connect_errno());
}
// Get the email address from a form or other source
if (isset($_POST['email'])>=0) {
    $Email = $_POST['email'];
    // Now you can safely use $Email
} else {
    // Handle the case where 'email' is not set in the POST data
    echo "Email is not provided.";
}
//$Email=$_POST['email']; // Assuming you're using a POST request and a form field named 'email'

// SQL query to insert the email into the subscribers table
$sql = "INSERT INTO subscribers (EMAIL) VALUES (?)";

$stmt = mysqli_stmt_init($conn);

if(! mysqli_stmt_prepare($stmt, $sql)){
    die(mysqli_error($conn));
}
mysqli_stmt_bind_param($stmt,"s",$Email);
mysqli_stmt_execute($stmt);
?>