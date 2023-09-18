<?php
class Library
{
    public $db;
    public function __construct()
    {
        $host = "localhost";
        $dbname = "db_akademik2";
        $username = "root";
        $password = "";
        $this->db = new PDO("mysql:host={$host};dbname={$dbname}", $username, $password);
    }

    public function show()
    {
        $query = $this->db->prepare("SELECT * FROM mahasiswa");
        $query->execute();
        $data = $query->fetchAll();
        return $data;
    }

    public function showKodePos()
    {
        $query = $this->db->prepare("SELECT * FROM kode_pos");
        $query->execute();
        $data = $query->fetchAll();
        return $data;
    }

    public function showDosen()
    {
        $query = $this->db->prepare("SELECT * FROM dosen");
        $query->execute();
        $data = $query->fetchAll();
        return $data;
    }

    public function get_by_id($nim){
        $query = $this->db->prepare("SELECT * FROM mahasiswa where nim=?");
        $query->bindParam(1, $nim);
        $query->execute();
        return $query->fetch();
    }

    public function update($nim,$nama,$tanggal_lahir,$alamat,$kode_pos,$no_telp,$program_studi,$email,$nip){
        $query = $this->db->prepare("UPDATE mahasiswa set nama = '$nama',tanggal_lahir = date '$tanggal_lahir', alamat = '$alamat', kode_pos = $kode_pos , no_telp = '$no_telp', program_studi = '$program_studi', email = '$email', nip = '$nip' where nim = $nim");
        
        $query->execute();
        return $query->rowCount();
    }

    public function add($nim, $nama, $tanggal_lahir, $alamat, $kode_pos, $no_telp, $program_studi, $email, $nip) {
        $query = $this->db->prepare("INSERT INTO mahasiswa (nim, nama, tanggal_lahir, alamat, kode_pos, no_telp, program_studi, email, nip) VALUES ($nim, '$nama', date '$tanggal_lahir', '$alamat', $kode_pos, '$no_telp', '$program_studi', '$email', '$nip')");

        $query->execute();
        return $query->rowCount();
    }

    public function delete($nim)
    {
        $query = $this->db->prepare("DELETE FROM mahasiswa where nim='$nim'");

        $query->execute();
        return $query->rowCount();
    }

}
?>