<?php
include 'model.php';
if (isset($_POST['submit_simpan'])) {
    $nim = $_POST['nim']; 
    $nama = $_POST['nama'];
    $uts = $_POST['uts'];
    $uas = $_POST['uas'];
    $tugas = $_POST['tugas'];
    $model = new Model();
    $model->insert($nim, $nama, $uts, $uas, $tugas);
    header('location:index.php');
}
if (isset($_POST['submit_edit'])) {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $uts = $_POST['uts'];
    $uas = $_POST['uas'];
    $tugas = $_POST['tugas'];
    $model = new Model();
    $model->update($nim, $nama, $uts, $tugas,$uas);
    header('location:index.php');
}
if (isset($_GET['nim'])) {
    $id = $_GET['nim'];
    $model = new Model();
    $model->delete($id);
    header('location:index.php');
}

// tabel mahasiswa
if (isset($_POST['submit_simpan_mahasiswa'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $semester = $_POST['semester'];
    $alamat = $_POST['alamat'];
    $no_tlp = $_POST['no_tlp'];
    $email = $_POST['email'];
    $model = new Model();
    $model->insert_mahasiswa($id, $nama, $semester, $alamat, $no_tlp, $email);
    header('location:mahasiswa.php');
}
if (isset($_POST['submit_edit_mahasiswa'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $semester = $_POST['semester'];
    $alamat = $_POST['alamat'];
    $no_tlp = $_POST['no_tlp'];
    $email = $_POST['email'];
    $model = new Model();
    $model = new Model();
    $model->update_mahasiswa($id, $nama, $semester, $alamat, $no_tlp, $email);
    header('location:mahasiswa.php');
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $model = new Model();
    $model->delete_mahasiswa($id);
    header('location:mahasiswa.php');
}
   
   
   // tabel absen
if (isset($_POST['submit_simpan_absensi'])) {
    $id = $_POST['id'];
    $mhs_id = $_POST['id_mahasiswa'];
    $matakuliah_id = $_POST['id_matakuliah'];
    $waktu_absen = $_POST['waktu_absen'];
    $status = $_POST['status'];
    $model = new Model();
    $model->insert_absensi($id, $mhs_id, $matakuliah_id, $waktu_absen, $status);
    header('location:absensi.php');
}
if (isset($_POST['submit_edit_absensi'])) {
    $id = $_POST['id'];
    $mhs_id = $_POST['id_mahasiswa'];
    $matakuliah_id = $_POST['id_matakuliah'];
    $waktu_absen = $_POST['waktu_absen'];
    $status = $_POST['status'];
    $model = new Model();
    $model->update_absensi($id, $mhs_id, $matakuliah_id, $waktu_absen, $status);
    header('location:absensi.php');
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $model = new Model();
    $model->delete_absensi($id);
    header('location:absensi.php');
}

?>