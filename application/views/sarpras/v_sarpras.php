<?= $this->session->flashdata('pesan'); ?>

<div class="card">
    <div class="card-header">
        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i> Tambah Data </button>
        <a href="<?= base_url('sarpras/print') ?>" class="btn btn-info btn-sm"><i class="fas fa-print"></i> Print </a>
        <a href="<?= base_url('sarpras/pdf') ?>" class="btn btn-success btn-sm"><i class="fas fa-file"></i> Export PDF </a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr align="center">
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Jumlah Barang</th>
                    <th>Fasilitas</th>
                    <th>Keterangan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <?php $no = 1;
            foreach ($sarpras as $sp) : ?>
                <tbody>
                    <tr align="center">
                        <td><?= $no++ ?></td>
                        <td><?= $sp->barang ?></td>
                        <td><?= $sp->jml_barang ?></td>
                        <td><?= $sp->fasilitas ?></td>
                        <td><?= $sp->ket ?></td>
                        <td>
                            <button data-toggle="modal" data-target="#edit<?= $sp->id_sarpras ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                            <a href="<?= base_url('sarpras/delete/' . $sp->id_sarpras) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin menghapus data ini?')"><i class="fas fa-trash"></i></a>
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
                <form action="<?= base_url('sarpras/tambah_aksi') ?>" method="POST">
                    <div class="form-group">
                        <label>Nama Barang</label>
                        <input type="text" name="barang" class="form-control">
                        <?= form_error('barang', '<div class="text-small text-danger">', '</div>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Jumlah Barang</label>
                        <input type="text" name="jml_barang" class="form-control">
                        <?= form_error('jml_barang', '<div class="text-small text-danger">', '</div>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Fasilitas</label>
                        <input type="text" name="fasilitas" class="form-control">
                        <?= form_error('fasilitas', '<div class="text-small text-danger">', '</div>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <input type="text" name="ket" class="form-control">
                        <?= form_error('ket', '<div class="text-small text-danger">', '</div>'); ?>
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

<?php foreach ($sarpras as $sp) : ?>
    <div class="modal fade" id="edit<?= $sp->id_sarpras ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('sarpras/edit/' . $sp->id_sarpras) ?>" method="POST">
                        <div class="form-group">
                            <label>Nama Barang</label>
                            <input type="text" name="barang" class="form-control" value="<?= $sp->barang ?>">
                            <?= form_error('barang', '<div class="text-small text-danger">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label>Jumlah Barang</label>
                            <input type="text" name="jml_barang" class="form-control" value="<?= $sp->jml_barang ?>">
                            <?= form_error('jml_barang', '<div class="text-small text-danger">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label>Fasilitas</label>
                            <input type="text" name="fasilitas" class="form-control" value="<?= $sp->fasilitas ?>">
                            <?= form_error('fasilitas', '<div class="text-small text-danger">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label>Keterangan</label>
                            <input type="text" name="ket" class="form-control" value="<?= $sp->ket ?>">
                            <?= form_error('ket', '<div class="text-small text-danger">', '</div>'); ?>
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