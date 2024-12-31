<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        <?php $no = 1;
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

    <script type="text/javascript">
        window.print();
    </script>

</body>

</html>