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
    <h3 align="center">DATA Kategori</h3>
    <h4>Tanggal Cetak : <?= date("d/M/Y");?> </h4>
    <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Kategori</th>
		<th>Nama Kategori</th>
		<th>Slug Kategori</th>
		<th>Id Parent</th>
		<th>Aktif</th>
		<th>Terhapus</th>
		
            </tr><?php
            foreach ($kategori_data as $kategori)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $kategori->id_kategori ?></td>
		      <td><?php echo $kategori->nama_kategori ?></td>
		      <td><?php echo $kategori->slug_kategori ?></td>
		      <td><?php echo $kategori->id_parent ?></td>
		      <td><?php echo $kategori->aktif ?></td>
		      <td><?php echo $kategori->terhapus ?></td>	
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