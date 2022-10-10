<?php
class Mahasiswa_model
{
  private $dbh; //database handler
  private $stmt;

  public function __construct()
  {
    //data source name
    $dsn = "mysql:host=localhost;dbname=phpmvc";

    try {
      $this->dbh = new PDO($dsn, 'root', '');
    } catch (PDOException $e) {
      die($e->getMessage());
    }
  }
  // private $mhs = [
  //   [
  //     "nama" => "Muhammad Fathurrohman Haris",
  //     "nrp" => "203040015",
  //     "email" => "fathurrohmanharis@gmail.com",
  //     "jurusan" => "Teknik Informatika"
  //   ],
  //   [
  //     "nama" => "Imam Ansori",
  //     "nrp" => "203030015",
  //     "email" => "imam@gmail.com",
  //     "jurusan" => "Teknik Mesin"
  //   ],
  //   [
  //     "nama" => "Nasrul Fatah",
  //     "nrp" => "203020015",
  //     "email" => "nasrul@gmail.com",
  //     "jurusan" => "Teknik Industri"
  //   ]
  // ];

  public function getAllMahasiswa()
  {
    $this->stmt = $this->dbh->prepare('SELECT * FROM mahasiswa');
    $this->stmt->execute();
    return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}
