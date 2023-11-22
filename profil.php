<?php 
    include('koneksi.php');
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="profilEdit.php">
        <img src="<?php if($_SESSION['gambar'] == ''){ echo "/css/img/sith.png"; }else{ echo "/css/img/$_SESSION[gambar]"; } ?>" alt="<?= $_SESSION['nama'] ?>" id="imagePreview">
        <label for="nama">NAMA</label>
            <input type="text" value="<?= $_SESSION['nama'] ?>" id="nama" readonly>
        <label for="username">USERNAME</label>
            <input type="text" value="<?= $_SESSION['username'] ?>" id="username" readonly>
        <label for="bio">BIO</label>
            <textarea  cols="30" rows="10" id="bio" readonly ><?= $_SESSION['bio'] ?></textarea>
        <label for="password">PASSWORD</label>
            <input type="password" value="<?= $_SESSION['password'] ?>" id="password" readonly>
            <input type="submit" value="EDIT">
    </form>
</body>
</html>