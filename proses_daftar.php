<?php
include('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_lengkap = mysqli_real_escape_string($conn, $_POST['nama_lengkap']);
    $jenis_kelamin = mysqli_real_escape_string($conn, $_POST['jenis_kelamin']);
    $tempat_lahir = mysqli_real_escape_string($conn, $_POST['tempat_lahir']);
    $tanggal_lahir = mysqli_real_escape_string($conn, $_POST['tanggal_lahir']);
    $alamat_lengkap = mysqli_real_escape_string($conn, $_POST['alamat_lengkap']);
    $nomor_telepon = mysqli_real_escape_string($conn, $_POST['nomor_telepon']);
    $agama = mysqli_real_escape_string($conn, $_POST['agama']);
    $nama_ayah = mysqli_real_escape_string($conn, $_POST['nama_ayah']);
    $pekerjaan_ayah = mysqli_real_escape_string($conn, $_POST['pekerjaan_ayah']);
    $pendidikan_ayah = mysqli_real_escape_string($conn, $_POST['pendidikan_ayah']);
    $penghasilan_ayah = mysqli_real_escape_string($conn, $_POST['penghasilan_ayah']);
    $nama_ibu = mysqli_real_escape_string($conn, $_POST['nama_ibu']);
    $pekerjaan_ibu = mysqli_real_escape_string($conn, $_POST['pekerjaan_ibu']);
    $pendidikan_ibu = mysqli_real_escape_string($conn, $_POST['pendidikan_ibu']);
    $penghasilan_ibu = mysqli_real_escape_string($conn, $_POST['penghasilan_ibu']);
    $hp_orangtua = mysqli_real_escape_string($conn, $_POST['hp_orangtua']);
    $asal_sekolah = mysqli_real_escape_string($conn, $_POST['asal_sekolah']);
    $alamat_sekolah = mysqli_real_escape_string($conn, $_POST['alamat_sekolah']);
    $pilihan_program = mysqli_real_escape_string($conn, $_POST['pilihan_program']);

    $query = "INSERT INTO pendaftaran (nama_lengkap, jenis_kelamin, tempat_lahir, tanggal_lahir, alamat_lengkap, nomor_telepon, agama, nama_ayah, pekerjaan_ayah, pendidikan_ayah, penghasilan_ayah, nama_ibu, pekerjaan_ibu, pendidikan_ibu, penghasilan_ibu, hp_orangtua, asal_sekolah, alamat_sekolah, pilihan_program, waktu_pendaftaran) VALUES ('$nama_lengkap', '$jenis_kelamin', '$tempat_lahir', '$tanggal_lahir', '$alamat_lengkap', '$nomor_telepon', '$agama', '$nama_ayah', '$pekerjaan_ayah', '$pendidikan_ayah', '$penghasilan_ayah', '$nama_ibu', '$pekerjaan_ibu', '$pendidikan_ibu', '$penghasilan_ibu', '$hp_orangtua', '$asal_sekolah', '$alamat_sekolah', '$pilihan_program', NOW())";
    
    if (mysqli_query($conn, $query)) {
        $id = mysqli_insert_id($conn);
        header("Location: pendaftaran_berhasil.php?id=$id");
        exit();
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Proses Pendaftaran</title>
</head>
<body>
    <h1>Proses Pendaftaran</h1>
</body>
</html>