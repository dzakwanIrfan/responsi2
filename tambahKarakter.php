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
    <link rel="stylesheet" href="/css/tambahKarakter.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Aleo&family=Habibi&family=Holtwood+One+SC&family=Inter&family=Outfit:wght@400;900&display=swap" rel="stylesheet">

</head>
<body>
<div class="bg">
    <div class="container">
        <form action="proses_karakter.php" method="post" enctype="multipart/form-data" id="karakter">
            <div class="container-form">
                <div class="kiri">
                    <input type="file" id="uploadInput" style="display: none;" accept=".jpg, .png" name="gambar">
                    <div class="image-container">
                        <img src="/css/img/background.jpg" alt="" id="imagePreview">
                        <div class="overlay-text" id="imagePreview">Ubah Gambar</div>
                    </div><br>
                    <button type="submit" name="tambah_karakter">KIRIM</button>
                </div>
                <div class="kanan">
                    <div class="close"><a href="index.php"><img width="30" height="30" src="/css/img/close-bg.png" alt="multiply-2"/></a></div>
                    <div class="judul"><p>TAMBAH CHARACTER</p></div>
                    <div class="judul-img"><img src="/css/img/gmb.png" alt=""></div>
                    <div class="radio">
                        <div class="radio-group">
                            <input type="radio" id="jedi" name="id_kelompok" value="1" >
                            <label for="jedi"><img src="/css/img/jedi.png" alt=""></label>
                        </div>
                        <div class="radio-group">
                            <input type="radio" id="sith" name="id_kelompok" value="2" >
                            <label for="sith"><img src="/css/img/sith.png" alt=""></label>
                        </div>
                    </div>

                    <div class="text">
                        <div class="text-group">
                            <div class="input-group">
                                <label for="nama">NAMA</label><br>
                                <input type="text" id="nama" name="nama_karakter" oninput="cekNama()">
                            </div>
                            <div class="input-group">
                                <label for="deskripsi">DESKRIPSI</label><br>
                                <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" oninput="cekDeskripsi()"><p></p></textarea>
                            </div>
                        </div>
                        <div class="text-bg"><img src="/css/img/data-bg.png" alt=""></div>
                    </div>
                </div>
            </div>
        </form>
        <br><br><br>
    </div>
    </div>
</body>
</html>