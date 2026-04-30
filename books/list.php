<?php
include("../config/db.php");
session_start();

$result = $conn->query("SELECT * FROM books");
?>

<h2>Books List</h2>

<a href="../dashboard.php">⬅ Back</a>

<table border="1">
    <tr>
        <th>Title</th>
        <th>Author</th>
        <th>Available Copies</th>
    </tr>

    <?php while($row = $result->fetch_assoc()): ?>
    <tr>
        <td><?php echo $row['title']; ?></td>
        <td><?php echo $row['author']; ?></td>
        <td><?php echo $row['available_copies']; ?></td>
    </tr>
    <?php endwhile; ?>
</table>
