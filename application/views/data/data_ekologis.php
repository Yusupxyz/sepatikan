<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Sepatikan</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<style type="text/css">
    .bs-example{
    }
</style>
</head>
<body style="background:#f2f2f2;">
    
<div class="container mt-3">
  <h2><?= $title ?> </h2>
  <br>
  <?php echo anchor(site_url('data_tampil_ekologis/download/'.$title.'/'.$id_sungai.'/'.$id_tahun.'/'.$jenis_data),'<i class="fa fa-download"></i> Download (Excel)', 'class="btn bg-green"'); ?>
    <div class="bs-example">
        <table class="table table-hover table-bordered">
            <thead class="thead-dark">
                <tr align="center">
                    <th colspan="11"><?= $subtitle ?></th>
                </tr>
            </thead>
            <thead class="thead-dark">
                <tr align="center">
                    <th rowspan="3" >PARAMETER</th>
                    <th colspan="5">PERIODE 1 (musim hujan)</th>
                    <th colspan="5">PERIODE 2 (musim kemarau)</th>
                </tr>
                <tr align="center">
                    <th colspan="5">STASIUN</th>
                    <th colspan="5">STASIUN</th>
                </tr>
                <tr align="center">
                    <th>1</th>
                    <th>2</th>
                    <th>3</th>
                    <th>4</th>
                    <th>5</th>
                    <th>1</th>
                    <th>2</th>
                    <th>3</th>
                    <th>4</th>
                    <th>5</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=0; $sum=0; foreach ($parameter as $key => $value) { ?>
                    <tr>
                        <td><?= $value->parameter; ?></td>
                        <td><?= $n1= isset($data1[0][$i]->data) ? $data1[0][$i++]->data : '0' ?></td>
                        <td><?= $n2= isset($data1[1][$i]->data) ? $data1[1][$i++]->data : '0' ?></td>
                        <td><?= $n3= isset($data1[2][$i]->data) ? $data1[2][$i++]->data : '0' ?></td>
                        <td><?= $n4= isset($data1[3][$i]->data) ? $data1[3][$i++]->data : '0' ?></td>
                        <td><?= ($n1+$n2+$n3+$n4)/4 ?></td>
                        <td><?= $n1= isset($data2[0][$i]->data) ? $data2[0][$i++]->data : '0' ?></td>
                        <td><?= $n2= isset($data2[1][$i]->data) ? $data2[1][$i++]->data : '0' ?></td>
                        <td><?= $n3= isset($data2[2][$i]->data) ? $data2[2][$i++]->data : '0' ?></td>
                        <td><?= $n4= isset($data2[3][$i]->data) ? $data2[3][$i++]->data : '0' ?></td>
                        <td><?= ($n1+$n2+$n3+$n4)/4 ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
      <div align="right">
            <?php echo anchor(site_url('Cover'),'<i class="fa fa-check"></i> Menu Utama', 'class="btn bg-green"'); ?>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalLokasi">Menu Lihat Data</button>
        </div>
        <br>
  </div>
</div>

<?php $this->load->view($modal); ?>

</body>
</html>                    

<?php $this->load->view($codejs); ?>
