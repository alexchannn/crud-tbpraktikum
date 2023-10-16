<?php

$conn = mysqli_connect("localhost", "root", "", "dbujian");

function query($query)
{
   global $conn;

   $result = mysqli_query($conn, $query);
   $rows = [];
   while ($row = mysqli_fetch_assoc($result)) {
      $rows[] = $row;
   }
   return $rows;
}

function insertData($data)
{
   global $conn;

   $jurusan = htmlspecialchars($data["jurusan"]);
   $kelas = htmlspecialchars($data["kelas"]);
   $hari = htmlspecialchars($data["hari"]);
   $waktu = htmlspecialchars($data["waktu"]);
   $materi = htmlspecialchars($data["materi"]);
   $instruktur = htmlspecialchars($data["instruktur"]);

   $query = "INSERT INTO tbpraktikum
            VALUES
            ('', '$jurusan', '$kelas', '$hari', '$waktu', '$materi', '$instruktur')
   ";

   mysqli_query($conn, $query);

   return mysqli_affected_rows($conn);
}

function deleteData($id)
{
   global $conn;

   mysqli_query($conn, "DELETE FROM tbpraktikum WHERE id = $id");

   return mysqli_affected_rows($conn);
}

function editData($data)
{
   global $conn;

   $id = $data["id"];
   $jurusan = htmlspecialchars($data["jurusan"]);
   $kelas = htmlspecialchars($data["kelas"]);
   $hari = htmlspecialchars($data["hari"]);
   $waktu = htmlspecialchars($data["waktu"]);
   $materi = htmlspecialchars($data["materi"]);
   $instruktur = htmlspecialchars($data["instruktur"]);

   $query = "UPDATE tbpraktikum SET
         jurusan = '$jurusan',
         kelas = '$kelas',
         hari = '$hari',
         waktu = '$waktu',
         materi = '$materi',
         instruktur = '$instruktur'
      WHERE id = $id
   ";

   mysqli_query($conn, $query);

   return mysqli_affected_rows($conn);
}
