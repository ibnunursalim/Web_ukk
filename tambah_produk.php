<?php
  include('koneksi.php'); 
  
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Daftar Buku</title>
    <style type="text/css">
      * {
        font-family: "Trebuchet MS";
      }
      h1 {
        text-transform: uppercase;
        color: black;
      }
    button {
          background-color: Peru;
          color: red;
          padding: 10px;
          text-decoration: none;
          font-size: 12px;
          border: 0px;
          margin-top: 20px;
    }
    label {
      margin-top: 10px;
      float: left;
      text-align: left;
      width: 100%;
    }
    input {
      padding: 6px;
      width: 100%;
      box-sizing: border-box;
      background: #C0C0C0;
      border: 2px solid #ccc;
      outline-color: black;
    }
    button{
      background-color: #C0C0C0;
      color: black;
      padding: 10px;
      font-size: 12px;
      border: 0;
      margin-top: 20px;
    }
    div {
      width: 100%;
      height: auto;
    }
    .base {
      width: 400px;
      height: auto;
      padding: 20px;
      margin-left: auto;
      margin-right: auto;
      background: #ededed;
    }
    .class {
      position: relative;
      right: 100px;
    }
    
    </style>
  </head>
  <body>
      <center>
        <h1>Tambah Buku</h1>
      <center>
      <form method="POST" action="proses_tambah.php" enctype="multipart/form-data" >
      <section class="base">
        <div>
          <label>Judul Buku</label>
          <input type="text" name="judul" autofocus="" required="" />
        </div>
        <div>
          <label>Pengarang</label>
         <input type="text" name="pengarang" />
        </div>
        <div>
          <label>Penerbit</label>
         <input type="text" name="penerbit" required="" />
        </div>
        <div>
          <label>Gambar Buku</label>
         <input type="file" name="gambar" required="" />
        </div>
        <div>
         <button type="submit">Simpan Data Buku</button>
        </div>
        <div >
         <button type="submit"><a href= "index.php">Kembali</button>
        </div>
        </section>
      </form>
  </body>
</html>