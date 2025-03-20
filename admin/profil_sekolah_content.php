<div class="container mt-5">
    <h2 class="text-center">Profil Sekolah</h2>
    <?php if (isset($success)) : ?>
        <div class="alert alert-success"><?php echo $success; ?></div>
    <?php endif; ?>
    <?php if (isset($error)) : ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php endif; ?>
    <form action="profil_sekolah.php" method="post">
        <div class="form-group">
            <label>Nama Sekolah</label>
            <input type="text" class="form-control" name="school_name" value="<?php echo $row['school_name']; ?>" required>
        </div>
        <div class="form-group">
            <label>Alamat Sekolah</label>
            <textarea class="form-control" name="school_address" required><?php echo $row['school_address']; ?></textarea>
        </div>
        <div class="form-group">
            <label>Nomor Telepon Sekolah</label>
            <input type="text" class="form-control" name="school_phone" value="<?php echo $row['school_phone']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Perbarui Profil</button>
    </form>
</div>