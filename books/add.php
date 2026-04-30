<?php
include("../config/db.php");

if(isset($_POST['submit'])) {

    $title = $_POST['title'];
    $author = $_POST['author'];
    $isbn = $_POST['isbn'];
    $total = $_POST['total'];

    $sql = "INSERT INTO books (title, author, isbn, total_copies, available_copies)
            VALUES ('$title', '$author', '$isbn', '$total', '$total')";

    $conn->query($sql);

    header("Location: list.php");
    exit();
}
?>

<h2>➕ Add Book</h2>

<form method="POST">
    Title: <input type="text" name="title"><br><br>
    Author: <input type="text" name="author"><br><br>
    ISBN: <input type="text" name="isbn"><br><br>
    Total Copies: <input type="number" name="total"><br><br>

    <button type="submit" name="submit">Add</button>
</form>
