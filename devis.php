
<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: auth/login.php");
    exit;
}
?>

<link rel="stylesheet" href="assets/css/style.css">
<link rel="icon" type="image/x-icon" href="assets/img/slogo.jpg">

<div class="sidebar">
    <h2>SmartProtect</h2>
    <a href="dashboard.php">camera surveillance</a>
    <a href="tasks.php">alarme</a>
    <a href="contacts.php">Contacts</a>
    <a href="offres.php">Offers</a>
    <a href="devis.php">commander</a>
</div>

<div class="main">
    <div class="topbar">
        <div style="display:flex;align-items:center;gap:10px;">
            <img src="assets/img/slogo.jpg" width="200" height="200" style="border-radius:30%;">
            <span>
                Welcome <strong><?= $_SESSION['user']['prenom']; ?></strong>
            </span>
        </div>
    </div>

<div class="content">
<h2>commander</h2>
    <form action="send.php" method="post">
   
        <h3>Remplissez vos coordonnées et nous vous contacterons dès que possible.</h3>
        <input type="text" name="name" placeholder="Your Name" required><br>
        <input type="email" name="email" placeholder="Your Email" required><br>
        <textarea name="message" placeholder="Your Message" required></textarea><br>
        <button type="submit">Send</button>
   
    </form>

</div>
</div>
