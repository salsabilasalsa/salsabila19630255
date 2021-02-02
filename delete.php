<?php
    include "koneksi.php";
    $npm = $_GET['npm'];
    $ambilData = mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE npm='$npm'");
    echo "<meta http-equiv='refresh' content='1;url=http://localhost/datamahasiswa/data_mahasiswa.php'>";
?>