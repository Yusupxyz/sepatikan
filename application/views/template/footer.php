    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 0.0.1 <b>BETA</b>
    </div>
    <strong>Copyright &copy; 2018 ACS</a>.</strong> All rights
    reserved.
  </footer>

</div>
<!-- ./wrapper -->

  <script src="<?= base_url('assets/bower_components/jquery/dist/jquery.min.js');?>"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="<?= base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js');?>"></script>
  <script src="<?= base_url('assets/bower_components/PACE/pace.min.js');?>"></script>

  <!-- SlimScroll -->
  <script src="<?= base_url('assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js');?>"></script>
  <!-- FastClick -->
  <script src="<?= base_url('assets/bower_components/fastclick/lib/fastclick.js');?>"></script>
  <script src="<?= base_url('assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js');?>"></script>
  <script src="<?= base_url('assets/plugins/iCheck/icheck.min.js');?>"></script>


  <!-- AdminLTE App -->
  <!-- DataTables -->
  <script src="<?= base_url('assets/bower_components/datatables.net/js/jquery.dataTables.min.js');?>"></script>
  <script src="<?= base_url('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js');?>"></script>
  <script src="<?= base_url('assets/bower_components/datatables/dataTables.checkboxes.js');?>"></script>
  <script src="<?= base_url('assets/dist/js/adminlte.min.js');?>"></script>
  <script src="<?= base_url('assets/plugins/jquery-nestable/jquery.nestable.js');?>"></script>
  <script src="<?= base_url('assets/plugins/alertify/alertify.js');?>"></script>
  <script src="<?= base_url('assets/plugins/bootstrap-show-password/bootstrap-show-password.min.js');?>"></script>

  <!-- Select2 -->
  <script src="<?= base_url('assets/bower_components/bootstrap-select/js/bootstrap-select.js');?>"></script>
  
  <!-- tags -->
  <script src="<?= base_url('assets/plugins/jquerytaginput/jquery.tagsinput.js');?>"></script> 
  <script>
    $(document).ready(function(){
      $('#tags_1').tagsInput({
        width: 'auto'
      });
      $("input").val()
    });
  
  </script>




  <!-- menu funct -->
  <script src="<?= base_url('assets/dist/js/menu.js');?>"></script>
  <!-- <script type="text/javascript">
      // To make Pace works on Ajax calls
    $(document).ajaxStart(function () {
      Pace.restart()
    });
    <?php 
      if(isset($this->session->message)){ ?>
        alertify.set('notifier','position', 'top-right');
        alertify.success('<a style="color:white"><?= $this->session->message;?></a>');
    
    <?php } ?>

            $(document).on("click",".hapus-download",function(){

              konfirmasi("Hapus data","Yakin akan menghapus data ini?",function(a){
              var id=a.attr("data-id");
              $.ajax({
                type:"post",
                data:{id:id},
                url:"<?php echo base_url('Ajax_admin/hapus_download') ?>",
                dataType:"json",
                cache:false,
                success:function(){
                  window.location.reload();
                },
                error:function(){
                  error_alert("Kesalahan","Coba lagi");
                }
              })                
              },$(this));    

            });


            textEditor("#deskripsi-file");
            var file_download_terupload=false;

            var file_download=new Dropzone(".file_download", { url:"<?php echo base_url() ?>Ajax_admin/file_download" ,
                                                      method:'post',
                                                      maxFiles:1,
                                                      paramName:"userfile",
                                                      addRemoveLinks: true,
                                                      dictDefaultMessage:"Drop file disini",
                                                      dictInvalidFileType:"Type file ini tidak dizinkan",
                                                      dictRemoveFile:"Batalkan file ini"
                                                    }); 
           var sesi=$("#sesi-form-upload").val();
           var id=$("#id-file-download").val(); 

           var file_token;

           file_download.on("sending",function(a,b,c){

            a.token=file_token=Math.random();
            c.append('sesi',sesi);
            c.append('token_file',a.token);
            c.append('id',id);
          
            console.log('mengirim');
           
           });


           file_download.on("success",function(a,b){
              console.log(b);
              file_download_terupload=true;
           })

         

           file_download.on("removedfile",function(a){
            var tok=a.token;
            $.ajax({
              type:"POST",
              data:{"token":tok},
              url:"<?php echo base_url() ?>Ajax_admin/delete_file_download_temp",
              cache:false,
              success:function(a){
                console.log("delete sukses");
                file_download_terupload=false;
              },
              error: function(a,b,c){
                console.log("delete gagal, cek koneksi internet")
              }
            });
           
           });


           $(window).unload(function(){

            $.ajax({
              type:"POST",
              data:{"token":file_token},
              url:"<?php echo base_url() ?>Ajax_admin/delete_file_download_temp",
              cache:false,
              success:function(a){
                console.log("delete sukses");
              },
              error: function(a,b,c){
                console.log("delete gagal, cek koneksi internet")
              }
            });

           });


           $(".simpan-file").click(function(){
              var _this=$(this);
              var id=_this.attr("data-id");

              if(!file_download_terupload && id<1){
                error_alert("Belum upload file","Harap upload file")
                return;
              }

              if(!_this[0].memproses){
                show_proses("Menyimpan data...");
                _this[0].memproses=true;
                var nama=$("#nama-file").val();
                var sesi=$("#sesi-form-upload").val();
                var deskripsi=tinymce.get("deskripsi-file").getContent();
                $.ajax({
                  type:"post",
                  url:"<?php echo base_url('Ajax_admin/proses_input_download') ?>",
                  data:{
                    id:id,
                    nama:nama,
                    sesi:sesi,
                    deskripsi:deskripsi
                  },
                  dataType:"json",
                  cache: false,
                  success:function(){
                    show_proses("Proses berhasil!!");
                    if(id<1){

                    setTimeout(function(){
                      window.location.href="<?php echo base_url('admin/semua_download') ?>";
                    },1500);

                      return;
                    } else {

                      setTimeout(function(){
                        window.location.reload();
                      },1500);

                    }
                  },
                  error:function(){
                    error_alert("Kesalahan","Silahkan coba lagi");
                  },
                  complete:function(){
                   _this[0].memproses=false;
                  }
                });
              }
           });
  </script> -->
  <?php (isset($code_js)?$this->load->view($code_js):""); ?>
</body>
</html>
