<?php
include "koneksi.php";

$nik = $_POST['nik'];
$nama = $_POST['nama'];
$tempattinggal = $_POST['tempattinggal'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$agama = $_POST['agama'];
$alamat = $_POST['alamat'];
$notelp = $_POST['notelp'];
$divisi = $_POST['divisi'];

$update = "UPDATE tbl_karyawan SET nik='$nik', nama='$nama', tempattinggal='$tempattinggal', jenis_kelamin='$jenis_kelamin', agama='$agama', alamat='$alamat', notelp='$notelp', divisi='$divisi' WHERE nik='$nik'";

$result = mysqli_query($con,$update);

if ($result) {
    echo "Data Sudah diubah
    
    ";   
}else{
    echo "Ada yang error";
}

?>

<!-- <meta http-equiv='refresh' content='1; url=index.php'> -->