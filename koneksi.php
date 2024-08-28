<?php

class database{

    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $db = "siwali_jkb";
    protected $conn;

    public function __construct()
    {
        $conn = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
        $this->conn = $conn;

        if (!$this->conn) {
            die("Gagal terhubung ke database: " . mysqli_connect_error());
        }

    }

    function tampil_data_student(){
        $data = mysqli_query($this->conn, "select * from students");
        while($d = mysqli_fetch_array($data)){
            $result[] = $d;
        }
        if(isset($result)){
            return $result;
        }

    }

    function tampil_data_achivement(){
        $data = mysqli_query($this->conn, "select * from achievements");
        while($d = mysqli_fetch_array($data)){
            $result[] = $d;
        }
        if(isset($result)){
            return $result;
        }   
    }



}
class achivement extends database{
    public function __construct(){
        parent::__construct();
    }

    public function tampil_data_achivement(){
        $data = mysqli_query($this->conn, "select * from achivement where id_achievements='1'");
        while($d = mysqli_fetch_array($data)){  
            $result[] = $d;
        }
        if(isset($result)){
            return $result;
        }
    }
}   

class siswa extends database{
    public function __construct(){
        parent::__construct();
    }

    public function tampil_data_id(){
        $data = mysqli_query($this->conn, "select * from students where id_user='122'");
        while($d = mysqli_fetch_array($data)){
            $result[] = $d;
        }
        if(isset($result)){
            return $result;
        }
}

}
