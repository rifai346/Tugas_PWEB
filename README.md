# Tugas PWEB 2

## Introduction

Sistem Informasi Pembimbingan Akademik JKB (SIWALI JKB) adalah sistem manajemen pembimbingan akademik yang komprehensif yang dirancang untuk memperlancar proses pengelolaan kinerja mahasiswa, konseling, dan data akademik lainnya untuk institusi pendidikan tinggi.

## Built With

* PHP
* Bootstrap

## Contents

- [Task](##Task)
- [Code](##Code)
- [Output](##Output)

## Task

1. Create an OOP-based View, by retrieving data from the MySQL database
2. Use the _construct as a link to the database
3. Apply encapsulation according to the logic of the case study
4. Create a derived class using the concept of inheritance
5. Apply polymorphism for at least 2 roles according to the case study

## Code

Di sistem OOP yang saya buat ini saya menggambil 2 contoh Table database yaitu Table Student dan Table Achievement

1. Koneksi & OOP

```php
<?php

// Kelas `database` digunakan untuk mengatur koneksi ke database
class database{

    // Deklarasi properti untuk menyimpan detail koneksi database
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $db = "siwali_jkb";
    protected $conn;

    // Konstruktor yang akan langsung membuat koneksi ke database saat objek dibuat
    public function __construct()
    {
        // Membuat koneksi ke database menggunakan mysqli_connect
        $conn = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
        $this->conn = $conn;

        // Mengecek apakah koneksi berhasil; jika gagal, tampilkan pesan error
        if (!$this->conn) {
            die("Gagal terhubung ke database: " . mysqli_connect_error());
        }

    }

}

// Kelas `students` merupakan turunan dari kelas `database` dan digunakan untuk mengelola data mahasiswa
class students extends database{

    // Konstruktor yang memanggil konstruktor dari kelas induk (`database`)
    public function __construct(){
        parent::__construct();
    }

    // Fungsi untuk menampilkan semua data mahasiswa dari tabel `students`
    function tampil_data_student(){
        // Menjalankan query untuk mengambil semua data dari tabel `students`
        $data = mysqli_query($this->conn, "select * from students");
        // Menyimpan setiap baris hasil query ke dalam array `$result`
        while($d = mysqli_fetch_array($data)){
            $result[] = $d;
        }
        // Mengembalikan hasil jika ada data yang ditemukan
        if(isset($result)){
            return $result;
        }

    }

}

// Kelas `Mahasiswa` merupakan turunan dari kelas `students` dan digunakan untuk mengelola data mahasiswa dengan ID tertentu
class Mahasiswa extends students{
    // Konstruktor yang memanggil konstruktor dari kelas induk (`students`)
    public function __construct(){
        parent::__construct();
    }

    // Fungsi untuk menampilkan data mahasiswa berdasarkan `id_user`
    public function tampil_data_id(){
        // Menjalankan query untuk mengambil data mahasiswa dengan `id_user` tertentu
        $data = mysqli_query($this->conn, "select * from students where id_user='122'");
        // Menyimpan hasil query ke dalam array `$result`
        while($d = mysqli_fetch_array($data)){
            $result[] = $d;
        }
        // Mengembalikan hasil jika ada data yang ditemukan
        if(isset($result)){
            return $result;
        }
    }
}

// Kelas `achivement` merupakan turunan dari kelas `database` dan digunakan untuk mengelola data pencapaian (achievements)
class achivement extends database{
    // Konstruktor yang memanggil konstruktor dari kelas induk (`database`)
    public function __construct(){
        parent::__construct();
    }

    // Fungsi untuk menampilkan semua data pencapaian dari tabel `achievements`
    public function tampil_achivement(){
        // Menjalankan query untuk mengambil semua data dari tabel `achievements`
        $data = mysqli_query($this->conn, "select * from achievements");
        // Menyimpan setiap baris hasil query ke dalam array `$result`
        while($d = mysqli_fetch_array($data)){  
            $result[] = $d;
        }
        // Mengembalikan hasil jika ada data yang ditemukan
        if(isset($result)){
            return $result;
        }
    }
}  

// Kelas `Dosenwali` merupakan turunan dari kelas `achivement` dan digunakan untuk mengelola data pencapaian berdasarkan ID tertentu
class Dosenwali extends achivement{
    // Konstruktor yang memanggil konstruktor dari kelas induk (`achivement`)
    public function __construct(){
        parent::__construct();
    }

    // Fungsi untuk menampilkan data pencapaian berdasarkan `id_achievement` tertentu
    function tampil_data_achivement(){
        // Menjalankan query untuk mengambil data pencapaian dengan `id_achievement` tertentu
        $data = mysqli_query($this->conn, "select * from achievements where id_achievement='1'");
        // Menyimpan hasil query ke dalam array `$result`
        while($d = mysqli_fetch_array($data)){
            $result[] = $d;
        }
        // Mengembalikan hasil jika ada data yang ditemukan
        if(isset($result)){
            return $result;
        }   
    }
}
```

2. View Student

```php
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
```

3. View Student Khusus

```php
<?php
// Menghubungkan ke file koneksi yang berisi koneksi ke database
require_once '../koneksi.php';

// Membuat objek dari class Mahasiswa untuk mengakses fungsi di dalamnya
$data = new Mahasiswa();

// Memanggil fungsi tampil_data_id untuk mendapatkan data dari tabel students
$isi = $data->tampil_data_id();
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

    <h1><center>DAFTAR MAHASISWA KHUSUS</center></h1>

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
```

4. View Achivement

```php
<?php
// Menghubungkan ke file koneksi yang berisi koneksi ke database
require_once '../koneksi.php';

// Membuat objek dari class achivement untuk mengakses fungsi di dalamnya
$data = new achivement();
// Memanggil fungsi tampil_achivement untuk mendapatkan data dari tabel achievements
$db = $data->tampil_achivement();
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

    <h1><center>DAFTAR ACHIEVMENETS</center></h1>

    <!-- Membuat tabel untuk menampilkan data achievements dari database -->
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Id Achivement</th>
            <th>id Mahasiswa</th>
            <th>type achivement</th>
            <th>level</th>
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
</body>
</html>
```

5. View Achievemnt Khusus

```php
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
```

## Output

1. students

![image](https://github.com/user-attachments/assets/1b18c3a5-ab25-4b91-9017-906f0d0d7a3a)

2. student khusus

![image](https://github.com/user-attachments/assets/04feb7a6-73b1-4f09-acfd-e01a804999d6)

3. Achievement

![image](https://github.com/user-attachments/assets/af37e942-d488-4cf7-ac6c-a73a5fbdb25a)

4. Achievement khusus

![image](https://github.com/user-attachments/assets/331ba17c-b787-4f3e-8def-18ce736cb274)







