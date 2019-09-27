<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?= $button;?> Variabel</h3>
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
            <label for="int">Id Variabel <?php echo form_error('id_variabel') ?></label>
            <input type="text" class="form-control" name="id_variabel" id="id_variabel" placeholder="Id Variabel" value="<?php echo $id_variabel; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Grafik <?php echo form_error('id_grafik') ?></label>
            <input type="text" class="form-control" name="id_grafik" id="id_grafik" placeholder="Id Grafik" value="<?php echo $id_grafik; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nilai <?php echo form_error('nilai') ?></label>
            <input type="text" class="form-control" name="nilai" id="nilai" placeholder="Nilai" value="<?php echo $nilai; ?>" />
        </div>
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('variabel') ?>" class="btn btn-default">Cancel</a>
	</form>
         </div>
        </div>
    </div>
</div>