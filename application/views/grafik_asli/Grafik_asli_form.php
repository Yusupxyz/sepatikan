<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?= $button;?> Grafik</h3>
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
            <label for="varchar">Id Grafik <?php echo form_error('id_grafik') ?></label>
            <input type="text" class="form-control" name="id_grafik" id="id_grafik" placeholder="Id Grafik" value="<?php echo $id_grafik; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Id Download <?php echo form_error('id_download') ?></label>
            <input type="text" class="form-control" name="id_download" id="id_download" placeholder="Id Download" value="<?php echo $id_download; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Id Jenis Grafik <?php echo form_error('id_jenis_grafik') ?></label>
            <input type="text" class="form-control" name="id_jenis_grafik" id="id_jenis_grafik" placeholder="Id Jenis Grafik" value="<?php echo $id_jenis_grafik; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Grafik <?php echo form_error('nama_grafik') ?></label>
            <input type="text" class="form-control" name="nama_grafik" id="nama_grafik" placeholder="Nama Grafik" value="<?php echo $nama_grafik; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Variabel 1 <?php echo form_error('variabel_1') ?></label>
            <input type="text" class="form-control" name="variabel_1" id="variabel_1" placeholder="Variabel 1" value="<?php echo $variabel_1; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Variabel 2 <?php echo form_error('variabel_2') ?></label>
            <input type="text" class="form-control" name="variabel_2" id="variabel_2" placeholder="Variabel 2" value="<?php echo $variabel_2; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Variabel 3 <?php echo form_error('variabel_3') ?></label>
            <input type="text" class="form-control" name="variabel_3" id="variabel_3" placeholder="Variabel 3" value="<?php echo $variabel_3; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Variabel 4 <?php echo form_error('variabel_4') ?></label>
            <input type="text" class="form-control" name="variabel_4" id="variabel_4" placeholder="Variabel 4" value="<?php echo $variabel_4; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Variabel 5 <?php echo form_error('variabel_5') ?></label>
            <input type="text" class="form-control" name="variabel_5" id="variabel_5" placeholder="Variabel 5" value="<?php echo $variabel_5; ?>" />
        </div>
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('grafik_asli') ?>" class="btn btn-default">Cancel</a>
	</form>
         </div>
        </div>
    </div>
</div>