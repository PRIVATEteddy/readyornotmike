<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <link rel="stylesheet" href="css/style.css">
</head>
<body>
<button type="button" onclick="window.location.href='login.php'">maak acocuntie</button>



    <form action="" method="POST">

    <input type="text" name="username" placeholder="Vul in naam/email" required>
    <input type="password" name="password" placeholder="Vul in wachtwoord" required>
    <input type="submit" value="Submit">
</form>



<?php
include 'db_connection.php';
include 'session.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

   
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO gebruiker (NaamOfEmail, Wachtwoord) VALUES (?, ?)";
    
    $stmt = $conn->prepare($sql);
   
    $stmt->bind_param("ss", $username, $hashed_password);
    
    if ($stmt->execute()) {
        echo "account gemaaaaaaakt";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>






?>
    
</body>
</html>