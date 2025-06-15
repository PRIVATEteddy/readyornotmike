<?php
include 'db_connection.php';
include 'session.php';

$user_id = $_SESSION['user_id'];

$stmt = $conn->prepare("SELECT * FROM tasks WHERE user_id = ? ORDER BY created_at DESC");
$stmt->bind_param("i", $user_id); 
$stmt->execute(); 

$result = $stmt->get_result(); 
$tasks = $result->fetch_all(MYSQLI_ASSOC); 





?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>document</title>
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>
    <div class="heading">
                <h2 style="font-style: 'Hervetica';">Ttodo lijst</h2>
        </div>

   <form method="POST" action="addtask.php">
    <input type="text" name="title" placeholder="New task" required>
       <textarea name="description" placeholder="Beschrijving"></textarea><br>
    <input type="date" name="deadline" required><br>
    <button type="submit">ad</button>
    <ul>
<?php
if (isset($_SESSION['last_added_task'])) {
    echo "<p> Laatste taak toegevoegd: " . htmlspecialchars($_SESSION['last_added_task']) . "</p>";
    unset($_SESSION['last_added_task']);
}
?>


    </form>
<?php foreach ($tasks as $task): ?>
  <li>
        <strong><?= htmlspecialchars($task['title']) ?></strong><br>
        <?= nl2br(htmlspecialchars($task['description'])) ?><br>
        deadline: <?= date("d-m-Y", strtotime($task['deadline'])) ?><br>
        <?php if ($task['is_done']): ?>
             voltooid
        <?php else: ?>
            <a href="mark_done.php?id=<?= $task['id'] ?>">mark voltooitd</a>
        <?php endif; ?>
    </li>
<?php endforeach; ?>
</ul>






<a href="logout.php">uilogge</a>

</body>
</html>