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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pendaftar</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 600px;
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
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center">Detail Pendaftar</h2>
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
                <td><strong>Jenis Kelamin</strong></td>
                <td>: <?php echo $row['jenis_kelamin']; ?></td>
            </tr>
            <tr>
                <td><strong>Tempat Lahir</strong></td>
                <td>: <?php echo $row['tempat_lahir']; ?></td>
            </tr>
            <tr>
                <td><strong>Tanggal Lahir</strong></td>
                <td>: <?php echo $row['tanggal_lahir']; ?></td>
            </tr>
            <tr>
                <td><strong>Alamat Lengkap</strong></td>
                <td>: <?php echo $row['alamat_lengkap']; ?></td>
            </tr>
            <tr>
                <td><strong>Nomor Telepon</strong></td>
                <td>: <?php echo $row['nomor_telepon']; ?></td>
            </tr>
            <tr>
                <td><strong>Agama</strong></td>
                <td>: <?php echo $row['agama']; ?></td>
            </tr>
            <tr>
                <td><strong>Nama Ayah</strong></td>
                <td>: <?php echo $row['nama_ayah']; ?></td>
            </tr>
            <tr>
                <td><strong>Pekerjaan Ayah</strong></td>
                <td>: <?php echo $row['pekerjaan_ayah']; ?></td>
            </tr>
            <tr>
                <td><strong>Pendidikan Ayah</strong></td>
                <td>: <?php echo $row['pendidikan_ayah']; ?></td>
            </tr>
            <tr>
                <td><strong>Penghasilan Ayah</strong></td>
                <td>: <?php echo $row['penghasilan_ayah']; ?></td>
            </tr>
            <tr>
                <td><strong>Nama Ibu</strong></td>
                <td>: <?php echo $row['nama_ibu']; ?></td>
            </tr>
            <tr>
                <td><strong>Pekerjaan Ibu</strong></td>
                <td>: <?php echo $row['pekerjaan_ibu']; ?></td>
            </tr>
            <tr>
                <td><strong>Pendidikan Ibu</strong></td>
                <td>: <?php echo $row['pendidikan_ibu']; ?></td>
            </tr>
            <tr>
                <td><strong>Penghasilan Ibu</strong></td>
                <td>: <?php echo $row['penghasilan_ibu']; ?></td>
            </tr>
            <tr>
                <td><strong>HP Orang Tua</strong></td>
                <td>: <?php echo $row['hp_orangtua']; ?></td>
            </tr>
            <tr>
                <td><strong>Asal Sekolah</strong></td>
                <td>: <?php echo $row['asal_sekolah']; ?></td>
            </tr>
            <tr>
                <td><strong>Alamat Sekolah</strong></td>
                <td>: <?php echo $row['alamat_sekolah']; ?></td>
            </tr>
            <tr>
                <td><strong>Pilihan Program</strong></td>
                <td>: <?php echo $row['pilihan_program']; ?></td>
            </tr>
            <tr>
                <td><strong>Waktu Pendaftaran</strong></td>
                <td>: <?php echo $waktu_pendaftaran_formatted; ?> (WIB)</td>
            </tr>
            <tr>
                <td><strong>Status Verifikasi</strong></td>
                <td>: <?php echo $row['status_verifikasi']; ?></td>
            </tr>
            <tr>
                <td><strong>Status Pembayaran Pendaftaran</strong></td>
                <td>: <?php echo $row['status_pembayaran_pendaftaran']; ?></td>
            </tr>
            <tr>
                <td><strong>Status Pembayaran Daftar Ulang</strong></td>
                <td>: <?php echo $row['status_pembayaran_daftar_ulang']; ?></td>
            </tr>
        </table>
    </div>
</body>
</html>