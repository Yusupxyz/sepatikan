<div class="row">
<div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Grafik</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" onclick="location.reload()" title="Refresh">
              <i class="fa fa-refresh"></i></button>
          </div>
      </div>

      <div class="box-body">
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('grafik_asli/create'),'<i class="fa fa-plus"></i> Create', 'class="btn bg-purple"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right"><form action="<?php echo site_url('grafik_asli/index'); ?>" class="form-inline" method="get" style="margin-top:10px">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('grafik_asli'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <form method="post" action="<?= site_url('grafik_asli/deletebulk');?>" id="formbulk">
        <table class="table table-bordered" style="margin-bottom: 10px" style="width:100%">
            <tr>
                <th style="width: 10px;"><input type="checkbox" name="selectall" /></th>
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
		<th>Action</th>
            </tr><?php
            foreach ($grafik_asli_data as $grafik_asli)
            {
                ?>
                <tr>
                
		<td  style="width: 10px;padding-left: 8px;"><input type="checkbox" name="id" value="<?= $grafik_asli->id_grafik;?>" />&nbsp;</td>
                
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $grafik_asli->id_grafik ?></td>
			<td><?php echo $grafik_asli->id_download ?></td>
			<td><?php echo $grafik_asli->id_jenis_grafik ?></td>
			<td><?php echo $grafik_asli->nama_grafik ?></td>
			<td><?php echo $grafik_asli->variabel_1 ?></td>
			<td><?php echo $grafik_asli->variabel_2 ?></td>
			<td><?php echo $grafik_asli->variabel_3 ?></td>
			<td><?php echo $grafik_asli->variabel_4 ?></td>
			<td><?php echo $grafik_asli->variabel_5 ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('grafik_asli/read/'.$grafik_asli->id_grafik),'<i class="fa fa-search"></i>', 'class="btn btn-xs btn-primary"  data-toggle="tooltip" title="Detail"'); 
				echo ' '; 
				echo anchor(site_url('grafik_asli/update/'.$grafik_asli->id_grafik),' <i class="fa fa-edit"></i>', 'class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit"'); 
				echo ' '; 
				echo anchor(site_url('grafik_asli/delete/'.$grafik_asli->id_grafik),' <i class="fa fa-trash"></i>','class="btn btn-xs btn-danger" onclick="javasciprt: return confirmdelete(\'grafik_asli/delete/'.$grafik_asli->id_grafik.'\')"  data-toggle="tooltip" title="Delete" '); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
         <div class="row" style="margin-bottom: 10px;">
            <div class="col-md-12">
                <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i> Hapus Data Terpilih</button> <a href="#" class="btn bg-yellow">Total Record : <?php echo $total_rows ?></a>
            </div>
        </div>
        </form>
        <div class="row">
            <div class="col-md-6">
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </div>
    </div>
  </div>
</div>