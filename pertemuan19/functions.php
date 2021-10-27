<?php
    // koneksi ke database
    $conn = mysqli_connect("localhost","root","","phpdasar");

    // fungsi yang mengambil data dari mahasiswa
    function query($query){
        global $conn;
        $result = mysqli_query($conn, $query); // membawa seluruh data
        $rows = []; // membuat wadah untuk data

        // perulangan untuk mengambi satu persatu data dan massukkan ke wadah rows
        while($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;
    }

    function tambah($data){
        global $conn;
        // Ambil data dari tiap elemen form
        $nim = htmlspecialchars($data["nim"]);
        $nama = htmlspecialchars($data["nama"]);
        $email = htmlspecialchars($data["email"]);
        $jurusan = htmlspecialchars($data["jurusan"]);

        // upload gambar
        $gambar = upload();
        if(!$gambar){
            return false;
        }

        // query insert data
        
        $query = "INSERT INTO mahasiswa 
                    VALUES
                    ('','$nama','$nim','$email','$jurusan','$gambar')";
        $data = mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

    function upload(){
        $namafile = $_FILES['gambar']['name'];
        $ukurangambar = $_FILES['gambar']['size'];
        $error = $_FILES['gambar']['error'];
        $tmpname = $_FILES['gambar']['tmp_name'];

        // cek gambar di upload atau tidak
        if($error === 4){
            echo "<script>
                alert('Pilih Gambar Terlebih dahulu!');
            </script>";
            return false;
        }

        // cek apakah file gambar atau bukan
        $extensiGambarValid = ['jpg','jpeg','png','gif'];
        $extensiGambar = explode('.',$namafile);
        $extensiGambar = strtolower(end($extensiGambar));
        if(!in_array($extensiGambar,$extensiGambarValid)){
            echo "<script>
                alert('Yang anda upload bukan gambar');
            </script>";
        }

        // cek apakah file terlalu besar atau lebih dari 1000kb
        if($ukurangambar > 1000000){
            echo "<script>
                alert('Ukuran file yang anda upload terlalu besar/lebih dari 1Mb');
            </script>";
            return false;
        }

        // lulus pengecekan
        // generate nama gambar baru
        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $extensiGambar;
        if(move_uploaded_file($tmpname, 'img/'.$namaFileBaru)){
            
            return $namaFileBaru;
        }

    }

    function hapus($id){
        global $conn;
        mysqli_query($conn,"DELETE FROM mahasiswa WHERE id = $id");
        return mysqli_affected_rows($conn);
    }

    function ubah($data){
        global $conn;
        // Ambil data dari tiap elemen form
        $id = $data["id"];
        $nim = htmlspecialchars($data["nim"]);
        $nama = htmlspecialchars($data["nama"]);
        $email = htmlspecialchars($data["email"]);
        $jurusan = htmlspecialchars($data["jurusan"]);
        $gambarLama = htmlspecialchars($data["gambarLama"]);

        // cek apakah gambar baru di upload atau tidak
        if($_FILES['gambar']['error'] === 4){
            $gambar = $gambarLama;
        }else{
            $gambar = upload();
        }

        // query update data
        $query = "UPDATE mahasiswa SET
                    nim ='$nim',
                    nama = '$nama',
                    email = '$email',
                    jurusan = '$jurusan',
                    gambar = '$gambar'
                    WHERE id = $id";
        
        $data = mysqli_query($conn, $query);
        // var_dump($id);

        return mysqli_affected_rows($conn);
    }

    function cari($keyword){
        $query = "SELECT * FROM mahasiswa
                WHERE nama LIKE '%$keyword%' OR
                nim LIKE '%$keyword%' OR
                email LIKE '%$keyword%' OR
                jurusan LIKE '%$keyword%'";

        return query($query);
    }

    function registrasi($data){
        global $conn;

        $username = strtolower(stripslashes($data["username"]));
        $password = mysqli_real_escape_string($conn, $data["password"]);
        $password2 = mysqli_real_escape_string($conn, $data["password2"]);

        // cek username sudah ada atau belum
        $result = mysqli_query($conn,"SELECT username FROM user WHERE username = '$username'");
        if( mysqli_fetch_assoc($result)){
            echo "<script>
                alert('Username sudah terdaftar!');
                </script>";
            return false;
        }
        // cek konfirmasi paswword
        if($password !== $password2){
            echo "<script>
                    alert('konfirmasi password tidak sesuai!');
                </script>";
            return false;
        }

        // enkripsi password
        $password = password_hash($password, PASSWORD_DEFAULT);
        

        // tambahkan username dan password ke database
        mysqli_query($conn, "INSERT INTO user VALUES('','$username','$password')");

        return mysqli_affected_rows($conn);

    }
?>