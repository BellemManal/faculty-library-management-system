<?php
session_start();

if(!isset($_SESSION['user_id'])){
    header("Location: ../auth/login.php");
    exit();
}

include("../config/db.php");

$result = $conn->query("SELECT * FROM books");
?>

<h2> Available Books</h2>

<a href="../dashboard.php">⬅ Back to Dashboard</a>

<br><br>

<table border="1" cellpadding="10">
    <tr>
        <th>Title</th>
        <th>Author</th>
        <th>ISBN</th>
        <th>Available</th>
        <th>Action</th>
    </tr>

    <?php if($result->num_rows > 0): ?>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['title'] ?></td>
            <td><?= $row['author'] ?></td>
            <td><?= $row['isbn'] ?></td>
            <td><?= $row['available_copies'] ?></td>

            <td>
                <?php if ($row['available_copies'] > 0): ?>
                    <a href="../loans/borrow.php?book_id=<?= $row['id'] ?>">
                         Borrow
                    </a>
                <?php else: ?>
                     Not Available
                <?php endif; ?>
            </td>
        </tr>
        <?php endwhile; ?>
    <?php else: ?>
        <tr>
            <td colspan="5">No books available</td>
        </tr>
    <?php endif; ?>

</table>
