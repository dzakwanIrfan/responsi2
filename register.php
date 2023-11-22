<?php 
    include('koneksi.php');
    session_start();

    
    if(isset($_POST['submit'])){
        $nama = $_POST['nama'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $konfirmasi = $_POST['konfirmasi'];
        $bio = $_POST['bio'];
        if($password === $konfirmasi){
            $sql="INSERT INTO pengguna (nama, username, password, bio) VALUES ('$nama', '$username', '$password', '$bio')";
            $query=mysqli_query($koneksi, $sql);
            if($query){
                echo "<script>alert('Berhasil Mendaftar!')</script>";
                header("Location: login.php");
            }else{
                echo "<script>alert('Gagal Mendaftar!')</script>";
            }
        }else{
            echo "<script>alert('Password tidak sama!')</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="register">
        <input type="text" id="nama" name="nama" placeholder="Nama">
        <input type="text" id="username" name="username" placeholder="Username">
        <input type="password" id="password" name="password" placeholder="Password">
        <input type="password" id="konfirmasi" name="konfirmasi" placeholder="Konfirmasi Password">
        <input type="hidden" id="bio" name="bio" placeholder="bio" value="">
        <button type="submit" name="submit">Register</button>
    </form>
        <small><p>Sudah memiliki akun? <a href="login.php">Login</a></p></small>

</body>
</html>