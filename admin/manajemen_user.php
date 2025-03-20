<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}
$content = 'manajemen_user_content.php';
include('layout.php');
?>