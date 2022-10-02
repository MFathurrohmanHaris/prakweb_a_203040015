<?php
function koneksidb()
{
  return mysqli_connect('localhost', 'root', '', 'prakweb_a_203040015_pw');
}

function query($query)
{
  $con = koneksidb();
  $result = mysqli_query($con, $query);
  // jika hasilnya hanya 1 data
  if (mysqli_num_rows($result) == 1) {
    return mysqli_fetch_assoc($result);
  }

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}

function upload()
{
  $nama_file = $_FILES['buku_gambar']['name'];
  $tipe_file = $_FILES['buku_gambar']['type'];
  $ukuran_file = $_FILES['buku_gambar']['size'];
  $error = $_FILES['buku_gambar']['error'];
  $tmp_file = $_FILES['buku_gambar']['tmp_name'];

  // ketika tidak ada gambar dipilih
  if ($error == 4) {
    // echo "<script>
    //         alert('pilih gambar terlebih dahulu!');
    //       </script>";
    return 'nophoto.jpg';
  }

  // cek ekstensi file
  $daftar_gambar = ['jpg', 'jpeg', 'png'];
  $ekstensi_file = explode('.', $nama_file);
  $ekstensi_file = strtolower(end($ekstensi_file));
  if (!in_array($ekstensi_file, $daftar_gambar)) {
    echo "<script>
            alert('yang anda pilih bukan gambar!');
          </script>";
    return false;
  }

  // cek type file
  if ($tipe_file != 'image/jpeg' && $tipe_file != 'image/png') {
    echo "<script>
            alert('yang anda pilih bukan gambar!');
          </script>";
    return false;
  }

  // cek ukuran file
  // maksimal 5mb = 5000000
  if ($ukuran_file > 5000000) {
    echo "<script>
            alert('ukuran terlalu besar!');
          </script>";
    return false;
  }

  // lolos pengecekan
  // siap upload file
  // generate nama file baru
  $nama_file_baru = uniqid();
  $nama_file_baru .= '.';
  $nama_file_baru .= $ekstensi_file;
  move_uploaded_file($tmp_file, '../img/' . $nama_file_baru);

  return $nama_file_baru;
}

// function tambah untuk view tambah.php
function tambah($data)
{
  $con = koneksidb();

  $judul       = htmlspecialchars($data['buku_judul']);
  $jenis       = htmlspecialchars($data['buku_jenis']);
  $penulis     = htmlspecialchars($data['buku_penulis']);
  $tahunTerbit = htmlspecialchars($data['buku_tahun_terbit']);

  $gambar = upload();
  if (!$gambar) {
    return false;
  }

  $query = "INSERT INTO
            buku
            VALUES
            (null, '$judul','$jenis','$penulis','$tahunTerbit','$gambar')";

  mysqli_query($con, $query) or die(mysqli_error($con));

  return mysqli_affected_rows($con);
}

// function ubah untuk view ubah.php
function ubahBuku($data)
{
  $con = koneksidb();

  $id          = $data['id'];
  $judul       = htmlspecialchars($data['buku_judul']);
  $jenis       = htmlspecialchars($data['buku_jenis']);
  $penulis     = htmlspecialchars($data['buku_penulis']);
  $tahunTerbit = htmlspecialchars($data['buku_tahun_terbit']);
  $gambarLama  = htmlspecialchars($data['gambar_lama']);

  $gambar = upload();
  if (!$gambar) {
    return false;
  }

  if ($gambar == 'nophoto.jpg') {
    $gambar = $gambarLama;
  }

  $query = "UPDATE buku SET
            buku_judul        = '$judul',
            buku_jenis        = '$jenis',
            buku_penulis      = '$penulis',
            buku_tahun_terbit = '$tahunTerbit',
            buku_gambar       = '$gambar'
            WHERE buku_id = $id";

  mysqli_query($con, $query) or die(mysqli_error($con));

  return mysqli_affected_rows($con);
}

// function hapus di folder view hapus.php
function hapusBuku($id)
{
  $con = koneksidb();

  $bk = query("SELECT * FROM buku WHERE buku_id = $id");
  if ($bk['buku_gambar'] != 'nophoto.jpg') {
    unlink('../img/' . $bk['buku_gambar']);
  }
  $hapusBuku = "DELETE FROM buku WHERE buku_id = $id";
  mysqli_query($con, $hapusBuku);
  return mysqli_affected_rows($con);
}
