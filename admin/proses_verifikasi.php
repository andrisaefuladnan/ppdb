<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}
$content = 'proses_verifikasi_content.php';
include('layout.php');
?>