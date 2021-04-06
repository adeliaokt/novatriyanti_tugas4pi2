<?php
include 'connection.php';
class Model extends Connection
{
    public function __construct()
    {
        $this->conn = $this->get_connection();
    }

    //tabel nilai
    public function insert($nim, $nama, $uts, $uas, $tugas)
    {
        $na = $this->na($uts,$tugas,$uas);
        $status = $this->status($na);
        $sql = "INSERT INTO tbl_nilai (nim, nama, uts, uas, tugas, na, status) VALUES
        ('$nim', '$nama','$uts', '$uas', '$tugas', '$na', '$status')";
        $this->conn->query($sql);
    }
    public function na($uts,$tugas,$uas)
    {
        $na=(0.3*$uts)+(0.3*$tugas)+(0.4*$uas);
        return $na;
    }
    public function status($na)
    {
        $status="";
        if($na >=60 && $na <=100){
        $status="Lulus";
        }else{
            $status="Tidak Lulus";
        }
            return $status;
    }
    public function tampil_data()
    {
        $sql = "SELECT * FROM tbl_nilai";
        $bind = $this->conn->query($sql);
        while ($obj = $bind->fetch_object()) {
        $baris[] = $obj;
        }
        if(!empty($baris)){
            return $baris;
        }
    }
    public function edit($id)
    {
        $sql = "SELECT * FROM tbl_nilai WHERE nim='$id'";
        $bind = $this->conn->query($sql);
        while ($obj = $bind->fetch_object()) {
            $baris = $obj;
    }
    return $baris;
    }
    public function update($nim, $nama, $uts, $tugas,$uas)
    {
        $na=$this->na($uts,$tugas,$uas);
        $status=$this->status($na);
        $sql = "UPDATE tbl_nilai SET nama='$nama', uts='$uts', uas='$uas', tugas='$tugas', na='$na',status='$status' WHERE nim='$nim'";
        $this->conn->query($sql);
    }
    public function delete($nim)
    {
        $sql = "DELETE FROM tbl_nilai WHERE nim='$nim'";
        $this->conn->query($sql);
    }

    //tabel mahasiswa
    public function insert_mahasiswa($id, $nama, $semester, $alamat, $no_tlp, $email)
    {
        $sql = "INSERT INTO mahasiswa (id, nama, semester, alamat, no_tlp, email) 
        VALUES ('$id', '$nama','$semester', '$alamat', '$no_tlp', '$email')";
        $this->conn->query($sql);
    }
    public function tampil_data_mahasiswa()
    {
         $sql = "SELECT * FROM mahasiswa";
         $bind = $this->conn->query($sql);
         while ($obj = $bind->fetch_object()) { 
             $baris[] = $obj;
         }
         if(!empty($baris)){
             return $baris;
         }
    }
    public function edit_mahasiswa($id)
    {
         $sql = "SELECT * FROM mahasiswa WHERE id='$id'";
         $bind = $this->conn->query($sql);
         while ($obj = $bind->fetch_object()) {
             $baris = $obj;
         }
         return $baris;
    }
    public function update_mahasiswa($id, $nama, $semester, $alamat, $no_tlp, $email)
    {
         $sql = "UPDATE mahasiswa SET nama='$nama', semester='$semester', alamat='$alamat', no_tlp='$no_tlp', email='$email' WHERE id='$id'";
         $this->conn->query($sql);
    }
    public function delete_mhs($id)
    { 
        $sql = "DELETE FROM mahasiswa WHERE id='$id'";
        $this->conn->query($sql);
    }
    
     // tabel absen
     public function insert_absensi($id, $id_mahasiswa, $id_matakuliah, $waktu_absen, $status)
    {
        $sql = "INSERT INTO absensi (id, id_mahasiswa, id_matakuliah, waktu_absen, status) 
        VALUES ('$id', '$id_mahasiswa,','$id_matakuliah', '$waktu_absen', '$status')";
        $this->conn->query($sql);
    }
    public function tampil_data_absensi()
    {
         $sql = "SELECT * FROM absensi";
         $bind = $this->conn->query($sql);
         while ($obj = $bind->fetch_object()) { $baris[] = $obj;
     }
     if(!empty($baris)){
         return $baris;
     }
    }
    public function edit_absensi($id)
    {
         $sql = "SELECT * FROM absensi WHERE id='$id'";
         $bind = $this->conn->query($sql);
         while ($obj = $bind->fetch_object()) {
             $baris = $obj;
     }
         return $baris;
    }
    public function update_absensi($id, $id_mahasiswa, $id_matakuliah, $waktu_absen, $status)
    {
         $sql = "UPDATE absensi SET id_mahasiswa='$id_mahasiswa', id_matakuliah='$id_matakuliah', waktu_absen='$waktu_absen', status='$status' WHERE id='$id'";
         $this->conn->query($sql);
    }
    public function delete_absensi($id)
    { 
        $sql = "DELETE FROM absensi WHERE id='$id'";
        $this->conn->query($sql);
    }
    
}
?>
