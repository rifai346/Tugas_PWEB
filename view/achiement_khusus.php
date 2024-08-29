<?php

// Menghubungkan ke file koneksi yang berisi koneksi ke database
require_once '../koneksi.php';

// Membuat objek dari class Dosenwali untuk mengakses fungsi di dalamnya
$data = new Dosenwali();

// Memanggil fungsi tampil_data_achivement untuk mendapatkan data dari tabel achievements
$db = $data->tampil_data_achivement();
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
<nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
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
            <li><a class="dropdown-item" href="achievement.php">ACHIEVEMENTS</a></li>           
            <li><a class="dropdown-item" href="achievement_khusus.php">ACHIEVEMENTS KHUSUS</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>


<h1><center>DAFTAR ACHIEVEMENTS KHUSUS</center></h1>

<!-- Membuat tabel untuk menampilkan data achievements dari database -->
<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Id Achievement</th>
        <th>Id Mahasiswa</th>
        <th>Type Achievement</th>
        <th>Level</th>
    </tr>
    <?php
        
        $no = 1;

        // Perulangan untuk menampilkan setiap baris data dari database
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
