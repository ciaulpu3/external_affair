<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "external_affair";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql_read = "SELECT * FROM abnormality";
$result_read = $conn->query($sql_read);

$abnormality_data = array();
while ($row = $result_read->fetch_assoc()) {
    $abnormality_data[] = $row;
}

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT COUNT(*) as total FROM abnormality";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>External Affair</title>
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
</head>
<body>

  <style>
      #carouselExampleInterval {
            margin-top: 60px;
      }
      
      .container {
            padding: 20px;
            margin-top: 70px;
        }
        .header {
            background-color: #ffb47a;
            text-align: center;
            padding: 10px;
            font-size: 24px;
            font-weight: bold;
        }

        /* table */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #000;
            text-align: center;
            padding: 5px;
        }
        th {
            background-color: #ffb47a;
        }

        /* notif */
        .stat-card {
            background-color: #173B45;
            padding: 20px;
            text-align: center;
            margin: 10px;
        }

        .card {
             position: relative;
        }

        .card .start-number {
            position: absolute;
            top: -20px;
            left: -20px;
            background-color: #855b5b;
            padding: 5px 10px;
            font-size: 16px;
            font-weight: bold;
        }
        .stat-number {
            background-color: #9e2727;
            font-size: 48px;
            font-weight: bold;
            padding: 20px;
            margin-bottom: 10px;
            margin-top: 0px;
        }

        /* calendar */
        .calendar-container {
            background: #fff;
            width: 50%;
            height: 70%;
            float: left;
            border-radius: 10px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.12);
            margin-bottom: 50px;
        }

        .calendar-container header {
            display: flex;
            align-items: center;
            padding: 25px 30px 10px;
            justify-content: space-between;
        }

        header .calendar-navigation {
            display: flex;
        }

        header .calendar-navigation span {
            height: 38px;
            width: 38px;
            margin: 0 1px;
            cursor: pointer;
            text-align: center;
            line-height: 38px;
            border-radius: 50%;
            user-select: none;
            color: #aeabab;
            font-size: 1.9rem;
        }

        .calendar-navigation span:last-child {
            margin-right: -10px;
        }

        header .calendar-navigation span:hover {
            background: #f2f2f2;
        }

        header .calendar-current-date {
            font-weight: 500;
            font-size: 1.45rem;
        }

        .calendar-body {
            padding: 20px;
        }

        .calendar-body ul {
            list-style: none;
            flex-wrap: wrap;
            display: flex;
            text-align: center;
        }

        .calendar-body .calendar-dates {
            margin-bottom: 20px;
        }

        .calendar-body li {
            width: calc(100% / 7);
            font-size: 1.07rem;
            color: #414141;
        }

        .calendar-body .calendar-weekdays li {
            cursor: default;
            font-weight: 500;
        }

        .calendar-body .calendar-dates li {
            margin-top: 30px;
            position: relative;
            z-index: 1;
            cursor: pointer;
        }

        .calendar-dates li.inactive {
            color: #aaa;
        }

        .calendar-dates li.active {
            color: #fff;
        }

        .calendar-dates li::before {
            position: absolute;
            content: "";
            z-index: -1;
            top: 50%;
            left: 50%;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            transform: translate(-50%, -50%);
        }

        .calendar-dates li.active::before {
            background: #6332c5;
        }

        .calendar-dates li:not(.active):hover::before {
            background: #e4e1e1;
        }

        /* note */
        .container-note {
            width: 35%;
            float: right;
            margin-top: 11%;
            margin-right: 50px;
            margin-bottom: 50px;
        }

        .note {
            background-color: #ff7e1b;
            text-align: center;
            padding: 10px;
            margin-top: 10px;
            border-radius: 5px;
            font-size: 16px;
        }
        .content {
            background-color: #ffb47a;
            margin-top: 12px;
            border-radius: 5px;
            padding: 10px;
            margin-top: 5px;
            overflow-y: auto;
            max-height: 350px;
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

  <!-- CAROUSEL START -->
  <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
  <center>
  <div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="10000">
      <img src="../photos/foc.png" class="d-block w-100" alt="" height="600" style="filter: brightness(0.5);">
      <div class="carousel-caption d-none d-md-block">
          <h1>Focus On Customer</h1>
          <p>Meningkatkan kualitas pelayanan yang berkelanjutan untuk mencapai kepuasan pelanggan</p>
      </div>
    </div>
    <div class="carousel-item" data-bs-interval="2000">
      <img src="../photos/integrity.png" class="d-block w-100" alt="" height="600" style="filter: brightness(0.5);">
      <div class="carousel-caption d-none d-md-block">
          <h1>Integrity</h1>
          <p>Menjadi Panutan dalam Menegakkan Kebenaran dan Menjaga Amanah</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="../photos/respon.png" class="d-block w-100" alt="" height="600" style="filter: brightness(0.5);">
      <div class="carousel-caption d-none d-md-block">
          <h1>Reponsibility</h1>
          <p>Bertanggung jawab dalam bekerja sesuai Tata Kelola Perusahaan yang baik untuk pertumbuhan perusahaan yang berkesinambungan</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="../photos/synergy.png" class="d-block w-100" alt="" height="600" style="filter: brightness(0.5);">
      <div class="carousel-caption d-none d-md-block">
          <h1>Synergy</h1>
          <p>Bekerjasama untuk menghasilkan organisasi adaptif yang efektif dan efisien yang siap menghadapi tantangan</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="../photos/trust.png" class="d-block w-100" alt="" height="600" style="filter: brightness(0.5);">
      <div class="carousel-caption d-none d-md-block">
          <h1>Trustworthiness</h1>
          <p>Tangguh, cakap dan siap dalam segala situasi sehingga dapat diandalkan</p>
      </div>
    </div>
  </center>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <!-- CAROUSEL END -->

  <!-- REKAP KEHADIRAN SATPAM START -->
  <div class="container">
      <div class="header" style="box-shadow: 5px 5px 20px rgba(0, 0, 0, 0.12);">REKAPITULASI KEHADIRAN SATPAM PT IPPI</div>
      <table style="font-size: 10px; box-shadow: 5px 5px 20px rgba(0, 0, 0, 0.12);">
          <thead>
              <tr>
                  <th rowspan="2">No</th>
                  <th rowspan="2">NPK</th>
                  <th rowspan="2">Nama</th>
                  <th colspan="31">KEHADIRAN PER TANGGAL</th>
                  <th colspan="5">PRODUCTIVITY</th>
              </tr>
              <tr>
                  <th>01</th>
                  <th>02</th>
                  <th>03</th>
                  <th>04</th>
                  <th>05</th>
                  <th>06</th>
                  <th>07</th>
                  <th>08</th>
                  <th>09</th>
                  <th>10</th>
                  <th>11</th>
                  <th>12</th>
                  <th>13</th>
                  <th>14</th>
                  <th>15</th>
                  <th>16</th>
                  <th>17</th>
                  <th>18</th>
                  <th>19</th>
                  <th>20</th>
                  <th>21</th>
                  <th>22</th>
                  <th>23</th>
                  <th>24</th>
                  <th>25</th>
                  <th>26</th>
                  <th>27</th>
                  <th>28</th>
                  <th>29</th>
                  <th>30</th>
                  <th>31</th>
                  <th>HK HB</th>
                  <th>HK HLB</th>
                  <th>SK</th>
                  <th>CT</th>
              </tr>
          </thead>
          <tbody>
              <tr>
                  <td>1</td>
                  <td>225755</td>
                  <td>ABDUL RASYID</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
              </tr>
              <tr>
                  <td>2</td>
                  <td>226760</td>
                  <td>ALEK</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
              </tr>
              <tr>
                  <td>3</td>
                  <td>225747</td>
                  <td>AMIR SANUSI</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
              </tr>
              <tr>
                  <td>4</td>
                  <td>225761</td>
                  <td>ARIF HIDAYAT</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
              </tr>
              <tr>
                  <td>5</td>
                  <td>225746</td>
                  <td>ARIF SUGIANTO</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
              </tr>
              <tr>
                <td>6</td>
                <td>225751</td>
                <td>DESI KRISBIYANTO</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td>7</td>
                <td>225759</td>
                <td>DIKA ISMUNANDAR</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td>8</td>
                <td>225763</td>
                <td>DONY VENARDO</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td>9</td>
                <td>225756</td>
                <td>EDHI SUPRIYADI</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td>10</td>
                <td>225746</td>
                <td>ARIF SUGIANTO</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td>11</td>
                <td>225754</td>
                <td>IKHWAMUDIN</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td>12</td>
                <td>225861</td>
                <td>NUR KHOLIK</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td>13</td>
                <td>225764</td>
                <td>RIDWAN</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td>14</td>
                <td>225751</td>
                <td>SUGENG HARIYANTO</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
          </tbody>
      </table>
      <table style="font-size: 10px; box-shadow: 5px 5px 20px rgba(0, 0, 0, 0.12);">
          <thead>
              <tr>
                  <th rowspan="2">No</th>
                  <th rowspan="2">NPK</th>
                  <th rowspan="2">Nama</th>
                  <th colspan="31">KEHADIRAN PER TANGGAL</th>
                  <th colspan="5">PRODUCTIVITY</th>
              </tr>
              <tr>
                <th>01</th>
                <th>02</th>
                <th>03</th>
                <th>04</th>
                <th>05</th>
                <th>06</th>
                <th>07</th>
                <th>08</th>
                <th>09</th>
                <th>10</th>
                <th>11</th>
                <th>12</th>
                <th>13</th>
                <th>14</th>
                <th>15</th>
                <th>16</th>
                <th>17</th>
                <th>18</th>
                <th>19</th>
                <th>20</th>
                <th>21</th>
                <th>22</th>
                <th>23</th>
                <th>24</th>
                <th>25</th>
                <th>26</th>
                <th>27</th>
                <th>28</th>
                <th>29</th>
                <th>30</th>
                <th>31</th>
                <th>HK HB</th>
                <th>HK HLB</th>
                <th>SK</th>
                <th>CT</th>
              </tr>
          </thead>
          <tbody>
              <tr>
                  <td>1</td>
                  <td>225755</td>
                  <td>ABDUL RASYID</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
              </tr>
          </tbody>
      </table>
  </div>
  <!-- REKAP KEHADIRAN SATPAM END -->

  <!-- INFO INPUT START -->
  <div class="container-notif" style="margin-left: 47px; margin-right: 47px; margin-top: 50px;">
        <div class="row">

            <div class="col-md-4">
                <div class="stat-card">
                    <div style="height: 100px; color: white;">Jumlah Abnormality Bulan Ini</div>
                    <div class="card">
                        <div class="start-number" style="font-size: 6pc; background-color: #ffb47a; margin-left: 10px; margin-top: -30px; height: 150px; box-shadow: 10px 10px 20px rgba(0, 0, 0, 0.12);">
                            <?php
                                $servername = "localhost";
                                $username = "root";
                                $password = "";
                                $dbname = "external_affair";

                                $conn = new mysqli($servername, $username, $password, $dbname);

                                if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                }

                                $sql = "SELECT COUNT(*) as total FROM abnormality";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    $row = $result->fetch_assoc();
                                    echo $row['total'];
                                } else {
                                    echo "0";
                                }

                                $conn->close();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-card">
                    <div style="height: 100px; color: white">Jumlah Scrap Masuk Bulan Ini</div>
                    <div class="card">
                        <div class="start-number" style="font-size: 6pc; background-color: #ffb47a; margin-left: 10px; margin-top: -30px; height: 150px; box-shadow: 10px 10px 20px rgba(0, 0, 0, 0.12);">
                            <?php
                                $servername = "localhost";
                                $username = "root";
                                $password = "";
                                $dbname = "external_affair";

                                $conn = new mysqli($servername, $username, $password, $dbname);

                                if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                }

                                $sql = "SELECT COUNT(*) as total FROM logbook";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    $row = $result->fetch_assoc();
                                    echo $row['total'];
                                } else {
                                    echo "0";
                                }

                                $conn->close();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-card">
                    <div style="height: 100px; color: white">Jumlah Tamu Masuk Bulan Ini</div>
                    <div class="card">
                        <div class="start-number" style="font-size: 6pc; background-color: #ffb47a; margin-left: 10px; margin-top: -30px; height: 150px; box-shadow: 10px 10px 20px rgba(0, 0, 0, 0.12);">
                        <?php
                                $servername = "localhost";
                                $username = "root";
                                $password = "";
                                $dbname = "external_affair";

                                $conn = new mysqli($servername, $username, $password, $dbname);

                                if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                }

                                $sql = "SELECT COUNT(*) as total FROM tamu";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    $row = $result->fetch_assoc();
                                    echo $row['total'];
                                } else {
                                    echo "0";
                                }

                                $conn->close();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>
  <!-- INFO INPUT END -->

  <!-- KALENDER START -->
  <div class="calendar-container" style="margin-top: 11%; margin-left: 70px;">
    <header class="calendar-header">
        <p class="calendar-current-date"></p>
        <div class="calendar-navigation">
            <span id="calendar-prev" 
                  class="material-symbols-rounded">
                chevron_left
            </span>
            <span id="calendar-next" 
                  class="material-symbols-rounded">
                chevron_right
            </span>
        </div>
    </header>

    <div class="calendar-body">
        <ul class="calendar-weekdays">
            <li>Sun</li>
            <li>Mon</li>
            <li>Tue</li>
            <li>Wed</li>
            <li>Thu</li>
            <li>Fri</li>
            <li>Sat</li>
        </ul>
        <ul class="calendar-dates"></ul>
    </div>
  </div> 
  <!-- KALENDER END -->

  <!-- NOTE START -->
  <div class="container-note">  
    <div class="note" style="font-weight: bold;">CATATAN</div>
    <div class="note">Abnormality Yang Terjadi</div>
    <div class="content">
        <?php foreach ($abnormality_data as $data) { ?>
            <p>Tanggal: <?php echo $data['Tanggal']; ?></p>
            <p>Nama Pencatat: <?php echo $data['Nama_Pencatat']; ?></p>
            <p>Problem/Temuan: <?php echo $data['Problem']; ?></p>
            <p>Lokasi: <?php echo $data['Lokasi']; ?></p>
            <hr>
        <?php } ?>
    </div>
  </div>
  <!-- NOTE END -->

  <script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
  <script>
    let date = new Date();
    let year = date.getFullYear();
    let month = date.getMonth();

    const day = document.querySelector(".calendar-dates");

    const currdate = document
        . querySelector(".calendar-current-date");

    const prenexIcons = document
        .querySelectorAll(".calendar-navigation span");

    const months = [
        "January",
        "February",
        "March",
        "April",
        "May",
        "June",
        "July",
        "August",
        "September",
        "October",
        "November",
        "December"
    ];

    const manipulate = () => {

        let dayone = new Date(year, month, 1).getDay();
        let lastdate = new Date(year, month + 1, 0).getDate();
        let dayend = new Date(year, month, lastdate).getDay();
        let monthlastdate = new Date(year, month, 0).getDate();
        let lit = "";

        for (let i = dayone; i > 0; i--) {
            lit +=
                `<li class="inactive">${monthlastdate - i + 1}</li>`;
        }

        for (let i = 1; i <= lastdate; i++) {
            let isToday = i === date.getDate()
                && month === new Date().getMonth()
                && year === new Date().getFullYear()
                ? "active"
                : "";
            lit += `<li class="${isToday}">${i}</li>`;
        }

        for (let i = dayend; i < 6; i++) {
            lit += `<li class="inactive">${i - dayend + 1}</li>`
        }

        currdate.innerText = `${months[month]} ${year}`;
        day.innerHTML = lit;
    }

    manipulate();

    prenexIcons.forEach(icon => {

        icon.addEventListener("click", () => {

            month = icon.id === "calendar-prev" ? month - 1 : month + 1;

            if (month < 0 || month > 11) {
                date = new Date(year, month, new Date().getDate());
                year = date.getFullYear();
                month = date.getMonth();
            }

            else {
                date = new Date();
            }
            manipulate();
        });
    });
  </script>
</body>
</html>