<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

include('../config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $school_name = mysqli_real_escape_string($conn, $_POST['school_name']);
    $school_address = mysqli_real_escape_string($conn, $_POST['school_address']);
    $school_phone = mysqli_real_escape_string($conn, $_POST['school_phone']);

    $query = "UPDATE school_profile SET 
              school_name='$school_name', 
              school_address='$school_address', 
              school_phone='$school_phone'";

    if (mysqli_query($conn, $query)) {
        $success = "Profil sekolah berhasil diperbarui.";
    } else {
        $error = "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}

$query = "SELECT * FROM school_profile LIMIT 1";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$content = 'profil_sekolah_content.php';
include('layout.php');
?>