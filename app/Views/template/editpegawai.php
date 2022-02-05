<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data Pegawai</title>
</head>

<body>

    <h2>Ubah Data Pegawai</h2>

    <form action="" method="post">
        <table>
            <tr>
                <td>ID : </td>
                <td><input type="text" name="id" id="" value="<?= $data['id'] ?>" readonly></td>
            </tr>
            <tr>
                <td>Username : </td>
                <td><input type="text" name="email" id="" value="<?= $data['email'] ?>" required autofocus></td>
            </tr>
            <tr>
                <td>Password : </td>
                <td><input type="text" name="password" id="" value="<?= $data['password'] ?>" required autofocus></td>
            </tr>
            <tr>
                <td>Nama : </td>
                <td><input type="text" name="nama" id="" value="<?= $data['nama'] ?>" required autofocus></td>
            </tr>
            <tr>
                <td><input type="submit" name="kirim" id=""></td>
            </tr>
        </table>
    </form>

    <p>
        <button type="button">
            <a href="<?= base_url('home/showAll') ?>"></a>
        </button>
    </p>

</body>

</html>