<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}
$content = 'detail_pendaftar_content.php';
include('layout.php');
?>