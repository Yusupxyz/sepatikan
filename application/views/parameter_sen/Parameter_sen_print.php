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
    <h3 align="center">DATA Parameter Sen</h3>
    <h4>Tanggal Cetak : <?= date("d/M/Y");?> </h4>
    <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id</th>
		<th>Parameter</th>
		<th>Id Nilai 1</th>
		<th>Id Nilai 2</th>
		<th>Id Nilai 3</th>
		
            </tr><?php
            foreach ($parameter_sen_data as $parameter_sen)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $parameter_sen->id ?></td>
		      <td><?php echo $parameter_sen->parameter ?></td>
		      <td><?php echo $parameter_sen->id_nilai_1 ?></td>
		      <td><?php echo $parameter_sen->id_nilai_2 ?></td>
		      <td><?php echo $parameter_sen->id_nilai_3 ?></td>	
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