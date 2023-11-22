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
    <link rel="stylesheet" href="/css/profil.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Aleo&family=Habibi&family=Holtwood+One+SC&family=Inter&family=Outfit:wght@400;900&display=swap" rel="stylesheet">
</head>
<body>
<?php include('navbar.php'); ?>
    <div class="profil-container">
        <div class="banner"><img src="/css/img/profil-gmb.jpg" alt=""></div>
        <div class="image-container">
            <img src="<?php if($_SESSION['gambar'] == ''){ echo "/css/img/sith.png"; }else{ echo "/css/img/$_SESSION[gambar]"; } ?>" alt="" id="imagePreview">
        </div>
        <div class="profil-content">
            <div class="profil">
                <form action="profilEdit.php">
                <div class="profil-group">
                    <div class="profil-label"><label for="nama">NAMA</label></div>
                    <div class="profil-content"><input type="text" value="<?= $_SESSION['nama'] ?>" id="nama" readonly></div>
                </div>
                <div class="profil-group">
                    <div class="profil-label"><label for="username">USERNAME</label></div>
                    <div class="profil-content"><input type="text" value="<?= $_SESSION['username'] ?>" id="username" readonly></div>
                </div>
                <div class="profil-group">
                    <div class="profil-label"><label for="bio">BIO</label></div>
                    <div class="profil-content"><textarea  cols="30" rows="10" id="bio" readonly ><?= $_SESSION['bio'] ?></textarea></div>
                </div>
                <div class="profil-group">
                    <div class="profil-label"><label for="password">PASSWORD</label></div>
                    <div class="profil-content"><input type="password" value="<?= $_SESSION['password'] ?>" id="password" readonly></div>
                </div>
                <div class="profil-group">
                    <div class="profil-submit"><input type="submit" value="EDIT"></div>
                </div>
                </form>
            </div>
            <div class="img"><img src="/css/img/profil-finger.png" alt=""></div>
        </div>
    </div>
</body>
</html>