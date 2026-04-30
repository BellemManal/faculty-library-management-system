<?php
session_start();

if(!isset($_SESSION['user_id'])){
    header("Location: auth/login.php");
    exit();
}
?>

<?php
include("../config/db.php");
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$book_id = $_GET['book_id'];


$book = $conn->query("SELECT * FROM books WHERE id=$book_id")->fetch_assoc();

if ($book['available_copies'] <= 0) {
    die(" No copies available");
}


$role = $_SESSION['role'];

if ($role == "faculty") {
    $days = 30;
} else {
    $days = 14;
}

$borrow_date = date("Y-m-d");
$due_date = date("Y-m-d", strtotime("+$days days"));


$conn->query("INSERT INTO loans (user_id, book_id, borrow_date, due_date)
VALUES ($user_id, $book_id, '$borrow_date', '$due_date')");


$conn->query("UPDATE books SET available_copies = available_copies - 1 WHERE id=$book_id");

header("Location: ../books/list.php");
exit();
?>
