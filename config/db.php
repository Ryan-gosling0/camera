<?php
$conn = new mysqli("localhost", "root", "", "crm_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// NO session_start() here!
?>
