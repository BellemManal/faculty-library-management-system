<?php
include("../config/db.php");
session_start();

$result = $conn->query("SELECT * FROM books");
?>

<h2>📚 Available Books</h2>

<a href="../dashboard.php">⬅ Back to Dashboard</a>

<table border="1" cellpadding="10">
    <tr>
        <th>Title</th>
        <th>Author</th>
        <th>ISBN</th>
        <th>Available</th>
        <th>Action</th>
    </tr>

    <?php while($row = $result->fetch_assoc()): ?>
    <tr>
        <td><?= $row['title'] ?></td>
        <td><?= $row['author'] ?></td>
        <td><?= $row['isbn'] ?></td>
        <td><?= $row['available_copies'] ?></td>

        <td>
            <?php if ($row['available_copies'] > 0): ?>
                <a href="../loans/borrow.php?book_id=<?= $row['id'] ?>">
                    📖 Borrow
                </a>
            <?php else: ?>
                ❌ Not Available
            <?php endif; ?>
        </td>
    </tr>
    <?php endwhile; ?>
</table>
