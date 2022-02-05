<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Pegawai</title>
</head>

<body>

    <h2>Tambah Data Pegawai</h2>

    <form action="" method="post">
        <table>
            <tr>
                <td>Username : </td>
                <td><input type="text" name="email" id="" maxlength="100" required></td>
            </tr>

            <tr>
                <td>Password : </td>
                <td><input type="text" name="password" id="" maxlength="100" required></td>
            </tr>

            <tr>
                <td>Nama : </td>
                <td><input type="text" name="nama" id="" maxlength="100" required></td>
            </tr>

            <tr>
                <td><input type="submit" name="kirim" id=""></td>
            </tr>
        </table>
    </form>

    <!-- <p>
        <button type="button">
            <a href="<?= base_url('home/showAll') ?>">Kembali</a>
        </button>
    </p> -->

</body>

</html>