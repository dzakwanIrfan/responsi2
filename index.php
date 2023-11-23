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
    <link rel="stylesheet" href="/css/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Aleo&family=Habibi&family=Holtwood+One+SC&family=Inter&family=Outfit:wght@400;900&display=swap" rel="stylesheet">
</head>
<body>
<?php include('navbar.php'); ?>

  <div class="slider-container">
    <div class="slides">
      <div class="slide"><img src="css/img/img1.jpg" alt="Image 1"></div>
      <div class="slide"><img src="css/img/img2.jpg" alt="Image 2"></div>
      <div class="slide"><img src="css/img/img3.jpg" alt="Image 3"></div>
      <div class="slide"><img src="css/img/background.jpg" alt="Image 4"></div>
      <div class="slide"><img src="css/img/bg.jpg" alt="Image 5"></div>
      <div class="slide"><img src="css/img/detChar-banner.jpg" alt="Image 6"></div>
      <!-- Add more slides as needed -->
    </div>
    <div class="prev" onclick="changeSlide(-1)">❮</div>
    <div class="next" onclick="changeSlide(1)">❯</div>
  </div>

  <div class="container-bg">
    <div class="heading">
      <div class="head-judul">STAR WARS</div>
    </div>
    
    <div class="container">
      <div class="head-edit">
        <div class="head-sort">
          <a href="index.php" <?php if(!isset($_GET['kelompok'])){ echo 'style="opacity: 0.5;"';} ?>><div class="sort">ALL</div></a>
          <a href="index.php?kelompok=JEDI"><div class="sort" <?php if(($_GET['kelompok']) == 'JEDI'){ echo 'style="opacity: 0.5;"';} ?>>JEDI</div></a>
          <a href="index.php?kelompok=SITH"><div class="sort" <?php if(($_GET['kelompok']) == 'SITH'){ echo 'style="opacity: 0.5;"';} ?>>SITH</div></a>
        </div>
        <a href="tambahKarakter.php" class="add-link" <?php if($_SESSION['peran']=='tamu'){echo "hidden";} ?>><img width="96" height="96" src="/css/icon/add.png" alt="filled-plus-2-math"/></a>
      </div>
        <div class="konten">
          <?php while ($row = mysqli_fetch_assoc($query)){ ?>
            <a href="karakter.php?id=<?= $row['id_karakter']; ?>" style="text-decoration: none;">
              <div class="card">
                <img src="/css/img/<?= $row['gambar']; ?>" alt="" class="card-foto">
                <div class="card-nama"><?= $row['nama_karakter']; ?></div>
              </div>
            </a>
          <?php } ?>
        </div>
    </div>
  </div>
  <?php include('footer.html') ?>
</body>
</html>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    const slidesContainer = document.querySelector(".slides");
    const slides = document.querySelectorAll(".slide");
    const prevButton = document.querySelector(".prev");
    const nextButton = document.querySelector(".next");

    let currentIndex = 0;

    function showSlide(index) {
      slidesContainer.style.transform = `translateX(${-index * 33.33}%)`;
    }

    function changeSlide(direction) {
      currentIndex += direction;

      if (currentIndex < 0) {
        currentIndex = slides.length - 1;
      } else if (currentIndex >= slides.length-2) {
        currentIndex = 0;
      }

      if (currentIndex < slides.length - 2) {
        showSlide(currentIndex);
      } else {
        currentIndex = slides.length - 3;
        showSlide(currentIndex);
      }
    }

    prevButton.addEventListener("click", function() {
      changeSlide(-1);
    });

    nextButton.addEventListener("click", function() {
      changeSlide(1);
    });
  });
</script>

