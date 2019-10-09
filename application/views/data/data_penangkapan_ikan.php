<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Bootstrap 4 Table with Hover States</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<style type="text/css">
    .bs-example{
    	margin: 20px;
    }
</style>
</head>
<body style="background:#f2f2f2;">
    
<div class="container mt-3">
  <h2>Data Penangkapan Ikan Tahun </h2>
  <br>
  <!-- Nav tabs -->
  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#menu1">Rekap</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu2">Stasiun 1</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu3">Stasiun 2</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu4">Stasiun 3</a>
    </li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
      <?php  for ($i=0; $i < 4; $i++) {  ?>
        <div id="menu<?= $i+1 ?>" class="container tab-pane <?php echo $i==0 ? 'active' : 'fade'; ?>"><br>
            <div class="bs-example">
                <table class="table table-hover table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>Parameter</th>
                            <th>Periode 1 (Musim Hujan)</th>
                            <th>Periode 2 (Musim Kemarau)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Rata rata hasil tangkapan total per nelayan per hari (kg/hari/nelayan)</td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="bs-example">
                <table class="table table-hover table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th colspan="4">Hasil tangkapan ikan di sungai berdasarkan jenis ikan</th>
                        </tr>
                    </thead>
                    <thead class="thead-dark">
                        <tr>
                            <th colspan="4">Periode 1 (musim hujan)</th>
                        </tr>
                    </thead>
                    <thead class="thead-light">
                        <tr>
                            <th>No.</th>
                            <th>Nama Ikan</th>
                            <th>Hasil Tangkapan (kg/hari/nelayan)</th>
                            <th>Ukuran Ikan Rata-rata (gram/ekor)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                    <thead class="thead-dark">
                        <tr>
                            <th colspan="4">Periode 2 (musim kemarau)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="bs-example">
                <table class="table table-hover table-bordered">
                <thead class="thead-dark">
                        <tr>
                            <th colspan="3">Data penggunaan alat tangkap dan lokasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Alat tangkap ikan yang digunakan pada periode 1 (musim hujan)</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Alat tangkap ikan yang digunakan pada periode 2 (musim kemarau)</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Lokasi penangkapan pada periode 1 (musim hujan)</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Lokasi penangkapan pada periode 2 (musim kemarau)</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
      <?php } ?>
  </div>
</div>


</body>
</html>                            