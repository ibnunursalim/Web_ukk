<?php

include 'koneksi.php';

  $id = $_POST['id'];
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
                      
                   
                   $query  = "UPDATE buku SET judul = '$judul', pengarang = '$pengarang', gambar = '$gambar'";
                    $query .= "WHERE id = '$id'";
                    $result = mysqli_query($koneksi, $query);
                    if(!$result){
                        die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                             " - ".mysqli_error($koneksi));
                    } else {
                      
                      echo "<script>alert('Data berhasil diubah.');window.location='index.php';</script>";
                    }
              } else {     
        
                  echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='tambah_produk.php';</script>";
              }
    } else {

      $query  = "UPDATE buku SET judul = '$judul', pengarang = '$pengarang', penerbit = '$penerbit'" ;
      $query .= "WHERE id = '$id'";
      $result = mysqli_query($koneksi, $query);

      if(!$result){
            die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                             " - ".mysqli_error($koneksi));
      } else {

          echo "<script>alert('Data berhasil diubah.');window.location='index.php';</script>";
      }
    }