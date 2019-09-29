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

<!-- Modal Tahun-->
<div class="modal" id="modalTahun">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">INPUT DATA PENANGKAPAN IKAN SUNGAI</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form class="form" action="">
            Tahun :
            <?php echo form_dropdown('tahun', $options3, null, $attribute); ?>
        </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Lanjut</button>
      </div>

    </div>
  </div>
</div>