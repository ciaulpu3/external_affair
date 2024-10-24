<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "external_affair";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
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
      echo "";
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
    <title>Logbook Tamu</title>
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <style>
      .banner {
        height: 100vh;
        background: linear-gradient(rgba(124, 124, 124, 0.5), rgba(157, 157, 157, 0.5)), url(../photos/tamu\ bg.jpg);
        background-size: cover;
        background-position: center;
      }

        .container-clock {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
        }
      
      .card {
        background-color: rgba(255, 255, 255, 0.5);
        box-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
      }

      @media (max-width: 768px) {
        .container.sticky-top {
          padding-top: calc(var(--navbar-height) + 20px);
        }
      }

      @media only screen and (max-width: 768px) {
        .banner {
          height: 110vh;
          background-size: 100% auto;
        }
      }

      @media (max-width: 768px) {
        .container {
          margin-top: 100px;
        }
      }
    </style>
</head>
<body>

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

    <!-- BANNER START -->
    <div class="container-fluid banner">
      <div class="container banner-content col-lg-6">

        <!-- FORM START -->
          <div class="container mt-5 pt-4 sticky-top" style="padding-top: 60px;">
            <h3 style="color: white;"><center>Form Logbook Tamu</center></h3>
            <div class="card bg-dark bg-opacity-50 shadow p-3 mb-5">
            <form action="" method="post">
                  <div class="mb-3 row">
                    <label for="inputtanggal" class="col-sm-2 col-form-label text-white">Tanggal</label>
                    <div class="col-sm-10">
                      <input type="date" class="form-control" name="tanggal" required>
                    </div>
                  </div>

                  <div class="mb-3 row">
                    <label for="inputnama" class="col-sm-2 col-form-label text-white">Nama</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="nama_tamu" required>
                    </div>
                  </div>

                  <div class="mb-3 row">
                    <label for="inputbagian" class="col-sm-2 col-form-label text-white">Nama PT</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="nama_pt" required>
                    </div>
                  </div>

                  <div class="mb-3">
                    <label for="keperluan" class="form-label text-white">Keperluan</label>
                    <textarea class="form-control" name="keperluan" rows="3" required></textarea>
                  </div>

                  <div class="mb-3 row">
                  <div class="col-md-6">
                    <label for="jamin" class="form-label text-white">Jam In</label>
                    <input type="time" class="form-control" name="jamin" required>
                  </div>
                  <div class="col-md-6">
                    <label for="jamout" class="form-label text-white">Jam Out</label>
                    <input type="time" class="form-control" name="jamout" required>
                  </div>
                </div>

               <button type="submit" class="btn btn-primary" name="tamu" value="Tambah Data">Submit</button>
            </form>
           </div>
        <!-- FORM END -->

      </div>
    </div>
    
  <!-- BANNER END -->
   

    <script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
    <script>
      const navbar = document.querySelector('.navbar');
      const formContainer = document.querySelector('.container.sticky-top');

      formContainer.style.paddingTop = navbar.offsetHeight + 'px';

      window.addEventListener('resize', () => {
        formContainer.style.paddingTop = navbar.offsetHeight + 'px';
      });;
    </script>

</body>
</html>