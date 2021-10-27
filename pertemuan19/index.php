<?php
    session_start();

    if (!isset($_SESSION["login"])){
        header("Location: login.php");
        exit;
    }
    require 'functions.php';
    
    $mahasiswa = query("SELECT * FROM mahasiswa");

    // tombol cari ditekan
    if(isset($_POST["cari"])){
        $mahasiswa = cari($_POST["keyword"]);
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
</head>
<body>
    <a href="logout.php">Logout</a>
    <h1>Daftar Mahasiswa</h1>
    <br>

    <a href="tambah.php">Tambah data mahasiswa</a>
    <br><br>
    <form action="" method="POST">
        <input type="text" name="keyword" size="40" autofocus placeholder="massukan keyword pencarian" autocomplete="off" id="keyword">
        <button type="submit" name="cari" id="tombol-cari">Cari</button>
    </form>
    <br>
    <div id="container">
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Aksi</th>
            <th>Gambar</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Jurusan</th>
        </tr>

        <?php $i = 1; ?>
        <?php foreach($mahasiswa as $row) :?>
        <tr>
            <td><?= $i?></td>
            <td>
                <a href="ubah.php?id=<?= $row["id"]?>">Ubah</a> |
                <a href="hapus.php?id=<?= $row["id"]?>" onclick="return confirm('Yakin ingin menghapus data mahasiswa ini?')">Hapus</a>
            </td>
            <td><img src="img/<?= $row["gambar"]?>" width="50" alt=""></td>
            <td><?= $row["nim"]?></td>
            <td><?= $row["nama"]?></td>
            <td><?= $row["email"]?></td>
            <td><?= $row["jurusan"]?></td>
        </tr>
        <?php $i++?>
        <?php endforeach;?>
    </table>
    </div>
    
    <script src="js/script.js"></script>
</body>
</html>