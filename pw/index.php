<?php
require 'functions.php';

$buku = query("SELECT * FROM buku");
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tabel Buku</title>
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <!-- icon -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <style>
    .SBtnTambah {
      margin-left: 75px;
    }
  </style>
</head>

<body>
  <!-- <h1>PR INSERT UPDATE DELETE</h1> -->
  <h1 class="text-center">Daftar Buku</h1>
  <br>
  <a href="view/tambah.php" class="btn btn-success mb-2 SBtnTambah">Tambah Buku</a>
  <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Cover Buku</th>
        <th scope="col">Judul Buku</th>
        <th scope="col">Jenis Buku</th>
        <th scope="col">Penulis</th>
        <th scope="col">Tahun Terbit</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php $i = 1;
      foreach ($buku as $b) : ?>
        <tr>
          <td><?= $i++ ?></td>
          <td><img src="img/<?= $b['buku_gambar'] ?>" width=100 alt=""></td>
          <td><?= $b['buku_judul'] ?></td>
          <td><?= $b['buku_jenis'] ?></td>
          <td><?= $b['buku_penulis'] ?></td>
          <td><?= $b['buku_tahun_terbit'] ?></td>
          <td>
            <a href="view/ubah.php?id=<?= $b['buku_id'] ?>" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
            <a href="view/hapus.php?id=<?= $b['buku_id'] ?>" onclick="return confirm('Yakin akan dihapus ?')" class="btn btn-danger"><i class="bi bi-trash"></i></a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>