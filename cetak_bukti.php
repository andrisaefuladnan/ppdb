<?php include('config.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>PPDB - Cetak Bukti Pendaftaran</title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
    <h1>Cetak Bukti Pendaftaran</h1>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['nama_lengkap'])) {
        $nama_lengkap = $_GET['nama_lengkap'];
        $sql = "SELECT * FROM pendaftar WHERE nama_lengkap = '$nama_lengkap'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "Nama Lengkap: " . $row["nama_lengkap"]. "<br>";
                echo "Jenis Kelamin: " . $row["jenis_kelamin"]. "<br>";
                echo "Tempat Lahir: " . $row["tempat_lahir"]. "<br>";
                echo "Tanggal Lahir: " . $row["tanggal_lahir"]. "<br>";
                echo "Alamat Lengkap: " . $row["alamat_lengkap"]. "<br>";
                echo "Nomor Telepon/HP: " . $row["nomor_telepon"]. "<br>";
                echo "Agama: " . $row["agama"]. "<br>";
                echo "Asal Sekolah: " . $row["asal_sekolah"]. "<br>";
                echo "Alamat Sekolah: " . $row["alamat_sekolah"]. "<br>";
                echo "Pilihan Program: " . $row["pilihan_program"]. "<br>";
                echo "<button onclick='window.print()'>Cetak</button>";
            }
        } else {
            echo "0 results";
        }
    }
    $conn->close();
    ?>
</body>
</html>