<?php 
    include('koneksi.php');

    if(isset($_POST['tambah_karakter'])){
        $nama_karakter = $_POST['nama_karakter'];
        $id_kelompok = $_POST['id_kelompok'];
        $deskripsi = $_POST["deskripsi"];
        $gambar = $_FILES['gambar']['name'];

        $dir = "css/img/";
        $tmp_file = $_FILES['gambar']['tmp_name'];

        move_uploaded_file($tmp_file, $dir.$gambar);

        $sql = "INSERT INTO karakter (nama_karakter, id_kelompok, deskripsi, gambar) VALUES ('$nama_karakter', '$id_kelompok', '$deskripsi', '$gambar');";
        $query = mysqli_query($koneksi, $sql);

        if($query){
            header("location: index.php");
        }else{
            echo $query;
        }
    }

    if(isset($_POST["edit_karakter"])){
        $id = $_GET["id"];
        $nama_karakter = $_POST['nama_karakter'];
        $id_kelompok = $_POST['id_kelompok'];
        $deskripsi = $_POST["deskripsi"];
        $gambar = $_FILES['gambar']['name'];

        $querryDel = "SELECT * FROM karakter WHERE id_karakter = '$id';";
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

        $sql = "UPDATE karakter SET nama_karakter='$nama_karakter', id_kelompok='$id_kelompok', deskripsi='$deskripsi', gambar='$gambar' WHERE id_karakter ='$id';";
        $query = mysqli_query($koneksi, $sql);

        if($query){
            header("location: index.php");
        }else{
            echo $querry;
        }
    }

    if(isset($_GET['hapus'])){
        $id = $_GET['hapus'];

        $querryDel = "Select * from karakter where id_karakter = '$id';";
        $sqlDel = mysqli_query($koneksi, $querryDel);
        $result = mysqli_fetch_assoc($sqlDel);

        unlink("css/img/".$result['gambar']);

        $querry = "delete from karakter where id_karakter = '$id'";
        $sql = mysqli_query($koneksi, $querry);

        if($sql){
            header("location: index.php");
        }else{
            echo $querry;
        }
    }

?>