<?= $this->session->flashdata('pesan'); ?>

<div class="card">
    <div class="card-header">
        <a href="<?= base_url('guru/tambah') ?>" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah Data </a>
        <a href="<?= base_url('guru/print') ?>" class="btn btn-info btn-sm"><i class="fas fa-print"></i> Print </a>
        <a href="<?= base_url('guru/pdf') ?>" class="btn btn-success btn-sm"><i class="fas fa-file"></i> Export PDF </a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr align="center">
                    <th>No</th>
                    <th>Nama Lengkap</th>
                    <th>NIP</th>
                    <th>Jenis Kelamin</th>
                    <th>Mata Pelajaran</th>
                    <th>Agama</th>
                    <th>Alamat</th>
                    <th>Action</th>
                </tr>
            </thead>
            <?php $no = 1;
            foreach ($guru as $gr) : ?>
                <tbody>
                    <tr align="center">
                        <td><?= $no++ ?></td>
                        <td><?= $gr->nama ?></td>
                        <td><?= $gr->nip ?></td>
                        <td><?= $gr->jk ?></td>
                        <td><?= $gr->mapel ?></td>
                        <td><?= $gr->agama ?></td>
                        <td><?= $gr->alamat ?></td>
                        <td>
                            <a href="<?= base_url('guru/edit/' . $gr->id_guru) ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                            <a href="<?= base_url('guru/delete/' . $gr->id_guru) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin menghapus data ini?')"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                </tbody>
            <?php endforeach ?>
        </table>
    </div>
</div>