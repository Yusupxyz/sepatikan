<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Grafik Detail</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
                    <i class="fa fa-minus"></i></button>
                     <button type="button" class="btn btn-box-tool" onclick="location.reload()" title="Collapse">
              <i class="fa fa-refresh"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
        <table class="table">
	    <tr><td>Id Grafik</td><td><?php echo $id_grafik; ?></td></tr>
	    <tr><td>Id Download</td><td><?php echo $id_download; ?></td></tr>
	    <tr><td>Id Jenis Grafik</td><td><?php echo $id_jenis_grafik; ?></td></tr>
	    <tr><td>Nama Grafik</td><td><?php echo $nama_grafik; ?></td></tr>
	    <tr><td>Variabel 1</td><td><?php echo $variabel_1; ?></td></tr>
	    <tr><td>Variabel 2</td><td><?php echo $variabel_2; ?></td></tr>
	    <tr><td>Variabel 3</td><td><?php echo $variabel_3; ?></td></tr>
	    <tr><td>Variabel 4</td><td><?php echo $variabel_4; ?></td></tr>
	    <tr><td>Variabel 5</td><td><?php echo $variabel_5; ?></td></tr>
	    <tr><td><a href="<?php echo site_url('grafik_asli') ?>" class="btn bg-purple">Cancel</a></td></tr>
	</table>
            </div>
        </div>
    </div>
</div>