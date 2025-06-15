<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <link rel="stylesheet" href="css/style.css">
</head>
<body>


<form action="" method="post">
    <input type="text" name="username" placeholder="Enter your username" required>
    <input type="password" name="password" placeholder="Enter your password" required>
    <input type="submit" value="login" name="login">
    <button type="button" onclick="window.location.href='create.php'">Maak Account</button>
</form>




    <?php
include 'db_connection.php';
include 'session.php';




if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

   
    $stmt = $conn->prepare("SELECT id, wachtwoord FROM gebruiker WHERE NaamOfEmail = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 1) {
        $stmt->bind_result($user_id, $hashed_password);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            $_SESSION['user_id'] = $user_id;
            $_SESSION['username'] = $username;
            header("Location: dashboard.php");
            exit();
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No user found.";
    }

    $stmt->close();
    $conn->close();
}
?>

?>
</body>
</html>