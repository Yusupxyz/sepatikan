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
    <h3 align="center">DATA Rata Tangkapan Ikan</h3>
    <h4>Tanggal Cetak : <?= date("d/M/Y");?> </h4>
    <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id</th>
		<th>Id Stasiun</th>
		<th>Id Periode</th>
		<th>Rata Rata</th>
		
            </tr><?php
            foreach ($rata_tangkapan_ikan_data as $rata_tangkapan_ikan)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $rata_tangkapan_ikan->id ?></td>
		      <td><?php echo $rata_tangkapan_ikan->id_stasiun ?></td>
		      <td><?php echo $rata_tangkapan_ikan->id_periode ?></td>
		      <td><?php echo $rata_tangkapan_ikan->rata_rata ?></td>	
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