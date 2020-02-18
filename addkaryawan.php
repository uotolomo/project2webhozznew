<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Tambah Karyawan</title>
</head>
<body>
<form role="form" action="proseskaryawan.php" method="post" style="padding-top:20px; padding-left:20px; padding-right:30px;" enctype="multipart/form-data">
<tr>
  <div class="form-group">
    <label for="formGroupExampleInput">Nama Karyawan</label>
    <input type="text" class="form-control" name="nama" id="formGroupExampleInput" placeholder="Nama Karyawan">
  </div>
  </tr>
  <div class="form-group">
    <label for="formGroupExampleInput2">Tempat Tinggal</label>
    <input type="text" class="form-control" name="tempattinggal" id="formGroupExampleInput2" placeholder="Tempat Tinggal">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Jenis Kelamin</label>
    <div class="form-check form-check-inline" style="margin-left:20px; margin-bottom:10px;" >
    <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio1" value="PRIA">
    <label class="form-check-label" for="inlineRadio1">PRIA</label>
  </div>
  <div class="form-check form-check-inline" style="margin-left:20px; margin-bottom:10px;" >
    <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio2" value="WANITA">
    <label class="form-check-label" for="inlineRadio2">WANITA</label>
  </div>
  </div>
  <div class="form-group" style="margin-top:-15px;">
    <label for="formGroupExampleInput2">Agama</label>
    <select class="custom-select" name="agama">
    <option selected>Agama</option>
    <option value="Islam">Islam</option>
    <option value="Kristen">Kristen</option>
    <option value="Budha">Budha</option>
    <option value="Hindu">Hindu</option>
    </select>
  <div class="form-group">
    <label for="formGroupExampleInput2">Alamat</label>
    <input type="text" class="form-control" name="alamat" id="formGroupExampleInput2" placeholder="Alamat">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Telepon</label>
    <input type="text" class="form-control" name="notelp" id="formGroupExampleInput2" placeholder="Nomor yang bisa dihubungi">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Divisi</label>
    <select class="custom-select" name="desk_divisi">
    <?php
    include "koneksi.php";
    $sql = "SELECT * FROM divisi";
    $list = mysqli_query($con, $sql);
    while ($data = mysqli_fetch_array($list)) {
      $kode_divisi = $data['kode_divisi'];
      $desk_divisi = $data['desk_divisi'];
    ?>
    <option value="<?php echo $desk_divisi; ?>"><?php echo $desk_divisi; ?>
  </option>
  <?php } ?>
  </select>
  </div>
    <div class="form-group">
      <div class="input-group mb-3">
      <input type="file" name="foto">
  </div>
  </div>
</div>
<td rowspan=3>
<div class="form-group">
<button type="submit" class="btn btn-primary">Tambah</button>
</div>
</td>

</form>   
</body>
</html>