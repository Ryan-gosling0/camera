<?php
session_start();
include("../config/db.php");
$error = "";

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $pass = $_POST['password'];
    
    $stmt = $conn->prepare("SELECT * FROM utilisateur WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $u = $result->fetch_assoc();
    $stmt->close();
    
    if($u && password_verify($pass, $u['mdp'])){
        $_SESSION['user'] = $u;
        header("Location: ../dashboard.php");
        exit;
    } else {
        $error = "Invalid login credentials";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Sign In</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="icon" type="image/x-icon" href="../assets/img/slogo.jpg">
</head>
<body>
<div class="container">
    <h2>Sign In</h2>
    <form method="post">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="login">Login</button>
    </form>
    <p>New user? <a href="signup.php">Sign up</a></p>
    <?php if(isset($error)): ?>
        <div class="error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>
</div>
</body>
</html>
