<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "userdb";
// Create connection
$conn = new mysqli($servername, $username, $password, $db, 3306);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
else
{
echo "Connected successfully";
}
?>