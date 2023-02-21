<?php
session_start();

if( !isset($_SESSION["login"])) {
    header("location: login.php");
    exit;
}


require 'functions.php';
$siswa = query("SELECT * FROM siswa");

// tombol cari diklik 
if(isset($_POST["cari"]) ){
    $siswa = cari($_POST["keyword"]);
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Halaman Admin</title>
    <style>
        .loader{
            width: 100px;
            position: absolute;
            top: 118px;
            left: 218px;
            z-index: -1;
            display: none;
        }
    </style>


    <script src="js/jquery-3.6.3.min.js"></script>
    <script src="js/script.js"></script>
    
</head>
<body>

<a href="logout.php">Logout</a>

<h1>Daftar Siswa</h1>    

<a href="tambah.php">Tambah Data Siswa</a>
<br><br>

<form action="" method="post" >

    <input type="text" name="keyword" size="32" autofocus placeholder="masukan keyword pencarian..." autocompelate="off" id="keyword">
    <button type="submit" name="cari" id="tombol_cari">Cari!</button>


</form>

<img src="img/loadergas.gif" class="loader">

<br>
<div id="container">
<table border="1" cellpadding="10" cellspacing="0">

    <tr>
        <th>No.</th>
        <th>Aksi</th>
        <th>Gambar</th>
        <th>Notel</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Jurusan</th>
    </tr>

    <?php $i = 1; ?>
      <?php foreach( $siswa as $row ) : ?>
    <tr>
        <td><?= $i; ?></td>
        <td>
            <a href="ubah.php?id=<?= $row["id"]; ?>">ubah</a> |
            <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Kalo tidak yakin pikirkan dulu saja!');">hapus</a>
        </td>
        <td><img src="img/<?= $row["gambar"]; ?>" width="50"></td>
        <td><?= $row ["nama"]; ?></td>
        <td><?= $row ["notel"]; ?></td>
        <td><?= $row ["email"]; ?></td>
        <td><?= $row ["jurusan"]; ?></td>


    </tr>
    <?php $i++; ?>
    <?php endforeach; ?>    


</table>
</div>



</body>
</html>