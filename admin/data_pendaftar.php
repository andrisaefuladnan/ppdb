<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}
$content = 'data_pendaftar_content.php';
include('layout.php');
?>