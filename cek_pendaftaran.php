<?php
include('config.php');

$search = '';
$result = null;
if (isset($_GET['search'])) {
    $search = mysqli_real_escape_string($conn, $_GET['search']);
    if (strlen(trim($search)) >= 3) {
        $query = "SELECT * FROM pendaftaran WHERE nama_lengkap LIKE '%$search%'";
        $result = mysqli_query($conn, $query);
    }
}
?>

<?php include('header.php'); ?>
<div class="container mt-4">
    <h2 class="text-center">Cek Pendaftaran</h2>
    <div class="search-box">
        <form action="cek_pendaftaran.php" method="get" class="d-flex justify-content-center">
            <input type="text" class="form-control" id="searchInput" name="search" placeholder="Cari berdasarkan nama..." value="<?php echo htmlspecialchars($search); ?>">
            <button type="submit" class="btn btn-primary">Cari</button>
        </form>
    </div>
    <?php if (isset($result) && mysqli_num_rows($result) > 0) : ?>
        <div class="table-container mt-4">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>No Pendaftaran</th>
                        <th>Nama Lengkap</th>
                        <th>Asal Sekolah</th>
                        <th>Pilihan Program</th>
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
                            <td><?php echo $row['asal_sekolah']; ?></td>
                            <td><?php echo $row['pilihan_program']; ?></td>
                            <td><a href="detail_pendaftar.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Lihat Detail</a></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    <?php elseif (isset($search) && strlen(trim($search)) >= 3) : ?>
        <p class="text-center mt-4">Data tidak ditemukan.</p>
    <?php endif; ?>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function() {
        $('#searchInput').on('input', function() {
            let searchValue = $(this).val().trim();
            if (searchValue.length >= 3) {
                window.location.href = 'cek_pendaftaran.php?search=' + encodeURIComponent(searchValue);
            }
        });
    });
</script>
<?php include('footer.php'); ?>