<?php
include("../config/db.php");

$id = $_GET['id'];

$result = $conn->query("SELECT * FROM books WHERE id=$id");
$book = $result->fetch_assoc();

if(isset($_POST['update'])) {

    $title = $_POST['title'];
    $author = $_POST['author'];
    $isbn = $_POST['isbn'];
    $total = $_POST['total'];

    $conn->query("UPDATE books 
                  SET title='$title', author='$author', isbn='$isbn', total_copies='$total'
                  WHERE id=$id");

    header("Location: list.php");
    exit();
}
?>

<h2>✏️ Edit Book</h2>

<form method="POST">
    Title: <input type="text" name="title" value="<?= $book['title'] ?>"><br><br>
    Author: <input type="text" name="author" value="<?= $book['author'] ?>"><br><br>
    ISBN: <input type="text" name="isbn" value="<?= $book['isbn'] ?>"><br><br>
    Total Copies: <input type="number" name="total" value="<?= $book['total_copies'] ?>"><br><br>

    <button type="submit" name="update">Update</button>
</form>
