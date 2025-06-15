<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
    function manage ($titel, $beschrijving ,$deadline){
        return [
        "titel" => $titel,
        "beschrijving" => $beschrijving,
        "deadline" => $deadline,
        "klaar" => false
        ];
    }
    ?>
<a href="login.php">Login</a>
</body>
</html>login.p