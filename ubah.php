<?php 
session_start();

if( !isset($_SESSION["login"])) {
    header("location: login.php");
    exit;
}

require 'functions.php';

//  ambil data dari url
$id = $_GET["id"];

// query data siswa berdasarkan id
$is = query ("SELECT * FROM siswa WHERE id = $id ")[0];


// cek apakah tombol submit sudah di klik atau belum
if( isset($_POST["submit"]) ){
    
    // cek apakah data berhasil di ubah atau tidak
    if(ubah($_POST) > 0 ) {
       echo "
        <script>
            alert('data berhasil diubah!');
            document.location.href = 'index.php';
        </script>    
    ";
} else {
        echo "
            <script>
                alert('data gagal diubah!');
                document.location.href = 'index.php';
            </script>    
        "; 
    }
}


?>
<!DOCTYPE html>
<html>
<head>
    <title>Ubah Data Siswa</title>
</head>
<body>
    <h1>Ubah Data Siswa</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $is["id"]; ?>">
        <input type="hidden" name="gambarLama" value="<?= $is["gambar"]; ?>">
        <ul>
            <li>
                <label for="nama">Nama : </label>
                <input type="text" name="nama" id="nama" value="<?= $is["nama"]; ?> ">
            </li>
            <li>
                <label for="notel">Notel : </label>
                <input type="text" name="notel" id="notel" value="<?= $is["notel"]; ?> ">
            </li>
            <li>
                <label for="email">Email : </label>
                <input type="text" name="email" id="email" value="<?= $is["email"]; ?> ">
            </li>
            <li>
                <label for="jurusan">Jurusan : </label>
                <input type="text" name="jurusan" id="jurusan" value="<?= $is["jurusan"]; ?> ">
            </li>
            <li>
                <label for="gambar">Gambar : </label> <br>
                <img src="img/<?= $is['gambar']; ?>" width="40"> <br>
                <input type="file" name="gambar" id="gambar">
            </li>
            <li>
                <button type="submit" name="submit">Ubah Data</button>
            </li>
        </ul>
    </form>
</body>
</html>