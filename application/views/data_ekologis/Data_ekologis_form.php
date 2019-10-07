<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?= $button;?> Data_ekologis</h3>
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
            <label for="int">Id Ekologis <?php echo form_error('id_ekologis') ?></label>
            <input type="text" class="form-control" name="id_ekologis" id="id_ekologis" placeholder="Id Ekologis" value="<?php echo $id_ekologis; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Id Stasiun <?php echo form_error('id_stasiun') ?></label>
            <input type="text" class="form-control" name="id_stasiun" id="id_stasiun" placeholder="Id Stasiun" value="<?php echo $id_stasiun; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Parameter <?php echo form_error('id_parameter') ?></label>
            <input type="text" class="form-control" name="id_parameter" id="id_parameter" placeholder="Id Parameter" value="<?php echo $id_parameter; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Data <?php echo form_error('data') ?></label>
            <input type="text" class="form-control" name="data" id="data" placeholder="Data" value="<?php echo $data; ?>" />
        </div>
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('data_ekologis') ?>" class="btn btn-default">Cancel</a>
	</form>
         </div>
        </div>
    </div>
</div>