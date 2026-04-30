<?php
session_start();
include("../config/db.php");

$message = "";

if (isset($_POST['register'])) {

    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $role = $_POST['role'];

   
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    
    $sql = "INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $name, $email, $hashed_password, $role);

    if ($stmt->execute()) {
        $message = "✅ Registered successfully!";
    } else {
        $message = "❌ Error: Email already exists!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>

<h2>Register</h2>

<form method="POST">

    <label>Name:</label><br>
    <input type="text" name="name" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>

    <label>Password:</label><br>
    <input type="password" name="password" required><br><br>

    <label>Role:</label><br>
    <select name="role">
        <option value="student">Student</option>
        <option value="faculty">Faculty</option>
        <option value="librarian">Librarian</option>
        <option value="admin">Admin</option>
    </select><br><br>

    <button type="submit" name="register">Register</button>

</form>

<?php if ($message != ""): ?>
    <p><?php echo $message; ?></p>
<?php endif; ?>

</body>
</html>
