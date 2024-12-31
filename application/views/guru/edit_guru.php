<?php foreach ($guru as $gr) { ?>
    <form action="<?= base_url('guru/edit_aksi') ?>" method="POST">
        <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="hidden" name="id_guru" value="<?php echo $gr->id_guru ?>">
            <input type="text" name="nama" class="form-control" value="<?= $gr->nama ?>">
            <?= form_error('nama', '<div class="text-small text-danger">', '</div>'); ?>
        </div>
        <div class="form-group">
            <label>NIP (Nomor Induk Pegawai)</label>
            <input type="number" name="nip" class="form-control" value="<?= $gr->nip ?>">
            <?= form_error('nip', '<div class="text-small text-danger">', '</div>'); ?>
        </div>
        <div class="form-group">
            <label>Jenis Kelamin</label><br>
            <input type="radio" name="jk" value="<?= $gr->jk ?>"> Laki-Laki <br>
            <input type="radio" name="jk" value="<?= $gr->jk ?>"> Perempuan
            <?= form_error('jk', '<div class="text-small text-danger">', '</div>'); ?>
        </div>
        <div class="form-group">
            <label>Mata Pelajaran</label>
            <input type="text" name="mapel" class="form-control" value="<?= $gr->mapel ?>">
            <?= form_error('mapel', '<div class="text-small text-danger">', '</div>'); ?>
        </div>
        <div class="form-group">
            <label>Alamat</label>
            <textarea name="alamat" id="alamat" class="form-control" value="<?= $gr->alamat ?>"></textarea>
            <?= form_error('alamat', '<div class="text-small text-danger">', '</div>'); ?>
        </div>

        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save </button>
        <button type="reset" class="btn btn-danger"><i class="fas fa-trash"></i> Cancel </button>
        <br>
        <br>
    </form>
<?php } ?>