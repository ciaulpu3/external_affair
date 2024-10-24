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
  $delete_sql = "DELETE FROM security_device WHERE Tanggal = '$kode'";

  if ($conn->query($delete_sql) === TRUE) {
      echo "Data berhasil dihapus";
  } else {
      echo "Error: " . $delete_sql . "<br>" . $conn->error;
  }
}

if (isset($_POST['security_device'])) {
  $Tanggal = $_POST['tanggal'];
  $Monitor_CCTV = $_POST['monitor_cctv'];
  $Handy_Talkie = $_POST['handy_talkie'];
  $Tongkat_T = $_POST['tongkat_t'];
  $Cap_Stample = $_POST['cap_stample'];
  $Borgol = $_POST['borgol'];
  $Lampu_Senter = $_POST['lampu_senter'];
  $Tongkat_Guide = $_POST['tongkat_guide'];
  $Jas_Hujan = $_POST['jas_hujan'];
  $Sepatu_Boot = $_POST['sepatu_boot'];
  $Payung = $_POST['payung'];
  $Mantel_Hujan = $_POST['mantel_hujan'];
  $Megaphone = $_POST['megaphone'];
  $Helmet_PKD = $_POST['helmet_pkd'];
  $Buku_Jurnal = $_POST['buku_jurnal'];
  $Buku_Penitipan_Kunci = $_POST['buku_penitipan_kunci'];
  $Buku_Serah_Terima_Jaga = $_POST['buku_serah_terima_jaga'];
  $Anak_Kunci_Pintu_Pabrik = $_POST['anak_kunci_pintu_pabrik'];

  $stmt = $conn->prepare("INSERT INTO security_device (tanggal, monitor_cctv, handy_talkie, tongkat_t, cap_stample, borgol, lampu_senter, tongkat_guide, jas_hujan, sepatu_boot, payung, mantel_hujan, megaphone, helmet_pkd, buku_jurnal, buku_penitipan_kunci, buku_serah_terima_jaga, anak_kunci_pintu_pabrik) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("ssssssssssssssssss", $Tanggal, $Monitor_CCTV, $Handy_Talkie, $Tongkat_T, $Cap_Stample, $Borgol, $Lampu_Senter, $Tongkat_Guide, $Jas_Hujan, $Sepatu_Boot, $Payung, $Mantel_Hujan, $Megaphone, $Helmet_PKD, $Buku_Jurnal, $Buku_Penitipan_Kunci, $Buku_Serah_Terima_Jaga, $Anak_Kunci_Pintu_Pabrik);
  $stmt->execute();

  if ($stmt->affected_rows > 0) {
      echo "";
  } else {
      echo "Error: " . $stmt->error;
  }
}

$sql_read = "SELECT * FROM security_device";
$result_read = $conn->query($sql_read);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Security Device</title>
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
  <caption><h2><b><center>DATA SECURITY DEVICE TERCATAT</center></b></h2></caption>
  <thead class="table table-bordered" style="background-color: #f0f0f0;">
    <tr style="text-align: center; background-color: #e0e0e0;">
      <td class="border border-black p-2" style="text-align: center; font-size: smaller; background-color: #ffb47a;">Tanggal</td>
      <td class="border border-black p-2" style="text-align: center; font-size: smaller; background-color: #ffb47a;">Monitor CCTV</td>
      <td class="border border-black p-2" style="text-align: center; font-size: smaller; background-color: #ffb47a;">Handy Talkie</td>
      <td class="border border-black p-2" style="text-align: center; font-size: smaller; background-color: #ffb47a;">Tongkat T</td>
      <td class="border border-black p-2" style="text-align: center; font-size: smaller; background-color: #ffb47a;">Cap Stample</td>
      <td class="border border-black p-2" style="text-align: center; font-size: smaller; background-color: #ffb47a;">Borgol</td>
      <td class="border border-black p-2" style="text-align: center; font-size: smaller; background-color: #ffb47a;">Lampu Senter</td>
      <td class="border border-black p-2" style="text-align: center; font-size: smaller; background-color: #ffb47a;">Tongkat Guide/ Guard Lalin</td>
      <td class="border border-black p-2" style="text-align: center; font-size: smaller; background-color: #ffb47a;">Jas Hujan</td>
      <td class="border border-black p-2" style="text-align: center; font-size: smaller; background-color: #ffb47a;">Sepatu Boot</td>
      <td class="border border-black p-2" style="text-align: center; font-size: smaller; background-color: #ffb47a;">Payung</td>
      <td class="border border-black p-2" style="text-align: center; font-size: smaller; background-color: #ffb47a;">Mantel Hujan</td>
      <td class="border border-black p-2" style="text-align: center; font-size: smaller; background-color: #ffb47a;">Megaphone</td>
      <td class="border border-black p-2" style="text-align: center; font-size: smaller; background-color: #ffb47a;">Helmet PKD</td>
      <td class="border border-black p-2" style="text-align: center; font-size: smaller; background-color: #ffb47a;">Buku Jurnal</td>
      <td class="border border-black p-2" style="text-align: center; font-size: smaller; background-color: #ffb47a;">Buku Penitipan Kunci</td>
      <td class="border border-black p-2" style="text-align: center; font-size: smaller; background-color: #ffb47a;">Buku Serah Terima Jaga</td>
      <td class="border border-black p-2" style="text-align: center; font-size: smaller; background-color: #ffb47a;">Anak Kunci Pintu pabrik DLL</td>
    </tr>
  </thead>

           <?php
                include "koneksi.php";
                $no = 1;
                if (isset($_GET['search'])) {
                    $search = $_GET['search'];
                    $ambildata = mysqli_query($koneksi, "SELECT * FROM security_device WHERE Tanggal LIKE '%$search%'");
                } else {
                    $ambildata = mysqli_query($koneksi, "SELECT * FROM security_device");
                }

                while ($tampil = mysqli_fetch_array($ambildata)) {
                    echo "
                    <tr>  
                        <td>$tampil[Tanggal]</td>  
                        <td>$tampil[Monitor_CCTV]</td> 
                        <td>$tampil[Handy_Talkie]</td>   
                        <td>$tampil[Tongkat_T]</td> 
                        <td>$tampil[Cap_Stample]</td>  
                        <td>$tampil[Borgol]</td>
                        <td>$tampil[Lampu_Senter]</td>
                        <td>$tampil[Tongkat_Guide]</td>
                        <td>$tampil[Jas_Hujan]</td>
                        <td>$tampil[Sepatu_Boot]</td>
                        <td>$tampil[Payung]</td>
                        <td>$tampil[Mantel_Hujan]</td>
                        <td>$tampil[Megaphone]</td>
                        <td>$tampil[Helmet_PKD]</td>
                        <td>$tampil[Buku_Jurnal]</td>
                        <td>$tampil[Buku_Penitipan_Kunci]</td>
                        <td>$tampil[Buku_Serah_Terima_Jaga]</td>
                        <td>$tampil[Anak_Kunci_Pintu_Pabrik]</td>
                    </tr>";
                    $no++;
                }
            ?>
    </table>
  </div>
  <!-- DATA CLOSE -->

    <!-- DOWNLOAD START -->
      <button style='background-color: #FF0000; color: #FFFFFF; border: none; padding: 5px 10px; border-radius: 5px; cursor: pointer; display: inline-block; margin-left: 70px; margin-top:30px;'><a href="../page/export_security.php" style='text-decoration: none; color: #FFFFFF;'>Download Data</a></button>
    <!-- DOWNLOAD -->


    <script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
    <script>
      const navbarHeight = document.querySelector('.navbar').offsetHeight;
      document.querySelector('.flex.flex-col').style.marginTop = `${navbarHeight}px`;
    </script>
</body>
</html>