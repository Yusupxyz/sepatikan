<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Parameter Sen Detail</h3>
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
	    <tr><td>Parameter</td><td><?php echo $parameter; ?></td></tr>
	    <tr><td>Id Nilai 1</td><td><?php echo $id_nilai_1; ?></td></tr>
	    <tr><td>Id Nilai 2</td><td><?php echo $id_nilai_2; ?></td></tr>
	    <tr><td>Id Nilai 3</td><td><?php echo $id_nilai_3; ?></td></tr>
	    <tr><td><a href="<?php echo site_url('parameter_sen') ?>" class="btn bg-purple">Cancel</a></td></tr>
	</table>
            </div>
        </div>
    </div>
</div>