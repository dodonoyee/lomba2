<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pegawai</title>
</head>

<body>

    <h2>Data Penerima</h2>

    <p>
        <button type="button">
            <a href="<?= base_url('home/create') ?>">Tambah</a>
        </button>
    </p>

    <table border="1">
        <thead>
            <tr>
                <th>NO</th>
                <th>ID</th>
                <th>Email</th>
                <th>Password</th>
                <th>Nama</th>
                <th>Opsi</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $nomor = 0;
            foreach ($data as $dataPenerima) {
                $nomor++;  ?>

                <tr>
                    <th><?= $nomor++; ?></th>
                    <td><?= $dataPenerima['id'] ?></td>
                    <td><?= $dataPenerima['email'] ?></td>
                    <td><?= $dataPenerima['password'] ?></td>
                    <td><?= $dataPenerima['nama'] ?></td>
                    <td>
                        <a href="<?= base_url('home/update/' . $dataPenerima['id']) ?>"><button type="button">Update Slurr</button></a>
                        <a href="<?= base_url('home/delete/' . $dataPenerima['id']) ?>"><button type="button">Hapus Slurr</button></a>
                    </td>
                </tr>

            <?php } ?>

        </tbody>
    </table>

    <p>
        <button type="button">
            <a href="<?= base_url('home/logout') ?>">LogOut Slurr</a>
        </button>
    </p>

</body>

</html>