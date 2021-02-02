<?php
    error_reporting(0);
    include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/jquery-3.4.1.min.js"></script>
</head>
<body>
    
    <div class="container col-md-10">
        <div class="card">
            <div class="card-header bg-primary text-white">
                Tabel Data Mahasiswa
            </div>
            <div class="card-body">
                <a href="index.php" class="btn btn-primary">Tambah Data</a>

                <form action="" method="POST">
                <input type="text" name="query" placeholder="Cari Data Mahasiswa"/>
                <input type="submit" name="cari" value="search"/>
            </form><br>
                <table class="table table-bordered">
                    <tr>
                        <th>NPM</th>
                        <th>NAMA</th>
                        <th>TEMPAT_LAHIR</th>
                        <th>TANGGAL_LAHIR</th>
                        <th>JENIS_KELAMIN</th>
                        <th>ALAMAT</th>
                        <th>KODE_POS</th>
                        <th>AKSI</th>
                    </tr>
                    <?php 
                        $query = $_POST['query'];
                        if($query != ''){
                            $select = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE npm LIKE '%".$query."%' OR
                            nama LIKE '%".$query."%'");
                        }else{
                            $select = mysqli_query($koneksi, "SELECT * FROM mahasiswa");
                        }
                        if(mysqli_num_rows($select)){
                        while($data = mysqli_fetch_array($select))
                        {
                    ?>
                    <tr>
                        <td> <?php echo $data['npm']; ?> </td>
                        <td> <?php echo $data['nama']; ?> </td>
                        <td> <?php echo $data['tempat_lahir']; ?> </td>
                        <td> <?php echo $data['tanggal_lahir']; ?> </td>
                        <td> <?php echo $data['jenis_kelamin']; ?> </td>
                        <td> <?php echo $data['alamat']; ?> </td>
                        <td> <?php echo $data['kode_pos']; ?> </td>
                        <td>
                            <a href="edit_mahasiswa.php?npm=<?php echo $data['npm']; ?>" class="btn btn-sm btn-warning">Edit</a>
                            <a href="delete.php?npm=<?php echo $data['npm']; ?>" class="btn btn-sm btn-warning">Hapus</a>
                        </td>
                    </tr>

                        <?php }} else{
                            echo '<tr><td colspan="7">Tidak ada data Mahasiswa</td></tr>';
                        } ?>
            </div>
        </div>
    </div>


</body>
</html>