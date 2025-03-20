<?php
include('../config.php');

$query = "SELECT * FROM pendaftaran";
$result = mysqli_query($conn, $query);

if (!$result) {
    echo "Error: " . mysqli_error($conn);
    exit();
}
?>

<div class="container mt-5">
    <h2 class="text-center">Verifikasi Pendaftaran</h2>
    <div class="form-group">
        <input type="text" class="form-control" id="searchInput" placeholder="Cari Data Verifikasi...">
    </div>
    <table class="table table-bordered table-striped" id="dataTable">
        <thead class="thead-dark">
            <tr>
                <th>No Pendaftaran</th>
                <th>Nama Lengkap</th>
                <th>Status Verifikasi</th>
                <th>Status Bayar Pendaftaran</th>
                <th>Status Bayar Daftar Ulang</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <?php
                $waktu_pendaftaran = new DateTime($row['waktu_pendaftaran'], new DateTimeZone('Asia/Jakarta'));
                $bulan_tahun = $waktu_pendaftaran->format('my');
                $no_pendaftaran = "201-" . $bulan_tahun . "-" . str_pad($row['id'], 3, '0', STR_PAD_LEFT);
                ?>
                <tr>
                    <td><?php echo $no_pendaftaran; ?></td>
                    <td><?php echo $row['nama_lengkap']; ?></td>
                    <td><?php echo $row['status_verifikasi']; ?></td>
                    <td><?php echo $row['status_pembayaran_pendaftaran']; ?></td>
                    <td><?php echo $row['status_pembayaran_daftar_ulang']; ?></td>
                    <td>
                        <a href="proses_verifikasi.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Verifikasi</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<script>
document.getElementById('searchInput').addEventListener('keyup', function() {
    let input = this.value.toLowerCase();
    let rows = document.querySelectorAll('#dataTable tbody tr');

    rows.forEach(row => {
        let columns = row.getElementsByTagName('td');
        let match = false;

        for (let i = 0; i < columns.length - 1; i++) {
            if (columns[i].textContent.toLowerCase().includes(input)) {
                match = true;
                break;
            }
        }

        row.style.display = match ? '' : 'none';
    });
});
</script>