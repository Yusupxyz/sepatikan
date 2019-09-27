<div class="row">
<div class="col-xs-12">
    <!-- untuk grafik-->
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
      <div class="box-body">
      <h3 class="box-title" style="text-align:center"> Grafik <?php echo "$nama_tabel";?> </h3>  
      <div class="box-body">
      <?php if ($id_jenis_grafik=='3'){ ?>
      <!-- chart pie -->
      <div class="chart">
          <div style="width:360px;height:360px;float:left;">
            <canvas id="pie-chartcanvas-1"></canvas>
          </div>
          <div style="padding-left: 10px;">
            <div class="panel panel-default" style="display:inline-block;">
                  <div class="panel-body post-body" id="keterangan" >
                    <?php
                     $j=0;
                     $i='B';
                        for ($x=0; $x < count($value2); $x++) {  ?>
                       <button type="button" style="background-color: <?= $color[$j++] ?>;" class="btn"></button> 
                       <?= $variabel[$i++]['nama'] ?> &nbsp;&nbsp;&nbsp;
                    <?php  } ?>
                  </div>
              </div>
              </div>
        </div>
      <?php } else { ?>
      <!-- chart line atau bar -->
        <div class="chart">
            <canvas id="barChart" style="height:100%"></canvas>
        </div>
            <div style="padding-left: 10px;text-align:center;">
            <div class="panel panel-default" style="display:inline-block;">
                  <div class="panel-body post-body" id="keterangan" >
                    <?php
                     $j=0;
                     $i='B';
                        for ($x=0; $x < count($value2); $x++) {  ?>
                       <button type="button" style="background-color: <?= $color[$j++] ?>;" class="btn"></button> 
                       <?= $variabel[$i++]['nama'] ?> &nbsp;&nbsp;&nbsp;
                    <?php  } ?>
                  </div>
              </div>
              </div>
              <?php } ?>
      </div> 
      
</div>
</div>

<!-- untuk read tabel excel-->
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
</div>
