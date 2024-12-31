<?= $this->session->flashdata('pesan'); ?>

<div class="card">
    <div class="card-header">
        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i> Tambah Data </button>
        <a href="<?= base_url('kelas10/print') ?>" class="btn btn-info btn-sm"><i class="fas fa-print"></i> Print </a>
        <a href="<?= base_url('kelas10/pdf') ?>" class="btn btn-success btn-sm"><i class="fas fa-file"></i> Export PDF </a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr align="center">
                    <th>No</th>
                    <th>NISN</th>
                    <th>Nama Lengkap</th>
                    <th>Jenis Kelamin</th>
                    <th>Kelas</th>
                    <th>Tanggal Lahir</th>
                    <th>Alamat</th>
                    <th>Action</th>
                </tr>
            </thead>
            <?php $no = 1;
            foreach ($kelas10 as $kl) : ?>
                <tbody>
                    <tr align="center">
                        <td><?= $no++ ?></td>
                        <td><?= $kl->nisn ?></td>
                        <td><?= $kl->nama ?></td>
                        <td><?= $kl->jk ?></td>
                        <td><?= $kl->kelas ?></td>
                        <td><?= $kl->tgl_lahir ?></td>
                        <td><?= $kl->alamat ?></td>
                        <td>
                            <button data-toggle="modal" data-target="#edit<?= $kl->id_siswa ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                            <a href="<?= base_url('kelas10/delete/' . $kl->id_siswa) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin menghapus data ini?')"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                </tbody>
            <?php endforeach ?>
        </table>
    </div>
</div>


<!-- Modal Tambah Data -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('kelas10/tambah_aksi') ?>" method="POST">
                    <div class="form-group">
                        <label>NISN</label>
                        <input type="text" name="nisn" class="form-control">
                        <?= form_error('nisn', '<div class="text-small text-danger">', '</div>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control">
                        <?= form_error('nama', '<div class="text-small text-danger">', '</div>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label><br>
                        <input type="radio" name="jk" value="Laki-Laki"> Laki-Laki <br>
                        <input type="radio" name="jk" value="Perempuan"> Perempuan
                        <?= form_error('jk', '<div class="text-small text-danger">', '</div>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Kelas</label>
                        <input type="text" name="kelas" class="form-control">
                        <?= form_error('kelas', '<div class="text-small text-danger">', '</div>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="date" name="tgl_lahir" class="form-control">
                        <?= form_error('tgl_lahir', '<div class="text-small text-danger">', '</div>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="alamat" class="form-control"></textarea>
                        <?= form_error('alamat', '<div class="text-small text-danger">', '</div>'); ?>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save </button>
                        <button type="reset" class="btn btn-danger"><i class="fas fa-trash"></i> Cancel </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Akhir Modal Tambah Data -->




<!-- Modal Edit Data -->

<?php foreach ($kelas10 as $kl) : ?>
    <div class="modal fade" id="edit<?= $kl->id_siswa ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('kelas10/edit/' . $kl->id_siswa) ?>" method="POST">
                        <div class="form-group">
                            <label>NISN</label>
                            <input type="text" name="nisn" class="form-control" value="<?= $kl->nisn ?>">
                            <?= form_error('nisn', '<div class="text-small text-danger">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" name="nama" class="form-control" value="<?= $kl->nama ?>">
                            <?= form_error('nama', '<div class="text-small text-danger">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin</label><br>
                            <input type="radio" name="jk" value="Laki-Laki"> Laki-Laki <br>
                            <input type="radio" name="jk" value="Perempuan"> Perempuan
                            <?= form_error('jk', '<div class="text-small text-danger">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label>Kelas</label>
                            <input type="text" name="kelas" class="form-control" value="<?= $kl->kelas ?>">
                            <?= form_error('kelas', '<div class="text-small text-danger">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input type="date" name="tgl_lahir" class="form-control" value="<?= $kl->tgl_lahir ?>">
                            <?= form_error('tgl_lahir', '<div class="text-small text-danger">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" name="alamat" class="form-control" value="<?= $kl->alamat ?>">
                            <?= form_error('alamat', '<div class="text-small text-danger">', '</div>'); ?>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save </button>
                            <button type="reset" class="btn btn-danger"><i class="fas fa-trash"></i> Cancel </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>
<!-- Akhir Modal Edit Data -->