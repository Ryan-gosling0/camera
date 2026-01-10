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
        <div class="user-info">
            <img src="assets/img/slogo.jpg" class="user-avatar" alt="User Avatar">
            <span>
                Welcome <strong><?= $_SESSION['user']['prenom']; ?></strong>
            </span>
        </div>
    </div>

<div class="content">
<h2>commander</h2>
<?php
$order_summary = "";
if (!empty($_SESSION['cart'])) {
    $order_summary .= "I would like to order the following items:\n";
    $total = 0;
    foreach ($_SESSION['cart'] as $item) {
        $subtotal = $item['price'] * $item['quantity'];
        $order_summary .= "- " . $item['name'] . " (x" . $item['quantity'] . "): " . $subtotal . " dt\n";
        $total += $subtotal;
    }
    $order_summary .= "\nTotal Price: " . $total . " dt";
}
?>
    <form action="send.php" method="post">
   
        <h3>Remplissez vos coordonnées et nous vous contacterons dès que possible.</h3>
        <input type="text" name="name" placeholder="Your Name" value="<?= htmlspecialchars($_SESSION['user']['prenom'].' '.$_SESSION['user']['nom']) ?>" required><br>
        <input type="email" name="email" placeholder="Your Email" required><br>
        <textarea name="message" placeholder="Your Message" required style="width:100%; height:150px; padding:10px; margin:10px 0; border-radius:8px; border:1px solid #ccc; font-family:'Poppins',sans-serif;"><?= htmlspecialchars($order_summary) ?></textarea><br>
        <button type="submit">Send</button>
   
    </form>

</div>
</div>
