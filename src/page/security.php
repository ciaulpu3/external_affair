<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "external_affair";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
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
    <title>Security Device</title>
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <style>
        .banner {
          height: 115vh;
          background: linear-gradient(rgba(124, 124, 124, 0.5), rgba(157, 157, 157, 0.5)), url(../photos/security\ bg.jpg);
          background-size: cover;
          background-position: center;
        }
        
        .card {
            background-color: rgba(255, 255, 255, 0.5);
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.5);    
        }

        @media (max-width: 768px) {
          .container.sticky-top {
            padding-top: calc(var(--navbar-height) + 20px);
          }

          .banner {
            height: 110vh;
            background-size: 100% auto;
          }

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
          <h3 style="color: white;"><center>Form Security Device</center></h3>
          <div class="card bg-dark bg-opacity-50 shadow p-3 mb-3">
              <form form c  lass="form-border" style="overflow-y: auto; max-height: 600px; overflow-x: hidden;" action="" method="post">
              <div class="mb-3 row">
                    <label for="inputtanggal" class="col-sm-2 col-form-label text-white">Tanggal</label>
                    <div class="col-sm-8">
                      <input type="date" class="form-control" name="tanggal" required>
                    </div>
                  </div>
                <div class="overflow-x-auto">
                  <table class="w-full text-white border-collapse">
                      <thead>
                          <tr>
                              <th class="border border-white p-2">Perlengkapan Keamanan</th>
                              <th class="border border-white p-2">Status (OK/Tidak OK)</th>
                          </tr>
                      </thead>
                      <tbody>
                          <tr>
                              <td class="border border-white p-2">Monitor CCTV</td>
                              <td class="border border-white p-2"><input type="text" class="w-full p-2 rounded-lg" name="monitor_cctv" required></td>
                          </tr>
                          <tr>
                              <td class="border border-white p-2">Handy Talkie</td>
                              <td class="border border-white p-2"><input type="text" class="w-full p-2 rounded-lg" name="handy_talkie" required></td>
                          </tr>
                          <tr>
                              <td class="border border-white p-2">Tongkat T</td>
                              <td class="border border-white p-2"><input type="text" class="w-full p-2 rounded-lg" name="tongkat_t" required></td>
                          </tr>
                          <tr>
                              <td class="border border-white p-2">Cap Stample</td>
                              <td class="border border-white p-2"><input type="text" class="w-full p-2 rounded-lg" name="cap_stample" required></td>
                          </tr>
                          <tr>
                              <td class="border border-white p-2">Borgol</td>
                              <td class="border border-white p-2"><input type="text" class="w-full p-2 rounded-lg" name="borgol" required></td>
                          </tr>
                          <tr>
                              <td class="border border-white p-2">Lampu Senter</td>
                              <td class="border border-white p-2"><input type="text" class="w-full p-2 rounded-lg" name="lampu_senter" required></td>
                          </tr>
                          <tr>
                              <td class="border border-white p-2">Tongkat Guide/ Guard Lalin</td>
                              <td class="border border-white p-2"><input type="text" class="w-full p-2 rounded-lg" name="tongkat_guide" required></td>
                          </tr>

                          <tr>
                            <td class="border border-white p-2">Jas Hujan</td>
                            <td class="border border-white p-2"><input type="text" class="w-full p-2 rounded-lg" name="jas_hujan" required></td>
                          </tr>

                          <tr>
                            <td class="border border-white p-2">Sepatu Boot</td>
                            <td class="border border-white p-2"><input type="text" class="w-full p-2 rounded-lg" name="sepatu_boot" required></td>
                          </tr>

                          <tr>
                            <td class="border border-white p-2">Payung</td>
                            <td class="border border-white p-2"><input type="text" class="w-full p-2 rounded-lg" name="payung" required></td>
                          </tr>

                          <tr>
                            <td class="border border-white p-2">Mantel Hujan</td>
                            <td class="border border-white p-2"><input type="text" class="w-full p-2 rounded-lg" name="mantel_hujan" required></td>
                          </tr>

                          <tr>
                            <td class="border border-white p-2">Megaphone</td>
                            <td class="border border-white p-2"><input type="text" class="w-full p-2 rounded-lg" name="megaphone" required></td>
                          </tr>

                          <tr>
                            <td class="border border-white p-2">Helmet PKD</td>
                            <td class="border border-white p-2"><input type="text" class="w-full p-2 rounded-lg" name="helmet_pkd" required></td>
                          </tr>

                          <tr>
                            <td class="border border-white p-2">Buku Jurnal</td>
                            <td class="border border-white p-2"><input type="text" class="w-full p-2 rounded-lg" name="buku_jurnal" required></td>
                          </tr>

                          <tr>
                            <td class="border border-white p-2">Buku Penitipan Kunci</td>
                            <td class="border border-white p-2"><input type="text" class="w-full p-2 rounded-lg" name="buku_penitipan_kunci" required></td>
                          </tr>

                          <tr>
                            <td class="border border-white p-2">Buku Serah Terima Jaga</td>
                            <td class="border border-white p-2"><input type="text" class="w-full p-2 rounded-lg" name="buku_serah_terima_jaga" required></td>
                          </tr>

                          <tr>
                            <td class="border border-white p-2">Anak Kunci Pintu Pabrik DLL</td>
                            <td class="border border-white p-2"><input type="text" class="w-full p-2 rounded-lg" name="anak_kunci_pintu_pabrik" required></td>
                          </tr>
                        
                      </tbody>
                  </table> <br>
              </div>
                <button type="submit" class="btn btn-primary" name="security_device" value="Tambah Data"">Submit</button>
              </form>
            </div>
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

<?php 
$conn->close();
?>