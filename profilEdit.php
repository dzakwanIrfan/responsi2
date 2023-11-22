<?php 
    include('koneksi.php');
    session_start();

    if (isset($_POST['ubah'])){
        $nama = $_POST['nama'];
        $username = $_POST['username'];
        $bio = $_POST['bio'];
        $password = $_POST['password'];
        $gambar = $_FILES['gambar']['name'];

        $querryDel = "SELECT * FROM pengguna WHERE id = $_SESSION[id];";
        $sqlDel = mysqli_query($koneksi, $querryDel);
        $result = mysqli_fetch_assoc($sqlDel);

        $dir = "css/img/";
        $tmp_file = $_FILES['gambar']['tmp_name'];

        if($_FILES['gambar']['name'] == ""){
            $gambar = $result['gambar'];
        }else{
            $gambar = $_FILES['gambar']['name'];
            unlink("css/img/".$result['gambar']);
            move_uploaded_file($tmp_file, $dir.$gambar);
        }

        $sql = "UPDATE pengguna SET nama='$nama', username='$username', bio='$bio', password='$password', gambar='$gambar' WHERE id=$_SESSION[id]";
        $query = mysqli_query($koneksi, $sql);

        if($query){
            $_SESSION['nama'] = $nama;
            $_SESSION['username'] = $username;
            $_SESSION['bio'] = $bio;
            $_SESSION['password'] = $password;
            $_SESSION['gambar'] = $gambar;
            echo "<script>alert('Data berhasil diubah!');</script>";
            echo "<script>window.location.href = 'profil.php';</script>";
        }else{
            echo "bodoh";
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
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
        <input type="file" id="uploadInput" accept=".jpg, .png" name="gambar">
        <img src="<?php if($_SESSION['gambar'] == ''){ echo "/css/img/sith.png"; }else{ echo "/css/img/$_SESSION[gambar]"; } ?>" alt="<?= $_SESSION['nama'] ?>" id="imagePreview">
        <label for="nama">NAMA</label>
            <input type="text" value="<?= $_SESSION['nama'] ?>" id="nama" name="nama">
        <label for="username">USERNAME</label>
            <input type="text" value="<?= $_SESSION['username'] ?>" id="username" name="username">
        <label for="bio">BIO</label>
            <textarea  cols="30" rows="10" id="bio" name="bio"><?= $_SESSION['bio'] ?></textarea>
        <label for="password">PASSWORD</label>
            <input type="password" value="<?= $_SESSION['password'] ?>" id="password" name="password">
            <input type="submit" value="SIMPAN" name="ubah">
    </form>
</body>
</html>