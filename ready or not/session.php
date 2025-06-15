<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


if (isset($_SESSION["userid"]) && $_SESSION["userid"] === true) {
    header("location: welcome.php");
    exit;
}
?>
<?php

?>
