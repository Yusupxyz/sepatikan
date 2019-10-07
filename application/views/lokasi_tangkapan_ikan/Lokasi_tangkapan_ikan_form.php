<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?= $button;?> Lokasi_tangkapan_ikan</h3>
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
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Id <?php echo form_error('id') ?></label>
            <input type="text" class="form-control" name="id" id="id" placeholder="Id" value="<?php echo $id; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Stasiun <?php echo form_error('id_stasiun') ?></label>
            <input type="text" class="form-control" name="id_stasiun" id="id_stasiun" placeholder="Id Stasiun" value="<?php echo $id_stasiun; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Periode <?php echo form_error('id_periode') ?></label>
            <input type="text" class="form-control" name="id_periode" id="id_periode" placeholder="Id Periode" value="<?php echo $id_periode; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Lokasi <?php echo form_error('lokasi') ?></label>
            <input type="text" class="form-control" name="lokasi" id="lokasi" placeholder="Lokasi" value="<?php echo $lokasi; ?>" />
        </div>
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('lokasi_tangkapan_ikan') ?>" class="btn btn-default">Cancel</a>
	</form>
         </div>
        </div>
    </div>
</div>