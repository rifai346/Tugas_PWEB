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
