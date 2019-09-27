<div class="row">
<div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" onclick="location.reload()" title="Refresh">
              <i class="fa fa-refresh"></i></button>
        </div>
      </div>
      <!-- untuk read tabel excel-->
      <div class="box-body">
      <h3 class="box-title"><?php echo "<h2>$nama_tabel</h2>";?> </h3>      
          <table class="table table-bordered table-striped" id="mytable" style="width:100%">
          <?php 
                      
            foreach ($header as $key => $value1) {
                            echo "\t<tr>\n";

                  foreach ($value1 as $dt) {
                      echo "\t\t<td>$dt</td>\n";
                  }
                  echo "\t</tr>\n"; # code...
                            }                

              foreach ($values as $key => $value) {
                  # code...
                  echo "\t<tr>\n";

                  foreach ($value as $dt) {
                      echo "\t\t<td>".$dt."</td>\n";
                  }
                  echo "\t</tr>\n";
              }
          ?>
          </table>
          <div class="row" style="margin-bottom: 10px;">
                      <div class="col-md-12">
                          <a href="#" class="btn bg-yellow">Total Record : <?php echo $total_rows ?></a>
                      </div>
          </div> 
    </div>

    </div>
    <div class="box">
      <div class="box-header">
        
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" onclick="location.reload()" title="Refresh">
              <i class="fa fa-refresh"></i></button>
        </div>
      </div>
      <!-- untuk create grafuik-->
      <div class="box-body">
      <h3 class="box-title">Generate Grafik </h3>      
      <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <input type="hidden" class="form-control" name="id_grafik" id="id_grafik" placeholder="Id Grafik" value="<?php echo $id_grafik; ?>" />
            <input type="hidden" class="form-control" name="total_variabel" id="total_variabel" placeholder="Id Grafik" value="<?php echo count($header[1]); ?>" />

        </div>
	    <div class="form-group">
            <label for="varchar">Judul Grafik <?php echo form_error('nama_tabel') ?></label>
            <input type="text" class="form-control" name="nama_grafik" id="nama_grafik" placeholder="Judul Grafik" value="<?php echo $nama_tabel; ?>" />
        </div>
        <div class="form-group">
            <label for="int">Jenis Grafik</label>
             <select class="selectpicker form-control" name="id_jenis_grafik" id="id_jenis_grafik" data-placeholder="Pilih jenis Gragfik" data-live-search="true" style="width: 100%;">
                   <option value="0">-- Pilih Grafik -- </option>
                  <?php 
                    foreach ($jenis_grafik as $nama_grafik  ) {
                      echo "<option value=\"$nama_grafik->id_jenis_grafik\" "; 
                      echo ($nama_grafik->id_jenis_grafik==$id_jenis_grafik) ? 'selected="selected"' : '' ;
                      echo"  >$nama_grafik->nama_grafik</option>";
                    }
                  ?>
               </select>
        </div>
                      <!-- variebel 1-->
        <?php 
          $j='0';
         for ($i=1; $i < count($header[1]) ; $i++) {  ?>
          <div class="form-group">
            <label for="deskripsi">Variabel <?php echo $i ?> <?php echo form_error('deskripsi') ?></label>
            <select class="selectpicker form-control" name="variabel<?php echo $i ?>" id="variabel<?php echo $i ?>" data-placeholder="Pilih Variabel" data-live-search="true" style="width: 100%;">
                   <option value="0">-- Pilih Variabel -- </option>
                  <?php 
                  
                    foreach ($variabel as $header1) {
                      echo "<option value=\"".$header1['kolom']."\" ";
                      echo ($header1['kolom']==$selected_variabel[$j]->nilai) ? 'selected="selected"' : '' ;
                      echo ">".$header1['nama']."</option>";
                    }
                  ?>
               </select>
        </div>
        <?php              
  $j++; } ?>
        
       
        <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	      <a href="<?php echo site_url('download') ?>" class="btn btn-default">Cancel</a>
	      </form>    
      </div>
    </div>
  </div>
</div>
