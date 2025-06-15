<?php
include 'db_connection.php';
include 'session.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user_id = $_SESSION['user_id'];
    $title = ucfirst(strtolower(trim($_POST['title'])));
    $description = trim($_POST['description']);
    $deadline = date("Y-m-d", strtotime($_POST['deadline']));

    $_SESSION['last_added_task'] = $title;

    $stmt = $conn->prepare("INSERT INTO tasks (user_id, title, description, deadline) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isss", $user_id, $title, $description, $deadline);

    if ($stmt->execute()) {
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Fout bij invoegen: " . $stmt->error;
    }
}
?>
