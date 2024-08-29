<?php


// Menghubungkan ke file koneksi yang berisi koneksi ke database
require_once '../koneksi.php';

// Membuat objek dari class students untuk mengakses fungsi di dalamnya
$data = new students();

// Memanggil fungsi tampil_data_student untuk mendapatkan data dari tabel students
$isi = $data->tampil_data_student();





?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Menggunakan Bootstrap untuk tampilan -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
   
<!-- Membuat navbar menggunakan Bootstrap -->
<nav class="navbar navbar-expand-lg bg-body-tertiary"data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">P.WEB</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            PILIHAN MENU
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="student.php">MAHASISWA</a></li>
            <li><a class="dropdown-item" href="student_khusus.php">MAHASISWA KHUSUS</a></li>
            <li><a class="dropdown-item" href="achiement.php">ACHIEVEMENTS</a></li>
            <li><a class="dropdown-item" href="achiement_khusus.php">ACHIEVEMENTS KHUSUS</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

    <h1><center>DAFTAR MAHASISWA</center></h1>

    <!-- Membuat tabel untuk menampilkan data students dari database -->
    <table class="table table-bordered">
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

            // Perulangan untuk menampilkan setiap baris data dari database
            foreach ($isi as $d) {
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>