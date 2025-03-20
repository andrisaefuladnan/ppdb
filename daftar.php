<?php include('header.php'); ?>
<div class="container mt-4">
    <h2 class="text-center">Formulir Pendaftaran Peserta Didik Baru</h2>
    <form action="submit_daftar.php" method="post" class="p-4 bg-white rounded shadow-sm">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="nama_lengkap">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" required>
            </div>
            <div class="form-group col-md-6">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="tempat_lahir">Tempat Lahir</label>
            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" required>
        </div>
        <div class="form-group">
            <label for="tanggal_lahir">Tanggal Lahir</label>
            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
        </div>
        <div class="form-group">
            <label for="alamat_lengkap">Alamat Lengkap</label>
            <textarea class="form-control" id="alamat_lengkap" name="alamat_lengkap" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label for="nomor_telepon">Nomor Telepon</label>
            <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon" required>
        </div>
        <div class="form-group">
            <label for="agama">Agama</label>
            <select class="form-control" id="agama" name="agama" required>
                <option value="Islam">Islam</option>
                <option value="Kristen">Kristen</option>
                <option value="Katolik">Katolik</option>
                <option value="Hindu">Hindu</option>
                <option value="Buddha">Buddha</option>
                <option value="Konghucu">Konghucu</option>
            </select>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="nama_ayah">Nama Ayah</label>
                <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" required>
            </div>
            <div class="form-group col-md-6">
                <label for="pekerjaan_ayah">Pekerjaan Ayah</label>
                <select class="form-control" id="pekerjaan_ayah" name="pekerjaan_ayah" required>
                    <option value="PNS">PNS</option>
                    <option value="Swasta">Swasta</option>
                    <option value="Wiraswasta">Wiraswasta</option>
                    <option value="Petani">Petani</option>
                    <option value="Buruh">Buruh</option>
                    <option value="Lainnya">Lainnya</option>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="pendidikan_ayah">Pendidikan Ayah</label>
                <select class="form-control" id="pendidikan_ayah" name="pendidikan_ayah" required>
                    <option value="SD">SD</option>
                    <option value="SMP">SMP</option>
                    <option value="SMA">SMA</option>
                    <option value="D3">D3</option>
                    <option value="S1">S1</option>
                    <option value="S2">S2</option>
                    <option value="S3">S3</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="penghasilan_ayah">Penghasilan Ayah</label>
                <select class="form-control" id="penghasilan_ayah" name="penghasilan_ayah" required>
                    <option value="<1 juta"><1 juta</option>
                    <option value="1-3 juta">1-3 juta</option>
                    <option value="3-5 juta">3-5 juta</option>
                    <option value="5-10 juta">5-10 juta</option>
                    <option value=">10 juta">>10 juta</option>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="nama_ibu">Nama Ibu</label>
                <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" required>
            </div>
            <div class="form-group col-md-6">
                <label for="pekerjaan_ibu">Pekerjaan Ibu</label>
                <select class="form-control" id="pekerjaan_ibu" name="pekerjaan_ibu" required>
                    <option value="PNS">PNS</option>
                    <option value="Swasta">Swasta</option>
                    <option value="Wiraswasta">Wiraswasta</option>
                    <option value="Petani">Petani</option>
                    <option value="Buruh">Buruh</option>
                    <option value="Lainnya">Lainnya</option>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="pendidikan_ibu">Pendidikan Ibu</label>
                <select class="form-control" id="pendidikan_ibu" name="pendidikan_ibu" required>
                    <option value="SD">SD</option>
                    <option value="SMP">SMP</option>
                    <option value="SMA">SMA</option>
                    <option value="D3">D3</option>
                    <option value="S1">S1</option>
                    <option value="S2">S2</option>
                    <option value="S3">S3</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="penghasilan_ibu">Penghasilan Ibu</label>
                <select class="form-control" id="penghasilan_ibu" name="penghasilan_ibu" required>
                    <option value="<1 juta"><1 juta</option>
                    <option value="1-3 juta">1-3 juta</option>
                    <option value="3-5 juta">3-5 juta</option>
                    <option value="5-10 juta">5-10 juta</option>
                    <option value=">10 juta">>10 juta</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="hp_orangtua">HP Orang Tua</label>
            <input type="text" class="form-control" id="hp_orangtua" name="hp_orangtua" required>
        </div>
        <div class="form-group">
            <label for="asal_sekolah">Asal Sekolah</label>
            <input type="text" class="form-control" id="asal_sekolah" name="asal_sekolah" required>
        </div>
        <div class="form-group">
            <label for="alamat_sekolah">Alamat Sekolah</label>
            <textarea class="form-control" id="alamat_sekolah" name="alamat_sekolah" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label for="pilihan_program">Pilihan Program</label>
            <select class="form-control" id="pilihan_program" name="pilihan_program" required>
                <option value="Reguler">Reguler</option>
                <option value="Intensif">Intensif</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Daftar</button>
    </form>
</div>
<?php include('footer.php'); ?>