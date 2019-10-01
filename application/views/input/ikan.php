<div class="row">
<div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title"><?= $tahun ?></h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" onclick="location.reload()" title="Refresh">
              <i class="fa fa-refresh"></i></button>
          </div>
      </div>

      <div class="box-body">
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-12">
                <button  class="btn btn-default" type="button" onclick="p1()" id="p1">Periode 1 Nov-April <br> Musim Hujan</button>
                <button class="btn btn-default" type="button" onclick="p2()" id="p2">Periode 2 Mei-Okt <br> Musim Kemarau</button>
                <hr />
            </div>
        </div>
        <div>
            <b>  DATA STASIUN 1 </b>    
        </div>
        <div class="col-sm-6">
        <form  action="/action_page.php">
            <div class="form-group">
                <label class="control-label col-sm-2" for="desa">DESA</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="desa" name="desa" placeholder="Masukkan nama desa">
                </div>
            </div>
            <br><br>
            <div class="form-group">
                <label class="control-label col-sm-2" for="koordinat">KOORDINAT</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="koordinat" name="koordinat" placeholder="Masukkan koordinat desa">
                </div>
            </div>
        </form>
        </div>
        <div >
            <table class="table table-striped text-left" style="margin-bottom: 10px; margin-top: 100px" style="width:100px;">
            <tr>
                <th colspan="4">Hasil tangkapan berdasarkan jenis ikan pada periode ini</th>
            </tr>
            <tr>
                <th>No.</th>
                <th>Nama Ikan</th>
                <th>Hasil tangkapan (kg/hari/nelayan)</th>
                <th>Ukuran ikan rata rata (gram/ekor)</th>
            </tr>
            <?php for ($i=0; $i < 6; $i++) { ?>
                <tr>
                <th><?= $i+1 ?>.</th>
                <th>
                    <input  class="form-control" type="text" name="ikan"><br>
                </th>
                <th>
                    <input  class="form-control" type="text" name="hasil"><br>
                </th>
                <th>
                    <input  class="form-control" type="text" name="ukuran"><br>  
                </th>
            </tr>
            <?php } ?>
            
            </table>   
        </div> 
        <div class=" col-xs-12 col-md-4">
              <p class="text-left bg-success">Rata rata hasil tangkapan total per nelayan per hari (kg/hari/nelayan) pada periode ini</p>
        </div>
        <div class=" col-xs-12 col-md-8">
            <input  class="form-control" type="text" name="rata" placeholder="Masukkan rata-rata hasil tangkapan"><br>
        </div>
        <div class=" col-xs-12 col-md-4">
              <p class="text-left bg-success">Jenis alat tangkap utama yang digunakan pada periode ini</p>
        </div>
        <div class=" col-xs-12 col-md-8">
            <table class="table table-striped text-left" >
            <?php for ($i=0; $i < 4; $i++) { ?>
                <tr>
                <th><?= $i+1 ?>.</th>
                <th>
                    <input  class="form-control" type="text" name="ikan"><br>
                </th>
            </tr>
            <?php } ?>
            </table>   
        </div>
        <div class=" col-xs-12 col-md-4">
              <p class="text-left bg-success">Lokasi pengakapan utama pada periode ini</p>
        </div>
        <div class=" col-xs-12 col-md-8">
        <table class="table table-striped text-left" >
            <?php for ($i=0; $i < 4; $i++) { ?>
                <tr>
                <th ><?= $i+1 ?>.</th>
                <th>
                    <input  class="form-control" type="text" name="ikan"><br>
                </th>
            </tr>
            <?php } ?>
            </table>   
        </div>
        <div align="right">
            <button class="btn btn-primary" type="submit" onclick="cek()" id="submit"><i class="fa fa-save"></i> Simpan Data</button>
            <button class="btn btn-warning" type="submit" onclick="cek()" id=""><i class="fa fa-arrow-right"></i> Stasiun Selanjutnya</button>
            <?php echo anchor(site_url('Auth/logout'),'<i class="fa fa-check"></i> Selesai', 'class="btn bg-green"'); ?>
        </div>
    </div>
    </div>
  </div>
</div>