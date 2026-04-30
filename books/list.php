<?php
session_start();

if(!isset($_SESSION['user_id'])){
    header("Location: ../auth/login.php");
    exit();
}

include("../config/db.php");


if($_SESSION['role'] != "librarian" && $_SESSION['role'] != "admin"){
    die("Access denied");
}


$page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 5;
$offset = ($page - 1) * $limit;

$result = $conn->query("SELECT * FROM books LIMIT $limit OFFSET $offset");
?>

<h2> Books List</h2>

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


<a href="?page=1">1</a>
<a href="?page=2">2</a>

<br><br>

<a href="add.php">➕ Add New Book</a>
