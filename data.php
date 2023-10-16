<?php

require 'functions.php';

if (isset($_POST["submit"])) {
   if (insertData($_POST) > 0) {
      echo "
         <script>
            alert('Data berhasil disimpan');
            document.location.href = 'index.php';
         </script>
      ";
   } else {
      echo "
      <script>
         alert('Data gagal disimpan');
         document.location.href = 'index.php';
      </scrip>
   ";
   }
}