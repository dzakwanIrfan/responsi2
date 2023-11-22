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
    <link rel="stylesheet" href="css/register.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&family=Lakki+Reddy&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="glass">
            <div class="container-foto">
                <img src="css/img/reg-gmb.png" alt="yoda">
            </div>
            <div class="container-registrasi">
                <h2>REGISTRASI</h2>
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="register">
                    <div class="input-group">
                        <input type="text" id="nama" name="nama" placeholder="Nama" oninput="cekNama()">
                    </div>
                    <div class="input-group">
                        <input type="text" id="username" name="username" placeholder="Username">
                    </div>
                    <div class="input-group">
                        <input type="password" id="password" name="password" placeholder="Password">
                    </div>
                    <div class="input-group">
                        <input type="password" id="konfirmasi" name="konfirmasi" placeholder="Konfirmasi Password">
                    </div>
                    <div class="input-group">
                        <input type="hidden" id="bio" name="bio" placeholder="bio" value="">
                    </div>
                    <button type="submit" name="submit">Register</button>
                </form>
                <small><p>Sudah memiliki akun? <a href="login.php">Login</a></p></small>
            </div>
        </div>
    </div>
</body>
</html>

<script>
    // validasi form
    const namaInput = document.getElementById('nama');
    function cekNama() {
        let regex = /^[A-Za-z ]+$/;
        if (!regex.test(namaInput.value) && namaInput.value != "") {
            alert("Nama tidak boleh memiliki angka atau simbol!");
            namaInput.value = namaInput.value.replace(/[^A-Za-z ]/g, '');
        }
    }
</script>