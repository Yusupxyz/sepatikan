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
  <h2 align="center"><?= $title ?> </h2>
  <br>
    <div class="bs-example">
       <?php foreach ($deskripsi as $key => $value) {
         echo $value->deskripsi;
       } ?>
    </div>
    <div align="center">
            <?php echo anchor(site_url('Cover'),'<i class="fa fa-check"></i> Menu Utama', 'class="btn bg-green"'); ?>
        </div>
        <br>
  </div>
</div>


</body>
</html>                    

