<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "external_affair";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['kode'])) {
  $kode = $_GET['kode'];
  $delete_sql = "DELETE FROM tamu WHERE Nama_Tamu = '$kode'";

  if ($conn->query($delete_sql) === TRUE) {
      echo "Data berhasil dihapus";
  } else {
      echo "Error: " . $delete_sql . "<br>" . $conn->error;
  }
}

if (isset($_POST['tamu'])) {
    $Tanggal = $_POST['tanggal'];
    $Nama_Tamu = $_POST['nama_tamu'];
    $Nama_Pt = $_POST['nama_pt'];
    $Keperluan = $_POST['keperluan'];
    $Jam_In = $_POST['jamin'];
    $Jam_Out = $_POST['jamout'];

    $stmt = $conn->prepare("INSERT INTO tamu (tanggal, nama_tamu, nama_pt, keperluan, Jam_In, Jam_Out) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $Tanggal, $Nama_Tamu, $Nama_Pt, $Keperluan, $Jam_In, $Jam_Out);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Data berhasil ditambahkan";
    } else {
        echo "Error: " . $stmt->error;
    }
}

$sql_read = "SELECT * FROM tamu";
$result_read = $conn->query($sql_read);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Logbook Tamu</title>
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
</head>
<body>

  <style>
  .table {
    margin-top: 100px;
  }

  .btn-outline-success {
    --bs-btn-color: #ffb47a;;
    --bs-btn-border-color: #ffb47a;;
    --bs-btn-hover-color: #ffb47a;;
    --bs-btn-hover-bg: #ffe2cc;
    --bs-btn-hover-border-color: #198754;
  }
  </style>

  <!-- NAVBAR START -->
  <nav class="navbar navbar-expand-lg fixed-top" style="background-color: #173B45;">
    <img src="../photos/logo.png" alt="" width="50" style="margin-left: 10px;">
    <div class="container-fluid">
      <a class="navbar-brand" href="#" style="color: #ffb47a;">PT Inti Pantja Press Industri</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">    
          <li class="nav-item">
            <a class="nav-link" href="../page/index.php" style="color: #ffb47a;">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../page/about.html" style="color: #ffb47a;">About</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: #ffb47a;">
              Form
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="../page/logbook.php">Logbook Scrap</a></li>
              <li><a class="dropdown-item" href="../page/abnormality.php">Abnormality</a></li>
              <li><a class="dropdown-item" href="../page/security.php">Security Device</a></li>
              <li><a class="dropdown-item" href="../page/tamu.php">Form Tamu</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../page/data.html" style="color: #ffb47a;">Data</a>
          </li>
        </ul>

        <form class="d-flex" role="search">
          <input class="form-control me-2" type="text" name="search" placeholder="Cari Nama/Bagian..." aria-label="Search">
          <button class="btn btn-outline-success" type="submit" value="search">Search</button>
        </form>
        
      </div>
    </div>
  </nav>
  <!-- NAVBAR END -->

  <!-- DATA OPEN -->
  <table border="1" class="table caption-top" style="margin: 0 auto; width: 90%; font-size: 0.9em; margin-top:70px;">
  <caption><h2><b><center>DATA LOGBOOK TAMU TERCATAT</center></b></h2></caption>
  <thead class="table table-bordered" style="background-color: #f0f0f0;">
    <tr style="text-align: center; background-color: #e0e0e0;">
            <th style="width: 5%; background-color: #ffb47a;">No</th>
            <td style="width: 15%; background-color: #ffb47a;">Tanggal</td>
            <td style="width: 15%; background-color: #ffb47a;">Nama Tamu</td>
            <td style="width: 15%; background-color: #ffb47a;">Nama PT</td>
            <td style="width: 25%; background-color: #ffb47a;">Keperluan</td>
            <td style="width: 15%; background-color: #ffb47a;">Jam In</td>
            <td style="width: 15%; background-color: #ffb47a;">Jam Out</td>
            <td style="width: 10%; background-color: #ffb47a;"></td>
          </tr>
        </thead>

            <?php
                include "koneksi.php";
                $no = 1;
                if (isset($_GET['search'])) {
                    $search = $_GET['search'];
                    $ambildata = mysqli_query($koneksi, "SELECT * FROM tamu WHERE Nama_Tamu LIKE '%$search%' OR Nama_Pt LIKE '%$search%'");
                } else {
                    $ambildata = mysqli_query($koneksi, "SELECT * FROM tamu");
                }

                while ($tampil = mysqli_fetch_array($ambildata)) {
                    echo "
                    <tr>  
                        <td style='text-align: center;'>$no</td> 
                        <td style='text-align: center;'>$tampil[Tanggal]</td>  
                        <td style='text-align: center;'>$tampil[Nama_Tamu]</td> 
                        <td style='text-align: center;'>$tampil[Nama_Pt]</td>   
                        <td style='text-align: center;'>$tampil[Keperluan]</td> 
                        <td style='text-align: center;'>$tampil[Jam_In]</td>  
                        <td style='text-align: center;'>$tampil[Jam_Out]</td>
                        <td style='text-align: center; vertical-align: middle;'><button style='background-color: #FF0000; color: #FFFFFF; border: none; padding: 5px 10px; border-radius: 5px; cursor: pointer; display: inline-block;'><a href='?kode=$tampil[Nama_Tamu]' style='text-decoration: none; color: #FFFFFF;'>Hapus</a></button></td> 
                    </tr>";
                    $no++;
                }

                $_SESSION['tamu_count'] = $nilai_akhir;

            ?>

    </table>
  <!-- DATA CLOSE -->

  <!-- DOWNLOAD START -->
    <button style='background-color: #FF0000; color: #FFFFFF; border: none; padding: 5px 10px; border-radius: 5px; cursor: pointer; display: inline-block; margin-left: 70px; margin-top:30px;'><a href="../page/export_logbook.php" style='text-decoration: none; color: #FFFFFF;'>Download Data</a></button>
  <!-- DOWNLOAD -->

    <script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
    <script>
      // dapatkan tinggi navbar
      const navbarHeight = document.querySelector('.navbar').offsetHeight;

      // tambahkan margin atas pada elemen-elemen
      document.querySelector('.flex.flex-col').style.marginTop = `${navbarHeight}px`;
    </script>

</body>
</html>