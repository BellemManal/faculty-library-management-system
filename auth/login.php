<?php
session_start();
include("../config/db.php");

$error = "";

// If the user presses the Login button
if (isset($_POST['login'])) {

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

   // Searching for the user in the database
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

 // If the user finds
    if ($result->num_rows == 1) {

        $user = $result->fetch_assoc();

        // Password verification
        if (password_verify($password, $user['password'])) {

            // Store user data in session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['role'] = $user['role'];

            // Convert it to the dashboard
            header("Location: ../dashboard.php");
            exit();

        } else {
            $error = "❌ Wrong password!";
        }

    } else {
        $error = "❌ User not found!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<h2>Login</h2>

<form method="POST">

    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>

    <label>Password:</label><br>
    <input type="password" name="password" required><br><br>

    <button type="submit" name="login">Login</button>

</form>

<?php if ($error != ""): ?>
    <p style="color:red;"><?php echo $error; ?></p>
<?php endif; ?>

</body>
</html>
