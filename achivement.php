<?php

require_once 'koneksi.php';
$database = new database();
$db = $database->tampil_data_achivement();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Daftar Achivement</h1>

    <table border="1">
        <tr>
            <th>No</th>
            <th>Id Achivement</th>
            <th>id Mahasiswa</th>
            <th>type achivement</th>
            <th>level</th>
        </tr>
        <?php
            $no = 1;
            foreach ($db as $d) {
                ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $d['id_achievement']; ?></td>
                    <td><?= $d['id_student']; ?></td>
                    <td><?= $d['achievement_type']; ?></td>
                    <td><?= $d['level']; ?></td>
                </tr>
                <?php
            }
        ?>
    </table>
</body>
</html>