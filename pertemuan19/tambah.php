<?php
    session_start();

    if (!isset($_SESSION["login"])){
        header("Location: login.php");
        exit;
    }
    
    require "functions.php";
    // cek apakah tombol submit sudah ditekan atau belum
    if(isset($_POST["submit"])){
        
        // var_dump($_POST);
        // var_dump($_FILES);die;

        

        // Cek apakah data berhasil ditambahkan atau tidak
        if(tambah($_POST) > 0){
            echo "
                <script>
                    alert('Data berhasil ditambahkan.');
                    document.location.href = 'index.php'
                </script>
            ";

        }else{
            echo "
            <script> 
                alert('Data gagal ditambahkan.');
                document.location.href = 'index.php'
            </script>";
            // echo "<br>";
            // echo mysqli_error($conn);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
    <h1>Tambah data Mahasiswa</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <div class="mb-3">
                <label for="nim" class="form-label">NIM</label>
                <input type="text" class="form-control" id="nim" name="nim">
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" name="email">
            </div>
            <div class="mb-3">
                <label for="jurusan">Jurusan :</label>
                <select class="form-select" aria-label="Default select example" name="jurusan" id="jurusan">
                    <option selected>Tidak Ada</option>
                    <option value="Teknik Informatika">Teknik Informatika</option>
                    <option value="Teknik Mesin">Teknik Mesin</option>
                    <option value="Teknik Elekro">Teknik Elekro</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar</label>
                <input type="file" class="form-control" id="gambar" name="gambar">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Tambah Data</button>
        </ul>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>