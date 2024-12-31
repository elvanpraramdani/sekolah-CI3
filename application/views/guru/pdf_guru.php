<html>

<head>
    <title> <?= $title ?> </title>
</head>

<body>
    <table>
        <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>NIP</th>
            <th>Jenis Kelamin</th>
            <th>Mata Pelajaran</th>
            <th>Alamat</th>
        </tr>
        <?php $no   = 1;
        foreach ($guru as $gr) : ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $gr->nama ?></td>
                <td><?= $gr->nip ?></td>
                <td><?= $gr->jk ?></td>
                <td><?= $gr->mapel ?></td>
                <td><?= $gr->alamat ?></td>
            </tr>
        <?php endforeach ?>
    </table>
</body>

</html>