<?php 
    include('koneksi.php');
    session_start();
    $id = $_GET['id'];
    $sql = "SELECT karakter.*, kelompok.nama_kelompok
            FROM karakter
            LEFT JOIN kelompok ON karakter.id_kelompok = kelompok.id_kelompok
            WHERE karakter.id_karakter = $id";
    $query = mysqli_query($koneksi, $sql);
    $row = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Karakter</title>
    <link rel="stylesheet" href="/css/karakter.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Aleo&family=Habibi&family=Holtwood+One+SC&family=Inter&family=Outfit:wght@400;900&display=swap" rel="stylesheet">
</head>
<body>
    <?php include('navbar.php'); ?>
    <div class="banner"><img src="/css/img/detChar-banner.jpg" alt=""></div>
    <div class="karakter-container">
    <div class="kepala">
        <div class="judul"><?= $row['nama_karakter']; ?></div>
            <div class="icon">
                <a href="index.php?kelompok=<?= $row['nama_kelompok']; ?>" class="kelompok"><?= $row['nama_kelompok']; ?></a>
                <a href="editKarakter.php?id=<?= $row['id_karakter']; ?>" class="edit" <?php if($_SESSION['peran']=='tamu'){echo "hidden";} ?>><img src="/css/icon/edit.png" alt="edit-file"/></a>
                <a href="proses_karakter.php?hapus=<?= $row['id_karakter']; ?>" class="delete" <?php if ($_SESSION['peran'] == 'tamu') { echo "hidden"; } ?> onclick="return konfirmasiHapus(event);"><img src="css/icon/delete.png" alt="delete-forever"/></a>
        </div>
    </div>

        <hr>
        <div class="konten">
            <img src="css/img/<?= $row['gambar']; ?>" alt="">
            <div class="konten-deskripsi">
                <?= $row['deskripsi']; ?>
            </div>
        </div>
    </div>
</body>
</html>