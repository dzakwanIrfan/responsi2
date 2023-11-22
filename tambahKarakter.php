<?php 
    include('koneksi.php');
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Karakter</title>
    <script src="script.js" defer></script>
</head>
<body>
        <form action="proses_karakter.php" method="post" enctype="multipart/form-data" id="karakter">
            <input type="file" id="uploadInput" accept=".jpg, .png" name="gambar">
            <button type="submit" name="tambah_karakter">KIRIM</button>
            <input type="radio" id="jedi" name="id_kelompok" value="1" >
            <label for="jedi"><img src="/css/img/jedi.png" alt=""></label>
            <input type="radio" id="sith" name="id_kelompok" value="2" >
            <label for="sith"><img src="/css/img/sith.png" alt=""></label>

            <label for="nama">NAMA</label><br>
            <input type="text" id="nama" name="nama_karakter">
            <label for="deskripsi">DESKRIPSI</label><br>
            <textarea name="deskripsi" id="deskripsi" cols="30" rows="10"><p></p></textarea>
        </form>
</body>
</html>