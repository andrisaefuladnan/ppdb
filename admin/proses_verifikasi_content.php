<?php
include('../config.php');

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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $status_verifikasi = mysqli_real_escape_string($conn, $_POST['status_verifikasi']);
    $status_pembayaran_pendaftaran = mysqli_real_escape_string($conn, $_POST['status_pembayaran_pendaftaran']);
    $status_pembayaran_daftar_ulang = mysqli_real_escape_string($conn, $_POST['status_pembayaran_daftar_ulang']);

    $query = "UPDATE pendaftaran SET 
              status_verifikasi='$status_verifikasi', 
              status_pembayaran_pendaftaran='$status_pembayaran_pendaftaran', 
              status_pembayaran_daftar_ulang='$status_pembayaran_daftar_ulang' 
              WHERE id='$id'";

    if (mysqli_query($conn, $query)) {
        header('Location: verifikasi.php');
        exit();
    } else {
        $error = "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proses Verifikasi</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 800px;
            margin-top: 50px;
            background: #fff;
            padding: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        .container h2 {
            margin-bottom: 30px;
        }
        .btn-primary {
            background: linear-gradient(45deg, #007bff, #00c6ff);
            border: none;
        }
        .btn-primary:hover {
            background: linear-gradient(45deg, #0062cc, #0095ff);
        }
        .form-control {
            border-radius: 5px;
        }
        .form-control:focus {
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
            border-color: #007bff;
        }
        .table th, .table td {
            border: none;
        }
        .table td {
            padding: .5rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center">Proses Verifikasi</h2>
        <?php if (isset($error)) : ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>
        <table class="table">
            <tr>
                <td><strong>Nomor Pendaftaran</strong></td>
                <td>: <?php echo $no_pendaftaran; ?></td>
            </tr>
            <tr>
                <td><strong>Nama Lengkap</strong></td>
                <td>: <?php echo $row['nama_lengkap']; ?></td>
            </tr>
            <tr>
                <td><strong>Asal Sekolah</strong></td>
                <td>: <?php echo $row['asal_sekolah']; ?></td>
            </tr>
            <tr>
                <td><strong>Pilihan Program</strong></td>
                <td>: <?php echo $row['pilihan_program']; ?></td>
            </tr>
        </table>
        <form action="proses_verifikasi.php?id=<?php echo $id; ?>" method="post">
            <div class="form-group">
                <label>Status Verifikasi</label>
                <select class="form-control" name="status_verifikasi" required>
                    <option value="Belum Diverifikasi" <?php if ($row['status_verifikasi'] == 'Belum Diverifikasi') echo 'selected'; ?>>Belum Diverifikasi</option>
                    <option value="Diterima" <?php if ($row['status_verifikasi'] == 'Diterima') echo 'selected'; ?>>Diterima</option>
                    <option value="Ditolak" <?php if ($row['status_verifikasi'] == 'Ditolak') echo 'selected'; ?>>Ditolak</option>
                </select>
            </div>
            <div class="form-group">
                <label>Status Pembayaran Pendaftaran</label>
                <select class="form-control" name="status_pembayaran_pendaftaran" required>
                    <option value="Belum Bayar" <?php if ($row['status_pembayaran_pendaftaran'] == 'Belum Bayar') echo 'selected'; ?>>Belum Bayar</option>
                    <option value="Sudah Bayar" <?php if ($row['status_pembayaran_pendaftaran'] == 'Sudah Bayar') echo 'selected'; ?>>Sudah Bayar</option>
                </select>
            </div>
            <div class="form-group">
                <label>Status Pembayaran Daftar Ulang</label>
                <select class="form-control" name="status_pembayaran_daftar_ulang" required>
                    <option value="Belum Bayar" <?php if ($row['status_pembayaran_daftar_ulang'] == 'Belum Bayar') echo 'selected'; ?>>Belum Bayar</option>
                    <option value="Sudah Bayar" <?php if ($row['status_pembayaran_daftar_ulang'] == 'Sudah Bayar') echo 'selected'; ?>>Sudah Bayar</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Update</button>
        </form>
    </div>
</body>
</html>