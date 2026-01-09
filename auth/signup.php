
<?php
include("../config/db.php");
if(isset($_POST['signup'])){
  $nom=$_POST['nom'];
  $prenom=$_POST['prenom'];
  $email=$_POST['email'];
  $pass=password_hash($_POST['password'],PASSWORD_DEFAULT);
  $conn->query("INSERT INTO utilisateur(nom,prenom,email,mdp) VALUES('$nom','$prenom','$email','$pass')");
  header("Location: login.php");
  exit;
}
?>
<link rel="stylesheet" href="../assets/css/style.css">
<link rel="icon" type="image/x-icon" href="../assets/img/slogo.jpg">
<div class="container">
<h2>Sign Up</h2>
<form method="post">
<input name="nom" placeholder="First name" required>
<input name="prenom" placeholder="Last name" required>
<input type="email" name="email" placeholder="Email" required>
<input type="password" name="password" placeholder="Password" required>
<button name="signup">Create Account</button>
</form>
<p>Already registered? <a href="login.php">Sign in</a></p>
</div>
