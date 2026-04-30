<?php
session_start();

if(!isset($_SESSION['user_id'])){
    header("Location: ../auth/login.php");
    exit();
}

include("../config/db.php");

$loan_id = $_GET['loan_id'];


$loan = $conn->query("SELECT * FROM loans WHERE id=$loan_id")->fetch_assoc();

if(!$loan){
    die("Loan not found");
}


$conn->query("
UPDATE books 
SET available_copies = available_copies + 1 
WHERE id=" . $loan['book_id']
);


$conn->query("
UPDATE loans 
SET status='returned' 
WHERE id=$loan_id
");

header("Location: my_loans.php");
exit();
?>
