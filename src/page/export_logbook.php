<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Logbook Area Scrap</title>
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
</head>
<body>

  <style>
  .table {
    margin-top: 100px;
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
        
      </div>
    </div>
  </nav>
  <!-- NAVBAR END -->

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
  $delete_sql = "DELETE FROM logbook WHERE Nama = '$kode'";

  if ($conn->query($delete_sql) === TRUE) {
      echo "Data berhasil dihapus";
  } else {
      echo "Error: " . $delete_sql . "<br>" . $conn->error;
  }
}

if (isset($_POST['logbook'])) {
    $Tanggal = $_POST['tanggal'];
    $Nama = $_POST['nama'];
    $Bagian = $_POST['bagian'];
    $Keperluan = $_POST['keperluan'];
    $Jam_In = $_POST['jamin'];
    $Jam_Out = $_POST['jamout'];

    $stmt = $conn->prepare("INSERT INTO logbook (tanggal, nama, bagian, keperluan, Jam_In, Jam_Out) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $Tanggal, $Nama, $Bagian, $Keperluan, $Jam_In, $Jam_Out);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Data berhasil ditambahkan";
    } else {
        echo "Error: " . $stmt->error;
    }
}

$sql_read = "SELECT * FROM logbook";
$result_read = $conn->query($sql_read);
?>
<html>
<head>
  <title>DATA LOGBOOK AREA SCRAP TERCATAT</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
</head>

<body>
<div class="container">
    <h2 style="margin-top: 150px"><b><center>DATA LOGBOOK AREA SCRAP TERCATAT</center></b></h2>
		<div class="data-tables datatable-dark">
					
    <table border="1" class="table caption-top" style="margin: 0 auto; width: 90%; font-size: 0.9em; margin-top:100px;" id="mauexport">
      <thead class="table table-bordered" style="background-color: #f0f0f0;">
        <tr style="text-align: center; background-color: #e0e0e0;">
            <th style="width: 5%; background-color: #ffb47a;">No</th>
            <td style="width: 15%; background-color: #ffb47a;">Tanggal</td>
            <td style="width: 15%; background-color: #ffb47a;">Nama</td>
            <td style="width: 15%; background-color: #ffb47a;">Bagian</td>
            <td style="width: 30%; background-color: #ffb47a;">Keperluan</td>
            <td style="width: 10%; background-color: #ffb47a;">Jam In</td>
            <td style="width: 10%; background-color: #ffb47a;">Jam Out</td>
          </tr>
        </thead>

            <?php
                include "koneksi.php";
                $no = 1;

                if (isset($_GET['search'])) {
                    $search = $_GET['search'];
                    $ambildata = mysqli_query($koneksi, "SELECT * FROM logbook WHERE Nama LIKE '%$search%' OR Bagian LIKE '%$search%'");
                } else {
                    $ambildata = mysqli_query($koneksi, "SELECT * FROM logbook");
                }

                while ($tampil = mysqli_fetch_array($ambildata)) {
                    echo "
                    <tr>
                        <td>$no</td>   
                        <td>$tampil[Tanggal]</td>  
                        <td>$tampil[Nama]</td> 
                        <td>$tampil[Bagian]</td>   
                        <td>$tampil[Keperluan]</td> 
                        <td>$tampil[Jam_In]</td>  
                        <td>$tampil[Jam_Out]</td> 
                    </tr>";
                    $no++;
                }

            ?>

    </table>
					
    </div>
</div>
	
<script>
$(document).ready(function() {
    $('#mauexport').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy','csv','excel', 'pdf', 'print'
        ]
    } );
} );

</script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>

	

</body>

</html>