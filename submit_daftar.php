<?php
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_lengkap = $_POST['nama_lengkap'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $alamat_lengkap = $_POST['alamat_lengkap'];
    $nomor_telepon = $_POST['nomor_telepon'];
    $agama = $_POST['agama'];
    $nama_ayah = $_POST['nama_ayah'];
    $pekerjaan_ayah = $_POST['pekerjaan_ayah'];
    $pendidikan_ayah = $_POST['pendidikan_ayah'];
    $penghasilan_ayah = $_POST['penghasilan_ayah'];
    $nama_ibu = $_POST['nama_ibu'];
    $pekerjaan_ibu = $_POST['pekerjaan_ibu'];
    $pendidikan_ibu = $_POST['pendidikan_ibu'];
    $penghasilan_ibu = $_POST['penghasilan_ibu'];
    $hp_orangtua = $_POST['hp_orangtua'];
    $asal_sekolah = $_POST['asal_sekolah'];
    $alamat_sekolah = $_POST['alamat_sekolah'];
    $pilihan_program = $_POST['pilihan_program'];

    $sql = "INSERT INTO pendaftaran (nama_lengkap, jenis_kelamin, tempat_lahir, tanggal_lahir, alamat_lengkap, nomor_telepon, agama, nama_ayah, pekerjaan_ayah, pendidikan_ayah, penghasilan_ayah, nama_ibu, pekerjaan_ibu, pendidikan_ibu, penghasilan_ibu, hp_orangtua, asal_sekolah, alamat_sekolah, pilihan_program, waktu_pendaftaran) 
            VALUES ('$nama_lengkap', '$jenis_kelamin', '$tempat_lahir', '$tanggal_lahir', '$alamat_lengkap', '$nomor_telepon', '$agama', '$nama_ayah', '$pekerjaan_ayah', '$pendidikan_ayah', '$penghasilan_ayah', '$nama_ibu', '$pekerjaan_ibu', '$pendidikan_ibu', '$penghasilan_ibu', '$hp_orangtua', '$asal_sekolah', '$alamat_sekolah', '$pilihan_program', NOW())";

    if (mysqli_query($conn, $sql)) {
        $id = mysqli_insert_id($conn);
        header("Location: pendaftaran_berhasil.php?id=$id");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
