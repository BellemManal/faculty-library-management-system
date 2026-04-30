<?php
include("../config/db.php");
session_start();

$result = $conn->query("SELECT * FROM books");
?>

<h2>📚 Books List</h2>

<a href="../dashboard.php">⬅ Back</a>
<br><br>

<table border="1" cellpadding="10">
    <tr>
        <th>Title</th>
        <th>Author</th>
        <th>ISBN</th>
        <th>Total</th>
        <th>Available</th>
        <th>Actions</th>
    </tr>

    <?php while($row = $result->fetch_assoc()): ?>
    <tr>
        <td><?= $row['title'] ?></td>
        <td><?= $row['author'] ?></td>
        <td><?= $row['isbn'] ?></td>
        <td><?= $row['total_copies'] ?></td>
        <td><?= $row['available_copies'] ?></td>
        <td>
            <a href="edit.php?id=<?= $row['id'] ?>">Edit</a> |
            <a href="delete.php?id=<?= $row['id'] ?>">Delete</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>

<br>
<a href="add.php">➕ Add New Book</a>
