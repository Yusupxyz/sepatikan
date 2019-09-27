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
      <div class="modal-body">
        <form class="form" action="">
            Pilih perairan yang disurvey :
            <?php echo form_dropdown('sungai', $options, null, $attribute); ?>
            <br>
            Pilih jenis data yang direkam :
            <?php echo form_dropdown('sungai', $options2, null, $attribute); ?>
        </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" data-toggle="modal" data-target="#modalLogin">Lanjut</button>
      </div>

    </div>
  </div>
</div>

<!-- Modal Login-->
<div class="modal" id="modalLogin">
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
            Username :
            <?php echo form_input('username', null, $attribute2); ?>
            <br>
            Password :
            <?php echo form_input('username', null, $attribute2); ?>
        </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Mulai/Eksekusi</button>
      </div>

    </div>
  </div>
</div>