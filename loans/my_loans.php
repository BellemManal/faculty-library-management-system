<?php
include("../config/db.php");
session_start();

$user_id = $_SESSION['user_id'];

$result = $conn->query("
SELECT loans.*, books.title 
FROM loans 
JOIN books ON loans.book_id = books.id
WHERE user_id=$user_id
");
?>

<h2>📄 My Loans</h2>

<table border="1">
<tr>
    <th>Book</th>
    <th>Borrow Date</th>
    <th>Due Date</th>
    <th>Status</th>
    <th>Action</th>
</tr>

<?php while($row = $result->fetch_assoc()): ?>
<tr>
    <td><?= $row['title'] ?></td>
    <td><?= $row['borrow_date'] ?></td>
    <td><?= $row['due_date'] ?></td>
    <td><?= $row['status'] ?></td>

    <td>
        <?php if($row['status'] == 'borrowed'): ?>
        <a href="return.php?loan_id=<?= $row['id'] ?>">
            🔄 Return
        </a>
        <?php endif; ?>
    </td>
</tr>
<?php endwhile; ?>

</table>
