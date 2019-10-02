<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?= $button;?> Stasiun</h3>
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
            <label for="int">Stasiun <?php echo form_error('stasiun') ?></label>
            <input type="text" class="form-control" name="stasiun" id="stasiun" placeholder="Stasiun" value="<?php echo $stasiun; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Desa <?php echo form_error('desa') ?></label>
            <input type="text" class="form-control" name="desa" id="desa" placeholder="Desa" value="<?php echo $desa; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Koordinat <?php echo form_error('koordinat') ?></label>
            <input type="text" class="form-control" name="koordinat" id="koordinat" placeholder="Koordinat" value="<?php echo $koordinat; ?>" />
        </div>
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('stasiun') ?>" class="btn btn-default">Cancel</a>
	</form>
         </div>
        </div>
    </div>
</div>