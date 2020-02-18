<?php
error_reporting(0);
include "koneksi.php";

$nama          = $_POST['nama'];
$tempattinggal = $_POST['tempattinggal'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$agama         = $_POST['agama'];
$alamat        = $_POST['alamat'];
$notelp        = $_POST['notelp'];
$desk_divisi   = $_POST['desk_divisi'];
// $foto = $_POST['foto'];

// Kode Upload Foto
$nama_foto   = $_FILES['foto']['name'];
$lokasi_foto = $_FILES['foto']['tmp_name'];
$ukuran_foto = $_FILES['foto']['size'];
$tipe_foto   = $_FILES['foto']['type'];

$nama_baru = preg_replace("/\s+/",$nama_foto);
$direktori = "foto/$nama_foto"; 

$MAX_FILE_SIZE = 500000;
$formatgambar = array("image/jpg","image/jpeg","image/gif","image/png");

// Cek File kosong
if(empty($nama) || empty($tempattinggal) || empty($jenis_kelamin) || empty($agama) || empty($alamat) || empty($notelp) || empty($desk_divisi) || empty($nama_foto) ) 
{
    echo "<h4> Mohon Dilengkapi Data </h4> ";
}
elseif (!in_array($tipe_foto,$formatgambar))
{
    echo "<h4> Format yang diperbolehkan hanyalah JPG,JPEG,GIF,PNG </h4>";
}
elseif ($ukuran_foto > $MAX_FILE_SIZE) 
{
    echo "<h4> Maksimum Foto 100kb </h4>";

}
else {
    move_uploaded_file($lokasi_foto,$direktori);

    $masuk = "INSERT INTO tbl_karyawan
    (nik,nama,tempattinggal,jenis_kelamin,agama,alamat,notelp,desk_divisi,foto) VALUES ('','$nama','$tempattinggal','$jenis_kelamin','$agama','$alamat','$notelp','$desk_divisi','$nama_foto')";

    $result = mysqli_query($con,$masuk);

    if ($result) {
        echo "<h1>Data Sudah Berhasil Di Input</h1>";
        echo "<a href='?mod=lihatkaryawan' class='btn btn-primary'>
              Lihat Data
            </a>";

    }else{
        echo "tidak masuk";
    }
}



// <meta http-equiv='refresh' content='1; url=addkaryawan.php'>

?>