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
</head>
<body>
            <a href="index.php?kelompok=<?= $row['nama_kelompok']; ?>" class="kelompok"><?= $row['nama_kelompok']; ?></a>
            <a href="editKarakter.php?id=<?= $row['id_karakter']; ?>" class="edit" <?php if($_SESSION['peran']=='tamu'){echo "hidden";} ?>><img src="/css/icon/edit.png" alt="edit-file"/></a>
            <a href="proses_karakter.php?hapus=<?= $row['id_karakter']; ?>" class="delete" <?php if ($_SESSION['peran'] == 'tamu') { echo "hidden"; } ?> onclick="return konfirmasiHapus(event);"><img src="css/icon/delete.png" alt="delete-forever"/></a>
        <hr>
            <img src="css/img/<?= $row['gambar']; ?>" alt="">
            <?= $row['deskripsi']; ?>
</body>
</html>