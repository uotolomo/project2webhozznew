<?php
include "koneksi.php";

// var_dump ($_POST);

$nik = $_POST['nik'];
$nama = $_POST['nama'];
$tempattinggal = $_POST['tempattinggal'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$agama = $_POST['agama'];
$alamat = $_POST['alamat'];
$notelp = $_POST['notelp'];
$divisi = $_POST['divisi'];
// $foto = $_POST['foto'];

// Kode Upload
$lokasi_file   = $_FILES['foto']['tmp_name'];
$foto          = $_FILES['foto']['name'];
$tipe_file     = $_FILES['foto']['type'];
$ukuran_file   = $_FILES['foto']['size'];

$nama_baru     = preg_replace("/\s+/","_",$foto);
$direktori     = "foto/$nama_baru";
$MAX_FILE_SIZE = 500000;
$formatgambar  = array("image/jpg","image/jpeg","image/gif","image/png");

// jika foto tidak diupdate
if (empty($foto))
{
    $sql = "UPDATE tbl_karyawan SET nama='$nama',
    tempattinggal='$tempattinggal',
    jenis_kelamin='$jenis_kelamin',
    agama        ='$agama',
    alamat       ='$alamat',
    notelp       ='$notelp',
    divisi       ='$divisi' WHERE nik='$nik'";
    $result = mysqli_query($con,$sql);
}
    // jika foto diupdate
else
    {
    // Periksa Format File
    if (!in_array($tipe_file, $formatgambar)) 
    {
        echo "<script> alert('Mohon Maaf format yang digunakkan JPG, JPEG, PNG, dan GIF'); history.go(-1); </script>";
    }
    // Periksa ukuran foto
    elseif ($ukuran_file > $MAX_FILE_SIZE)
     {
        echo "<script> alert('Ukuran Foto 500kb'); history.go(-1); </script>";
    }
    
    else 
    {
   // $direktori = "foto/$nama_foto"; --> Hanya untuk Proses tambah data <--    
        move_uploaded_file($lokasi_file,$direktori);
        $sql = "UPDATE tbl_karyawan SET nama='$nama',tempattinggal='$tempattinggal',jenis_kelamin='$jenis_kelamin',
        agama='$agama',alamat='$alamat',
        notelp='$notelp',divisi='$divisi',
        foto='$nama_baru' WHERE nik='$nik'";

        $result = mysqli_query($con,$sql);
    }
}

if ($result) {

    header('location:?mod=lihatkaryawan');
    exit();

}




?>