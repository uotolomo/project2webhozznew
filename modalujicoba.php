<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cek Sound</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>

<table class="table" style="text-align:center; margin-left:-0px">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">NIK</th>
      <th scope="col">Nama Karyawan</th>
      <th scope="col">Tempat Tinggal</th>
      <th scope="col">Jenis Kelamin</th>
      <th scope="col">Agama</th>
      <th scope="col">Alamat</th>
      <th scope="col">Nomor Telepon</th>
      <th scope="col">Divisi Pekerjaan</th>
      <th scope="col">Foto</th>
      <th scope="col" style="text-align:center">Aksi</th>
    </tr>
  </thead>
  <tbody>

    <?php
    //   $nik = 1;
    
    include "koneksi.php";
    $tampil = "SELECT * FROM tbl_karyawan";
    $sql = mysqli_query($con,$tampil);
    $no = 1;
    while ($data = mysqli_fetch_array($sql)) {
      $nik = $data['nik'];
      $nama = $data['nama'];
      $tempattinggal = $data['tempattinggal'];
      $jenis_kelamin = $data['jenis_kelamin'];
      $agama = $data['agama'];
      $alamat = $data['alamat'];
      $notelp = $data['notelp'];
      $divisi = $data['divisi'];
      $foto = $data['foto'];

    ?>
    <tr>
      <th scope="row">
      <?php echo "$no"?>
      </th>
      <td><?php echo "$nik"?></td>
      <td><?php echo "$nama"?></td>
      <td><?php echo "$tempattinggal"?></td>
      <td><?php echo "$jenis_kelamin"?></td>
      <td><?php echo "$agama"?></td>
      <td><?php echo "$alamat"?></td>
      <td><?php echo "$notelp"?></td>
      <td><?php echo "$divisi"?></td>
      <td>
      <center>
      <img src="foto/<?php echo $foto;?>" alt="" style="height:60px; width:60px;">
      </center>
      </td>
      <td colspan=2>
      <a href="#" class="btn btn-info" data-toggle="modal" data-target="#exampleModal<?php echo $nik;?>">Edit</a>
<!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">
  Edit
</button> -->
</td>
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
            <form action="#" method="post" enctype="multipart/form-data">
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
                <input type="text" value="<?php echo$c['jenis_kelamin'];?>" name="jenis_kelamin" class="form-control">
            </div>
            <div class="form-group">
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
                <input type="text" value="<?php echo$c['divisi'];?>" name="divisi" class="form-control">
            </div>
            <div class="form-group">
            <label>Upload Photo</label>
            <input type="file" name="foto" class="form-control">
            <input type="hidden" name="foto_tmp" value="<?php echo $foto; ?>" class="form-control">
        </div>
        <div class="form-group">
            <label>Photo</label> <br>
                <img src="foto/<?php echo $c['foto']; ?>" width="100" height="100">
        </div>
            <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
        </div> 
            </form>
            </div>
      </div>
      
    </div>
  </div>

  <!-- <td colspan=2>
      <a href=<?php echo "editkaryawan.php?nik=$nik"?>><button type="button" class="btn btn-info">Edit</button></a>
      <a href=<?php echo "hapuskaryawan.php?nik=$nik"?>><button type="button" class="btn btn-warning">Hapus</button></a>
      </td> -->
  
    </tr>
    
  </tbody>

  

  <?php $no ++; } ?></div>

</body>
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>  
</html><!-- Button trigger modal -->
