<?php
include 'db_connection.php';
include 'session.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("UPDATE tasks SET is_done = 1 WHERE id = ? AND user_id = ?");
    $stmt->bind_param("ii", $id, $_SESSION['user_id']);
    $stmt->execute();
}
header("Location: dashboard.php");
?>
