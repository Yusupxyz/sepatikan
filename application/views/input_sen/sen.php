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
        <div id="judul">
          <b>  DATA STASIUN 1 </b> 
        </div>
        <div class="col-sm-6">
        <form id="form1" >
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
        </div>
        <div >
            <table class="table table-striped text-left" style="margin-bottom: 10px; margin-top: 100px" style="width:100px;">
            <tr>
                <th>No.</th>
                <th>Parameter</th>
                <th>Data</th>
            </tr>
            <?php $i=1; foreach ($parameter as $key => $value) { ?>
                <input   type="hidden" name="id_sen[]" value="<?= $value->id ?>">
                <tr>
                <th><?= $i++ ?>.</th>
                <th>
                    <p><?= $value->parameter ?> </p>
                    <?php $j=1; foreach ($nilai_parameter[$value->id] as $key => $value2) { ?>
                        <p><?= $j++.'. '.$value2->nilai ?> </p> 
                    <?php } ?>
                </th>
                <th>
                    <select name="data[]" class="form-control">
                        <option value="0">--Pilih--</option>
                        <option value="<?= $value->id_nilai_1 ?>">1</option>
                        <option value="<?= $value->id_nilai_2 ?>">2</option>
                        <option value="<?= $value->id_nilai_3 ?>">3</option>
                    </select> 
                </th>
            </tr>
            <?php } ?>
            
            </table>   
        </div> 
      
        </form>

        <div align="right">
            <button class="btn btn-primary" type="submit" onclick="save()" id="submit"><i class="fa fa-save"></i> Simpan Data</button>
            <button class="btn btn-warning" type="button" onclick="lanjut()" id="lanjut" disabled><i class="fa fa-arrow-right" ></i> Stasiun Selanjutnya</button>
            <?php echo anchor(site_url('Auth/logout'),'<i class="fa fa-check"></i> Selesai', 'class="btn bg-green"'); ?>
        </div>
    </div>
    </div>
  </div>
</div>