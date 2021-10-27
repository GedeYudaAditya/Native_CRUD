<?php 
    require 'functions.php';
    session_start();

    // cek cookie
    if(isset($_COOKIE['set']) && isset($_COOKIE['key'])){
        $id = $_COOKIE['set'];
        $key = $_COOKIE['key'];
        
        //  ambil username berdasarkan id
        $result = mysqli_query($conn, "SELECT username FROM user WHERE id = $id");

        $row = mysqli_fetch_assoc($result);

        // cek cookie dan username
        if($key === hash('sha256', $row['username'])){
            $_SESSION['login'] = true;
        }

    }

    if (isset($_SESSION["login"])){
        header("Location: index.php");
        exit;
    }

    if(isset($_POST["login"])){

        $username = $_POST["username"];
        $password = $_POST["password"];

        $user = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username';");

        // cek username
        if(mysqli_num_rows($user) === 1){

            // cek password
            $row = mysqli_fetch_assoc($user);
            if(password_verify($password, $row["password"])){
                // set session
                $_SESSION["login"] = true;
                // check remember me
                if(isset($_POST['ingat'])){
                    // Buat cookie

                    setcookie('set', $row['id'], time()+60);
                    setcookie('key', hash('sha256',$row['username']), time()+60);
                }
                header("Location: index.php");
                exit;
            }
        }
        $error = true;
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman login</title>
    <style>
        .link{
            background-color: gray;
            width: 100%;
            height: 50px;
            text-align: right;
            line-height: 50px;
        }
        .a{
            padding: 10px;
        }
    </style>
</head>
<body>
    <div class="link"><a class="a" href="registrasi.php">Registrasi</a></div>
    <?php if (isset($error)) :?>
        <p style="color: red; font-style: italic;">username atau password salah!</p>
    <?php endif;?>
    <h1>Halaman Login</h1>
    <form action="" method="POST">
        <ul>
            <li>
                <label for="username">Username :</label>
                <input type="text" name="username" id="username">
            </li>
            <li>
                <label for="password">Password :</label>
                <input type="password" name="password" id="password">
            </li>
            <li>
                <input type="checkbox" name="ingat" id="ingat">
                <label for="ingat">Remember me!</label>
            </li>
            <li>
                <button type="submit" name="login">Login</button>
            </li>
        </ul>
    </form>
    <p>Belum Memiliki Akun ? <a href="registrasi.php">Registrasi</a> dulu!</p>
</body>
</html>