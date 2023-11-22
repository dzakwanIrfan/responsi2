<?php 
    include('koneksi.php');
    session_start();

    if (!isset($_SESSION['username'])) {
        header("Location: login.php");
    }

    if(isset($_GET['kelompok'])){
      if(($_GET['kelompok']) == 'JEDI'){
        $sql = "SELECT * FROM karakter WHERE id_kelompok = '1';";
      }
      if(($_GET['kelompok']) == 'SITH'){
        $sql = "SELECT * FROM karakter WHERE id_kelompok = '2';";
      }
    }else{
      $sql = "SELECT * FROM karakter;";
    }

    
    $query = mysqli_query($koneksi, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>
<body>
  <a href="profil.php">profil</a> | <a href="logout.php">logout</a>
  <a href="tambahKarakter.php" <?php if($_SESSION["peran"]=="tamu"){echo "hidden";} ?>>Tambah</a>

  <br>

    <a href="index.php" <?php if(!isset($_GET['kelompok'])){ echo 'style="opacity: 0.5;"';} ?>><div class="sort">ALL</div></a>
    <a href="index.php?kelompok=JEDI"><div class="sort" <?php if(($_GET['kelompok']) == 'JEDI'){ echo 'style="opacity: 0.5;"';} ?>>JEDI</div></a>
    <a href="index.php?kelompok=SITH"><div class="sort" <?php if(($_GET['kelompok']) == 'SITH'){ echo 'style="opacity: 0.5;"';} ?>>SITH</div></a>
  <br>
    <?php while ($row = mysqli_fetch_assoc($query)){ ?>
    <a href="karakter.php?id=<?= $row['id_karakter']; ?>" style="text-decoration: none;">
      <div class="card">
        <img src="/css/img/<?= $row['gambar']; ?>" alt="" class="card-foto">
        <div class="card-nama"><?= $row['nama_karakter']; ?></div>
      </div>
    </a>
  <?php } ?>
</body>
</html>

