<?php
include('config.php');

if (!isset($_GET['id'])) {
    echo "Error: ID tidak ditemukan.";
    exit();
}

$id = $_GET['id'];
$query = "SELECT * FROM pendaftaran WHERE id = '$id'";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $nama_lengkap = $row['nama_lengkap'];
    $waktu_pendaftaran = new DateTime($row['waktu_pendaftaran'], new DateTimeZone('Asia/Jakarta'));
    $waktu_pendaftaran_formatted = $waktu_pendaftaran->format('Y-m-d H:i:s');
    $bulan_tahun = $waktu_pendaftaran->format('my');
    $no_pendaftaran = "201-" . $bulan_tahun . "-" . str_pad($id, 3, '0', STR_PAD_LEFT);
} else {
    echo "Error: Data pendaftaran tidak ditemukan.";
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Pendaftaran Berhasil</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        .card {
            border: 2px solid #007bff;
            border-radius: 15px;
        }
        .card-header {
            background: linear-gradient(45deg, #007bff, #00c6ff);
            color: white;
            font-size: 1.5em;
            border-radius: 15px 15px 0 0;
        }
        .card-body {
            font-size: 1.2em;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="card shadow-lg">
            <div class="card-header text-center">
                <h2>Pendaftaran Berhasil</h2>
            </div>
            <div class="card-body text-center">
                <p>Terima kasih <strong><?php echo $nama_lengkap; ?></strong> telah mendaftar.</p>
                <p>Nomor Pendaftaran Anda adalah <strong><?php echo $no_pendaftaran; ?></strong>.</p>
                <p>Waktu Pendaftaran: <strong><?php echo $waktu_pendaftaran_formatted; ?> (WIB)</strong></p>
                <a href="cetak_pendaftaran.php?id=<?php echo $id; ?>" class="btn btn-primary mt-3">Cetak Pendaftaran</a>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>