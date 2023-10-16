<?php

require 'functions.php';

$praktikum = query("SELECT * FROM tbpraktikum");

$id = $_GET["id"];

$pkm = query("SELECT * FROM tbpraktikum WHERE id = $id")[0];

if (isset($_POST["submit"])) {
   if (editData($_POST) > 0) {
      echo "
         <script>
            alert('Data berhasil diedit');
            document.location.href = 'index.php';
         </script>
      ";
   } else {
      echo "
      <script>
         alert('Data gagal diedit');
         document.location.href = 'index.php';
      </script>
   ";
   }
}

?>

<!doctype html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Bootstrap demo</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

   <div class="container d-flex align-items-center flex-column">
      <div class="row mt-4">
         <div class="col">
            <div class="card" style="width: 56rem;">
               <div class="card-header fw-bold">
                  Create / Edit Data
               </div>
               <div class="card-body">
                  <form action="" method="post">
                     <input type="hidden" name="id" value="<?= $pkm["id"]; ?>">
                     <div class="row mb-3">
                        <label for="inputJurusan" class="col-sm-2 col-form-label">Jurusan</label>
                        <div class="col-sm-10">
                           <select name="jurusan" id="inputJurusan" class="form-select" aria-label="Default select example">
                              <option selected hidden> <?= $pkm["jurusan"]; ?> </option>
                              <option value="AKL">AKL</option>
                              <option value="BDP">BDP</option>
                              <option value="TKJ">TKJ</option>
                           </select>
                        </div>
                     </div>
                     <div class="row mb-3">
                        <label for="inputKelas" class="col-sm-2 col-form-label">Kelas</label>
                        <div class="col-sm-10">
                           <select name="kelas" id="inputKelas" class="form-select" aria-label="Default select example">
                              <option selected hidden> <?= $pkm["kelas"]; ?> </option>
                              <option value="XITKJ1">XITKJ1</option>
                              <option value="XITKJ2">XITKJ2</option>
                              <option value="XITKJ3">XITKJ3</option>
                           </select>
                        </div>
                     </div>
                     <div class="row mb-3">
                        <label for="inputHari" class="col-sm-2 col-form-label">Hari</label>
                        <div class="col-sm-10">
                           <select name="hari" id="inputHari" class="form-select" aria-label="Default select example">
                              <option selected hidden> <?= $pkm["hari"]; ?> </option>
                              <option value="Senin">Senin</option>
                              <option value="Selasa">Selasa</option>
                              <option value="Rabu">Rabu</option>
                              <option value="Kamis">Kamis</option>
                              <option value="Jumat">Jumat</option>
                           </select>
                        </div>
                     </div>
                     <div class="row mb-3">
                        <label for="inputWaktu" class="col-sm-2 col-form-label">Waktu</label>
                        <div class="col-sm-10">
                           <select name="waktu" id="inputWaktu" class="form-select" aria-label="Default select example">
                              <option selected hidden> <?= $pkm["waktu"]; ?> </option>
                              <option value="15:00-16:00">15:00-16:00</option>
                              <option value="16:00-17:00">16:00-17:00</option>
                              <option value="17:00-18:00">17:00-18:00</option>
                           </select>
                        </div>
                     </div>
                     <div class="row mb-3">
                        <label for="inputMateri" class="col-sm-2 col-form-label">Materi</label>
                        <div class="col-sm-10">
                           <input type="text" class="form-control" id="inputMateri" name="materi" value="<?= $pkm["materi"]; ?>">
                        </div>
                     </div>
                     <div class="row mb-3">
                        <label for="inputInstruktur" class="col-sm-2 col-form-label">Instruktur</label>
                        <div class="col-sm-10">
                           <input type="text" class="form-control" id="inputInstruktur" name="instruktur" value="<?= $pkm["instruktur"]; ?>">
                        </div>
                     </div>
                     <div class="row">
                        <label for="" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-3">
                           <button type="submit" class="btn btn-primary" name="submit">Simpan Data</button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>

      <div class="row mt-3">
         <div class="col">
            <div class="card" style="width: 56rem;">
               <div class="card-header fw-bold bg-secondary text-white">
                  Data Praktikum
               </div>
               <div class="card-body">
                  <table class="table">
                     <thead>
                        <tr>
                           <th scope="col">No</th>
                           <th scope="col">Jurusan</th>
                           <th scope="col">Kelas</th>
                           <th scope="col">Hari</th>
                           <th scope="col">Waktu</th>
                           <th scope="col">Materi</th>
                           <th scope="col">Instruktur</th>
                           <th scope="col">Aksi</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($praktikum as $row) : ?>
                           <tr>
                              <th> <?= $i; ?> </th>
                              <td> <?= $row["jurusan"]; ?> </td>
                              <td> <?= $row["kelas"]; ?> </td>
                              <td> <?= $row["hari"]; ?> </td>
                              <td> <?= $row["waktu"]; ?> </td>
                              <td> <?= $row["materi"]; ?> </td>
                              <td> <?= $row["instruktur"]; ?> </td>
                              <td>
                                 <a href="edit.php?id=<?= $row["id"]; ?>">Edit</a>
                                 <a href="delete.php?id=<?= $row["id"]; ?>" class="ms-2" onclick="return confirm('Anda Yakin?');">Delete</a>
                              </td>
                           </tr>
                           <?php $i++; ?>
                        <?php endforeach; ?>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>