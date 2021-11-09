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
        position: relative;
        text-transform: uppercase;
        color: black;
      }
    table {
      border: solid 1px #C0C0C0;
      border-collapse: collapse;
      border-spacing: 0;
      width: 70%;
      margin: 10px auto 10px auto;
    }
    table thead th {
        background-color: Gainsboro;
        border: solid 1px #C0C0C0;
        color: black ;
        padding: 10px;
        text-align: left;
        text-shadow: 1px 1px 1px #fff;
        text-decoration: none;
    }
    table tbody td {
        border: solid 1px #C0C0C0;
        color: black;
        padding: 10px;
        text-shadow: 1px 1px 1px white;
    }
    a {
      position: relative;
          background-color: #C0C0C0;
          color: black;
          padding: 10px;
          text-decoration: none;
          font-size: 12px;
    }
    .tambah{
      position: relative;
      left: 480px
    }
    
    .edit{
      background-color :#C0C0C0
    }

    .delet{
      background-color :#808080
    }
  
    </style>
  </head>
  <body>
    <center><h1>Daftar Buku</h1><center>
    <center><a href ="tambah_produk.php" class="tambah">+ &nbsp; Tambah Buku </a><center>
    <br/>
    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>Judul Buku</th>
          <th>Pengarang</th>
          <th>Penerbit</th>
          <th>Gambar Buku</th>
          <th>Action</th>
        </tr>
    </thead>
    <tbody>
      <?php
      
      $query = "SELECT * FROM buku ORDER BY id ASC";
      $result = mysqli_query($koneksi, $query);
      
      if(!$result){
        die ("Query Error: ".mysqli_errno($koneksi).
           " - ".mysqli_error($koneksi));
      }


      $no = 1; 
      while($row = mysqli_fetch_assoc($result))
      {
      ?>
       <tr>
          <td><?php echo $no; ?></td>
          <td><?php echo $row['judul']; ?></td>
          <td><?php echo substr($row['pengarang'], 0, 20); ?></td>
          <td><?php echo substr($row['penerbit'],0, 20); ?></td>
          <td style="text-align: center;"><img src="../gambar<?php echo $row['gambar']; ?>" style="width: 120px;"></td>
          <td>
              <a href="edit_produk.php?id=<?php echo $row['id']; ?>"class="edit">Edit</a>
              <a href="proses_hapus.php?id=<?php echo $row['id']; ?>" class="delet" onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
          </td>
      </tr>
         
      <?php
        $no++; 
      }
      ?>
    </tbody>
    </table>
  </body>
</html>