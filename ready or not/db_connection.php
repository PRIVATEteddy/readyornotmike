
<?php

$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "readyornot"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

echo "Connected successfully!";


?>