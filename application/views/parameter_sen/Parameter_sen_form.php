<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?= $button;?> Parameter_sen</h3>
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
            <label for="varchar">Parameter <?php echo form_error('parameter') ?></label>
            <input type="text" class="form-control" name="parameter" id="parameter" placeholder="Parameter" value="<?php echo $parameter; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Nilai 1 <?php echo form_error('id_nilai_1') ?></label>
            <input type="text" class="form-control" name="id_nilai_1" id="id_nilai_1" placeholder="Id Nilai 1" value="<?php echo $id_nilai_1; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Nilai 2 <?php echo form_error('id_nilai_2') ?></label>
            <input type="text" class="form-control" name="id_nilai_2" id="id_nilai_2" placeholder="Id Nilai 2" value="<?php echo $id_nilai_2; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Nilai 3 <?php echo form_error('id_nilai_3') ?></label>
            <input type="text" class="form-control" name="id_nilai_3" id="id_nilai_3" placeholder="Id Nilai 3" value="<?php echo $id_nilai_3; ?>" />
        </div>
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('parameter_sen') ?>" class="btn btn-default">Cancel</a>
	</form>
         </div>
        </div>
    </div>
</div>