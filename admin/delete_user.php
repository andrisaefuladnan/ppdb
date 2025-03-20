<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}
include('../config.php');

if (!isset($_GET['id'])) {
    echo "Error: ID tidak ditemukan.";
    exit();
}

$id = $_GET['id'];

$query = "DELETE FROM admin_users WHERE id='$id'";
if (mysqli_query($conn, $query)) {
    header('Location: manajemen_user.php');
    exit();
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}
?>