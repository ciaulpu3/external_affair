<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "external_affair";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['patrol'])) {
    $Tanggal = $_POST['tanggal'];
    $Pagar_Masuk = $_POST['pagar_masuk'];
    $Pintu_Pabrik = $_POST['pintu_pabrik'];
    $Kawat_Berduri = $_POST['kawat_berduri'];
    $Cctv_Spot = $_POST['cctv_spot'];
    $Kunci_Pintu_Gembok = $_POST['kunci_pintu_gembok'];
    $Absensi_Mesin_Finger_Point_Door_Acces = $_POST['absensi_mesin_finger_point_door_acces'];
    $Barikade_Dan_Rubber_Cone = $_POST['barikade_dan_rubber_cone'];
    $Pemeriksaan_Ambulance = $_POST['pemeriksaan_ambulance'];
    $Pemeriksaan_Pos_Jaga_Pantai = $_POST['pemeriksaan_pos_jaga_pantai'];
    $Pos_Pantau_Gate = $_POST['pos_pantau_gate'];
    $Pos_Pantau_Lobby_Utama = $_POST['pos_pantau_lobby_utama'];
    $Pos_Pantau_I = $_POST['pos_pantau_i'];
    $Pos_Pantau_II = $_POST['pos_pantau_ii'];
    $Pos_Pantau_III = $_POST['pos_pantau_iii'];
    $Menara_Pantau_1 = $_POST['menara_pantau_1'];
    $Menara_Pantau_2 = $_POST['menara_pantau_2'];
    $Power_House = $_POST['power_house'];
    $Capasitor_Bank = $_POST['capasitor_bank'];
    $Genset = $_POST['genset'];
    $Ruang_Panel_Utama_Office = $_POST['ruang_panel_utama_office'];
    $Ruang_Panel_Listrik_Pnb = $_POST['ruang_panel_listrik_pnb'];
    $Power_Hydrant = $_POST['power_hydrant'];
    $Tank_Air_Ground_Tank_Taa = $_POST['tank_air_ground_tank_taa'];
    $Cctv = $_POST['cctv'];
    $Mesin_Server = $_POST['mesin_server'];
    $Recorder_Cctv = $_POST['recorder_cctv'];
    $Pabk = $_POST['pabk'];
    $Brangkas_Uang_Dokumen = $_POST['brangkas_uang_dokumen'];                 
    $Ruang_Dokumen = $_POST['ruang_dokumen'];
    $Ruang_Timbangan = $_POST['ruang_timbangan'];     
    $Jembatan_Timbang = $_POST['jembatan_timbang'];     
    $Conveyor_Scrap_Produksi = $_POST['conveyor_scrap_produksi'];     
    $Crane_Magnet = $_POST['crane_magnet'];
    $Gate_Timbangan = $_POST['gate_timbangan'];
    $Cooling_Tower = $_POST['cooling_tower'];
    $Mesin_Absen = $_POST['mesin_absen'];
    $Mesin_Foto_Copy_Fax = $_POST['mesin_foto_copy_fax'];

    $stmt = $conn->prepare("INSERT INTO security_device (tanggal, pagar_masuk, pintu_pabrik, kawat_berduri, cctv_spot, kunci_pintu_gembok, absensi_mesin_finger_point_door_acces, barikade_dan_rubber_cone, pemeriksaan_ambulance, pemeriksaan_pos_jaga_pantai, pos_pantau_gate, pos_pantau_lobby_utama, pos_pantau_i, pos_pantau_ii, pos_pantau_iii, menara_pantau_1, menara_pantau_2, power_house, capasitor_bank, genset, ruang_panel_utama_office, ruang_panel_listrik_pnb, power_hydrant, tank_air_ground_tank_taa, cctv, mesin_server, recorder_cctv, pabk, brangkas_uang_dokumen, ruang_dokumen, ruang_timbangan, jembatan_timbang, conveyor_scrap_produksi, crane_magnet, gate_timbangan, cooling_tower, mesin_absen, mesin_foto_copy_fax) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? )");
    $stmt->bind_param("ssssssssssssssssssssssssssssssssssssss", $Tanggal, $Pagar_Masu, $Pintu_Pabrik, $Kawat_Berduri, $Cctv_Spot, $Kunci_Pintu_Gembok, $Absensi_Mesin_Finger_Point_Door_Acces, $Barikade_Dan_Rubber_Cone, $Pemeriksaan_Ambulance, $Pemeriksaan_Pos_Jaga_Pantai, $Pos_Pantau_Gate, $Pos_Pantau_Lobby_Utama, $Pos_Pantau_I, $Pos_Pantau_II, $Pos_Pantau_III, $Menara_Pantau_1, $Menara_Pantau_2, $Power_House, $Capasitor_Bank, $Genset, $Ruang_Panel_Utama_Office, $Ruang_Panel_Listrik_Pnb, $Power_Hydrant, $Tank_Air_Ground_Tank_Taa, $Cctv, $Mesin_Server, $Recorder_Cctv, $Pabk, $Brangkas_Uang_Dokumen, $Ruang_Dokumen, $Ruang_Timbangan, $Jembatan_Timbang, $Conveyor_Scrap_Produksi, $Crane_Magnet, $Gate_Timbangan, $Cooling_Tower, $Mesin_Absen, $Mesin_Foto_Copy_Fax);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "";
    } else {
        echo "Error: " . $stmt->error;
    }
}

$sql_read = "SELECT * FROM patrol";
$result_read = $conn->query($sql_read);

?>

<!DOCTYPE html>       
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patrol Infrastruktur</title>
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <style>
        .banner {
            height: 115vh;
            background: linear-gradient(rgba(124, 124, 124, 0.5), rgba(157, 157, 157, 0.5)), url(../photos/patrol\ bg.jpg);
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
            <a class="nav-link" href="/index.html" style="color: #ffb47a;">Home</a>
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
              <li><a class="dropdown-item" href="../page/patrol.php">Patrol Infrastruktur</a></li>
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
          <h3 style="color: white;"><center>Form Patrol Infrastruktur</center></h3>
          <div class="card bg-dark bg-opacity-50 shadow p-3 mb-3">
              <form class="form-border" style="overflow-y: auto; max-height: 600px; overflow-x: hidden;" action="" method="post">
                  <div class="mb-3 row">
                    <label for="inputtanggal" class="col-sm-2 col-form-label text-white">Tanggal</label>
                    <div class="col-sm-10">
                      <input type="date" class="form-control" name="tanggal" required>
                    </div>
                  </div>
                <div class="overflow-x-auto">
                  <table class="w-full text-white border-collapse">
                      <thead>
                          <tr>
                              <th class="border border-white p-2">Data Environment</th>
                              <th class="border border-white p-2">Ket (OK/Tidak OK)</th>
                              <th></th> <th></th>
                          </tr>
                      </thead>
                      <tbody>

                          <tr>
                              <td class="border border-white p-2">1. Pagar Masuk</td>
                              <td class="border border-white p-2"><input type="text" class="w-full p-2 rounded-lg" name="pagar_masuk" required></td>
                          </tr>

                          <tr>
                            <td class="border border-white p-2">2. Pintu+Pintu Pabrik</td>
                            <td class="border border-white p-2"><input type="text" class="w-full p-2 rounded-lg" name="pintu_pabrik" required></td>
                          </tr>

                          <tr>
                            <td class="border border-white p-2">3. Kawat Berduri</td>
                            <td class="border border-white p-2"><input type="text" class="w-full p-2 rounded-lg" name="kawat_berduri" required></td>
                          </tr>

                          <tr>
                            <td class="border border-white p-2">4. Cctv Spot</td>
                            <td class="border border-white p-2"><input type="text" class="w-full p-2 rounded-lg" name="cctv_spot" required></td>
                          </tr>

                          <tr>
                            <td class="border border-white p-2">5. Kunci Pintu dan Gembok</td>
                            <td class="border border-white p-2"><input type="text" class="w-full p-2 rounded-lg" name="kunci_pintu_gembok" required></td>
                          </tr>

                          <tr>
                            <td class="border border-white p-2">6. Absensi Mesin dan Finger Point Door Acces</td>
                            <td class="border border-white p-2"><input type="text" class="w-full p-2 rounded-lg" name="absensi_mesin_finger_point_door_acces" required></td>
                          </tr>

                          <tr>
                            <td class="border border-white p-2">7. Barikade dan Rubber Cone</td>
                            <td class="border border-white p-2"><input type="text" class="w-full p-2 rounded-lg" name="barikade_dan_rubber_cone" required></td>
                          </tr>

                          <tr>
                            <td class="border border-white p-2">8. Pemeriksaan Ambulance</td>
                            <td class="border border-white p-2"><input type="text" class="w-full p-2 rounded-lg" name="pemeriksaan_ambulance" required></td>
                          </tr>

                          <tr>
                            <td class="border border-white p-2">9. Pemeriksaan Pos Jaga dan Pantai</td>
                            <td class="border border-white p-2"><input type="text" class="w-full p-2 rounded-lg" name="pemeriksaan_pos_jaga_pantai" required></td>
                          </tr>

                          <tr>
                            <td class="border border-white p-2">9.1 Pos Pantau (Gate)</td>
                            <td class="border border-white p-2"><input type="text" class="w-full p-2 rounded-lg" name="pos_pantau_gate" required></td>
                          </tr>

                          <tr>
                            <td class="border border-white p-2">9.2 Pos Pantau Lobby Utama</td>
                            <td class="border border-white p-2"><input type="text" class="w-full p-2 rounded-lg" name="pos_pantau_lobby_utama" required></td>
                          </tr>

                          <tr>
                            <td class="border border-white p-2">9.3 Pos Pantau I</td>
                            <td class="border border-white p-2"><input type="text" class="w-full p-2 rounded-lg" name="pos_pantau_i" required></td>
                          </tr>

                          <tr>
                            <td class="border border-white p-2">9.4 Pos Pantau II</td>
                            <td class="border border-white p-2"><input type="text" class="w-full p-2 rounded-lg" name="pos_pantau_ii" required></td>
                          </tr>

                          <tr>
                            <td class="border border-white p-2">9.5 Pos Pantau III</td>
                            <td class="border border-white p-2"><input type="text" class="w-full p-2 rounded-lg" name="pos_pantau_iii" required></td>
                          </tr>

                          <tr>
                            <td class="border border-white p-2">9.6 Menara Pantau 1</td>
                            <td class="border border-white p-2"><input type="text" class="w-full p-2 rounded-lg" name="menara_pantau_1" required></td>
                          </tr>

                          <tr>
                            <td class="border border-white p-2">9.7 Menara Pantau 2</td>
                            <td class="border border-white p-2"><input type="text" class="w-full p-2 rounded-lg" name="menara_pantau_2" required></td>
                          </tr>

                          <tr>
                            <td class="border border-white p-2">Power House</td>
                            <td class="border border-white p-2"><input type="text" class="w-full p-2 rounded-lg" name="power_house" required ></td>
                          </tr>

                          <tr>
                            <td class="border border-white p-2">Capasitor Bank</td>
                            <td class="border border-white p-2"><input type="text" class="w-full p-2 rounded-lg" name="capasitor_bank" required></td>
                          </tr>

                          <tr>
                            <td class="border border-white p-2">Genset</td>
                            <td class="border border-white p-2"><input type="text" class="w-full p-2 rounded-lg" name="genset" required></td>
                          </tr>

                          <tr>
                            <td class="border border-white p-2">Ruang Panel Utama Office</td>
                            <td class="border border-white p-2"><input type="text" class="w-full p-2 rounded-lg" name="ruang_panel_utama_office" required></td>
                          </tr>

                          <tr>
                            <td class="border border-white p-2">Ruang Panel Listrik PNB</td>
                            <td class="border border-white p-2"><input type="text" class="w-full p-2 rounded-lg" name="ruang_panel_listrik_pnb" required></td>
                          </tr>

                          <tr>
                            <td class="border border-white p-2">Power Hydrant</td>
                            <td class="border border-white p-2"><input type="text" class="w-full p-2 rounded-lg" name="power_hydrant" required></td>
                          </tr>

                          <tr>
                            <td class="border border-white p-2">Tank Air/Ground Tank & Taa</td>
                            <td class="border border-white p-2"><input type="text" class="w-full p-2 rounded-lg" name="tank_air_ground_tank_taa" required></td>
                          </tr>

                          <tr>
                            <td class="border border-white p-2">CCTV</td>
                            <td class="border border-white p-2"><input type="text" class="w-full p-2 rounded-lg" name="cctv" required></td>
                          </tr>

                          <tr>
                            <td class="border border-white p-2">Mesin Server</td>
                            <td class="border border-white p-2"><input type="text" class="w-full p-2 rounded-lg" name="mesin_server" required></td>
                          </tr>

                          <tr>
                            <td class="border border-white p-2">Recorder CCTV</td>
                            <td class="border border-white p-2"><input type="text" class="w-full p-2 rounded-lg" name="recorder_cctv" required></td>
                          </tr>

                          <tr>
                            <td class="border border-white p-2">PABK</td>
                            <td class="border border-white p-2"><input type="text" class="w-full p-2 rounded-lg" name="pabk" required></td>
                          </tr>

                          <tr>
                            <td class="border border-white p-2">Brangkas Uang dan Dokumen</td>
                            <td class="border border-white p-2"><input type="text" class="w-full p-2 rounded-lg" name="brangkas_uang_dokumen" required></td>
                          </tr>

                          <tr>
                            <td class="border border-white p-2">Ruang Dokumen</td>
                            <td class="border border-white p-2"><input type="text" class="w-full p-2 rounded-lg" name="ruang_dokumen" required></td>
                          </tr>

                          <tr>
                            <td class="border border-white p-2">Ruang Timbangan</td>
                            <td class="border border-white p-2"><input type="text" class="w-full p-2 rounded-lg" name="ruang_timbangan" required></td>
                          </tr>

                          <tr>
                            <td class="border border-white p-2">Jembatan Timbang</td>
                            <td class="border border-white p-2"><input type="text" class="w-full p-2 rounded-lg" name="jembatan_timbang" required></td>
                          </tr>

                          
                          <tr>
                            <td class="border border-white p-2">Conveyor Scrap Produksi</td>
                            <td class="border border-white p-2"><input type="text" class="w-full p-2 rounded-lg" name="conveyor_scrap_produksi" required></td>
                          </tr>

                          
                          <tr>
                            <td class="border border-white p-2">Crane Magnet</td>
                            <td class="border border-white p-2"><input type="text" class="w-full p-2 rounded-lg" name="crane_magnet" required></td>
                          </tr>

                          
                          <tr>
                            <td class="border border-white p-2">Gate Timbangan</td>
                            <td class="border border-white p-2"><input type="text" class="w-full p-2 rounded-lg" name="gate_timbangan" required></td>
                          </tr>

                          <tr>
                            <td class="border border-white p-2">Cooling Tower</td>
                            <td class="border border-white p-2"><input type="text" class="w-full p-2 rounded-lg" name="cooling_tower" required></td>
                          </tr>

                          <tr>
                            <td class="border border-white p-2">Mesin Absen</td>
                            <td class="border border-white p-2"><input type="text" class="w-full p-2 rounded-lg" name="mesin_absen" required></td>
                          </tr>

                          <tr>
                            <td class="border border-white p-2">Mesin Foto Copy/Fax</td>
                            <td class="border border-white p-2"><input type="text" class="w-full p-2 rounded-lg" name="mesin_foto_copy_fax" required></td>
                          </tr>

                      </tbody>
                  </table> <br>
              </div>
                <button type="submit" class="btn btn-primary" name="patol" value="Tambah Data">Submit</button>
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