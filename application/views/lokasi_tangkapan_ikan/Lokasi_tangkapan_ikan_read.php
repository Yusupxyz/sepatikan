<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Lokasi Tangkapan Ikan Detail</h3>
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
	    <tr><td>Id</td><td><?php echo $id; ?></td></tr>
	    <tr><td>Id Stasiun</td><td><?php echo $id_stasiun; ?></td></tr>
	    <tr><td>Id Periode</td><td><?php echo $id_periode; ?></td></tr>
	    <tr><td>Lokasi</td><td><?php echo $lokasi; ?></td></tr>
	    <tr><td><a href="<?php echo site_url('lokasi_tangkapan_ikan') ?>" class="btn bg-purple">Cancel</a></td></tr>
	</table>
            </div>
        </div>
    </div>
</div>