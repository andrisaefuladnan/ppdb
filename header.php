<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPDB</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .container {
            flex: 1;
        }
        .navbar {
            background-color: #007bff;
        }
        .navbar-brand, .navbar-nav .nav-link {
            color: white !important;
        }
        .dropdown-menu {
            background-color: #007bff;
        }
        .dropdown-menu .dropdown-item {
            color: white !important;
        }
        .dropdown-menu .dropdown-item:hover {
            background-color: #0056b3;
        }
        .footer {
            background-color: #007bff;
            color: white;
            padding: 20px 0;
            text-align: center;
            margin-top: auto;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="/ppdb/">PPDB</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/ppdb/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/ppdb/daftar.php">Daftar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/ppdb/cek_pendaftaran.php">Cek Pendaftaran</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/ppdb/cetak_bukti_pendaftaran.php">Cetak Bukti Pendaftaran</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/ppdb/admin/login.php">Login Admin</a>
                </li>
            </ul>
        </div>
    </nav>