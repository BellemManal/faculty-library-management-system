<?php
session_start();

if(!isset($_SESSION['user_id'])){
    header("Location: ../auth/login.php");
    exit();
}


if($_SESSION['role'] != "librarian" && $_SESSION['role'] != "admin"){
    die(" Access denied");
}

include("../config/db.php");

$id = $_GET['id'];


$conn->query("DELETE FROM books WHERE id=$id");

header("Location: list.php");
exit();
?>
