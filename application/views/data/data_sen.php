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
  <?php echo anchor(site_url('data_tampil_sen/download/'.$title.'/'.$id_sungai.'/'.$id_tahun.'/'.$jenis_data),'<i class="fa fa-download"></i> Download (Excel)', 'class="btn bg-green"'); ?>
    <div class="bs-example">
        <table class="table table-hover table-bordered">
            <thead class="thead-dark">
                <tr align="center">
                    <th>No</th>
                    <th>Parameter</th>
                    <th>Data Rata-rata</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1; $sum=0; $k=0; foreach ($parameter as $key => $value) { ?>
                    <tr>
                        <td align="center"><?= $i++ ?></td>
                        <td><?= $value->parameter ?><br>
                            <?php $j=1; foreach ($nilai_parameter[$value->id] as $key => $value2) { ?>
                                <?= $j++.'. '.$value2->nilai ?><br>
                            <?php } ?>
                        </td>
                        <td align="center"><?= ucfirst(isset($rata[$k++]->nilai) ? $rata[$k++]->nilai : 'Belum diketahui') ?></td>
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
