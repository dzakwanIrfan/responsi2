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
    <link rel="stylesheet" href="css/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&family=Lakki+Reddy&display=swap" rel="stylesheet">
    <title>Login Page</title>
</head>
<body>
    
    <div class="login-container">
        <div class="glass">
            <img src="/css/img/login.png" alt="">
            <h2>LOGIN</h2>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="login">          
                <div class="input-group">
                    <input type="text" id="username" name="username" placeholder="Username">
                </div>
                <div class="input-group">
                    <input type="password" id="password" name="password" placeholder="Password">
                </div>
                <button type="submit" name="submit">Login</button>
            </form>
            <small><p>Belum memiliki akun? <a href="register.php">Registrasi</a></p></small>
        </div>
    </div>
</body>
</html>


