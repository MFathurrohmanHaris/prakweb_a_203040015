<?php
class Mahasiswa_model
{
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

  private $table = 'mahasiswa';
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function getAllMahasiswa()
  {
    $this->db->query('SELECT * FROM ' . $this->table);
    return $this->db->resultSet();
  }

  public function getMahasiswaById($id)
  {
    $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
    $this->db->bind('id', $id);
    return $this->db->single();
  }
}
