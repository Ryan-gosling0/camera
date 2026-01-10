<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: auth/login.php");
    exit;
}

include("config/db.php");
?>
<link rel="icon" type="image/x-icon" href="assets/img/slogo.jpg">
<?php
$count = $conn->query("SELECT COUNT(*) AS total FROM contact")
              ->fetch_assoc()['total'];

$contacts = $conn->query("SELECT * FROM contact ORDER BY date_creation DESC");
?>

<link rel="stylesheet" href="assets/css/style.css">

<div class="sidebar">
    <h2>SmartProtect</h2>
    <a href="dashboard.php">camera surveillance</a>
    <a href="tasks.php">alarme</a>
    <a href="contacts.php">Contacts</a>
    <a href="offres.php">Offers</a>
    <a href="devis.php">Commander</a>
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
        <h2>Contacts</h2>

        <div class="cards">
            <div class="card">
                <h3>Total Contacts</h3>
                <p><?= $count ?></p>
            </div>
        </div>

        <br>

        <table>
            <tr>
                <th>Email</th>
                <th>Phone</th>
                <th>Company</th>
                <th>Address</th>
            </tr>

            <?php while ($c = $contacts->fetch_assoc()) { ?>
            <tr>
                <td><?= $c['email'] ?></td>
                <td><?= $c['telephone'] ?></td>
                <td><?= $c['nom_compagne'] ?></td>
                <td><?= $c['adresse'] ?></td>
            </tr>
            <?php } ?>
        </table>
    </div>
</div>
