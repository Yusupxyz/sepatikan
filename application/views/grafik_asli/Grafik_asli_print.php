<!DOCTYPE html>
<html>
<head>
    <title>Tittle</title>
    <style type="text/css" media="print">
    @page {
        margin: 0;  /* this affects the margin in the printer settings */
    }
      table{
        border-collapse: collapse;
        border-spacing: 0;
        width: 100%;
      }
      table th{
          -webkit-print-color-adjust:exact;
        border: 1px solid;

                padding-top: 11px;
    padding-bottom: 11px;
    background-color: #a29bfe;
      }
   table td{
        border: 1px solid;

   }
        </style>
</head>
<body>
    <h3 align="center">DATA Grafik</h3>
    <h4>Tanggal Cetak : <?= date("d/M/Y");?> </h4>
    <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Grafik</th>
		<th>Id Download</th>
		<th>Id Jenis Grafik</th>
		<th>Nama Grafik</th>
		<th>Variabel 1</th>
		<th>Variabel 2</th>
		<th>Variabel 3</th>
		<th>Variabel 4</th>
		<th>Variabel 5</th>
		
            </tr><?php
            foreach ($grafik_asli_data as $grafik_asli)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $grafik_asli->id_grafik ?></td>
		      <td><?php echo $grafik_asli->id_download ?></td>
		      <td><?php echo $grafik_asli->id_jenis_grafik ?></td>
		      <td><?php echo $grafik_asli->nama_grafik ?></td>
		      <td><?php echo $grafik_asli->variabel_1 ?></td>
		      <td><?php echo $grafik_asli->variabel_2 ?></td>
		      <td><?php echo $grafik_asli->variabel_3 ?></td>
		      <td><?php echo $grafik_asli->variabel_4 ?></td>
		      <td><?php echo $grafik_asli->variabel_5 ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
</body>
<script type="text/javascript">
      window.print()
    </script>
</html>