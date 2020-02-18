<?php
include "koneksi.php";
$nik = $_GET['nik'];

$cek = "SELECT foto FROM tbl_karyawan WHERE nik = '$nik'";
$querycek = mysqli_query($con, $cek);
$data = mysqli_fetch_array($querycek);
$foto = $data['foto'];

// hapus File Foto
unlink("foto/".$foto);


// Hapus Hanya data pada database
$query = "DELETE FROM tbl_karyawan WHERE nik ='$nik'";
$result = mysqli_query($con, $query);


if ($query) {
    echo "Sudah Dihapus
    <meta http-equiv='refresh' content='1; url=?mod=lihatkaryawan'>";
}else {
    echo "Hapus Gagal, Coba Lagi";
}


?>