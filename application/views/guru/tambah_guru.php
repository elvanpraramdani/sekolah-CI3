<form action="<?= base_url('guru/tambah_aksi') ?>" method="POST">
    <div class="form-group">
        <label>Nama Lengkap</label>
        <input type="text" name="nama" class="form-control">
        <?= form_error('nama', '<div class="text-small text-danger">', '</div>'); ?>
    </div>
    <div class="form-group">
        <label>NIP (Nomor Induk Pegawai)</label>
        <input type="number" name="nip" class="form-control">
        <?= form_error('nip', '<div class="text-small text-danger">', '</div>'); ?>
    </div>
    <div class="form-group">
        <label>Jenis Kelamin</label><br>
        <input type="radio" name="jk" value="Laki-Laki"> Laki-Laki <br>
        <input type="radio" name="jk" value="Perempuan"> Perempuan
        <?= form_error('jk', '<div class="text-small text-danger">', '</div>'); ?>
    </div>
    <div class="form-group">
        <label>Mata Pelajaran</label>
        <input type="text" name="mapel" class="form-control">
        <?= form_error('mapel', '<div class="text-small text-danger">', '</div>'); ?>
    </div>
    <div class="form-grou[">
        <label class="form-label">Agama</label>
        <select class="form-select" name="agama">
            <option>-Pilih Salah Satu-</option>
            <option value="Islam">Islam</option>
            <option value="Kristen">Kristen</option>
            <option value="Khatolik">Khatolik</option>
            <option value="Budha">Budha</option>
            <option value="Hindu">Hindu</option>
            <option value="Hindu">Konghucu</option>
        </select>
    </div>
    <div class="form-group">
        <label>Alamat</label>
        <textarea name="alamat" class="form-control"></textarea>
        <?= form_error('alamat', '<div class="text-small text-danger">', '</div>'); ?>
    </div>

    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save </button>
    <button type="reset" class="btn btn-danger"><i class="fas fa-trash"></i> Cancel </button>
    <br>
    <br>
</form>