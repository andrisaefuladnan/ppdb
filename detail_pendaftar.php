<?php
include('config.php');

// Mengambil profil sekolah dari database
$profil_query = "SELECT * FROM school_profile";
$profil_result = mysqli_query($conn, $profil_query);
if (!$profil_result) {
    die("Error: " . mysqli_error($conn));
}
$profil = mysqli_fetch_assoc($profil_result);

$school_name = $profil['school_name'];
$school_address = $profil['school_address'];
$school_phone = $profil['school_phone'];

if (!isset($_GET['id'])) {
    die("Error: ID tidak ditemukan.");
}

$id = $_GET['id'];
$query = "SELECT * FROM pendaftaran WHERE id = '$id'";
$result = mysqli_query($conn, $query);
if (!$result) {
    die("Error: " . mysqli_error($conn));
}

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $nama_lengkap = $row['nama_lengkap'];
    $jenis_kelamin = $row['jenis_kelamin'];
    $tempat_lahir = $row['tempat_lahir'];
    $tanggal_lahir = $row['tanggal_lahir'];
    $alamat_lengkap = $row['alamat_lengkap'];
    $nomor_telepon = $row['nomor_telepon'];
    $agama = $row['agama'];
    $nama_ayah = $row['nama_ayah'];
    $pekerjaan_ayah = $row['pekerjaan_ayah'];
    $pendidikan_ayah = $row['pendidikan_ayah'];
    $penghasilan_ayah = $row['penghasilan_ayah'];
    $nama_ibu = $row['nama_ibu'];
    $pekerjaan_ibu = $row['pekerjaan_ibu'];
    $pendidikan_ibu = $row['pendidikan_ibu'];
    $penghasilan_ibu = $row['penghasilan_ibu'];
    $hp_orangtua = $row['hp_orangtua'];
    $asal_sekolah = $row['asal_sekolah'];
    $alamat_sekolah = $row['alamat_sekolah'];
    $pilihan_program = $row['pilihan_program'];
    $status_verifikasi = $row['status_verifikasi'];
    $status_pembayaran_pendaftaran = $row['status_pembayaran_pendaftaran'];
    $status_pembayaran_daftar_ulang = $row['status_pembayaran_daftar_ulang'];
    $waktu_pendaftaran = new DateTime($row['waktu_pendaftaran'], new DateTimeZone('Asia/Jakarta'));
    $waktu_pendaftaran_formatted = $waktu_pendaftaran->format('Y-m-d H:i:s');
    $tanggal_pendaftaran = $waktu_pendaftaran->format('d');
    setlocale(LC_TIME, 'id_ID.utf8');
    $bulan_tahun = strftime('%B %Y', $waktu_pendaftaran->getTimestamp());
    $no_pendaftaran = "201-" . $waktu_pendaftaran->format('my') . "-" . str_pad($id, 3, '0', STR_PAD_LEFT);
} else {
    die("Error: Data pendaftaran tidak ditemukan.");
}
?>
<?php include('header.php'); ?>
<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header text-center">
            <h2>Detail Pendaftar</h2>
        </div>
        <div class="card-body">
            <!-- Tabel Informasi Pendaftaran -->
            <div style="margin-top: 20px;">
                <table class="table table-borderless text-left">
                    <tbody>
                        <tr>
                            <td style="width: 200px;"><strong>Nama Lengkap</strong></td>
                            <td style="width: 10px;">:</td>
                            <td><?php echo $nama_lengkap; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Asal Sekolah</strong></td>
                            <td>:</td>
                            <td><?php echo $asal_sekolah; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Pilihan Program</strong></td>
                            <td>:</td>
                            <td><?php echo $pilihan_program; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Waktu Pendaftaran</strong></td>
                            <td>:</td>
                            <td><?php echo $waktu_pendaftaran_formatted; ?> (WIB)</td>
                        </tr>
                        <tr>
                            <td><strong>Nomor Pendaftaran</strong></td>
                            <td>:</td>
                            <td><?php echo $no_pendaftaran; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <button class="btn btn-primary mt-3" onclick="printPage();">Cetak Bukti Pendaftaran</button>
        </div>
    </div>
</div>
<?php include('footer.php'); ?>

<script>
function printPage() {
    let printContents = `
        <html>
        <head>
            <title>Bukti Pendaftaran</title>
            <style>
                body { font-family: Arial, sans-serif; background-color: #f8f9fa; }
                .container { width: 100%; margin: 0 auto; padding: 20px; background-color: #fff; }
                .kop-surat { text-align: center; margin-bottom: 20px; }
                .kop-surat img { width: 100px; }
                .kop-surat h1, .kop-surat h2, .kop-surat p { margin: 5px 0; }
                .kop-surat hr { border: 1px solid #000; }
                .content { margin-top: 20px; }
                .content table { width: 100%; border-collapse: collapse; }
                .content th, .content td { text-align: left; padding: 8px; }
                .content th, .content td.bordered { border: 1px solid #ddd; }
                .content th, .content td.center { text-align: center; }
                .content th { background-color: #f2f2f2; }
                .footer { text-align: center; margin-top: 30px; }
                .no-border { border: none; }
                .bordered { border: 1px solid #ddd; }
                .text-center { text-align: center; }
                .left-align { text-align: left; }
                .signature { text-align: right; margin-top: 50px; margin-right: 50px; }
            </style>
        </head>
        <body>
            <div class="container">
                <div class="kop-surat">
                    <img src="dist/img/log.png" alt="Logo Sekolah">
                    <h1><?php echo $school_name; ?></h1>
                    <h2>Panitia Seleksi Penerimaan Murid Baru</h2>
                    <p><?php echo $school_address . ' Tel: ' . $school_phone; ?></p>
                    <hr>
                </div>
                <div class="content">
                    <h2 style="text-align: center;">Bukti Pendaftaran</h2>
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th class="center">Status Verifikasi</th>
                                <th class="center">Status Pembayaran Pendaftaran</th>
                                <th class="center">Status Pembayaran Daftar Ulang</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="center"><?php echo $status_verifikasi; ?></td>
                                <td class="center"><?php echo $status_pembayaran_pendaftaran; ?></td>
                                <td class="center"><?php echo $status_pembayaran_daftar_ulang; ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <div style="margin-top: 20px;">
                        <table class="no-border">
                            <tbody>
                                <tr>
                                    <td style="width: 200px;" class="left-align"><strong>Nama Lengkap</strong></td>
                                    <td style="width: 10px;" class="left-align">:</td>
                                    <td class="left-align"><?php echo $nama_lengkap; ?></td>
                                </tr>
                                <tr>
                                    <td class="left-align"><strong>Jenis Kelamin</strong></td>
                                    <td class="left-align">:</td>
                                    <td class="left-align"><?php echo $jenis_kelamin; ?></td>
                                </tr>
                                <tr>
                                    <td class="left-align"><strong>Tempat Lahir</strong></td>
                                    <td class="left-align">:</td>
                                    <td class="left-align"><?php echo $tempat_lahir; ?></td>
                                </tr>
                                <tr>
                                    <td class="left-align"><strong>Tanggal Lahir</strong></td>
                                    <td class="left-align">:</td>
                                    <td class="left-align"><?php echo $tanggal_lahir; ?></td>
                                </tr>
                                <tr>
                                    <td class="left-align"><strong>Alamat Lengkap</strong></td>
                                    <td class="left-align">:</td>
                                    <td class="left-align"><?php echo $alamat_lengkap; ?></td>
                                </tr>
                                <tr>
                                    <td class="left-align"><strong>Nomor Telepon</strong></td>
                                    <td class="left-align">:</td>
                                    <td class="left-align"><?php echo $nomor_telepon; ?></td>
                                </tr>
                                <tr>
                                    <td class="left-align"><strong>Agama</strong></td>
                                    <td class="left-align">:</td>
                                    <td class="left-align"><?php echo $agama; ?></td>
                                </tr>
                                <tr>
                                    <td class="left-align"><strong>Nama Ayah</strong></td>
                                    <td class="left-align">:</td>
                                    <td class="left-align"><?php echo $nama_ayah; ?></td>
                                </tr>
                                <tr>
                                    <td class="left-align"><strong>Pekerjaan Ayah</strong></td>
                                    <td class="left-align">:</td>
                                    <td class="left-align"><?php echo $pekerjaan_ayah; ?></td>
                                </tr>
                                <tr>
                                    <td class="left-align"><strong>Pendidikan Ayah</strong></td>
                                    <td class="left-align">:</td>
                                    <td class="left-align"><?php echo $pendidikan_ayah; ?></td>
                                </tr>
                                <tr>
                                    <td class="left-align"><strong>Penghasilan Ayah</strong></td>
                                    <td class="left-align">:</td>
                                    <td class="left-align"><?php echo $penghasilan_ayah; ?></td>
                                </tr>
                                <tr>
                                    <td class="left-align"><strong>Nama Ibu</strong></td>
                                    <td class="left-align">:</td>
                                    <td class="left-align"><?php echo $nama_ibu; ?></td>
                                </tr>
                                <tr>
                                    <td class="left-align"><strong>Pekerjaan Ibu</strong></td>
                                    <td class="left-align">:</td>
                                    <td class="left-align"><?php echo $pekerjaan_ibu; ?></td>
                                </tr>
                                <tr>
                                    <td class="left-align"><strong>Pendidikan Ibu</strong></td>
                                    <td class="left-align">:</td>
                                    <td class="left-align"><?php echo $pendidikan_ibu; ?></td>
                                </tr>
                                <tr>
                                    <td class="left-align"><strong>Penghasilan Ibu</strong></td>
                                    <td class="left-align">:</td>
                                    <td class="left-align"><?php echo $penghasilan_ibu; ?></td>
                                </tr>
                                <tr>
                                    <td class="left-align"><strong>HP Orang Tua</strong></td>
                                    <td class="left-align">:</td>
                                    <td class="left-align"><?php echo $hp_orangtua; ?></td>
                                </tr>
                                <tr>
                                    <td class="left-align"><strong>Asal Sekolah</strong></td>
                                    <td class="left-align">:</td>
                                    <td class="left-align"><?php echo $asal_sekolah; ?></td>
                                </tr>
                                <tr>
                                    <td class="left-align"><strong>Alamat Sekolah</strong></td>
                                    <td class="left-align">:</td>
                                    <td class="left-align"><?php echo $alamat_sekolah; ?></td>
                                </tr>
                                <tr>
                                    <td class="left-align"><strong>Pilihan Program</strong></td>
                                    <td class="left-align">:</td>
                                    <td class="left-align"><?php echo $pilihan_program; ?></td>
                                </tr>
                                <tr>
                                    <td class="left-align"><strong>Waktu Pendaftaran</strong></td>
                                    <td class="left-align">:</td>
                                    <td class="left-align"><?php echo $waktu_pendaftaran_formatted; ?> (WIB)</td>
                                </tr>
                                <tr>
                                    <td class="left-align"><strong>Nomor Pendaftaran</strong></td>
                                    <td class="left-align">:</td>
                                    <td class="left-align"><?php echo $no_pendaftaran; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="signature">
                    Tegal, <?php echo $tanggal_pendaftaran . ' ' . $bulan_tahun; ?><br>
                    Calon siswa,<br><br><br>
                    <span style="display: inline-block; margin-top: 50px;"><?php echo $nama_lengkap; ?></span>
                </div>
            </div>
        </body>
        </html>
    `;

    let originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
    location.reload();
}
</script>