<?php
session_start();
include("config/db.php");
?>
<link rel="icon" type="image/x-icon" href="assets/img/slogo.jpg">
<?php
/* SIMPLE ADMIN CHECK (you can improve later) */
if (!isset($_SESSION['user'])) {
    header("Location: auth/login.php");
    exit;
}

/* ADD CONTACT */
if (isset($_POST['add'])) {
    $email = $_POST['email'];
    $tel = $_POST['telephone'];
    $adr = $_POST['adresse'];
    $comp = $_POST['nom_compagne'];

    $conn->query("INSERT INTO contact(email,telephone,adresse,nom_compagne)
                  VALUES('$email','$tel','$adr','$comp')");
}

/* UPDATE CONTACT */
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $email = $_POST['email'];
    $tel = $_POST['telephone'];
    $adr = $_POST['adresse'];
    $comp = $_POST['nom_compagne'];

    $conn->query("UPDATE contact 
                  SET email='$email', telephone='$tel', adresse='$adr', nom_compagne='$comp'
                  WHERE id_contact=$id");
}

/* GET CONTACTS */
$contacts = $conn->query("SELECT * FROM contact ORDER BY date_creation DESC");
?>

<link rel="stylesheet" href="assets/css/style.css">

<h2>Admin – Manage Contacts</h2>

<!-- ADD CONTACT -->
<form method="post" style="margin-bottom:20px;">
    <input name="email" placeholder="Email" required>
    <input name="telephone" placeholder="Telephone" required>
    <input name="nom_compagne" placeholder="Company" required>
    <input name="adresse" placeholder="Address" required>
    <button name="add">Add Contact</button>
</form>

<!-- CONTACT LIST -->
<table border="1" width="100%" cellpadding="10">
<tr>
    <th>Email</th>
    <th>Phone</th>
    <th>Company</th>
    <th>Address</th>
    <th>Action</th>
</tr>

<?php while($c = $contacts->fetch_assoc()) { ?>
<tr>
<form method="post">
    <td><input name="email" value="<?= $c['email'] ?>"></td>
    <td><input name="telephone" value="<?= $c['telephone'] ?>"></td>
    <td><input name="nom_compagne" value="<?= $c['nom_compagne'] ?>"></td>
    <td><input name="adresse" value="<?= $c['adresse'] ?>"></td>
    <td>
        <input type="hidden" name="id" value="<?= $c['id_contact'] ?>">
        <button name="update">Update</button>
    </td>
</form>
</tr>
<?php } ?>
</table>
