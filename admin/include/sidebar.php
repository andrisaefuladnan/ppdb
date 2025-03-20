<div class="bg-light border-right" id="sidebar-wrapper" style="margin-top: 56px;">
    <div class="sidebar-heading">Admin Dashboard</div>
    <div class="list-group list-group-flush">
        <a href="data_pendaftar.php" class="list-group-item list-group-item-action <?php if(basename($_SERVER['PHP_SELF']) == 'data_pendaftar.php'){echo 'active';} ?>">Data Pendaftar</a>
        <a href="verifikasi.php" class="list-group-item list-group-item-action <?php if(basename($_SERVER['PHP_SELF']) == 'verifikasi.php'){echo 'active';} ?>">Verifikasi</a>
        <a href="manajemen_user.php" class="list-group-item list-group-item-action <?php if(basename($_SERVER['PHP_SELF']) == 'manajemen_user.php'){echo 'active';} ?>">Manajemen User</a>
        <a href="../logout.php" class="list-group-item list-group-item-action">Logout</a>
    </div>
</div>