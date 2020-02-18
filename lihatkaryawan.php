<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Karyawan</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

</head>
<body>

<form action="?mod=hapus_multiple" method="post">
<div class="container-fluid">
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th>#</th>
      <th>NIK</th>
      <th>Nama Karyawan</th>
      <th>Tempat Tinggal</th>
      <th>Jenis Kelamin</th>
      <th>Agama</th>
      <th>Alamat</th>
      <th>Nomor Telepon</th>
      <th>Divisi Pekerjaan</th>
      <th>Foto</th>
      <th style="width:11%;">Aksi</th>
      <th>Pilih</th>
    </tr>
  </thead>
  <tbody style="font-size:15px;">

    <?php
    //   $nik = 1;
    
    include "koneksi.php";
    
    // Tampil Data Query
    $tampil = "SELECT * FROM tbl_karyawan";
    // Paginasi (Membuat Halaman)
    $sqlcount = "SELECT COUNT(nik) FROM tbl_karyawan";
    $rscount = mysqli_fetch_array(mysqli_query($con, $sqlcount));
    $banyakdata = $rscount[0];
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $limit = 5;
    $mulai_dari = $limit * ($page - 1);
    $query = "SELECT * FROM tbl_karyawan, divisi WHERE tbl_karyawan.kode_divisi = divisi.kode_divisi ORDER BY nik DESC LIMIT $mulai_dari, $limit";
    // Akhir Paginasi
    $sql = mysqli_query($con,$tampil);
    $no = 1;
    while ($data = mysqli_fetch_array($sql)) {
      $nik           = $data['nik'];
      $nama          = $data['nama'];
      $tempattinggal = $data['tempattinggal'];
      $jenis_kelamin = $data['jenis_kelamin'];
      $agama         = $data['agama'];
      $alamat        = $data['alamat'];
      $notelp        = $data['notelp'];
      $desk_divisi   = $data['desk_divisi'];
      $foto          = $data['foto'];
      
    ?>
      <th scope="row-fluid">
      <?php echo "$no"?>
      </th>
      <td><?php echo "$nik"?></td>
      <td><?php echo "$nama"?></td>
      <td><?php echo "$tempattinggal"?></td>
      <td><?php echo "$jenis_kelamin"?></td>
      <td><?php echo "$agama"?></td>
      <td><?php echo "$alamat"?></td>
      <td><?php echo "$notelp"?></td>
      <td><?php echo "$desk_divisi"?></td>
      <td><img src="foto/<?php echo $foto;?>" alt="" width='50'></td>
      <td>
      <a href="#" class="btn btn-info" data-toggle="modal" data-target="#exampleModal<?php echo $nik;?>"><i class="fa fa-pencil"></i></a>
      <!-- <td>
        <input type="checkbox" name="data[]"value="<?php echo $nik; ?>">
      </td> -->


<!-- Modal -->
<div class="modal fade" id="exampleModal<?php echo $nik;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data Karyawan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?php
            $b = $nik;
            $a = mysqli_query($con,"SELECT * FROM tbl_karyawan WHERE nik='$b'");
            $c = mysqli_fetch_array($a);
            ?>
            <form action="?mod=karyawanprosesedit" method="post" enctype="multipart/form-data">
            <input type="text" value="<?php echo $b;?>" name="nik">
            <div class="form-group">
                <label>Nama Karyawan</label>
                <input type="text" value="<?php echo$c['nama'];?>" name="nama" class="form-control">
            </div>
            <div class="form-group">
                <label>Tempat Tinggal</label>
                <input type="text" value="<?php echo$c['tempattinggal'];?>" name="tempattinggal" class="form-control">
            </div>
            <div class="form-group">
                <label>Jenis Kelamin</label>
                <!-- <input type="text" value="<?php echo$c['jenis_kelamin'];?>" name="jenis_kelamin" class="form-control"> -->
                <input type="radio" value="Laki-laki" name="jenis_kelamin" <?php if($c['jenis_kelamin']=="Laki-laki") echo "checked"; ?> > Laki - laki
                <input type="radio" value="Perempuan" name="jenis_kelamin" <?php if($c['jenis_kelamin']=="Perempuan") echo "checked"; ?> > Perempuan
            </div>
            <div class="form-group" style="margin-top:-15px;">
                <label>Agama</label>
                <input type="text" value="<?php echo$c['agama'];?>" name="agama" class="form-control">
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <input type="text" value="<?php echo$c['alamat'];?>" name="alamat" class="form-control">
            </div>
            <div class="form-group">
                <label>Nomor Telepon</label>
                <input type="text" value="<?php echo$c['notelp'];?>" name="notelp" class="form-control">
            </div>
            <div class="form-group">
                <label>Divisi</label>
                <input type="text" value="<?php echo$c['desk_divisi'];?>" name="desk_divisi" class="form-control">
            </div>
            <div class="form-group">
            <label>Upload Photo</label>
            <input type="file" name="foto">
            <input type="hidden" name="foto_tmp" value="<?php echo $foto; ?>" class="form-control">
        </div>
        <div class="form-group">
            <label>Photo</label> <br>
                <img src="foto/<?php echo $c['foto']; ?>" width="100" height="100">
        </div>
            <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
        </div> 
            </form>
          </div> 
          <!-- Ending Modal Edit -->
      </div>
      <!-- Ending Modal Content -->
    </div>
    <!-- Ending Modal -->
  </div>
  <!-- Ending Tombol Edit -->
  <a href='<?php echo "?mod=hapuskaryawan&nik=$nik"?>' onclick="return confirm('Yakin Data Akan Dihapus ?')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
          </td>
          <td>
          <input type="checkbox" name="data[]" value="<?php echo $nik; ?>">
          </td>
        </tr>
      <?php 
    $no ++; } 
  ?>
  </tr>
  <td colspan="13" align="right">
      <button type="submit" class="btn btn-danger" onclick="returnconfirm('Data Akan Dihapus ?')">Hapus</button>
  </td>
    </tbody>
  </table>
  <?php
  $banyakhalaman = ceil($banyakdata / $limit);
  echo "Halaman : ";
  for ($i=1; $i < $banyakhalaman; $i++) { 
    if ($page != $i) {
        echo "<li><a href=?mod='lihatkaryawan&page=".$i."'></a></li>";
    }else {
      echo "[$i]";
    }
  }
  ?>
  </div>
</body>
<script src="js/jquery-3.4.1.min.js"></script>


</html>
