<!-- Modal Awal-->
<div class="modal" id="modalAwal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">INPUT DATA</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <form action="<?= base_url($action); ?>" method="post" id="form1">
      <div class="modal-body">
            Pilih perairan yang disurvey :
            <?php echo form_dropdown('sungai', $options, null, $attribute); ?>
            <br>
            Pilih jenis data yang direkam :
            <?php echo form_dropdown('jenis_data', $options2, null, $attribute2); ?>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" id="submit1" class="btn btn-primary" disabled>Lanjut</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Lokasi-->
<div class="modal" id="modalLokasi">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">MENAMPILKAN DATA PERIKANAN</h4>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <form action="<?= base_url($action); ?>" method="post" id="form2">
            PILIH LOKASI :
            <?php echo form_dropdown('lokasi', $options, null, $attribute3); ?>
            <br>
            PILIH JENIS DATA :
            <?php echo form_dropdown('jd', $options2, null, $attribute4); ?>
            <br>
            PILIH TAHUN DATA :
            <?php echo form_dropdown('tahun', $options3, null, $attribute5); ?>
            <br>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" id="submit2" class="btn btn-primary" disabled>Tampilkan Data</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Menu Utama</button>
      </div>
      </form>
      
    </div>
  </div>
</div>
