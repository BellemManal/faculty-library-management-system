<?php
session_start();


if (!isset($_SESSION['user_id'])) {
    header("Location: auth/login.php");
    exit();
}

$name = $_SESSION['name'];
$role = $_SESSION['role'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial;
            text-align: center;
            background-color: #f4f4f4;
        }

        .box {
            background: white;
            padding: 20px;
            margin: 50px auto;
            width: 60%;
            border-radius: 10px;
        }

        a {
            display: block;
            margin: 10px;
            text-decoration: none;
            color: white;
            background: #007BFF;
            padding: 10px;
            border-radius: 5px;
        }

        a.logout {
            background: red;
        }
    </style>
</head>
<body>

<div class="box">

    <h1>Welcome, <?php echo $name; ?> 👋</h1>
    <p><b>Role:</b> <?php echo $role; ?></p>

    <hr>

    <h3>Menu</h3>

    <a href="books/list.php">📚 View Books</a>
    <a href="loans/my_loans.php">🔄 My Loans</a>

    <?php if ($role == "librarian" || $role == "admin"): ?>
        <a href="books/add.php">➕ Add Book</a>
    <?php endif; ?>

    <?php if ($role == "admin"): ?>
        <a href="users/list_users.php">👤 Manage Users</a>
    <?php endif; ?>

    <a class="logout" href="auth/logout.php">🚪 Logout</a>

</div>

</body>
</html>
