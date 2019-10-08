<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?= $button;?> Data_sen</h3>
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
            <label for="varchar">Id Stasiun <?php echo form_error('id_stasiun') ?></label>
            <input type="text" class="form-control" name="id_stasiun" id="id_stasiun" placeholder="Id Stasiun" value="<?php echo $id_stasiun; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Parameter <?php echo form_error('id_parameter') ?></label>
            <input type="text" class="form-control" name="id_parameter" id="id_parameter" placeholder="Id Parameter" value="<?php echo $id_parameter; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Nilai <?php echo form_error('id_nilai') ?></label>
            <input type="text" class="form-control" name="id_nilai" id="id_nilai" placeholder="Id Nilai" value="<?php echo $id_nilai; ?>" />
        </div>
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('data_sen') ?>" class="btn btn-default">Cancel</a>
	</form>
         </div>
        </div>
    </div>
</div>