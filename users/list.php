<?php
session_start();

if(!isset($_SESSION['user_id'])){
    header("Location: ../auth/login.php");
    exit();
}

include("../config/db.php");


if($_SESSION['role'] != "admin"){
    die(" Access denied");
}

$result = $conn->query("SELECT * FROM users");
?>

<h2> Users List</h2>

<table border="1" cellpadding="10">
<tr>
    <th>Name</th>
    <th>Email</th>
    <th>Role</th>
    <th>Status</th>
</tr>

<?php while($row = $result->fetch_assoc()): ?>
<tr>
    <td><?= $row['name'] ?></td>
    <td><?= $row['email'] ?></td>
    <td><?= $row['role'] ?></td>

    <td>
        <?= $row['active'] == 1 ? "Active" : "Inactive" ?>
    </td>
</tr>
<?php endwhile; ?>
</table>
