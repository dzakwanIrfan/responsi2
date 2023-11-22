<?php 
    include("koneksi.php");
    session_start();

    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $submit = $_POST['submit'];

    if(isset($submit)){
        $query = "SELECT * FROM pengguna WHERE username = '$username'";
        $sql = mysqli_query($koneksi, $query) or die(mysqli_error($conn));
        $row = mysqli_fetch_array($sql);

        if($row['username'] == $username){
            if($row['password'] == $password){
                $_SESSION['id'] = $row['id'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['nama'] = $row['nama'];
                $_SESSION['password'] = $row['password'];
                $_SESSION['bio'] = $row['bio'];
                $_SESSION['gambar'] = $row['gambar'];
                $_SESSION['peran'] = $row['peran'];
                header('Location: index.php');
            }else{
                echo "<script>alert('Login gagal!')</script>";
            }
        }else{
            echo "<script>alert('Login gagal!')</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>
<body>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="login">
            <input type="text" id="username" name="username" placeholder="Username">
            <input type="password" id="password" name="password" placeholder="Password">
            <button type="submit" name="submit">Login</button>
    </form>
    <small><p>Belum memiliki akun? <a href="register.php">Registrasi</a></p></small>
</body>
</html>


