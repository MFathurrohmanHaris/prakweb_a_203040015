<!-- Menambahkan fungsi Update -->
<?php
require '../functions.php';

if (!isset($_GET['id'])) {
  header("Location: ../index.php");
  exit;
}

$id = $_GET['id'];

$bk = query("SELECT * FROM buku WHERE buku_id = $id");

if (isset($_POST['ubah'])) {
  if (ubahBuku($_POST) > 0) {
    echo "<script>
            alert('data berhasil diubah!');
            document.location.href = '../index.php';
          </script>";
  } else {
    echo "data gagal diubahkan!";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ubah Buku</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
  <h1>
    <center>Ubah Buku</center>
  </h1>
  <div class="container">
    <form class="row g-3" method="POST" action="" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?= $bk['buku_id'] ?>">
      <div class="col-md-4">
        <label for="validationServer01" class="form-label">Judul Buku</label>
        <input type="text" class="form-control" name="buku_judul" id="validationServer01" value="<?= $bk['buku_judul'] ?>" autofocus required>
      </div>
      <div class="col-md-4">
        <label for="validationServer02" class="form-label">Jenis Buku</label>
        <input type="text" class="form-control " name="buku_jenis" id="validationServer02" value="<?= $bk['buku_jenis'] ?>" required>
      </div>
      <div class="col-md-4">
        <label for="validationServer02" class="form-label">Penulis</label>
        <input type="text" class="form-control " name="buku_penulis" id="validationServer02" value="<?= $bk['buku_penulis'] ?>" required>
      </div>
      <div class="col-md-4">
        <label for="validationServer02" class="form-label">Tahun Terbit</label>
        <input type="text" class="form-control " name="buku_tahun_terbit" id="validationServer02" value="<?= $bk['buku_tahun_terbit'] ?>" required>
      </div>
      <div class="col-md-8">
        <input type="hidden" name="gambar_lama" value="<?= $bk['buku_gambar'] ?>">
        <label for="validationServer02" class="form-label">Upload File Gambar</label>
        <input type="file" class="form-control gambarBuku" name="buku_gambar" id="validationServer02" onchange="previewImage()" required>
      </div>
      <div>
        <img src="../img/<?= $bk['buku_gambar'] ?>" width="120" class="img-preview">
      </div>
      <div class="col-12">
        <button class="btn btn-primary" type="submit" name="ubah">Tambah Data</button>
      </div>
    </form>
  </div>
  <script src="../js/script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>