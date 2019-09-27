<div class="row">
    <div class="col-xs-12 col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?= $button;?> Download</h3>
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
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
	    <div class="form-group">
            <input type="hidden" class="form-control" name="id_download" id="id_download" placeholder="Id Download" value="<?php echo $id_download; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Tabel <?php echo form_error('nama_tabel') ?></label>
            <input type="text" class="form-control" name="nama_tabel" id="nama_tabel" placeholder="Nama File" value="<?php echo $nama_tabel; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">Tahun <?php echo form_error('tahun') ?></label>
            <input type="text" class="form-control" name="tahun" id="tahun" placeholder="tahun" value="<?php echo $tahun; ?>" />
        </div>
        <div class="form-group">
            <label for="int">Kategori</label>
             <select class="selectpicker form-control" name="id_kategori" id="id_kategori" data-placeholder="Pilih Kegiatan" data-live-search="true" style="width: 100%;">
                   <option value="0">-- Pilih Kategori -- </option>
                  <?php 
                    foreach ($kategori as $key => $value ) {
                      
                      echo "<option value=\"$value->id_kategori\"".(($value->id_kategori==$id_kategori)?'selected="selected"':"")." >$value->nama_kategori</option>";
                    }
                  ?>
               </select>
        </div>
        <div class="form-group">
        
            <label for="varchar">Tags <?php echo form_error('tags') ?></label>
            <input type="text" class="form-control" name="tags" id="tags_1" placeholder="tag" value="<?php
            
             foreach($tags as $a){
                echo $a->nama_tag;
             }
            
             ?>" />
      
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi <?php echo form_error('deskripsi') ?></label>
            <textarea class="form-control" rows="3" name="deskripsi" id="deskripsi" placeholder="Deskripsi"><?php echo $deskripsi; ?></textarea>
        </div>
        <div class="form-group">
                            <label for=""> File (Excel)</label>
                            <input type="file" class="form-control-file" name="filename" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"/ >
                           <!--  <div class="validation-message" data-field="excel"></div> -->
        </div>
	    
	    
	    
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('download') ?>" class="btn btn-default">Cancel</a>
	</form>
         </div>
        </div>
    </div>
</div>