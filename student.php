<?php

require_once 'koneksi.php';
$database = new database();
$data = $database->tampil_data_student();

$database = new siswa();
$isi = $database->tampil_data_id();



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Daftar siswa</h1>

    <table border="1">
        <tr>
            <th>No</th>
            <th>Id Siswa</th>
            <th>Id Kelas</th>
            <th>No Siswa</th>
            <th>Nama</th>
            <th>No Telfn</th>
            <th>Alamat</th>
            <th>Id user</th>
            <th>Tanda Tangan</th>
        </tr>
        <?php
            $no = 1;
            foreach ($data as $d) {
                ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $d['id_student']; ?></td>
                    <td><?= $d['id_class']; ?></td>
                    <td><?= $d['student_number']; ?></td>
                    <td><?= $d['name']; ?></td>
                    <td><?= $d['phone_number']; ?></td>
                    <td><?= $d['address']; ?></td>
                    <td><?= $d['id_user']; ?></td>
                    <td><?= $d['signature']; ?></td>
                </tr>
                <?php
            }
        ?>
    </table>

    <br>

    <h1>contoh inheritance</h1>

<table border="1">
    <tr>
        <th>No</th>
        <th>Id Siswa</th>
        <th>Id Kelas</th>
        <th>No Siswa</th>
        <th>Nama</th>
        <th>No Telfn</th>
        <th>Alamat</th>
        <th>Id user</th>
        <th>Tanda Tangan</th>
    </tr>
    <?php
        $no = 1;
        foreach ($isi as $i) {
            ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $i['id_student']; ?></td>
                <td><?= $i['id_class']; ?></td>
                <td><?= $i['student_number']; ?></td>
                <td><?= $i['name']; ?></td>
                <td><?= $i['phone_number']; ?></td>
                <td><?= $i['address']; ?></td>
                <td><?= $i['id_user']; ?></td>
                <td><?= $i['signature']; ?></td>
            </tr>
            <?php
        }
    ?>
</table>
</body>
</html>