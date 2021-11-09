<?php
include 'koneksi.php';

  $judul   = $_POST['judul'];
  $pengarang    = $_POST['pengarang'];
  $penerbit    = $_POST['penerbit'];
  $gambar = $_FILES['gambar']['name'];


if($gambar != "") {
  $ekstensi_diperbolehkan = array('jpeg','jpg'); 
  $x = explode('.', $gambar); 
  $ekstensi = strtolower(end($x));
  $file_tmp = $_FILES['gambar']['tmp_name'];   
  $angka_acak     = rand(1,999);
  $gambar = $angka_acak.'-'.$gambar; 
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {     
                move_uploaded_file($file_tmp, '../gambar'.$gambar); 
                  $query = "INSERT INTO buku (judul, pengarang, penerbit, tahun, gambar) VALUES ('$judul', '$pengarang', '$penerbit', '$tahun', '$gambar')";
                  $result = mysqli_query($koneksi, $query);
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                           " - ".mysqli_error($koneksi));
                  } else {
                    
                    echo "<script>alert('Data berhasil ditambah.');window.location='index.php';</script>";
                  }

            } else {     
             
                echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau jpeg.');window.location='tambah_produk.php';</script>";
            }
} else {
   $query = "INSERT INTO buku (judul, pengarang, penerbit, tahun, gambar) VALUES ('$judul', '$pengarang', '$penerbit', '$tahun', null)";
                  $result = mysqli_query($koneksi, $query);
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                           " - ".mysqli_error($koneksi));
                  } else {
                    echo "<script>alert('Data berhasil ditambah.');window.location='index.php';</script>";
                  }
}